from flask import Flask
from flask_restful import Api, Resource, reqparse

app = Flask(__name__)
api = Api(app)

import os
import json
import matplotlib.pyplot as plt
import matplotlib.image as mpimg
import logging
import tensorflow as tf
from keras import backend as K 

from collections import Counter

import pandas as pd
import numpy as np

from keras.models import load_model

from keras.preprocessing.image import array_to_img, img_to_array, load_img
from scipy.misc import imresize

from PIL import Image


users = [
    {
        "name": "Nicholas",
        "age": 42,
        "occupation": "Network Engineer",
       
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

    def post(self, name):
        K.clear_session()
        parser = reqparse.RequestParser()
        parser.add_argument("image")
        #get the image
        model = load_model('C:/Users/ASUS/Downloads/mse-04-0.0877.h5')
        img_height, img_width, channels = 350, 350, 3

        img = load_img('C:/xampp/htdocs/faceD/image/logo.png')

        img = imresize(img, size=(img_height, img_width))	  
        test_x = img_to_array(img).reshape(img_height, img_width, channels) 
        test_x = test_x / 255.
        test_x = test_x.reshape((1,) + test_x.shape)
        predicted = model.predict(test_x)

        return{
            "Beauty Rate": str(predicted[0][0])

    }, 201


    def put(self, name):
        parser = reqparse.RequestParser()
        parser.add_argument("age")
        parser.add_argument("occupation")
        args = parser.parse_args()

        for user in users:
            if(name == user["name"]):
                user["age"] = args["age"]
                user["occupation"] = args["occupation"]
                user["prediction"] = args["str(predicted[0][0])"]
                return user, 200
        
        user = {
            "name": name,
            "age": args["age"],
            "occupation": args["occupation"],
            "prediction": args["str(predicted[0][0])"]
        }
        users.append(user)
        return user, 201

    def delete(self, name):
        global users
        users = [user for user in users if user["name"] != name]
        return "{} is deleted.".format(name), 200
      
api.add_resource(User, "/user/<string:name>")

app.run(debug=True)