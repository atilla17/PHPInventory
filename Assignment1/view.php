<?php
    // File:view.php
    // Author: Atilla Puskas
	// StudentID 038529137
	// Last modified date: june 22 2017
	// Honesty statement
	// I declare that my assignment is wholly my own work in accordance with Seneca Academic Policy. No part of this assignment has been copied manually or electronically from any other source (including web sites) except for the information supplied by the INT222 instructors and / or made available in this assignment for my use.
    //I also declare that no part of this assignment has been distributed to other students.
    //Name: Atilla Puskas
?>

<html>
<head>
<title>Khrrlando Chicken Noodles</title>
<link rel="stylesheet" href="styles.css">
</head>
    <div id="wrapper">
<?php                              
	 include "library.php";
		makeNavBar();
?>
<body>
<?php
	$conn = openConnection();
	$result = querryServer($conn, "select * from inventory");
	
?>
    
	<table border="1" id="Vtable">
    <tr><th>id</th>
	<th>Product</th>
	<th>Description</th>
	<th>Supplier Code</th>
	<th>Cost</th><th>Price</th>
	<th>On Hand</th>
	<th>Reorder Point</th>
	<th>On Back Order</th>
	<th>Delete/Restore</th></tr>
	<?php 
		While($r = mysqli_fetch_assoc($result))
		{
	?>	
	     <tr>
		 <td><?= $r['id'] ?></td>
		 <td><?= $r['itemName'] ?></td>
		 <td><?= $r['description'] ?></td>
		 <td><?= $r['supplierCode'] ?></td>
		 <td><?= $r['cost'] ?></td><td><?= $r['price'] ?></td><td><?= $r['onHand'] ?></td>
		 <td><?= $r['reorderPoint'] ?></td>
		 <td><?= $r['backOrder'] ?></td>
		<td><a href="delete.php?id=<?php echo $r['id'] . "&deleted=" . $r['deleted']; ?>"><?php if($r['deleted'] == 'y'){echo "Restore";} else {echo "Delete";}?></a></td></tr>
         
		
	<?php   
		}
	 ?>
	 </table>
	 </div>
</body>
    <?php
	 makeFooter();
     ?>
</html>