#!C:\Users\User\AppData\Local\Programs\Python\Python35-32\python.exe
import sklearn.metrics as metrics

report = metrics.classification_report(true_classes, predicted_classes, target_names=class_labels)
print(report) 
