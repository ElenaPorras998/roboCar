# This script is meant to test the DistanceSensor
# It uses the gpiozero library and the sleep function
from gpiozero import DistanceSensor
from time import sleep

# Connect to the sensor with ECHO on 15 and the trigger on 14
sensor = DistanceSensor(15, 14, max_distance=4)

while True:
    distance = sensor.distance * 100
    print(distance)
    sleep(0.5)

