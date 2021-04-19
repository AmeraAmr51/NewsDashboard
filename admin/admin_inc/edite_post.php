<?php
            if(isset($_GET['edite'])){
                $post_id = $_GET['edite'];
                $qeury="SELECT * FROM posts WHERE post_id ='$post_id' ";
                $allpost=mysqli_query($Connect,$qeury);
                while ($row = mysqli_fetch_assoc($allpost)):
                    $post_title = $row['name'];
                    // $post_category = $row['post_category_id'];
                    $post_author = $row['author'];
                    $post_content = $row['content'];
                    $post_tags = $row['tags'];
                    $post_image=$row['image'];


          
    ?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <h3>Edit Post</h3>
    </div>
    <div class="form-group">
        <label> Post Title </label>
        <input type="text" name="title" class="form-control" value="<?=$post_title?>">
    </div><!-- Post Title -->

    <!-- <div class="form-group">
        <label> Post Category </label>
        <input type="text" name="category" class="form-control" value="<?php
         
        //  $cat_sql="SELECT * FROM categories WHERE `cat_id` ='$post_category'";
        //  $result1=mysqli_query($Connect,$cat_sql);
        //  while ($row = mysqli_fetch_assoc($result1)) :
        //      $cat_id = $row['cat_id'];
        //      $cat_name = $row['cat_name'];
        //      echo $cat_name;
        //  endwhile;
        
        ?>">

    </div>Post Category -->

    <div class="form-group">
        <label> Post Author </label>
        <input type="text" name="author" class="form-control" value="<?=$post_author?>">
    </div><!-- Post Author -->

    <div class="form-group">
        <label> Post Image </label>
        <input type="file" name="image"  class="form-control" value="<?=$post_image?>">
    </div><!-- Post Image -->

    <div class="form-group">
        <label> Post Content </label>
        <input type="massage" name="content" rows="6" class="form-control" value="<?=$post_content?>">
    </div><!-- Post Content -->

    <div class="form-group">
        <label> Post Tags </label>
        <input type="text" name="tags" class="form-control" value="<?=$post_tags?>">
        <label> </label>
    </div><!-- Post Tags -->
    <?php
    endwhile;
    }
    
    ?>
    <?php
    if(isset($_POST['edite_post'])){

        //echo $_POST['title'];
        $p_title = $_POST['title'];
        $p_author = $_POST['author'];
        $p_content = $_POST['content'];
        $p_tags = $_POST['tags'];

        $p_image = $_FILES['image']['name'];
        $post_image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($post_image_tmp,"../img/$p_image");

        $sql="UPDATE `posts` SET `post_title` = '$p_title', `post_author` = '$p_author', `post_content` = '$p_content', `post_tags` = '$p_tags', `post_image` = '$p_image' WHERE `posts`.`post_id` = $post_id ";

        $edit_post = mysqli_query($Connect,$sql);

        header("Location:post.php");
        echo mysqli_error($edit_post);


    }
    
        
    
?>




    <div class="form-group">
        <input type="submit" name="edite_post" value="Edite Post" class="btn btn-primary btn-block">
    </div><!-- Post Tags -->
    <p></p>

</form>


