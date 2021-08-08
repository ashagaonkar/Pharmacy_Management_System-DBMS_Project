<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="nav2.css">
<link rel="stylesheet" type="text/css" href="table1.css">
<title>
Reports
</title>
</head>

<body>

		<div class="sidenav">
			<h2 style="font-family:Arial; color:black; text-align:center;"> Pharmacy Management System </h2>
			<a href="pharmmainpage.php">Dashboard</a>
			
			<a href="pharm-inventory.php">View Inventory</a>
			<a href="pharm-pos1.php">Add New Sale</a>
			<button class="dropdown-btn">Customers
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="pharm-customer.php">Add New Customer</a>
				<a href="pharm-customer-view.php">View Customers</a>
			</div>
			<a href="pharm-employee.php">View Employee</a>
			<div>
			<button class="dropdown-btn">Reports
			<i class="down"></i>
			</button>
			<div class="dropdown-container">
				<a href="pharm-stockreport.php">Medicines - Low Stock</a>
				<a href="pharm-expiryreport.php">Medicines - Soon to Expire</a>			
			</div>	
			</div>
	</div>

	<div class="topnav">
		<a href="logout.php">Logout</a>
	</div>
	
	<center>
	<div class="head">
	<h2> MEDICINES LOW ON STOCK(LESS THAN 50)</h2>
	</div>
	</center>
	
	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Quantity Available</th>
			<th>Category</th>
			<th>Price</th>
		</tr>
		
	<?php
	
	include "config.php";
	$result=mysqli_query($conn,"CALL `STOCK`();");
	if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {

	echo "<tr>";
		echo "<td>" . $row["med_id"]. "</td>";
		echo "<td>" . $row["med_name"] . "</td>";
		echo "<td style='color:red;'>" . $row["med_qty"]. "</td>";
		echo "<td>" . $row["category"]. "</td>";
		echo "<td>" . $row["med_price"] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
	} 

	$conn->close();
	?>
	
</body>

<script>
	
		var dropdown = document.getElementsByClassName("dropdown-btn");
		var i;

			for (i = 0; i < dropdown.length; i++) {
			  dropdown[i].addEventListener("click", function() {
			  this.classList.toggle("active");
			  var dropdownContent = this.nextElementSibling;
			  if (dropdownContent.style.display === "block") {
			  dropdownContent.style.display = "none";
			  } else {
			  dropdownContent.style.display = "block";
			  }
			  });
			}
			
</script>

</html>