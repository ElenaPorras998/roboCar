# This file contains code that allows the RoboCar to follow a black line.
# It uses the Motors and LineSensors modules, as well as the sleep function
import Motors
import LineSensors
from time import sleep

# On a continuous loop...
while True:
    sleep(0.1)
    if LineSensors.isNotDetected():
        Motors.forward()
    if LineSensors.isRight():
        Motors.right()
    if LineSensors.isLeft():
        Motors.left()
    if LineSensors.isAllDetected():
        Motors.forward()
