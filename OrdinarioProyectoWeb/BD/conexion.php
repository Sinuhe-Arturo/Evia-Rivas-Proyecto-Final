
<?php 
$mysqli= new mysqli("127.0.0.1", "root", "", "abarrotes");

if(mysqli_connect_errno())
{
	echo "Problemas al conectarse con la BD";
}
$mysqli->set_charset("utf8");
?>



















