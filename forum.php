<?php
include_once("bootstrap.php");

session_start();

$title = "Forum";

if(isset($_SESSION['user'])) {
    $user = User::getUser($_SESSION['user']['id']);
}

$forum = true;

$forumPosts = Forum::getAll();




?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtparlement | Forum</title>

    <?php include_once('inc/head.inc.php') ?>
</head>
<body>
    <?php include_once('inc/aside.inc.php'); ?>
        
    <div class="ownContainer">
    <?php include_once('inc/header.inc.php'); ?>

        <main>
            <div class="forum-welcome pb-4 d-flex justify-content-between align-items-center">
                <h2>Forum</h2>
                <a href="new-post.php">
                    <i style="font-size: 2em;" class="bx bx-plus"></i>
                </a>
            </div>

            <section class="forumList">
                <?php if(!empty($forumPosts)): ?>
                    <?php foreach($forumPosts as $p): ?>
                    <div class="forumList__post p-4 w-100 rounded-5 mb-4">
                        <div class="forumList__post__header d-flex justify-content-between mb-4">
                            <div class="forumList__post__header__info d-flex gap-4">
                                <img src="https://jeffasseur-visuals.be/wp-content/uploads/2022/03/DSC00717-scaled.jpg" alt="profile pic" class="d-block rounded-circle" width="40" height="40">
                                <div>
                                    <h4>Jef</h4>
                                    <p class="text-muted"><small><?php echo htmlspecialchars($p['time']); ?></small></p>
                                </div>
                            </div>
                            <i style="font-size: 1.3em" class='bx bx-dots-vertical-rounded'></i>
                        </div>

                        <div class="forumList__post__body mb-4">
                            <h3 style="color: #1F2958;">
                                <a href="forum-post.php?id=<?php echo $p['id']; ?>">
                                    <?php echo htmlspecialchars($p['title']); ?>
                                </a>
                            </h3>
                            <p><?php echo htmlspecialchars($p['body']); ?></p>
                        </div>

                        <div class="forumList__post__footer d-flex justify-content-between align-items-center">
                            <div>
                                <p class="tags"><?php echo htmlspecialchars($p['tag']); ?></p>
                            </div>
                            <div>
                                <div class="comments">
                                <i style="font-size: 1em;" class='bx bx-comment'></i>
                                    <span>10</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Er zijn nog geen posts.</p>
                <?php endif; ?>
            </section>
        </main>
    </div>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>