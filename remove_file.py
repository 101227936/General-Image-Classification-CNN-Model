import os
import shutil

# getting the folder path from the user
folder_path ='model/'

# checking whether folder exists or not
if os.path.exists(folder_path):

    print("Jasmin in")
    # removing the file using the os.remove() method
    shutil.rmtree('model/test')
    shutil.rmtree('model/train')

    #os.remove('model/test')
    #os.remove('model/train')


    
else:
    # file not found message
    print("File not found in the directory")
    print("Error: %s : %s" % (dir_path, e.strerror))

    