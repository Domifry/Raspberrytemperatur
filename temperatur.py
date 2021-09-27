
#!/usr/bin/env python3
import mysql.connector
import mysql
import os
import time

temp = None

while True:
  temp = os.popen('vcgencmd measure_temp').read()
  temp1 = temp[5:9]
  connection = mysql.connector.connect(host="IP", user="USER", passwd="Passwort", db="Datenbank")
  cursor = connection.cursor()
  statement = "INSERT INTO `d02e8f71`.`Temperatur` (`ID`, `Temperatur`, `Zeit`) VALUES (NULL, '" +temp1+"', CURRENT_TIMESTAMP);"
  cursor.execute(statement)
  cursor.close()
  time.sleep(3600)
