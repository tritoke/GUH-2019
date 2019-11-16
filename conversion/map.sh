#!/bin/bash

SRC=$(realpath $1)
DEST=$(realpath $2)
echo "SRC = $SRC"
echo "DEST = $DEST"

for zip in $(ls $SRC/*.zip); do
  zname=$(basename ${zip%.*})
  echo "zname = $zname"
  unzipdir=$SRC/$zname
  echo "unzipdir = $unzipdir"
  [ -d $unzipdir ] || mkdir $unzipdir
  yes | unzip $zip -d $unzipdir

  destdir=$DEST/$zname
  echo "destdir = $destdir"
  [ -d $destdir ] || mkdir $destdir
  for file in $(ls $unzipdir); do
    ./convert.py $unzipdir/$file $destdir/${file%.*}.txt
  done
done
