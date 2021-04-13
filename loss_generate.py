#!C:\Users\User\AppData\Local\Programs\Python\Python35-32\python.exe
import matplotlib.pyplot as plt

print("Content-Type: text/html\n")

fig, c_ax = plt.subplots(1,1, figsize = (12, 8))

loss = history.history['loss']
val_loss = history.history['val_loss']
epochs = range(len(acc))

l3,= plt.plot(epochs, loss, 'b', label='training')
l4,= plt.plot(epochs, val_loss, 'y', label='validatation')
plt.xlabel('Epochs')
plt.ylabel('Loss Value')
plt.title('Training and validation loss')
plt.legend(handles=[l3,l4],labels=['training','validatation'],loc='best')

rect = fig.patch
rect.set_facecolor("white")
plt.savefig(dir_path+'/loss.png', facecolor=fig.get_facecolor())
