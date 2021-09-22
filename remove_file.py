import os
import shutil
import sys

# getting the folder path from the user
folder_path ='model/'+sys.argv[1]+'/'

# checking whether folder exists or not
if os.path.exists(folder_path):

    print("Jasmin in")
    # removing the file using the os.remove() method
    try: shutil.rmtree('model/'+sys.argv[1]+'/test')
    except: pass
    try: shutil.rmtree('model/'+sys.argv[1]+'/train')
    except: pass
    #os.remove('model/test')
    #os.remove('model/train')


    
else:
    # file not found message
    print("File not found in the directory")
    print("Error: %s : %s" % (dir_path, e.strerror))

    