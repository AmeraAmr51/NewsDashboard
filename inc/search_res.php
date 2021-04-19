<div class="col-md-8">

<h1 class="page-header">
    News
    <small>Arab News</small>
</h1>

<?php 
if(isset($_POST['submit'])){
    $keyword=$_POST['search'];

    $query="SELECT * FROM posts WHERE tags LIKE '%$keyword%' ";
    $result=mysqli_query($Connect,$query);
    $count=mysqli_num_rows($result); // to count row in databse
    if($count == 0)
    {
        echo '<h1>No Posts </h>';
    }
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

<!-- First Blog Post -->
<h2>
    <a href="post.php?id=<?=$post_id?>"><?= $post_title?></a>
</h2>
<p class="lead">
     <a href="#"><?=$post_author?></a>
</p>
<p><span class="glyphicon glyphicon-time"></span> Post on  <?=$post_date?></p>
<hr>
<img class="img-responsive" src="img/<?=$post_image?>" alt="">
<hr>
<p><?=$post_content?>.</p>
<a class="btn btn-primary" href="post.php?p_id=<?=$post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

<hr>
<?php
endwhile;
} //if

?>

<!-- Pager -->
<ul class="pager">
    <li class="previous">
        <a href="#">&larr; Older</a>
    </li>
    <li class="next">
        <a href="#">Newer &rarr;</a>
    </li>
</ul>

</div>