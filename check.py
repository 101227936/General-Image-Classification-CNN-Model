import os
import sys

def checkFile():
    count = 0
    with os.scandir('model/'+sys.argv[1]+'/') as entries:
        for file in entries:
            print(file.name) #with .name will read 'cm.png', without will read <DirEntry 'loss.png'>
            if(file.name == 'accuracy.png' or 
               file.name == 'cm.png' or 
               file.name == 'label.txt' or
               file.name == 'loss.png' or
               file.name == 'model.h5' or
               file.name == 'report.txt' or
               file.name == 'roc.png' ):
                count+=1
                print('jasmin read file success')
                continue
            else:
                print('jasmin read file fail')

        entries.close()

        if count == 7:
            print(True)
        else:
            print(False)
            
checkFile();
