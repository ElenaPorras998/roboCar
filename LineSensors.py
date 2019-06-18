# Module that receives and process input from the line sensors
# The module contains functions that allow to determine which sensor is sensing a line
# It uses the gipiozero library and the sleep function from the time library
from gpiozero import LineSensor
from time import sleep

# The left and right sensors are connected to GPIO5 and GPIO13 respectively.
# The queue_len is set to 1 to get faster, more accurate results.
sensorL = LineSensor(5, queue_len=1)
sensorR = LineSensor(13, queue_len=1)

# Checks that right sensor detects something and left one not
# Returns boolean
def isRight():
    if sensorL.value == 0 and sensorR.value == 1:
        return True
    else:
        return False

# Checks that left sensor detects something and right not
# Returns boolean
def isLeft():
    if sensorL.value == 1 and sensorR.value == 0:
        return True
    else:
        return False

# Checks that no sensor detects a line
# Returns boolean
def isNotDetected():
    if sensorL.value == 0 and sensorR.value == 0:
        return True
    else:
        return False

# Checks that no sensor detects a line
# Returns boolean
def isAllDetected():
    if sensorL.value == 1 and sensorR.value ==1:
       return True
    else:
       return False

# Check if at least one detects a line
# Returns boolean
def isSomeDetected():
    if sensorL.value == 1 or sensorR.value == 1:
        return True
    else:
        return False
