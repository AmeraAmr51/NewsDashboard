<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                    </form>
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-8">
                            <ul class="list-unstyled">
                                <?php 
                                $query="SELECT * FROM categories ";
                                $result= mysqli_query($Connect,$query);

                                while($row =mysqli_fetch_assoc($result)):
                                    $cat_id=$row['cat_id'];
                                    $cat_name=$row['name'];
                                ?>

                                <li><a href="#"><?= $cat_name?></a>
                                </li>
                                <?php endwhile; ?>
                               
                            </ul>
                            
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->


         <?php 

            $query="SELECT * FROM posts";
            $result=mysqli_query($Connect,$query);
            while($row=mysqli_fetch_assoc($result)):
                $post_id=$row['post_id'];
                $post_title=$row['name'];
                $post_image=$row['image'];
                $post_author=$row['author'];
                $post_date=$row['date'];
                $post_tags=$row['tags'];
                $post_comment=$row['comment'];
                $post_content=substr($row['content'],0,99); //substr aplly content like array 


        ?>
                <div class="well">
                <h4><?= $post_title?></h4>
                    <p><?=$post_content?></p>
                    <a style="margin-left: 75%;" href="post.php?p_id=<?=$post_id?>">Read More </a>
                </div>
                <?php
endwhile;

?>

            </div>