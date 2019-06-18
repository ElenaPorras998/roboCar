# Module that controls the servos of the RoboCar
# It uses the gpiozero library and the sleep function
from gpiozero import Servo
from time import sleep

# The right and left servos are connected to the GPIO6 and GPIO16 respectively
servoR = Servo(6, initial_value = -0.1)
servoL = Servo(16, initial_value = -0.1)

def forward():
    servoR.value = -0.48
    servoL.value = 0.2

def stop():
    servoR.value = -0.1
    servoL.value = -0.1

def left():
    servoR.value = -0.5
    servoL.value = -0.08

def right():
    servoR.value = -0.2
    servoL.value = 0.1

def reverse():
    servoR.value = 0.2
    servoL.value = -0.48
