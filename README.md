# Raspberrytemperatur
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
