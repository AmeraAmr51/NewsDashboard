<?php include('admin_inc/header.php'); ?>
<?php include('admin_inc/nav.php'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <h1 class="page-header">
            Comments </h1>
        <div class="row">
            <div class="col-12">

                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Status</th>
                            <th>In Response to</th>
                            <th>Date</th>
                            <th>Approve</th>
                            <th>UnApprove</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `comments`";
                        $allComments = mysqli_query($Connect, $sql);
                        while ($row = mysqli_fetch_assoc($allComments)) :
                            $comment_id = $row['comment_id'];
                            $comment_post_id = $row['comment_post_id'];
                            $comment_author = $row['comment_author'];
                            $comment_date = $row['comment_date'];
                            $comment_content = $row['comment_content'];
                            $comment_status = $row['comment_status'];
                        ?>
                            <tr>
                                <td><?= $comment_id ?></td>
                                <td><?= $comment_author ?></td>
                                <td><?= $comment_content ?></td>
                                <td><?= $comment_status ?></td>

                                <!-- <td><?= $comment_post_id ?></td> -->

                                <?php
                                $sqlpost = "SELECT * FROM `posts`  WHERE `post_id` = '$comment_post_id' ";
                                $allPosts = mysqli_query($Connect, $sqlpost);

                                while ($row = mysqli_fetch_assoc($allPosts)) :
                                    $post_id = $row['post_id'];
                                    $post_title = $row['name'];
                                ?>

                                    <td><?= $post_title ?></td>
                                <?php endwhile; ?>


                                <td><?= $comment_date ?></td>
                                <td><a href="comments.php?approve=<?=$comment_id?>">Approve</a> </td>
                                <td><a href="comments.php?unapprove=<?=$comment_id?>">UnApprove</a> </td>
                                <td><a href="comments.php?delete=<?=$comment_id?>">Delete</a> </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

  <?php
    if(isset($_GET['delete'])){
        $the_comment_id = $_GET['delete'];
        $sql_delete = " DELETE FROM `comments` WHERE `comment_id` = '$the_comment_id' ";
        $deleteComment=mysqli_query($Connect, $sql_delete);
        header("Location:comments.php");
    }
?>

  <?php
    if(isset($_GET['approve'])){
        $the_comment_id = $_GET['approve'];
        $sql_approve= " UPDATE `comments` SET   `comment_status` = 1  WHERE `comment_id` = '$the_comment_id' ";
        $approveComment=mysqli_query($Connect, $sql_approve);
        header("Location:comments.php");
    }
?>

  <?php
    if(isset($_GET['unapprove'])){
        $the_comment_id = $_GET['unapprove'];
        $sql_unapprove= " UPDATE `comments` SET   `comment_status` = 0  WHERE `comment_id` = '$the_comment_id' ";
        $unapproveComment=mysqli_query($Connect, $sql_unapprove);
        header("Location:comments.php");
    }
?>

    

            </div><!-- col-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php include('admin_inc/footer.php'); ?>