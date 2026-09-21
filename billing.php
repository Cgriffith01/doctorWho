<?php
//partA (section 2)
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
$sql = "CREATE TABLE Billing (
BillingID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
PatientID INT(6) UNSIGNED NOT NULL,
AmountBilled DECIMAL(10,2) NOT NULL,
AmountPaid DECIMAL(10,2) NOT NULL,
DatePaid DATE NOT NULL,
InsuranceProvider VARCHAR(100) NOT NULL,
FOREIGN KEY (PatientID) REFERENCES addPatient (PatientID)
)";
//let know if creating table worked or not
if (mysqli_query($conn, $sql)) {
echo "Table Billing created successfully";
} else {
echo "Error creating table: " . mysqli_error($conn);
}
//close
mysqli_close($conn);
?>