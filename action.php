<?php
require './server.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $title        = CleanInputs($_POST['title']);
    $description  = CleanInputs($_POST['description']);
    $startdate    = CleanInputs($_POST['startdate']);
    $enddate      = CleanInputs($_POST['enddate']);
   
    $errors = [];

    if(!validate($title,1)){
     $errors['title'] = "Field Required.";
    }elseif(!validate($title,2)){
        $errors['title'] = "Invalid String.";  
    }

    if(!validate($description,1)){
        $errors['description'] = "Field Required.";
       }elseif(!validate($description,2)){
           $errors['description'] = "Invalid String.";  
       }

       if(!validate($startdate,1)){
        $errors['startdate'] = "Field Required.";
       }
   
       if(!validate($enddate,1)){
           $errors['enddate'] = "Field Required.";
        }


    if(count($errors) > 0){

        foreach($errors as $key => $value)
        {
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{
     

     $sql = "INSERT INTO `list`(`title`, `description`, `startdate`, `enddate`) VALUES ('$title','$description','$startdate','$enddate')";

     $op = mysqli_query($con,$sql);

     if($op){
         header("location: index.php");
     }else{
         echo 'Error in list';
       }
    }

}

?>