import zipfile
import os
import sys

def checkFile():
    count = 0
    with zipfile.ZipFile('./model/'+sys.argv[1]+'/model.zip', 'r') as zipObj:
        listofFiles = zipObj.namelist()
        for file in listofFiles:
            print(file)
            if(file == 'accuracy.png' or 
               file == 'cm.png' or 
               file == 'label.txt' or 
               file == 'loss.png' or
               file == 'model.h5' or
               file == 'report.txt' or
               file == 'roc.png'):
                count+=1
                continue
        zipObj.close()
        if count == 7:
            with zipfile.ZipFile('./model/'+sys.argv[1]+'/model.zip','r') as zipObj:
                zipObj.extractall('./model/'+sys.argv[1]+'/')
                zipObj.close()
            os.remove('./model/'+sys.argv[1]+'/model.zip')
            try: os.remove('./model/'+sys.argv[1]+'/result.png')
            except: pass
            print(True)
        else:
            os.remove('./model/'+sys.argv[1]+'/model.zip')
            print(False)
checkFile();
