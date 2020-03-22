<?php 
 require ('config/config.php');
 require ('config/database.php');

 //select query
 $query = 'SELECT *FROM todos';
 

 // get result
 $result = mysqli_query($conn, $query);
 

 //fetch data
 $todos =mysqli_fetch_all($result, MYSQLI_ASSOC);


 //free result
 mysqli_free_result($result);

 //close connecton
 mysqli_close($conn);
 ?>

<?php include 'inc/header.php'?>
     <div class="container">     
        <h1 class="text-center card text-white bg-primary mb-3">Todos</h1>
        <?php  foreach($todos as $todo) : ?>
        <div class="card text-center" style="margin-bottom:15px; padding:10px;">
            <h3><?php echo $todo['subject']; ?></h3>
            <small>Created on <?php echo $todo['date']?> by 
            <?php echo $todo['id'];?></small>
            <p><?php echo $todo['description']; ?></p>
            <a class="btn btn-secondary" href="post.php?id=<?php echo $todo['id'];?> ">Read More</a>
        </div>
        <?php endforeach; ?>
        </div>
 <?php include 'inc/footer.php'?>
 