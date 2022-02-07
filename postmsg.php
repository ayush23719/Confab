<?php
 $conn=mysqli_connect("localhost","root","","chatroom");

	if(!$conn)
	{
		echo "Error!".mysqli_connect_error();
	}
	else
	{
		echo "";
	}
$uname = $_POST['username'];
$msg = $_POST['text'];
$room = $_POST['room'];
$ip = $_POST['ip'];
$sql= "INSERT INTO `msgs` (`msg`,`room`,`ip`,`stime`, `user_name`) VALUES('$msg', '$room', '$ip', CURRENT_TIMESTAMP, '$uname');";
mysqli_query($conn,$sql);
mysqli_close($conn);
?>