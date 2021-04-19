<?php
    if(isset($_POST['create_post'])){
        //echo $_POST['title'];
        $name = $_POST['name'];
        $post_category = $_POST['category_id'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $tags = $_POST['tags'];
        $date = date('d-m-y');

        $image = $_FILES['image']['name'];
        $post_image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($post_image_tmp,"../img/$post_image");

        $sql="INSERT INTO `posts`(`post_id`, `category_id`, `name`, `author`, `content`, `image`, `date`, `tags`, `comment`) VALUES ('$post_category', '$post_title' ,'$post_author','$post_content','$post_image',now(),'$post_tags')";

$create_post = mysqli_query($Connect,$sql);
header("Location:post.php");


    }
?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label> Post Title </label>
        <input type="text" name="name" class="form-control">
    </div><!-- Post Title -->

    <div class="form-group">
        <label> Post Category </label>
        <select name="category_id" class="form-control">
            <?php
            $cat_sql = "SELECT * FROM `categories`";
            $allCategories = mysqli_query($Connect, $cat_sql);

            while ($row = mysqli_fetch_assoc($allCategories)) :
                $cat_id = $row['cat_id'];
                $cat_name = $row['name'];
            ?>
                <option value="<?= $cat_id?>"><?= $cat_name?></option>
            <?php endwhile; ?>

        </select>
    </div><!-- Post Category -->

    <div class="form-group">
        <label> Post Author </label>
        <input type="text" name="author" class="form-control">
    </div><!-- Post Author -->

    <div class="form-group">
        <label> Post Image </label>
        <input type="file" name="image" class="form-control">
    </div><!-- Post Image -->

    <div class="form-group">
        <label> Post Content </label>
        <textarea name="content" rows="6" class="form-control"></textarea>
    </div><!-- Post Content -->

    <div class="form-group">
        <label> Post Tags </label>
        <input type="text" name="tags" class="form-control">
    </div><!-- Post Tags -->


    <div class="form-group">
        <input type="submit" name="create_post" value="Publish Post" class="btn btn-primary btn-block">
    </div><!-- Post Tags -->
    <p></p>

</form>