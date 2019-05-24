#!/bin/bash
sudo bash virtualhost.sh delete scoreboard.local scoreboard
sudo bash virtualhost.sh create scoreboard.local scoreboard
sudo rm -rf scoreboard
ln -s /var/www/scoreboard /$PWD/scoreboard
sudo rsync -r /$PWD/src /$PWD/scoreboard
