#!/bin/bash

SRC=$(realpath $1)
DEST=$(realpath $2)

for zip in $(ls $SRC/*.zip); do
  zname=$(basename ${zip%.*})
  unzipdir=$SRC/$zname
  [ -d $unzipdir ] || mkdir $unzipdir
  yes | unzip $zip -d $unzipdir &> /dev/null

  destdir=$DEST/$zname
  [ -d $destdir ] || mkdir $destdir
  for file in $(ls $unzipdir); do
    ./convert.py $unzipdir/$file $destdir/${file%.*}.c
  done
done
