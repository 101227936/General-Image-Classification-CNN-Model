import os
import glob

files = glob.glob('./model/*')
for f in files:
    os.remove(f)