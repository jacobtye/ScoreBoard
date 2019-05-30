#!/usr/bin/python
import os
import signal
import time
import portalocker

keepGoing = True

def keyboardInterruptHandler(signal, frame):
    print("\nKeyboardInterrupt (ID: {}) has been caught. Cleaning up...".format(signal))
    keepGoing = False
    exit(0)

def readTable(fnombre):
    #fp = open("../SimulatedWorld/Table.txt","r")
    fp = open(fnombre, "r")
    portalocker.lock(fp, portalocker.LOCK_EX)

    lines = []
    for i in range(12):
        lines.append(fp.readline())

    fp.close()

    Table = [lines[1], lines[2], lines[3]]

    return lines, Table


def readFileLines(fnombre, numLines):
    fp = open(fnombre, "r")
    portalocker.lock(fp, portalocker.LOCK_EX)

    lines = []
    for i in range(numLines):
        lines.append(fp.readline())
        lines.append('\n')
    fp.close()

    return lines


def writeFile(name , lines):
    path = "../src/files/" + str(name) + "_blocks.txt"
    fp = open(path, "w")
    portalocker.lock(fp, portalocker.LOCK_EX)

    fp.writelines(lines)
    fp.close()

signal.signal(signal.SIGINT, keyboardInterruptHandler)

def main():
    print("Updating ScoreBoard") 
    while(keepGoing):
        lines, Table = readTable("../../SimulatedWorld/Table.txt")
        human = lines[6].split(" ")
        sawyer = lines[9].split(" ")
        human_blocks = []
        human_blocks.append("Human\n")
        for b in human:
                human_blocks.append(b)
                human_blocks.append('\n')
        sawyer_blocks = []
        sawyer_blocks.append("Sawyer\n")
        for b in sawyer:
                sawyer_blocks.append(b)
                sawyer_blocks.append('\n')
        writeFile('sawyer', sawyer_blocks)
        writeFile('human', human_blocks)
        os.system('sudo rsync -r ../src ../scoreboard')
        time.sleep(0.1)


if __name__ == "__main__":
    main()
