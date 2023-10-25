<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$date = $_POST['date'];
	$event = $_POST['event'];

	//database connection
	$conn = new mysqli('localhost','root','','book');
	if($conn->connect_error){
		die('Connection Failed :'.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into booking(name,email,number,date,event)
			values(?,?,?,?,?)");
		$stmt->bind_param('ssids', $name,$email,$number,$date,$event);
		$stmt->execute();
		echo "booking successfully...";
		$stmt->close();
		$conn->close();
	}
?>



