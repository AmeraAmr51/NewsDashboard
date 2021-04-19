<table class="table table-bordered table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>Cat</th>
        <th>Title</th>
        <th>Author</th>
        <th>Date</th>
        <th>image</th>
        <th>Edite</th>
        <th>Delete</th>
    </tr>
    <?php
    $query = "SELECT * FROM posts";
    $result = mysqli_query($Connect, $query);
    while ($row = mysqli_fetch_assoc($result)) :
        $id_p = $row['post_id'];
        $cat_id_p = $row['category_id'];
        $title_p = $row['name'];
        $author_p = $row['author'];
        $date_p= $row['date'] ;
        $image_p = $row['image'];
        


    ?>
        <tbody>
            <td><?= $id_p ?></td>
            <!-- <td><?php //echo $cat_id_p?></td> -->
             <td>
             <?php
                $cat_sql="SELECT * FROM categories WHERE `cat_id` ='$cat_id_p'";
                $result1=mysqli_query($Connect,$cat_sql);
                while ($row = mysqli_fetch_assoc($result1)) :
                    $cat_id = $row['cat_id'];
                    $cat_name = $row['name'];
                    echo $cat_name;
                endwhile;
                
                ?>
            
            </td>
                

            <td><?= $title_p ?></td>
            <td><?= $author_p ?></td>
            <td><?=$date_p?></td>
            <td><img src="../img/<?= $image_p ?>" width="80" height="60" alt=""></td> 
            <td class="text-center"><a href="post.php?edite=<?=$id_p?>"><i class="fa fa-edit"></i></a></td>
            <td class="text-center"><a href="post.php?delete=<?=$id_p?>"> <i class="fa fa-trash"></i></a></td>


            
        </tbody>
        <?php endwhile ?>
</table>
<?php
    if(isset($_GET['delete'])){
        $the_post_id = $_GET['delete'];
        $sql_delete = " DELETE FROM `posts` WHERE `post_id` = '$the_post_id' ";
        $deletePost=mysqli_query($Connect, $sql_delete);
        header("Location:post.php");
    }
?>