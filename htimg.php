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
$query = $conn->query("SELECT * FROM images ORDER BY uploaded_on DESC");
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>
<div class="container">
    <img src="<?php echo $imageURL; ?>" alt="" />
</div>
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>