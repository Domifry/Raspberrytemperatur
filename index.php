<?php
// https://github.com/Domifry/


             function temperatur() {

             // Create connection
             $con=mysqli_connect("localhost","Datenbank","Passwort","Datenbank");

             // Check connection
             if (mysqli_connect_errno())
             {
             echo "Failed to connect to MySQL: " . mysqli_connect_error();
             }

             // This SQL statement selects ALL from the table 'Locations'
             $sql = "SELECT * FROM `Temperatur` ORDER BY `ID` DESC LIMIT 0 , 24";

             // Check if there are results
             $counter1 = 1;
             if ($result = mysqli_query($con, $sql))
             {

             // Loop through each row in the result set
             while($row = $result->fetch_array()) {
             // Add each row into our results array
             $temp = $row['Zeit'];
             $datum1 = substr($temp,0,11);
             $datum = substr($datum1,8,-1).".".substr($datum1,5,-4).".".substr($datum1,0,-7);
             $zeit = substr($temp,10);
             $temper = $row['Temperatur']." Grad";
             echo('    <tr>
                  <th scope="row">'.$counter1.'</th>
                  <td>'.$temper.'</td>
                  <td>'.$datum.'</td>
                  <td>'.$zeit.'</td>
                  </tr>');
                  $counter1++;
                  }
                  } return;
                  }

                  function tempavg() {
                  // Create connection
                  $con=mysqli_connect("localhost","Datenbank","Passwort","Datenbank");
                  // Check connection
                  if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                  $sql2 = "SELECT AVG(  `Temperatur` ) FROM  `Temperatur`";
                  $result = mysqli_query($con, $sql2);
                  $row2 = $result->fetch_array();
                  // Add each row into our results array
                  $wert2 = $row2[0];
                  mysqli_close($con);
                  $wert3 = substr($wert2,0,4);
                  return $wert3;
                  }
?>

<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="/main.css">

    <title>Raspberry Temperatur</title>
  </head>
    <body>
     <nav class=" navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#">Raspberry Temperatur</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      </div>
    </nav>
<main role="main" class="container">
<div>
<h1>Alle Temperaturen von Alarmanlage</h1>
<p class="lead">Hier findet sich eine Liste der Temperaturen. Der Durchschnitt ist <?PHP echo(tempavg()); ?> Grad. </p>
<table class="table table-hover">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Temperatur</th>
<th scope="col">Datum</th>
<th scope="col">Zeit</th>
</tr>
</thead>
<tbody>
<?php echo(temperatur());?>
</tbody>
</table>
</div>
<br><br>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
