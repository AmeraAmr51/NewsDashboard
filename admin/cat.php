<?php include "admin_inc/header.php" ?>

<!-- Navigation -->
<?php include "admin_inc/nav.php" ?>

<div id="page-wrapper">

    <div class="container-fluid">
        <h1 class="page-header">Categories</h1>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-6">
                <form action="" method="POST" class="form-group">
                    <div class="form-group">
                        <label>Add New Category</label>
                        <input type="text" name="add" class="form-control">
                    </div>
                    <div class="text-center">
                        <input type="submit" name="submit" value="Add" class="btn btn-primary btn-block ">
                    </div>

                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $new_cat = $_POST['add'];
                    if (empty($new_cat)) {
                        echo "Feild is Required ";
                    } else {
                        $query = "INSERT INTO `categories` (`name`) VALUES ('$new_cat')";
                        $result = mysqli_query($Connect, $query);
                    }
                }


                ?>
                <?php
                if (isset($_GET['edit'])) {
                    $edit_id = $_GET['edit'];
                    include 'admin_inc/edit_cat.php';
                }

                ?>

            </div>
            <div class="col-sm-6">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>Category num</th>
                        <th>Category name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    $query = "SELECT * FROM `categories`";
                    $result = mysqli_query($Connect, $query);
                    while ($row = mysqli_fetch_assoc($result)) :
                        $cat_id = $row['cat_id'];
                        $cat_name = $row['name'];
                    ?>
                        <tbody>
                            <td><?= $cat_id ?></td>
                            <td><?= $cat_name ?></td>
                            <td><a href="cat.php?edit=<?= $cat_id ?>"><i class="fa fa-edit"></i> </a></td>
                            <td><a href="cat.php?delete=<?= $cat_id ?>"> <i class="fa fa-trash"></i> </a></td>
                        </tbody>
                    <?php
                    endwhile;
                    ?>

                </table>
            </div>
        </div>
        <!-- /.row -->
        <!-- edit cat -->

        <!-- delete cat -->
        <?php

        if (isset($_GET['delete'])) {
            $del_id = $_GET['delete'];
            $query = "DELETE FROM `categories` WHERE cat_id= $del_id";
            $result = mysqli_query($Connect, $query);
            header("location:cat.php");
        }

        ?>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "admin_inc/footer.php"; ?>