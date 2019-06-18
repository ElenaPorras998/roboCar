# File that makes the RoboCar push boxes out of an arena
# It uses the Motors and LineSensors modules, as well as the sleep function
import Motors
import LineSensors
from gpiozero import DistanceSensor
from time import sleep

# The max_distance is set to 4 so it reads further than 1 m.
# The trigger is connected to GPIO14 and the echo to GPIO15
sensor = DistanceSensor(15, 14, max_distance=4, queue_len=5)

turn_counter = 0 # counter to calculate how much the car has turned
radius = 50 # radius in cm around the car for detection

# On a continuous loop...
while True:
    sleep(0.1)
    distance = sensor.distance * 100 #turn the distace to cm.
    if turn_counter == 5:
        radius + 10 #increase the radius 10 cm.
        turn_counter = 0 # reset the turn counter to 0
    if distance > radius:
        turn_counter = turn_counter + 1
        Motors.right()
    elif distance < radius:
        Motors.forward()
        # If any of the sensors detects a line...
        if LineSensors.isSomeDetected():
            Motors.stop()
            Motors.reverse()
            sleep(1.5)
            Motors.right()
            sleep(0.3)
            Motors.stop()

