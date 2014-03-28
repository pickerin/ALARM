<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ALARM Setup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>  

    <!-- x-editable (bootstrap version) -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.6/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.4.6/bootstrap-editable/js/bootstrap-editable.min.js"></script>
    
    <!-- main.js -->
    <script src="/editable/main.js"></script>
  </head>
  <body>
    <div class="container">
        <h1>ALARM Setup</h1>

		<table id="sensors" class="table table-bordered table-condensed">
			<tr> 
   				<th>Sensor</th>
   				<th>Name</th>
   				<th>State</th>
   				<th>Switch Type</th>
			</tr>
			<tr>
				<td>5</td>
				<td><a href="#" data-pk="5" id="name">Sensor 5</a></td>
				<td>Open</td>
				<td><a href="#" data-pk="5" id="switchType">Alarm when Open</a></td>
			</tr>
		</table>


    <h2>Alarm Configuration</h2>
    <img src="yun.png">

<?php
define("APPLICATION_PATH",  dirname(__FILE__));

$db = new SQLite3(APPLICATION_PATH . "/alarm.db");
$results = $db->query("SELECT name FROM sqlite_master where type='table' AND na
me='alarm'"); 
$row = $results->fetchArray();
if ($row[0] != "alarm") {
   $db->exec('CREATE TABLE alarm (sensor INT, name STRING)');
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('1','Sensor 19')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('2','Sensor 18')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('3','Sensor 17')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('4','Sensor 16')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('5','Sensor 15')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('6','Sensor 14')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('7','Sensor 13')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('8','Sensor 12')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('9','Sensor 11')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('10','Sensor 10')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('11','Sensor 9')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('12','Sensor 8')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('13','Sensor 7')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('14','Sensor 6')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('15','Sensor 5')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('16','Sensor 4')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('17','Sensor 3')");
   $db->exec("INSERT INTO alarm (sensor,name) VALUES ('18','Sensor 2')");
}
$results = $db->query('SELECT * FROM alarm');

?>



    <h2>Current Sensor Configuration:</h2>

    <div class="ALARM_Table" style="width:400px;height:700px;">
    <table id="sensors" class="table table-bordered table-condensed">
    <tr> 
       <th>Pin</th>
       <th>Name</th>
    </tr>
    <?php
    $i=0;
    while ($row = $results->fetchArray()) {
       $i++;
       print "<tr>";
       print "<td>".$row[0]."</td>";
       print "<td><a href=\"#\" data-pk=\"".$i."\">".$row[1]."</a></td>";
       print "</tr>";
    }
    ?>
    </table>



	</div>
  </body>
</html>