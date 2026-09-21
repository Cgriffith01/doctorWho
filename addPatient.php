<?php
//partA
$servername = "localhost";
$username = "helper";
$password = "feelBetter";
$dbname = "doctorwho";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
// sql to create table
$sql = "CREATE TABLE addPatient (
PatientID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
FirstName VARCHAR(30) NOT NULL,
LastName VARCHAR(30) NOT NULL,
DateOfBirth DATE NOT NULL,
Addr VARCHAR(100) NOT NULL,
MaritalStatus VARCHAR(10) NOT NULL,
Gender VARCHAR(10) NOT NULL,
PhoneNumber VARCHAR(15) NOT NULL
)";
//let know if creating table worked or not
if (mysqli_query($conn, $sql)) {
echo "Table addPatient created successfully";
} else {
echo "Error creating table: " . mysqli_error($conn);
}
//close
mysqli_close($conn);
?>