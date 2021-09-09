<?php

function clean($input){
  
  $input = trim($input);
  $input = stripcslashes($input);
  $input = htmlspecialchars($input);


   return $input;
}



if($_SERVER['REQUEST_METHOD'] == "POST"){

 $name     = clean($_POST['name']);
 $email    = clean($_POST['email']);
 $password = $_POST['password'];
 $address = $_POST['address'];
 $gender    = clean($_POST['gender']);
 $linkedln    = clean($_POST['linkedln']);
 

 $errorMessages = [];

 if(empty($name)){

     $errorMessages['Name'] = "Field Required";
 }


 if(empty($email)){

     $errorMessages['Email'] = "Field Required";
 }


 if(strlen($password) < 6){

     $errorMessages['Password'] = "Length Must be > 5 ch";
 }
 if(empty($linkedln)){

  $errorMessages['linkedln'] = "Field Required";
 }
 if(empty($gender)){

  $errorMessages['gender'] = "Field Required";
 }
 if(strlen($address)!=10){

  $errorMessages['address'] = "Length Must be = 10 ch";
 }

 if(count($errorMessages) > 0){

    foreach($errorMessages as $key => $value){

        echo '* '.$key.' : '.$value.'<br>';
    }
 }

 else{
 
      echo 'Valid Data';

 }
}

if($_SERVER['REQUEST_METHOD']  == "POST"){
  if(!empty($_FILES['image']['name'])){

   $tmp_path = $_FILES['image']['tmp_name'];
   $name     = $_FILES['image']['name'];
   $size     = $_FILES['image']['size'];
   $type     = $_FILES['image']['type'];

   $allowedExt = ['png','jpg','jpeg'];

   $extArray = explode('/',$type);

   if(in_array($extArray[1],$allowedExt)){
      $finalName =   rand().time().'.'.$extArray[1];


     $desPath = './uploads/'.$finalName;
      
      if(move_uploaded_file($tmp_path,$desPath)){

       echo 'File Uploaded';
      }else{
          echo 'Error In Uploading Try Again';
      }

        
   }else{
       echo 'Not Allowed Extension';
   }


  }else{
      echo 'File Required';
  }
}

function validate($input,$flag){
  $status = true;
  
   switch ($flag) {
       case 1:
           if(empty($input)){
             $status = false;
           }
           break;
  
      case 2: 
          if(!preg_match('/^[a-zA-Z\s]*$/',$input)){
              $status = false;
          }
         break;
  
      case 3:
          if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
              $status = false;
          } 
          break; 
      case 4: 
          $allowedExt = ['pdf'];
  
          $extArray = explode('/',$input);
      
          if(!in_array($extArray[1],$allowedExt)){
              $status = false;
          }
  
        break;
  
  
     }
    
      return $status;
  
  }  

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password"   class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputaddress1">Address</label>
    <input type="text" name="address"   class="form-control" id="exampleInputaddress1" placeholder="address">
  </div>

  <div class="form-group">
    <label for="exampleInputgender1">Gender</label>
    <input type="text" name="gender"   class="form-control" id="exampleInputgender1" placeholder="gender">
  </div>

  <div class="form-group">
    <label for="exampleInputlinkedln1">linkedln</label>
    <input type="email" name="linkedln"   class="form-control" id="exampleInputlinkedln1" placeholder="linkedln">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Upload File</label>
    <input type="file" name="image" >
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>