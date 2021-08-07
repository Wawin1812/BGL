# Bike Simulator

## Table of contents:

- [Description](./README.md#description)
- [Setup](./README.md#setup)
- [Run Simulator](./README.md#run-simulator)

## Description

- The application is a simulation of a bike moving on a lane, of dimensions 7 units x 7 units.

- There are no other obstructions on the lane.

- The bike is free to roam around the lane, but must be prevented from falling to destruction. Any movement that would result in the bike falling from the lane must be prevented, however further valid movement commands must still be allowed.

Create an application that can read in commands of the following form:

    PLACE X,Y,F
    FORWARD
    LEFT
    RIGHT
    GPS_REPORT

- `PLACE` will put the toy bike on the lane in position `X,Y` and facing `NORTH`, `SOUTH`, `EAST`, or `WEST`.

- The origin (0,0) can be considered to be the `SOUTH WEST` most corner.

- The first valid command to the bike is a `PLACE` command, after that, any sequence of commands may be issued, in any order, including another `PLACE` command. The application should discard all commands in the sequence until a valid `PLACE` command has been executed

- `FORWARD` will move the bike one unit forward in the direction it is currently facing.

- `LEFT` and `RIGHT` will rotate the bike 90 degrees in the specified direction without changing the position of the bike.

- `GPS_REPORT` will announce the `X,Y` and `F` of the bike. This can be in any form, but standard output is sufficient.

- A bike that is not on the lane can choose to ignore the `MOVE`, `LEFT`, `RIGHT` and `REPORT` commands.

### Constraints

- The bike must not move out off the lane during movement. This also includes the initial placement of the bike.

- Any move that would cause the bike to fall must be ignored.

### Example Input and Output:

#### Example A

    PLACE 0,0,NORTH
    FORWARD
    GPS_REPORT

Expected output:

    0,1,NORTH

#### Example B

    PLACE 0,0,NORTH
    TURN_LEFT
    GPS_REPORT

Expected output:

    0,0,WEST

#### Example C

    PLACE 1,2,EAST
    FORWARD
    FORWARD
    TURN_LEFT
    FORWARD
    GPS_REPORT

Expected output

    3,3,NORTH

### Deliverables

- There must be a way to supply the application with input data via CLI.

- The submission should be provided via GitHub, Bitbucket or some other online version control system

## Setup

1. Clone this repository:

   git clone https://github.com/Wawin1812/BGL.git

2. Change directory into the repository directory:

   cd BGL

### Run Simulator

The simulator can be given commands either via the CLI.

    php index.php

## Examples

    Enter your operation: PLACE 3,4,NORTH

    Enter your operation: gps_report
    (3, 4), NORTH
    Enter your operation: forward
    Enter your operation: gps_report
    (3, 5), NORTH
    Enter your operation: Turn_left
    Enter your operation: forward
    Enter your operation: turn_right
    Enter your operation: gps_report
    (2, 5), NORTH
    Enter your operation: place 0,0,west
    Enter your operation: exit
