<?php 
 require ('config/config.php');
 require ('config/database.php');
if(isset($_POST['submit']))
{
    $update_id=mysqli_real_escape_string($conn,$_POST['update_id']);
    $subject=mysqli_real_escape_string($conn,$_POST['subject']);
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $date=mysqli_real_escape_string($conn,$_POST['date']);
    $user_id=mysqli_real_escape_string($conn,$_POST['users_id']);
    $query = "UPDATE todos set
                subject='$subject',
                description='$description',
                date='$date',
                users_id='$user_id'
                    where id = {$update_id}
                ";
    if(mysqli_query($conn,$query))
    {
        header('Location: '.ROOT_URL.'');
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }
}
 //get id
 $id =mysqli_real_escape_string($conn,$_GET['id']);

 //select query
 $query = 'SELECT *FROM todos where id=' .$id;
 

 // get result
 $result = mysqli_query($conn, $query);
 

 //fetch data
 $todo =mysqli_fetch_assoc($result);


 //free result
 mysqli_free_result($result);

 //close connecton
 mysqli_close($conn);
 
 ?>

<?php include 'inc/header.php'?>
     <div class="container">     
        <h1>Add todos</h1>
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
          <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" name="subject" class="form-control" value="<?php  echo $todo['subject'];?>">
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <textarea type="text" name="description" class="form-control"><?php  echo $todo['description'];?></textarea>
          </div>
          <div class="form-group">
              <label for="date">Date</label> 
              <input type="date"  name="date" class="form-control" value="<?php  echo $todo['date'];?>">
          </div>
          <div class="form-group">
              <label for="user_id">User_id</label> 
              <input type="number"  name="users_id" class="form-control" value="<?php  echo $todo['users_id'];?>"> 
          </div>
          
          <input type="hidden" name="update_id" value="<?php echo $todo['id']; ?>">
          <input type="submit" name="submit" value="submit" class="btn btn-primary">
        </form>
     </div>
 <?php include 'inc/footer.php'?>

 