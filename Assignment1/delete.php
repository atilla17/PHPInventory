<?php
    // File:delete.php
    // Author: Atilla Puskas
	// StudentID 038529137
	// Last modified date: june 22 2017
	// Honesty statement
	// I declare that my assignment is wholly my own work in accordance with Seneca Academic Policy. No part of this assignment has been copied manually or electronically from any other source (including web sites) except for the information supplied by the INT222 instructors and / or made available in this assignment for my use.
    //I also declare that no part of this assignment has been distributed to other students.
    //Name: Atilla Puskas
include "library.php";
$conn = openConnection();
$id = $_GET['id'];
$del = $_GET['deleted'];
if ($del == 'y')
{
	$del = 'n';
}
else
{
	$del = 'y';
}
$querry ="UPDATE inventory SET deleted='$del' where id='$id'";
$status = querryServer($conn, $querry);
if($status)
{
  header("Location: view.php");
}
else
{
	?>
	 <p>Update failed please</p> <a href="view.php">try again</a>
    <?php	 
	  
}/// <a>
?>


