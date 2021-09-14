<?php
require './server.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./boot1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./boot1/css/index_style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <title>ToDo List</title>
</head>
<body>
 
<div class="container mt-5">
<h2 class="text-center">ToDo List</h2>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">add</button>

<hr>
<table class="table table-hover table-dark mt-3">
  <thead>
    <tr>
      <th scope="col">
      <th scope="col">Title</th>
      <th width="50%" scope="col">Description</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $sql = "select * from list";
  $op  =  mysqli_query($con,$sql);
      $i = 0;
      while ($data = mysqli_fetch_assoc($op)) {
?> 
            <tr>
               <td><?php echo ++$i;?></td>
               <td><?php echo $data['title'];?></td>
               <td><?php echo $data['description'];?></td>
               <td><?php echo $data['startdate'];?></td>
               <td><?php echo $data['enddate'];?></td>

                <td>
                    <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                </td>

            </tr>

<?php } ?>
  </tbody>
</table>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="action.php" method="POST" >
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title :</label>
            <input type="text" name="title" class="form-control" id="recipient-name">
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Start Date :</label>
            <input type="datetime-local" name="startdate" class="form-control" id="recipient-name">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">End Date :</label>
            <input type="datetime-local" name="enddate" class="form-control" id="recipient-name">
          </div>
         
          <div class="form-group">
            <label for="message-text" class="col-form-label">Description :</label>
            <textarea class="form-control" name="description" id="message-text"></textarea>
          </div>
 
        

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>