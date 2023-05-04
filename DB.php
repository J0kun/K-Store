<?php
$host ='localhost';
$username='root';
$password='';
$db='K-Store';
$connect=mysqli_connect($host,$username,$password,$db);
if(!$connect)
{
    die('could not connect:'.mysql_error());
}

?>



