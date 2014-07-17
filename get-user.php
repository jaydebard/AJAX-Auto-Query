<!--
This file assumes you have a database connection already configured.

Import the employees.sql file to your database to setup the table structure for the query.
-->

<?php
include('db-info.php');

// Get user data from form
$q = $_GET['q'];

// Query employees table to find specified record
if($stmt = $mysqli->prepare("SELECT FirstName, LastName, Email, PhoneNumber, ManagerID, DepartmentID FROM employees WHERE EmployeeID = ?")) {
	
	// Bind variable to the parameter
	$stmt->bind_param('i', $q);	
		
	$ms = microtime(true);
	
	// Execute the statement
	$stmt->execute();
	
	$ms = microtime(true) - $ms;
		
	// Bind variables from query result
	$stmt->bind_result($firstname, $lastname, $email, $phonenumber, $managerid, $departmentid);
	
	// Display results of query
	$stmt->fetch();
	
	// Close the statement
	$stmt->close();
}
// Close the connection
$mysqli->close();

// Output results
echo "<table border='0' cellpadding='5' cellspacing='15'>
<tr align='left'>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Phone Number</th>
<th>Manager ID</th>
<th>Department ID</th>
</tr>";

echo "<tr>";
echo "<td>$firstname</td>";
echo "<td>$lastname</td>";
echo "<td>$email</td>";
echo "<td>$phonenumber</td>";
echo "<td>$managerid</td>";
echo "<td>$departmentid</td>";
echo "</tr>";
echo "</table>";

echo "<span class='execution-time'>" . round($ms, 5).' s</span>'; //seconds
?>