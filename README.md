# Raspberry Temperatur regelmässig messen und einsehen per SQL Tabelle
Temperaturüberwachung Raspberry PI 3

Dieses Script liest alle Stunde die aktuelle Temperatur des Raspberry PI aus und gibt diese auf einer Website auf. Mein Raspberry wurde immer wieder heiß. Unten findet sich auch eine Anleitung wie man einen Lüfter einbauen kann.  

# temperatur.py
Diese Datei liest alle 60 Minuten die Temperatur aus und speichert diese in eine SQL Datenbank. Du brauchst für diesen Schritt eine SQL Datenbank bei einem Provider wie <a href="https://all-inkl.com/PA3BB517416727D" target="_blank">all-inkl</a>
* Lege diese Datei in das home Verzeichnis
* Gib Daten für deine SQL Tabelle ein und lege eine Spalte Temperatur an
* Falls nötig: installiere die Pakete
* sudo apt install python3-pip
* pip install mysql-connector-python-rf
* sudo apt-get install python3-mysql.connector

# temperatur.service
Dieses Script stellt sich, dass sich alle 15 Minuten das Script startet.

* Lege die Datei in /etc/systemd/system
* sudo systemctl enable temperatur.service
* sudo systemctl start temperatur.service
* Teste ob es läuft: sudo systemctl status temperatur.service

# index.php
* Lege die Datei auf einem Webspace und gib die SQL Daten ein
* Das machst du an zwei Stellen jeweils bei mysqli_connect
<img src="https://agile-unternehmen.de/stuff/alarmtemperatur.png" width="600px">

# Lüfter einbauen
Ich mache recht viel am Raspberry und will, dass er kühl bleibt. Dazu musst du einen Lüfter einbauen. Ich habe einen <a href="https://www.amazon.de/Noctua-NF-A4x10-FLX-40mm-Lüfter/dp/B009NQLT0M/ref=sr_1_1?__mk_de_DE=ÅMÅŽÕÑ&keywords=noctua+4+cm&qid=1561589923&s=gateway&sr=8-1?tag=agileunter-21" target="_blank">Lüfter von Noctua</a>, der zwar etwas mehr kostet (12 Euro) aber flüsterleise ist. Du kannst auch für etwas weniger Geld (6 Euro) einen anderen <a href="https://www.amazon.de/GeeekPi-Raspberry-Brushless-Kühlkörper-retroflag/dp/B07FVR3TB8/ref=sr_1_4?__mk_de_DE=ÅMÅŽÕÑ&keywords=lüfter+raspberry&qid=1561590092&s=gateway&sr=8-4?tag=agileunter-21" target="_blank">Lüfter von GeeekPi</a> einbauen. Mache dazu ein paar Löcher in den Deckel und das Seitenteil (damit die Luft ausströmen kann) und befestige den Lüfter. Nimm 2 Jumper Kabel und verbinde die Kabel mit folgenden 2 Anschlüssen:

* Schwarzes Kabel (Ground): 7. Steckplatz Rechts
* Rotes Kabel (Strom 3,3V): 9. Steckplatz Links

Die Temperatur ist nun unter 40 Grad. Mein Tipp: Es reicht, wenn du den Lüfter nur mit 3,3V versorgst. Er ist dann auch leiser. 

<img src="https://agile-unternehmen.de/alarm-img/raspberry-pi-kuehlung-luefter.png" width="600px">
