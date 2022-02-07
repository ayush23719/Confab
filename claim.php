<?php
$room= $_POST['room'];
if(strlen($room)>20 or strlen($room)<2){
    $message="Please choose a name between 2 to 20 characters";
    echo'<script>';
    echo'alert(" '.$message. ' ");';
    echo'window.location="index.php";';
    echo'</script>';
}

else{
     $conn=mysqli_connect("localhost","root","","chatroom");

	if(!$conn)
	{
		echo "Error! ".mysqli_connect_error();
	}
	else
	{
		echo "";
	}
}
$sql = "SELECT * FROM rooms WHERE roomname='$room' ";
$result = mysqli_query($conn,$sql);
if($result){
    if(mysqli_num_rows($result)>0){
    $message="Please choose a different room name. This room name is already claimed";
    echo'<script>';
    echo'alert(" '.$message. ' ");';
    echo'window.location="index.php";';
    echo'</script>';
    }
    else{
        $sql = "insert into rooms(roomname,stime) values('$room', CURRENT_TIMESTAMP)";
	if(mysqli_query($conn,$sql))
	{
		$message="Your room is ready and you can chat now!";
    echo'<script>';
    echo'alert(" '.$message. ' ");';
    echo'window.location="rooms.php?roomname=' .$room. '";';
    echo'</script>';
	}
    }
}
    ?>