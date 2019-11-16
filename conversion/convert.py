#!/usr/bin/env python

from PIL import Image
import numpy as np
from sys import argv
from json import dumps

def save_to_file(arr, fname):
    text = "int arr[8][8][3] = " + dumps(arr[:,:,:3].tolist()).replace("[", "{").replace("]", "}")
    with open(fname, "w") as f:
        f.write(text)


if len(argv) == 2:
    save_to_file(np.asarray(Image.open(argv[1]),dtype="uint8"), "out.txt")
elif len(argv) == 3:
    save_to_file(np.asarray(Image.open(argv[1]),dtype="uint8")[:,:,:3], argv[2])
else:
    print(f"usage: {argv[0]} <image> <save-destination? - out.txt>")
