<?php
	define("APPLICATION_PATH",  dirname(__FILE__));
	try {
  		# SQLite Database
  		$DBH = new PDO("sqlite:" . APPLICATION_PATH . "/alarm.db");
  		$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch(PDOException $e) {
    	echo $e->getMessage();
	}

	// Prepare update statement
	try {
		$STH = $DBH->prepare("UPDATE alarm SET switchType=? where sensor=?");
	}
	catch(PDOException $e) {
    	echo $e->getMessage();
	}
	// Bind parameters to variables
	$STH->bindParam(1, $value);
	$STH->bindParam(2, $pk);
    /*
    You will get 'pk', 'name' and 'value' in $_POST array.
    $pk is the row to update (sensor number)
    $name is the name of the column to update (always 'name' here)
    $value is the value for the sensor name
    */
    $pk = $_POST['pk'];
    $name = $_POST['name'];
    $value = $_POST['value'];
    
    if ($value == "Alarm when Closed") {
    	$value = "1";
    } else {
    	$value = "0";
    }

    //delay (for debug only)
    sleep(1); 

    /*
     Check submitted value
    */
    if(!empty($value)) {
	    // Run the prepared statement from above
		$STH->execute();
    } else {
        header('HTTP 400 Bad Request', true, 400);
        echo "This field is required!";
    }
	// Close database
	$DBH = null;
?>