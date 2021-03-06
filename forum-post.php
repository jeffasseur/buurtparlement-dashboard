<?php
include_once("bootstrap.php");

session_start();

if(isset($_SESSION['user'])) {
    $user = User::getUser($_SESSION['user']['id']);
}

$forum = true;

$forumPostId = $_GET['id'];

$p = Forum::getById($forumPostId);

$title = "Forum";



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

        <main class="container-fluid forumPost">
            <div class="forum-welcome pb-4 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <button onclick="history.back()" class="me-2 go-back" style="background: transparent;"><i style="font-size: 2em;" class="bx bx-chevron-left"></i></button>
                    <h2><a href="forum.php">Forum</a></h2>
                </div>
            </div>
    
            <section class="forumList">
                    <div class="forumList__post w-100 mb-4">
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
                        </div>
                    </div>
                    
                    <div class="formList__comments">
                        <?php if(isset($_SESSION['user'])): ?>
                        <div class="formList__comments__form">
                            <div class="formList__comments__input">
                                <label for="comment">Comment:</label>
                                <input type="text" name="comment" id="comment" class="w-100" />
                            </div>
                            <button class="btn btn-primary" type="submit">Verzend</button>
                        </div>
                        <?php endif; ?>

                        <div class="ul">
                            <h5>Comments:</h5>
                            <ul class="comment-list">
                                <li class="d-flex align-items-center" style="gap: 1rem;">
                                    <img class="rounded-circle" src="./assets/img/logo.png" alt="ProfPic" width="35" height="35" style="object-fit: cover;">
                                    <p>Comment text</p>
                                </li>
                                <li class="d-flex align-items-center" style="gap: 1rem;">
                                    <img class="rounded-circle" src="./assets/img/logo.png" alt="ProfPic" width="35" height="35" style="object-fit: cover;">
                                    <p>Comment text</p>
                                </li>
                            </ul>
                        </div>
                    </div>
            </section>
        </main>
    </div>

    <?php include_once('inc/footer.inc.php'); ?>
</body>
</html>