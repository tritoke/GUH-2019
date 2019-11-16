#!/bin/bash
for file in $(ls $1)
do
  ./convert.py $1/$file $2/${file%.*}.txt
done
