import sys

import numpy as np
import matplotlib.pyplot as plt
import matplotlib.gridspec as gridspec
from tensorflow.keras.preprocessing.image import img_to_array, load_img
from tensorflow.keras.models import load_model

from PIL import Image, ImageOps

dest_base = './model/'+sys.argv[2]

model = load_model(dest_base+'/model.h5')

if "mobilenetv2" in model.name:
    from tensorflow.keras.applications.mobilenet_v2 import MobileNetV2, preprocess_input
elif "efficientnetb3" in model.name: 
    from tensorflow.keras.applications.efficientnet import EfficientNetB3, preprocess_input
elif "inception_v3" in model.name:
    from tensorflow.keras.applications.inception_v3 import InceptionV3, preprocess_input
elif "densenet" in model.name:
    from tensorflow.keras.applications.densenet import DenseNet201, preprocess_input
elif "resnet50v2" in model.name:
    from tensorflow.keras.applications.resnet_v2 import ResNet50V2, preprocess_input
elif "vgg16" in model.name:
    from tensorflow.keras.applications.vgg16 import VGG16, preprocess_input
elif "xception" in model.name:
    from tensorflow.keras.applications.xception import Xception, preprocess_input

testsite_array = []
with open(dest_base+'/label.txt') as my_file:
    metadata = dict(line.split(" ", 1) for line in my_file)

def predict(model, img):
    normalized_image_array = img_to_array(img)
    normalized_image_array = np.expand_dims(normalized_image_array, axis=0)
    normalized_image_array = preprocess_input(normalized_image_array)
    preds = model.predict(normalized_image_array)
    return preds[0]


def plot_preds(img, preds):
    L1=list()
    for category in metadata.values():
        L1.append(category)
    labels=tuple(L1)
    
    gs = gridspec.GridSpec(2, 1, height_ratios=[4, 1])
    plt.figure(figsize=(8,8))
    fig =  plt.subplot(gs[0])
    plt.imshow(np.asarray(img))
    plt.subplot(gs[1])
    plt.barh(np.arange(len(metadata)), preds, alpha=0.5)
    plt.yticks(np.arange(len(metadata)), labels)
    plt.xlabel('Probability')
    plt.xlim(0, 1)
    plt.tight_layout()
    rect = fig.patch
    rect.set_facecolor("white")
    plt.savefig(dest_base+'/result.png', facecolor=fig.get_facecolor())

from PIL import Image
import os
def image_process(img_path):
    img = Image.open(img_path)
    if img.mode == "P":#greyscale image with transparent background
        img = Image.open(img_path).convert("RGBA")  
        image = Image.new("RGB", img.size, "WHITE")
        image.paste(img, (0, 0), img) 
        return image
    elif img.mode == "RGBA":#color image with transparent background
        image = Image.new("RGB", img.size, "WHITE")
        image.paste(img, (0, 0), img) 
        return image
    elif img.mode == "RGB":#color image 
        return img
    else: return ImageOps.colorize(ImageOps.grayscale(Image.open(img_path)), black ="black", white ="white")#greyscale image

import urllib.request
image = ImageOps.fit(image_process(sys.argv[1]).resize((224, 224)), (224, 224), Image.ANTIALIAS)

pred = predict(model, image)

for item in metadata.items():
    print(item[1]+':'+str(pred[int(item[0])]))

plot_preds(np.asarray(image), pred)