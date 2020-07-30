<?php 

include('connection.php');

$phone=$_POST['user_id'];
$token=$_POST['token'];

//echo $phone . " " . $token;

$sql = "SELECT * FROM myapi where phone='$phone'";
$result = $conn->query($sql);
$id=0;


if ($result->num_rows > 0) 
{
  // output data of each row
  
  // while($row = $result->fetch_assoc()) 
  // {
      
    $sql = "UPDATE myapi SET token='$token' WHERE phone='$phone'";
    $conn->query($sql);
    
    

    if ($conn->query($sql) === TRUE) 
    {
      
      $sql = "SELECT * FROM myapi where phone='$phone'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) 
      {
        
        $row = $result->fetch_assoc();
        
        //$object=json_encode($row,JSON_FORCE_OBJECT);
        
        //echo json_encode(['code'=>'200', 'status'=>'Success', 'message'=>"Record Found.",'data'=>[json_decode($object)]]);

        
          echo json_encode(['code'=>'200', 'status'=>'Success', 'message'=>"Record Updated Successfully",'data'=>$row]);
        
        
      }
      
    } 
    else 
    {
      echo json_encode(['code'=>'500','status'=>'failed','message'=>'Error Updating Record','data'=>null]);
    }

  // }
  
} 
else 
{
  $sql = "INSERT INTO myapi (token, phone) VALUES ('$token', '$phone')";

  if ($conn->query($sql) === TRUE) 
  {
    
    $sql = "SELECT * FROM myapi where phone='$phone'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
      
      $row = $result->fetch_assoc();
      
      
        echo json_encode(['code'=>'200', 'status'=>'Success', 'message'=>"Record Inserted Successfully",'data'=>$row]);
      
      
    }
  } 
  else 
    {
      echo json_encode(['code'=>'500','status'=>'failed','message'=>'Error Updating Record','data'=>null]);
    }



}


//foreach($result as $index=>$record)
//{

  /*
    if($phone==$record['phone'])
      {
        $sql = "UPDATE myapi SET token='$token' WHERE phone='$phone'";
        $conn->query($sql);
        echo "Record Updated!";
      }

    else if($phone!=$record['phone'])
      {
        $sql = "INSERT INTO myapi (token, phone)
        VALUES ('$token', '$phone')";
        $conn->query($sql);

        echo "Record Inserted!";
      }

    */
//}


/*
    if(mysqli_num_rows($result)==null)
      {
    
        $sql = "INSERT INTO myapi (token, phone)
        VALUES ('abc123', '03029387238')";

        if ($conn->query($sql) === TRUE) 
        {
          echo "New record created successfully";
        } 
        else 
        {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        echo "You are in insert function!";
      }

    else
      {
          echo "You are in update function!";


          $sql = "UPDATE myapi SET token='New Token' WHERE id=$id";

            if ($conn->query($sql) === TRUE) 
            {
              echo "Record updated successfully";
            } 
            else 
            {
              echo "Error updating record: " . $conn->error;
            }
      }
*/



?>