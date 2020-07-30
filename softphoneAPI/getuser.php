<?php

include('connection.php');

$phone = $_GET['user_id'];

$sql="SELECT * from myapi where phone='$phone'";

//$result = $conn->query($sql);


if($conn->query($sql)==true)
{
    
    $sql = "SELECT * FROM myapi where phone='$phone'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
      
        $row = $result->fetch_assoc();
        //$object=json_encode($row,JSON_FORCE_OBJECT);
        
        //echo json_encode(['code'=>'200', 'status'=>'Success', 'message'=>"Record Found.",'data'=>[json_decode($object)]]);

        echo json_encode(['code'=>'200', 'status'=>'Success', 'message'=>"Record Found.",'data'=>$row]);
      
      
    }

    else
    {
        echo json_encode(['code'=>'201', 'status'=>'Success', 'message'=>"Record Not Found.",'data'=>null]);
    }
    
}

else 
  {
    echo json_encode(['code'=>'500','status'=>'failed','message'=>'Error Finding Record','data'=>[]]);
  }





?>