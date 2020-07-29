<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "postman_api";

// Create connection
$conn = new mysqli($servername, $username, $password,$db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
echo "<br>";



$sql = "SELECT * FROM myapi";
$result = $conn->query($sql);
$id=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "ID" . $row['id'] . " Token: " . $row["token"]. " Phone: " . $row["phone"]. " Date" . $row["insert_date"]. "<br>";
    $id=$row['id'];
}
} else {
  echo "0 results";
}




if(mysqli_num_rows($result)==null)
{
    
$sql = "INSERT INTO myapi (token, phone)
VALUES ('abc123', '03029387238')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  echo "You are in insert function!";
}

else
    {
        echo "You are in update function!";


        $sql = "UPDATE myapi SET token='New Token' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
        echo "Error updating record: " . $conn->error;
}




}




?>