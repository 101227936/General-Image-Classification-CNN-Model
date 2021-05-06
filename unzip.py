import zipfile
import os

def checkFile():
    count = 0
    with zipfile.ZipFile('./model/model.zip', 'r') as zipObj:
        listofFiles = zipObj.namelist()
        for file in listofFiles:
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
            with zipfile.ZipFile('./model/model.zip','r') as zipObj:
                zipObj.extractall('./model/')
                zipObj.close()
            os.remove('./model/model.zip')
            return True
        else:
            os.remove('./model/model.zip')
            return False
checkFile();