<?php

include("db.php");

try{
	$county = $_REQUEST['Counties'];
	
	$season = $_REQUEST['rbSeason'];
	$class = $_REQUEST['rbClass'];
	$date = $_REQUEST['OBServ'];
	$latitude = $_REQUEST['lat'];
	$longitude = $_REQUEST['lng'];
	$location = $_REQUEST['address'];
	$imgURL = null;
	
	if($species1 === "Others")
		$species1 = $species2;
	
	
	
	if (($_FILES["imgFile"]["type"] == "image/gif") || ($_FILES["imgFile"]["type"] == "image/jpeg")
			|| ($_FILES["imgFile"]["type"] == "image/jpg") || ($_FILES["imgFile"]["type"] == "image/pjpeg")
			|| ($_FILES["imgFile"]["type"] == "image/x-png") || ($_FILES["imgFile"]["type"] == "image/png")
			&& ($_FILES["imgFile"]["size"] < 1000000)){
				
		if ($_FILES["imgFile"]["error"] > 0){
			print("<p>File Upload Error: " . $_FILES["imgFile"]["error"] . "</p>");
		}
		else{
			$tmp_file = $_FILES["imgFile"]["tmp_name"];
					
			$target_file = basename($_FILES["imgFile"]["name"]);
			$upload_dir = "uploads/";
					
			if(file_exists($upload_dir . $_FILES["imgFile"]["name"])){
				print("<p>" . $_FILES["imgFile"]["name"] . " already exists.</p> ");
			}
			else{
				print("<p> Going to upload fallowing: " .$target_file . "</p>");
				if(move_uploaded_file($tmp_file, $upload_dir . $target_file)){
					$imgURL = $upload_dir ."/". $target_file;
					print("<p>File uploaded successfully! </p>");
				}
				else {
					print("<p>File Upload Error : " . $_FILES["imgFile"]["error"] . "</p>");
				}
			}
		}
	}
	else {
		print("<p>File Upload Error: Invalid File</p>");
	}
	
	
	
	
	$sql = "insert into forestfire (county, season, class, date, 
	latitude, longitude, location, imgURL) 
	values ('$county', '$season', '$class', '$date', 
	'$latitude', '$longitude', '$location', '$imgURL')";
	
	$result = mysqli_query($db_conn, $sql);
	
	if ($result == 1){
		echo "Successfully uploaded your information!";
	} else{
		echo "Failed to uploaded your information :(...";
	}
	
}catch(Exception $e){
	echo $e.getMessage();
}

?>