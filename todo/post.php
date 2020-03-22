<?php 
 require ('config/config.php');
 require ('config/database.php');
 if(isset($_POST['delete']))
 {
     $delete_id=mysqli_real_escape_string($conn,$_POST['delete_id']);
     $query = "DELETE FROM todos where id = {$delete_id}";
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
         <a href="<?php echo ROOT_URL;?>" class="btn btn-default">Back</a>
        <h1><?php echo $todo['subject']; ?></h1>
        <small>Created on <?php echo $todo['date']?> by 
        <?php echo $todo['id'];?></small>
        <p><?php echo $todo['description'];?></p>
        <hr>
        <form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
         <input type="hidden" name="delete_id" value="<?php echo $todo['id'];?>">
         <input type="submit" name="delete" value="Delete" class="btn btn-danger">
        </form>
        <a href="<?php echo ROOT_URL;?>editpost.php?id=<?php echo $todo['id'];?>"class="btn btn-primary" style="margin-top: 10px">Edit</a>
     </div>
<?php include 'inc/footer.php'?>
 