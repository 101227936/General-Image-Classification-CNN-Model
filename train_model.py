#!C:\Users\CCL\AppData\Local\Programs\Python\Python39\python.exe
import sys
import json
import shutil
import os 
import zipfile
import matplotlib.pyplot as plt
import sklearn.metrics as metrics
import numpy as np
import itertools

from glob import glob
from sklearn.model_selection import train_test_split
from pathlib import Path
from tensorflow import keras
from tensorflow.keras.models import Model
from tensorflow.keras.layers import Dense, Dropout
from tensorflow.keras.preprocessing.image import ImageDataGenerator
from os.path import basename
from sklearn.preprocessing import LabelBinarizer

WIDTH = 224
HEIGHT = 224
EPOCHS = int(sys.argv[2])
BATCH_SIZE = int(sys.argv[3])
MODEL = sys.argv[1]

def get_files(path):
    all_files = []
    for x in Path(path).iterdir():
        if os.path.getsize(x) > 0 and (Path(x).suffix == '.jpg' or Path(x).suffix == '.jpeg' or Path(x).suffix == '.png'):
            all_files.append(x)
        else: os.remove(x)
    return all_files

def plot_confusion_matrix(cm, classes,normalize=False, title='Confusion matrix', cmap=plt.cm.Blues):
    """
    This function prints and plots the confusion matrix.
    Normalization can be applied by setting `normalize=True`.
    """
    
    fig, c_ax = plt.subplots(1,1, figsize = (12, 8))
    
    if normalize:
        cm = cm.astype('float') / cm.sum(axis=1)[:, np.newaxis]
        print("Normalized confusion matrix")
    else:
        print('Confusion matrix, without normalization')

    cm = np.around(cm, decimals=3)
    thresh = cm.mean()
    for i, j in itertools.product(range(cm.shape[0]), range(cm.shape[1])):
        plt.text(j, i, cm[i, j],
            horizontalalignment="center",
            color="white" if cm[i, j] > thresh else "black")
    
    plt.imshow(cm, interpolation='nearest', cmap=cmap)
    plt.title(title)
    plt.colorbar()
    tick_marks = np.arange(len(classes))
    plt.xticks(tick_marks, classes, rotation=0)
    plt.yticks(tick_marks, classes, rotation=0)

    plt.tight_layout()
    plt.ylabel('Class')
    plt.xlabel('Prediction')
    
    rect = fig.patch
    rect.set_facecolor("white")
    plt.savefig(dest_base+'/cm.png', facecolor=fig.get_facecolor())

def multiclass_roc_auc_score(true_classes, predicted_classes, average="macro"):
    fig, c_ax = plt.subplots(1,1, figsize = (12, 8))
    
    if len(class_labels)<3:
        fpr, tpr, thresholds = metrics.roc_curve(true_classes[:].astype(int), predicted_classes[:])
        c_ax.plot(fpr, tpr, label = '%s (AUC:%0.2f)'  % (class_labels, metrics.auc(fpr, tpr)))
        c_ax.plot(fpr, fpr, 'b-', label = '%s (AUC:%0.2f)' % ('Random Guessing',0.5))
    else:
        lb = LabelBinarizer()
        lb.fit(true_classes)
        true_classes = lb.transform(true_classes)
        predicted_classes = lb.transform(predicted_classes)
        for (idx, c_label) in enumerate(class_labels): # all_labels: no of the labels, for ex. ['cat', 'dog', 'rat']
            fpr, tpr, thresholds = metrics.roc_curve(true_classes[:,idx].astype(int), predicted_classes[:,idx])
            c_ax.plot(fpr, tpr, label = '%s (AUC:%0.2f)'  % (c_label, metrics.auc(fpr, tpr)))
        c_ax.plot(fpr, fpr, 'b-', label = '%s (AUC:%0.2f)' % ('Random Guessing', 0.5))
    plt.legend()
    plt.title('ROC Curve')
    plt.ylabel('True Positive Rate')
    plt.xlabel('False Positive Rate')
    rect = fig.patch
    rect.set_facecolor("white")
    plt.savefig(dest_base+'/roc.png', facecolor=fig.get_facecolor())
    return metrics.roc_auc_score(true_classes, predicted_classes, average=average)

dir_path = './uploads'
dest_base = './model'
dest_path = dest_base+'/train'
#filter the hidden folder
sub_folders = []
for item in os.listdir(dir_path):
    if not item.startswith('.'):
       sub_folders.append(item)

#create training folder
os.mkdir(dest_path)
#move class folder into train folder
for category in sub_folders:
    shutil.copytree(dir_path+'/'+category, dest_path+'/'+category)

categorical_files = {}

for category in sub_folders:
    categorical_files[category] = get_files(dest_base+'/train/'+category)
    
train = {}
test = {}
    
for category in sub_folders:
    train[category], test[category] = train_test_split(categorical_files[category], test_size=0.30)
        
TRAIN_DIR = dest_base+'/train'
TEST_DIR = dest_base+'/test'

os.mkdir(TEST_DIR)

for category in sub_folders:
    os.mkdir(TEST_DIR+'/'+category)
    for file_name in test[category]:
        shutil.move(file_name, TEST_DIR+'/'+category+'/'+os.path.basename(file_name))

CLASSES = len(sub_folders)
# setup model

if MODEL=="MobileNetV2":
    from tensorflow.keras.applications.mobilenet_v2 import MobileNetV2, preprocess_input
    base_model = MobileNetV2(weights='imagenet', include_top=False, input_shape=(224,224,3), pooling='avg')
elif MODEL=="EfficientNetB3":
    from tensorflow.keras.applications.efficientnet import EfficientNetB3, preprocess_input
    base_model = EfficientNetB3(weights='imagenet', include_top=False, input_shape=(224,224,3), pooling='avg')
elif MODEL=="InceptionV3":
    from tensorflow.keras.applications.inception_v3 import InceptionV3, preprocess_input
    base_model = InceptionV3(weights='imagenet', include_top=False, input_shape=(224,224,3), pooling='avg')
elif MODEL=="DenseNet201":
    from tensorflow.keras.applications.densenet import DenseNet201, preprocess_input
    base_model = DenseNet201(weights='imagenet', include_top=False, input_shape=(224,224,3), pooling='avg')
elif MODEL=="VGG16":
    from tensorflow.keras.applications.vgg16 import VGG16, preprocess_input
    base_model = VGG16(weights='imagenet', include_top=False, input_shape=(224,224,3), pooling='avg')
elif MODEL=="ResNet50V2":
    from tensorflow.keras.applications.resnet_v2 import ResNet50V2, preprocess_input
    base_model = ResNet50V2(weights='imagenet', include_top=False, input_shape=(224,224,3), pooling='avg')
elif MODEL=="Xception":
    from tensorflow.keras.applications.xception import Xception, preprocess_input
    base_model = Xception(weights='imagenet', include_top=False, input_shape=(224,224,3), pooling='avg')

x = base_model.output
x = Dropout(0.3)(x)
predictions = Dense(CLASSES, activation='softmax')(x)
model = Model(inputs=base_model.input, outputs=predictions, name=base_model.name)
   
# transfer learning
for layer in base_model.layers:
    layer.trainable = False
      
model.compile(optimizer='rmsprop',
              loss='categorical_crossentropy',
              metrics=['accuracy'])
			  


# data prep
train_datagen = ImageDataGenerator(
    preprocessing_function=preprocess_input,
    rotation_range=40,
    width_shift_range=0.2,
    height_shift_range=0.2,
    shear_range=0.2,
    zoom_range=0.2,
    horizontal_flip=True,
    fill_mode='nearest')

validation_datagen = ImageDataGenerator(
    preprocessing_function=preprocess_input,
    rotation_range=40,
    width_shift_range=0.2,
    height_shift_range=0.2,
    shear_range=0.2,
    zoom_range=0.2,
    horizontal_flip=True,
    fill_mode='nearest')

train_generator = train_datagen.flow_from_directory(
    TRAIN_DIR,
    target_size=(HEIGHT, WIDTH),
    batch_size=BATCH_SIZE,
    class_mode='categorical')
    
validation_generator = validation_datagen.flow_from_directory(
    TEST_DIR,
    target_size=(HEIGHT, WIDTH),
    batch_size=BATCH_SIZE,
    class_mode='categorical')
	
	

STEPS_PER_EPOCH = train_generator.samples/BATCH_SIZE
VALIDATION_STEPS = validation_generator.samples/BATCH_SIZE

history = model.fit(
    train_generator,
    epochs=EPOCHS,
    steps_per_epoch=STEPS_PER_EPOCH,
    validation_data=validation_generator,
    validation_steps=VALIDATION_STEPS)

model.save(dest_base+'/model.h5')

f = open(dest_base+'/label.txt', "w")
for category in sub_folders:
    f.write(str(sub_folders.index(category))+' '+category+'\n')
f.close()


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
plt.savefig(dest_base+'/accuracy.png', facecolor=fig.get_facecolor())


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
plt.savefig(dest_base+'/loss.png', facecolor=fig.get_facecolor())


# data prep for data evaluation
train_datagen = ImageDataGenerator(
    preprocessing_function=preprocess_input,
    rotation_range=40,
    width_shift_range=0.2,
    height_shift_range=0.2,
    shear_range=0.2,
    zoom_range=0.2,
    horizontal_flip=True,
    fill_mode='nearest')

validation_datagen = ImageDataGenerator(
    preprocessing_function=preprocess_input,
    rotation_range=40,
    width_shift_range=0.2,
    height_shift_range=0.2,
    shear_range=0.2,
    zoom_range=0.2,
    horizontal_flip=True,
    fill_mode='nearest')

train_generator = train_datagen.flow_from_directory(
    TRAIN_DIR,
    shuffle=False,
    target_size=(HEIGHT, WIDTH),
    batch_size=BATCH_SIZE,
    class_mode='categorical')
    
validation_generator = validation_datagen.flow_from_directory(
    TEST_DIR,
    shuffle=False,
    target_size=(HEIGHT, WIDTH),
    batch_size=BATCH_SIZE,
    class_mode='categorical')

test_steps_per_epoch = np.math.ceil(validation_generator.samples / validation_generator.batch_size)
predictions = model.predict(validation_generator, steps=test_steps_per_epoch)
# Get most likely class
predicted_classes = np.argmax(predictions, axis=1)
true_classes = validation_generator.classes
class_labels = list(validation_generator.class_indices.keys()) 


cm = metrics.confusion_matrix(true_classes, predicted_classes)
plot_confusion_matrix(cm=cm, classes=class_labels, title='Confusion Matrix', normalize = True)

precision,recall,fscore,support=metrics.precision_recall_fscore_support(true_classes, predicted_classes, average='macro')

score = multiclass_roc_auc_score(validation_generator.classes, predicted_classes, 'macro')

error_rate = metrics.mean_squared_error(true_classes, predicted_classes)

f = open(dest_base+'/report.txt', "w")
f.write('Accuracy  : {}\n'.format(np.mean(predicted_classes == true_classes)))
f.write('Precision : {}\n'.format(precision))
f.write('Recall    : {}\n'.format(recall))
f.write('F-score   : {}\n'.format(fscore))
f.write('Score     : {}\n'.format(score))
f.write('Error Rate: {}\n'.format(error_rate))
f.close()

shutil.rmtree(TRAIN_DIR)
shutil.rmtree(TEST_DIR)