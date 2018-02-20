<?php

include("db.php");
try{
	$sql = "select * from forestfire limit 10";
	$result = mysqli_query($db_conn, $sql);
	
	while($row = mysqli_fetch_array($result)) {
		echo "<li>" . "<br />County: " . $row["county"] . "<br />Season : " . $row["season"] . "<br />Classification : " . $row["class"] . "<br /> Observed :" .
		$row["date"] . "<br /> Latitude : " . $row["latitude"] . "<br /> Longitude : " . $row["longitude"] . 
		"<br /> Address:" . $row["location"] . "<br />Image: " . $row["imgURL"] ."</li>";
	}
}catch(Exception $e){
	echo $e -> getMessage();
}

?>