import zipfile
import os

with zipfile.ZipFile('./model/model.zip', 'r') as zipObj:
    listofFiles = zipObj.namelist()
    for file in listofFiles:
        if(file.endswith('.h5')):
            zipObj.extract(file,'./model')
    zipObj.close()
os.remove('./model/model.zip')