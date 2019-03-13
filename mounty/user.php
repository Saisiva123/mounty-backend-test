<?php
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

-->