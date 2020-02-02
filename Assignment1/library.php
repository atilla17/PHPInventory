<?php
    // File:Library.php
    // Author: Atilla Puskas
	// StudentID 038529137
	// Last modified date: june 22 2017
	// Honesty statement
	// I declare that my assignment is wholly my own work in accordance with Seneca Academic Policy. No part of this assignment has been copied manually or electronically from any other source (including web sites) except for the information supplied by the INT222 instructors and / or made available in this assignment for my use.
    //I also declare that no part of this assignment has been distributed to other students.
    //Name: Atilla Puskas

    function openConnection()
	{ //creates database connection and returns the link  
		$authFile = file('/home/int322_172a13/secret/topsecret.txt');
	    $conn = mysqli_connect(trim($authFile[0]),trim($authFile[1]),trim($authFile[2]),trim($authFile[3])) or die(mysqli_connect_error()); 
		return $conn;
	}	
?>
<?php 
    function querryServer($lnk, $qstr)
	{//Accepts a connection link and string containing sql
	 //querrys the server then closes the connection and
	 //returns the status of the querry 
		$qStatus = mysqli_query($lnk,$qstr) or die(mysqli_error($conn));
		mysqli_close($lnk);
		return $qStatus;
	}
?>
<?php
	function makeFooter()
	{//creates the footer and copyright notice for all pages
?>
	<footer>
	<p>Khrrlando Cpoywright 2017 &copy;</p>
	</footer>
<?php
    } ?>
<?php
	function makeNavBar()
	{ //creates top decorations and nav bar for all pages
?>
    
	<h2>Khrrlando Chicken Noodles</h2>
    <nav id="topNav">	
	 <header>
	    <img src="khrrNoodle.png" id="Headpic"/>
	  </header>
	  <div id="nav_wrapper">
			<ul>
				<li><a href="add.php">Add</a></li>
				<li><a href="view.php">View</a></li>
			</ul>
		</div>
	</nav>
<?php 
    }?>