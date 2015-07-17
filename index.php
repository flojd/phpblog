<?php include '/config/config.php'; ?>
<?php include '/libraries/Database.php'; ?>
<?php include '/includes/header.php'; ?>
<?php include '/helpers/format_helper.php'; ?>
<?php
    //create DB object
    $db = new Database();
    
    //create query for posts
    $query = "SELECT * FROM posts";

    //run query
    $posts = $db->select($query);


    //create query for categories
    $query = "SELECT * FROM categories";

    //run query
    $categories = $db->select($query);

?>
<?php if($posts) : ?>
    <?php while($row = $posts->fetch_assoc()) : ?>
        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <a href="#"><?php echo $row['author']; ?></a></p>
            <p><?php echo shortenText($row['body']); ?></p>

            <a class="readmore" href="post.php?id=<?php echo urlencode($row['id']); ?>">Read More</a>
        </div><!-- /.blog-post -->

<?php endwhile; ?>


<?php else : ?>
    <p>There are no posts yet!</p>
<?php endif; ?>

<?php include '/includes/footer.php'; ?>