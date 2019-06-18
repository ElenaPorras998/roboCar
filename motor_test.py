# This file is designed to test out the RoboCar's motors
# It uses the Motors module and the sleep function
import Motors
from time import sleep

# On a continuous loop the car will:
# Move forward 1 second
# Move left 1 second
# Move right 1 second
# Move reverse 1 second
# Motor stop for 5 seconds
while True:
    Motors.forward()
    sleep(1)
    Motors.left()
    sleep(1)
    Motors.right()
    sleep(1)
    Motors.reverse()
    sleep(1)
    Motors.stop()
    sleep(5)
