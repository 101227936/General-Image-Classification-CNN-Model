import os
import glob
import shutil;

files = glob.glob('./model/*')
for f in files:
    try:
        shutil.rmtree(f)
    else:
        os.remove(f)