#!C:\Users\User\AppData\Local\Programs\Python\Python35-32\python.exe

from sklearn.preprocessing import LabelBinarizer
import sklearn.metrics as metrics

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
    plt.savefig(dir_path+'/roc.png', facecolor=fig.get_facecolor())
    return metrics.roc_auc_score(true_classes, predicted_classes, average=average)

# calling
#validation_generator.reset() # resetting generator
#y_pred = model.predict(validation_generator, verbose = True)
#y_pred = np.argmax(y_pred, axis=1)
#multiclass_roc_auc_score(validation_generator.classes, y_pred)
score = multiclass_roc_auc_score(validation_generator.classes, predicted_classes, 'macro')
score
