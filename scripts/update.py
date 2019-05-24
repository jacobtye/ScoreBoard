#!/usr/bin/python
import os
import signal
import time

keepGoing = True

def keyboardInterruptHandler(signal, frame):
    print("\nKeyboardInterrupt (ID: {}) has been caught. Cleaning up...".format(signal))
    keepGoing = False
    exit(0)


signal.signal(signal.SIGINT, keyboardInterruptHandler)

def main():
    print("Updating ScoreBoard") 
    while(keepGoing):
        os.system('sudo rsync -r ../src ../scoreboard')
        time.sleep(0.1)


if __name__ == "__main__":
    main()
