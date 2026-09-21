<?php
//partA (section 3)
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
$sql = "CREATE TABLE Medications (
MedicationID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
PatientID INT(6) UNSIGNED NOT NULL,
MedicationName VARCHAR(50) NOT NULL,
Dosage DECIMAL(10,2) NOT NULL,
Quantity INT(100) NOT NULL,
DateDispensed DATE NOT NULL,
FOREIGN KEY (PatientID) REFERENCES addPatient (PatientID)
)";
//let know if creating table worked or not
if (mysqli_query($conn, $sql)) {
echo "Table Medications created successfully";
} else {
echo "Error creating table: " . mysqli_error($conn);
}
//close
mysqli_close($conn);
?>