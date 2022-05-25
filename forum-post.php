<?php
include_once("bootstrap.php");

$forum = true;

$forumPostId = $_GET['id'];

$p = Forum::getById($forumPostId);





?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buurtparlement | Forum</title>

    <?php include_once('inc/head.inc.php') ?>
</head>
<body class="body-pd">
    <?php include_once('inc/header.inc.php'); ?>
    
    <main class="container-fluid">
        <div class="forum-welcome p-4 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <button onclick="history.back()" class="me-2 go-back"><i style="font-size: 2em;" class="bx bx-chevron-left"></i></button>
                <h2><a href="forum.php">Forum</a></h2>
            </div>
            <a href="new-post.php">
                <i style="font-size: 2em;" class="bx bx-plus"></i>
            </a>
        </div>

        <section class="forumList">
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

                    <div class="forumList__post__footer d-flex justify-content-between align-items-center mb-4">
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

                    <div class="formList__post__comments">
                        <ul class="mb-4">
                            <li>Comment 1</li>
                        </ul>

                        <div>
                            <label for="comment">Comment:</label>
                            <textarea class="mb-2 rounded-2" name="comment" id="comment" cols="30" rows="1"></textarea>
                            <button class="btn btn-primary" type="submit">Verzend</button>
                        </div>
                    </div>
                </div>
        </section>
    </main>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>