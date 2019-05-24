# ScoreBoard
This is a scoreboard developed for a sawyer robot in a research lab. Another program will update files Speech.txt, rounds.txt, and totals.txt and the scoreboard will then read from them and update in the browser. The update.py syncs the folder with user access to the website folder with sudo acess.

How to setup code:

$ sudo bash dependencies.sh

$ sudo bash setup.sh



How to run code:

AutoUpdate (Folder: scripts):

$ sudo python update.py 

  - Note: it will ask for your sudo password to update the website
  
In browser go to http://scoreboard.local/src/4a-score.php
