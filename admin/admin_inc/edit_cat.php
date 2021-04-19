
<!-- need to make it more time  -->
<form action="" method="POST">
    <div class="form-group">

        <label>Edit Category</label>
        <?php
            if(isset($_GET['edit'])){
                $cat_id = $_GET['edit'];
                $sql = "SELECT * FROM `categories`WHERE cat_id = $cat_id";
                $allCategories = mysqli_query($Connect, $sql);
                while ($row = mysqli_fetch_assoc($allCategories)) :
                    $cat_id = $row['cat_id'];
                    $cat_name = $row['name'];
        ?>
        <input type="text" class="form-control" name="name" value="<?=$cat_name?>">
        
        <?php
            endwhile;
            }
        
        ?>
        
    </div>
    <?php
if(isset($_POST['edit']))
{
    $cat_name=$_POST['name'];
    $query="UPDATE `categories` SET `name`='$cat_name' WHERE cat_id =$cat_id";
    $result=mysqli_query($Connect,$query);

}
else echo mysqli_connect_error();

?>

    <div class="form-group text-center">

            <input type="submit" class="btn btn-primary btn-block " value="Edite" name="edit">

    </div>
    
</form>
