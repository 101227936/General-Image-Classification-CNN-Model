import zipfile
import os

def checkFile():
    with zipfile.ZipFile('./model/model.zip', 'r') as zipObj:
        #listofFiles = zipObj.namelist()
        #for file in listofFiles:
            #if(file == 'accuracy.png' or 
               #file == 'cm.png' or 
               #file == 'label.txt' or 
               #file == 'loss.png' or
               #file == 'model.h5' or
               #file == 'report.txt' or
               #file == 'roc.png'):
                #break;
            #else:
                #os.remove('./model/model.zip')
                #return False;
        zipObj.extractall('./model/')
        zipObj.close()
        os.remove('./model/model.zip')
        return True;
checkFile();