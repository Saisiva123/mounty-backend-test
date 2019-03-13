<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	form
	{
		position: relative;
		left:30%;
        background-color: rgb(86,220,98);
		width:500px;
		height:450px;
		padding:5px;
		border-radius: 10px;
	}
	input
	{
		margin-left: 10px;
	margin-bottom: 12px;
	border-radius: 4px;
	height:26px;
	margin-top: 5px;
	width: 90%;
	}
	textarea
	{
		position: absolute;
		right:10px;
		margin:10px;
	}
	label
	{
		margin-left: 10px;
	font-weight: bold;
	font-family: sans-serif;
	font-size: 20px;
	}
	</style>
</head>
<body>
<?php
$name=$text=$cp=$sp=$image='';
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$text=$_POST['text'];
	$cp=$_POST['cp'];
	$sp=$_POST['sp'];
	$image=$_FILES['photo']['name'];
	$target='images/'.basename($_FILES['photo']['name']);
	$x=mysqli_connect("localhost","root","Amma@Nanna1");
    
	mysqli_query($x,"INSERT INTO images (name,text,cost price,selling price,image) values ('$name','$text','$cp','$sp','$image')");

	if(move_uploaded_file($_FILES['photo']['tmp_name'], $target))
	{
		echo "image uploaded successfully";
	}
}
?>
<br><br>
<form action="index.php" method="post" enctype="multipart/form-data">
<label>Product name</label><input type="text" name="name"><br>
<textarea rows="4" cols="65" name="text" placeholder="description"></textarea><br><br><br><br><br>
<label>cost price:</label><input type="number" name="cp"><br>
<label>selling price:</label><input type="number" name="sp" ><br>
<label>Upload Image:</label><input type="file" name="photo"><br>
<input style="text-align: center;height:40px;" type="submit" name="submit">
</form> 
<!--<?php
$x=mysqli_connect("localhost","root","Amma@Nanna1");
$y="SELECT * from images";
$t=mysqli_query($x,$y);
while($i=mysqli_fetch_array($t))
{
	echo "<div>";
	echo "<img src='images/".$i['image']."'> ";
	echo "<p>".$i['text']."</p>";
	echo "</div>";

}
?>
-->
</body>
</html>