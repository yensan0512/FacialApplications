from flask import Flask
from flask_restful import Api, Resource, reqparse

app = Flask(__name__)
api = Api(app)

import os

import matplotlib.pyplot as plt
import matplotlib.image as mpimg
import logging
import cv2
import tensorflow as tf

from collections import Counter
from keras.preprocessing import image
from keras.preprocessing.image import array_to_img, img_to_array, load_img

import pandas as pd
import numpy as np




users = [
    {
        "name": "Nicholas",
        "age": 42,
        "occupation": "Network Engineer"
    },
    {
        "name": "Elvin",
        "age": 32,
        "occupation": "Doctor"
    },
    {
        "name": "Jass",
        "age": 22,
        "occupation": "Web Developer"
    }
]

class User(Resource):
    def get(self, name):
        for user in users:
            if(name == user["name"]):
                return user, 200
        return "User not found", 404

    def post(self):

        global x,y,w,h
       # Load the model mean value
        model_mean_values = (78.4263377603, 87.7689143744, 114.895847746)

        # Age Groups
        age_list = ['(0, 2)', '(4, 6)', '(8, 12)', '(15, 20)', '(25, 32)', '(38, 43)', '(48, 53)', '(60, 100)']
        wrinkle_list =['Wrinkle is absent','Wrinkle is absent','Wrinkle is absent','Wrinkle is absent','Mild wrinkle is detected','Moderate wrinkle is detected','Severe wrinkle is detected','Extreme wrinkle is detected']

        # Gender Groups
        gender_list = ['Male', 'Female']

        # Load the models
        print(1)
        age_net = cv2.dnn.readNetFromCaffe('C:/Users/ASUS/Downloads/ageGenderML-master/models/caffe/deploy_age.prototxt', 'C:/Users/ASUS/Downloads/ageGenderML-master/models/caffe/age_net.caffemodel')
  
        gender_net = cv2.dnn.readNetFromCaffe('C:/Users/ASUS/Downloads/ageGenderML-master/models/caffe/deploy_gender.prototxt', 'C:/Users/ASUS/Downloads/ageGenderML-master/models/caffe/gender_net.caffemodel')
   
        img=load_img('C:/xampp/htdocs/faceD/image/logo.png')
        #print(2)
        # # Display Image
        img = image.img_to_array(img)
        plt.imshow(img, cmap = 'gray', interpolation = 'bicubic')
        plt.xticks([]), plt.yticks([])  # to hide tick values on X and Y axis
        #plt.imshow(img(im.data))
        # plt.show()  

        # Load Haar Cascade Classifier
        face_cascade = cv2.CascadeClassifier('C:/Users/ASUS/Downloads/ageGenderML-master/ageGenderColab/haarcascade_frontalface_alt.xml')
        #// THIS IS THE PROBLEM 
        imgUMat = np.float32(img)
        gray =cv2.cvtColor(imgUMat, cv2.COLOR_RGB2GRAY)
        #print(3)
        gray = np.array(gray, dtype='uint8')
        faces = face_cascade.detectMultiScale(gray,
            scaleFactor=1.1,
            minNeighbors=5,
            minSize=(30, 30),
            flags = cv2.CASCADE_SCALE_IMAGE)

        # Find Face in Source
        for (x,y,w,h) in faces:
            print(x,y,w,h)
            cv2.rectangle(img,(x,y),(x+w,y+h),(255,255,0),2)

        print(faces)
        plt.imshow(img, cmap = 'gray', interpolation = 'bicubic')
        plt.xticks([]), plt.yticks([])
        #plt.show()

        # Crop image
     
        face_crop = img[y:y+h, x:x+w].copy()
        #plt.imshow(face_crop)
        plt.axis('off')

        blob = cv2.dnn.blobFromImage(face_crop, 1, (227, 227), model_mean_values, swapRB=False)

        # # Predict Gender
       
        gender_net.setInput(blob)
        gender_preds = gender_net.forward()
        gender = gender_list[gender_preds[0].argmax()]
        print("Gender : " + gender + "\n")

        # Predict Age
        age_net.setInput(blob)
        age_preds = age_net.forward()
        age = age_list[age_preds[0].argmax()]
        print("Age Range: " + age + "\n")

        # Predict Wrinkle
        age_net.setInput(blob)
        age_preds = age_net.forward()
        wrinkle = wrinkle_list[age_preds[0].argmax()]
        print("Wrinkle Condition: " + wrinkle  +"\n")
         
        return {
            "gender": str(gender[:6]),
            
            "wrinkle": str(wrinkle[:100]),
            
            "age" : str(age[:10])
        }, 201
    # def prepare(filepath):
    #     IMG_SIZE = 50  # 50 in txt-based
    #     img_array = cv2.imread(filepath, cv2.IMREAD_GRAYSCALE)
    #     new_array = cv2.resize(img_array, (IMG_SIZE, IMG_SIZE))
    #     return new_array.reshape(-1, IMG_SIZE, IMG_SIZE, 1)


    def put(self, name):
        parser = reqparse.RequestParser()
        parser.add_argument("age")
        parser.add_argument("occupation")
        args = parser.parse_args()

        for user in users:
            if(name == user["name"]):
                user["age"] = args["age"]
                user["occupation"] = args["occupation"]
                return user, 200
        
        user = {
            "name": name,
            "age": args["age"],
            "occupation": args["occupation"]
        }
        users.append(user)
        return user, 201

    def delete(self, name):
        global users
        users = [user for user in users if user["name"] != name]
        return "{} is deleted.".format(name), 200
      
api.add_resource(User, "/check/")

app.run(debug=True)