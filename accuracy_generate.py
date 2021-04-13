#!C:\Users\User\AppData\Local\Programs\Python\Python35-32\python.exe
import matplotlib.pyplot as plt

print("Content-Type: text/html\n")

fig, c_ax = plt.subplots(1,1, figsize = (12, 8))

acc = history.history['accuracy']
val_acc = history.history['val_accuracy']
epochs = range(len(acc))

l1,= plt.plot(epochs, acc, 'r', label='training')
l2,= plt.plot(epochs, val_acc, 'g', label='validatation')
plt.xlabel('Epochs')
plt.ylabel('Accuracy Value')
plt.title('Training and validation accuracy')
plt.legend(handles=[l1,l2],labels=['training','validatation'],loc='best')

rect = fig.patch
rect.set_facecolor("white")
plt.savefig(dir_path+'/accuracy.png', facecolor=fig.get_facecolor())
