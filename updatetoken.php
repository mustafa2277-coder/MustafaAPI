<?php 

include('connection.php');

//$data = json_decode(file_get_contents('php://input'), true);

$phone='';
$token='';
if(isset($_POST['user_id']) && isset($_POST['token']))
{
  
  $phone=$_POST['user_id'];
  $token=$_POST['token'];
}



//echo $data['user_id'] . " " . $data['token'];

//$phone=$data['user_id'];
//$token=$data['token'];

//echo $phone . " " . $token;



if($phone!='' && $token!='')
{

  $sql = "SELECT * FROM myapi where phone='$phone'";
  $result = $conn->query($sql);
  

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

}

else
{
  echo json_encode(['code'=>'500','status'=>'failed','message'=>'Please insert required field.','data'=>null]);
}



?>