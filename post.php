<?php

include 'inc/header.php';
include 'inc/navbar.php';

?>

<!-- Page Content -->
<div class="container">

    <div class="row">
   
        <!-- Blog Post Content Column -->
        <div class="col-lg-8">
            
            <?php

            $p_id = $_GET['p_id'];
            $query = "SELECT * FROM posts WHERE post_id = '$p_id'";
            $result = mysqli_query($Connect, $query);
            while ($row = mysqli_fetch_assoc($result)) :
                $post_id=$row['post_id'];
                $post_title=$row['name'];
                $post_image=$row['image'];
                $post_author=$row['author'];
                $post_date=$row['date'];
                $post_tags=$row['tags'];
                $post_comment=$row['comment'];
                $post_content=$row['content']


            ?>
               

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?= $post_title ?></h1>

                <!-- Author -->
                <p class="lead">
                    <?= $post_author ?>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $post_date ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="img/<?= $post_image ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?= $post_content ?></p>


                <hr>
            <?php endwhile; ?>
         

              <!-- Blog Comments -->
<?php
if(isset($_POST['create_comment'])){
    $the_post_id = $_GET['p_id'];
    $comment_author = $_POST['comment_author'];
    $comment_content = $_POST['comment_content'];

    $sql_insert_comment = " INSERT INTO `comments`
    ( `comment_post_id`, `comment_author`, `comment_date`, `comment_content`, `comment_status`)
     VALUES 
     ('$the_post_id','$comment_author',now(),'$comment_content',0) ";

$create_comment = mysqli_query($Connect,$sql_insert_comment);


$update_count_comments = " UPDATE `posts` SET `comment`= comment+1 WHERE post_id = '$the_post_id' ";

$ount_comments = mysqli_query($Connect,$update_count_comments);

}
?>

         <!-- Comments Form -->
         <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="POST" action="">
                        <div class="form-group">
                            <input type="text" name="comment_author" class="form-control" placeholder="Author Name">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

               

            <hr>


            <!-- Posted Comments -->

         <?php
         $the_post_id = $_GET['p_id'];
                        $sql = "SELECT * FROM `comments` WHERE `comment_post_id` = '$the_post_id' AND `comment_status` = 1 ";
                        $allComments = mysqli_query($Connect, $sql);
                        $count_comment= mysqli_num_rows($allComments);
                        if($count_comment == 0){
                            echo "<h4>no comments</h4>";
                        }
                        while ($row = mysqli_fetch_assoc($allComments)) :
                            $comment_id = $row['comment_id'];
                            $comment_post_id = $row['comment_post_id'];
                            $comment_author = $row['comment_author'];
                            $comment_date = $row['comment_date'];
                            $comment_content = $row['comment_content'];
                            $comment_status = $row['comment_status'];
                        ?>


           <!-- Comment -->
           <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="https://t4.ftcdn.net/jpg/03/46/93/61/360_F_346936114_RaxE6OQogebgAWTalE1myseY1Hbb5qPM.jpg"  width="20px" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?=$comment_author?>
                            <small><?=$comment_date?></small>
                        </h4>
                        <?=$comment_content?>
                    </div>
                </div>
                <hr>
  <?php endwhile; ?>
        
               


    </div>
    
    <!-- /.row -->

    <?php include "inc/footer.php" ?>