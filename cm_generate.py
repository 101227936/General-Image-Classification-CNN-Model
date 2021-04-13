#!C:\Users\User\AppData\Local\Programs\Python\Python35-32\python.exe
import sklearn.metrics as metrics
import itertools
cm = metrics.confusion_matrix(true_classes, predicted_classes)
plot_confusion_matrix(cm=cm, classes=class_labels, title='Confusion Matrix', normalize = True)
