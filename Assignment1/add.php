<?php
		// File:Add.php
		// Author: Atilla Puskas
		// StudentID 038529137
		// Last modified date: june 22 2017
		// Honesty statement
		// I declare that my assignment is wholly my own work in accordance with Seneca Academic Policy. No part of this assignment has been copied manually or electronically from any other source (including web sites) except for the information supplied by the INT222 instructors and / or made available in this assignment for my use.
		//I also declare that no part of this assignment has been distributed to other students.
		//Name: Atilla Puskas
		include "library.php";
		 $dataValid = true;
		 $pNameRegEx = "/^ *[0-9a-zA-Z:;,\-\'][0-9a-zA-Z:;,\-\' ]* *$/";
		 $pNameErr = "";
		 $pDescRegEx = "/^ *[\n\r0-9a-zA-Z\.,\-\'][\n\r0-9a-zA-Z\.,\-\' ]* *$/";
		 $pDescErr = "";
		 $sCodeRegEx = "/^ *[A-Za-z0-9\-][A-Za-z0-9\- ]* *$/";
		 $sCodeErr = "";
		 $costRegEx = "/^ *[0-9][0-9]*\.[0-9]{2} *$/";
		 $costErr = "";
		 $sPriceErr = "";
		 $digRegEx = "/^ *[0-9][0-9]* *$/";
		 $onHandErr = "";
		 $reOrderErr = "";
			if($_GET)
		//Validate code here
			{
			if(!preg_match($pNameRegEx, $_GET['pName']))
			{
				$dataValid = false;
				$pNameErr = "Cannot be empty or contain [!@#$%^&*()]";
			}
			else
			{
				$pNameErr = "Valid";
			}
			if(!preg_match($pDescRegEx, $_GET['pDesc']))
			{
				$dataValid = false;
				$pDescErr = "Cannot be empty or contain [!@#$%^&*()]";
			}
			else
			{
				$pDescErr = "Vaild";
			}
			if(!preg_match($sCodeRegEx, $_GET['sCode']))
			{
				$dataValid = false;
				$sCodeErr = "Cannot be empty, letters spaces numbers and '-' only";
			}
			else
			{
				 $sCodeErr = "Vaild";
			}
			 if(!preg_match($costRegEx, $_GET['cost']))
			{
				$dataValid = false;
				$costErr = "Cannot be blank Must be a monatary value example 99.99";
			}
			else
			{
				 $costErr = "Vaild";
			}
			if(!preg_match($costRegEx, $_GET['sPrice']))
			{
				$dataValid = false;
				$sPriceErr = "Cannot be blank, Must be a monatary value example 99.99";
			}
			else
			{
				$sPriceErr = "Vaild";
			}
			if(!preg_match($digRegEx, $_GET['onHand']))
			{
				$dataValid = false;
				$onHandErr = "Cannot be blank, Numbers only";
			}
			else
			{
				$onHandErr = "Vaild";
			}
			if(!preg_match($digRegEx, $_GET['reOrder']))
			{
				$dataValid = false;
				$reOrderErr = "Cannot be blank, Numbers only";
			}
			else
			{
				$reOrderErr = "Vaild";
			}
		}
			if($_GET && $dataValid)
			//if data submitted and all submissions valid open db connection and write data
			{
			$conn = openConnection();
			$v2 = trim($_GET['pName']);
			$v3 = trim($_GET['pDesc']);
			$v4 = trim($_GET['sCode']);
			$v5 = trim($_GET['cost']);
			$v6 = trim($_GET['sPrice']);
			$v7 = trim($_GET['onHand']);
			$v8 = trim($_GET['reOrder']);
			$v9 = trim($_GET['bOrder']);
			$query = "Insert into inventory values (' ', '$v2', '$v3', '$v4', '$v5', '$v6','$v7','$v8','$v9','n')";		
			$status = querryServer($conn, $query);
			if($status)
			{
				header("Location: view.php");
			}
			else
			{
				echo "Insert into DB failed, please try again"
				?>
				<a href="add.php">try again</a>
				<?php
			}
		 }
         else
		 //Redisplay page with fields populated 
		 {		 
	     ?>
<html>
	<head>
		<title>Khrrlando Chicken Noodles</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>
	    <div id="wrapper">
         <?php
		 makeNavBar();
		 ?>
		 
		
		 
		<form method='get'>
		
	    <div class="field">
		<p class="Ilable">Product name: </p> 
		<input type="text" name="pName" value="<?php if($_GET && isset($_GET['pName'])){ echo $_GET['pName']; } ?>"/> <p> <?php echo $pNameErr ?> </p>
		</div>
		
		
		<div class="field">
		<p class="Ilable">Description: </p>
		<textarea name="pDesc" value=""><?php if($_GET && isset($_GET['pDesc'])){ echo $_GET['pDesc']; } ?> </textarea> <p> <?php echo $pDescErr ?> </p>
		</div>
		
		
		<div class="field">
		<p class="Ilable">Supplier code:  </p>
		<input type="text" name="sCode" value="<?php if($_GET && isset($_GET['sCode'])){ echo $_GET['sCode']; } ?>"/><p><?php echo $sCodeErr ?></p>
		</div>
		
		<div class="field">
		<p class="Ilable">Cost:  </p>
		<input type="text" name="cost" value="<?php if($_GET && isset($_GET['cost'])){ echo $_GET['cost']; } ?>"/><p><?php echo $costErr ?></p>
		</div>
		
		<div class="field">
		<p class="Ilable">Sale Price:  </p>
		<input type="text" name="sPrice" value="<?php if($_GET && isset($_GET['sPrice'])){ echo $_GET['sPrice']; } ?>"/><p><?php echo $sPriceErr ?></p>
		</div>
		
		
		<div class="field">
		<p class="Ilable">On hand qty: </p>
		<input type="text" name="onHand" value="<?php if($_GET && isset($_GET['onHand'])){ echo $_GET['onHand']; } ?>"/><p><?php echo $onHandErr ?></p>
	    </div>
		
		
		<div class="field">
		<p class="Ilable">Reorder Point: </p>
		<input type="text" name="reOrder" value="<?php if($_GET && isset($_GET['reOrder'])){ echo $_GET['reOrder']; } ?>"/><p><?php echo $reOrderErr ?></p>
		</div>
		
		
		<div class="field">
		<input type="hidden" name="bOrder" value="n"/>
		<p class="Ilable">OnBackOrder: </p> <input type="checkbox" name="bOrder" value="y" <?php if($_GET && $_GET['bOrder'] == 'y'){ echo "checked='checked'"; }  ?>/> 
		</div>
		
		
		<div class="field">
		<input type ="submit"/>
	    </div>
		</form>
		
		</div> <!-- Wrapper end -->
	    <?php
		 }
		 ?>
		 </body>
	<?php
	  makeFooter();
?>
</html>

