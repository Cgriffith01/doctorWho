<?php
//partB
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
//inserting 5 patients into table
$sql = "INSERT INTO addPatient (FirstName, LastName, DateOfBirth, Addr, MaritalStatus, Gender, PhoneNumber)
VALUES ('John', 'Doe', '1980-01-01', '123 Main St', 'Single', 'Male', '4359875644');";
$sql .= "INSERT INTO addPatient (FirstName, LastName, DateOfBirth, Addr, MaritalStatus, Gender, PhoneNumber)
VALUES ('Jane', 'Doe', '1970-03-12', '456 Main St', 'Single', 'Female', '5438765523');";
$sql .= "INSERT INTO addPatient (FirstName, LastName, DateOfBirth, Addr, MaritalStatus, Gender, PhoneNumber)
VALUES ('Mary', 'Smith', '2000-05-12', '422 State Lane', 'Married', 'Female', '9856487531');";
$sql .= "INSERT INTO addPatient (FirstName, LastName, DateOfBirth, Addr, MaritalStatus, Gender, PhoneNumber)
VALUES ('George', 'Washington', '1842-12-08', '333 Unsure Drive', 'Divorced', 'Male', '8975482121');";
$sql .= "INSERT INTO addPatient (FirstName, LastName, DateOfBirth, Addr, MaritalStatus, Gender, PhoneNumber)
VALUES ('Myra', 'Mains', '1800-04-23', '987 Still Here Plaza', 'Single', 'Female', '9876543211');";
//handling multiple queries at once--verifying if saved
if (mysqli_multi_query($conn, $sql)) {
  echo "New records created successfully";
  } else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  //closing
  mysqli_close($conn);
  ?>
  
