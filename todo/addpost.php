<?php 
 require ('config/config.php');
 require ('config/database.php');
if(isset($_POST['submit']))
{
    
    $subject=mysqli_real_escape_string($conn,$_POST['subject']);
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $date=mysqli_real_escape_string($conn,$_POST['date']);
    $user_id=mysqli_real_escape_string($conn,$_POST['users_id']);
    $query = "INSERT INTO todos (subject,description,date,users_id) values ('$subject','$description','$date','$user_id')";
    if(mysqli_query($conn,$query))
    {
        header('Location: '.ROOT_URL.'');
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }
}

 ?>

<?php include 'inc/header.php'?>
     <div class="container">     
        <h1>Add Post</h1>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
          <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" name="subject" class="form-control" >
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <textarea type="text" name="description" class="form-control" ></textarea>
          </div>
          <div class="form-group">
              <label for="date">Date</label> 
              <input type="date"  name="date" class="form-control" require >
          </div>
          <div class="form-group">
              <label for="user_id">User_id</label> 
              <input type="number"  name="users_id" class="form-control" require >
          </div>
          
          <input type="submit" name="submit" value="submit" class="btn btn-primary">
        </form>
     </div>
 <?php include 'inc/footer.php'?>
 