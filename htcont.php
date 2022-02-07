<?php 
$room = $_POST['room'];
$conn=mysqli_connect("localhost","root","","chatroom");

	if(!$conn)
	{
		echo "Error!".mysqli_connect_error();
	}
	else
	{
		echo "";
	}
$sql = "SELECT msg, stime, ip, user_name FROM msgs WHERE room='$room' ";
$res=" ";
$result =  mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $res = $res . '<div class="container"><b>';
        $res = $res . $row['user_name'];
        $res = $res . " says:</b> <p>".$row['msg'];
        $res = $res . '</p><span class="time-right">' . $row["stime"] . '</span><hr></div>';
        
    }
}
echo $res;
?>