<?php 
require './server.php';


if($_SERVER['REQUEST_METHOD'] == "GET"){

 $id = sanitize($_GET['id'],1);
 $errors = [];

if(!validate($id,6)){
  $errors['id'] = "InValid Id";
       
 }

 if(count($errors) == 1){
     $_SESSION['Message'] = $errors['id'];
 }else{
    $sql = "delete from list where id= $id";

    $op  = mysqli_query($con,$sql);

     if($op){
         $message = "Mission Deleted.";
     }else{
         $message = "Error Try Again.";
     }

     $_SESSION['Message'] = $message;
 }
  
 header("Location: index.php");

}

?>