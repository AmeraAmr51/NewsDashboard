<?php include "admin_inc/header.php" ?>

<!-- Navigation -->
<?php include "admin_inc/nav.php" ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Posts</h1>
                <?php 
             
                if(isset($_GET['source']))
                {
                    $source=$_GET['source'];
                }
                else 
                {
                    $source = '';
                }
                switch($source){
                    case 'add':
                        include 'admin_inc/add_post.php';
                    break;

                    default :
                        include 'admin_inc/all_post.php';
                    break;
                }
                if(isset($_GET['edite']))
                {
                    include 'admin_inc/edite_post.php';

                }

                
                
                ?>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "admin_inc/footer.php"; ?>