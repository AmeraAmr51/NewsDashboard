<?php include 'register_m.php'?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    
                    
                </button>
                <a class="navbar-brand" href="home.php">NEWS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php 
                    $query="SELECT * FROM categories ";
                    $result= mysqli_query($Connect,$query);

                    while($row =mysqli_fetch_assoc($result)):
                        $cat_id=$row['cat_id'];
                        $cat_name=$row['name'];
                
                    ?>

                    <li>
                        <a href="category.php?c_id=<?=$cat_id?>"><?= $cat_name?></a>
                    </li>
                    
                    <?php endwhile; ?>

                    <li class="dropdown" >
                    <a style="margin-left: 600px;" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php success_login();?> <b class="caret"></b></a>
                    <ul style="margin-left: 600px;" class="dropdown-menu" >
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                        <a href="index.php?logout='1'"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                   
                </ul>
            </div>
            <?php
                
                // $id = $_GET['id'];
                // $query = "SELECT * FROM posts WHERE post_category_id =$id ";
                // $result = mysqli_query($Connect, $query);
           

            ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
