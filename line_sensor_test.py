# This file is intended to test that the line sensors are working properly
# It uses the LineSensors module and the sleep function
import LineSensors
from time import sleep

# On a continuous loop, it prints on the console which sensor is detecting a line.
while True:
    sleep(0.5)
    if LineSensors.isRight():
        print("Only right one covered")
    elif LineSensors.isLeft():
        print("Only left one covered")
    elif LineSensors.isNotDetected():
        print("Is not detected")
    elif LineSensors.isAllDetected():
        print("All of them are detected")

    print(LineSensors.isAllDetected() or LineSensors.isRight() or LineSensors.isLeft())
