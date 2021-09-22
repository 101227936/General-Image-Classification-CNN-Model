import sys
import zipfile
from os.path import basename

dest_base = './model/'+sys.argv[1]

with zipfile.ZipFile(dest_base+'/model.zip','w',compression=zipfile.ZIP_DEFLATED) as zipF:
    zipF.write(dest_base+'/accuracy.png',basename('/accuracy.png'))
    zipF.write(dest_base+'/cm.png',basename(dest_base+'/cm.png'))    
    zipF.write(dest_base+'/label.txt',basename(dest_base+'/label.txt'))
    zipF.write(dest_base+'/loss.png',basename(dest_base+'/loss.png'))
    zipF.write(dest_base+'/model.h5',basename(dest_base+'/model.h5'))
    zipF.write(dest_base+'/report.txt',basename(dest_base+'/report.txt'))
    zipF.write(dest_base+'/roc.png',basename(dest_base+'/roc.png'))
    zipF.write(dest_base+'/history.txt',basename(dest_base+'/history.txt'))
    zipF.close()