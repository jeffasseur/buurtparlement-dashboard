<aside>
    <div class="top">
        <a href="index.php" class="logo">
            <img src="assets/img/logo.png" alt="logo">
            <h4>Buurt <br> Parlement</h4>
        </a>
        <div class="close" id="btnClose">
            <i class="bx bx-x fs-1 p-2"></i>
        </div>
    </div>

    <div class="sidebar">
        <a href="index.php" class="<?php if(isset($dashboard) && $dashboard==true){echo "active";} ?>">
            <i class="bx bx-grid-alt"></i>
            <span>Overzicht</span>
        </a>
        <?php if(isset($_SESSION['user'])): ?>
            <a href="agenda.php" class="<?php if(isset($agenda) && $agenda==true){echo "active";} ?>">
                <i class="bx bx-calendar"></i>
                <span>Agenda</span>
            </a>
        
            <a href="#" class="<?php if(isset($berichten) && $berichten==true){echo "active";} ?>">
                <i class="bx bx-message-square-detail"></i>
                <span>Berichten</span>
                <span class="message-count">12</span>
            </a>
        
            <a href="documenten.php" class="<?php if(isset($filemanager) && $filemanager==true){echo "active";} ?>">
                <i class="bx bx-folder"></i>
                <span>Documenten</span>
            </a>
        <?php endif; ?>
        <a href="forum.php" class="<?php if(isset($forum) && $forum==true){echo "active";} ?>">
            <i class="bx bx-news"></i>
            <span>Forum</span>
        </a>
        <a href="account.php" class="<?php if(isset($account) && $account==true){echo "active";} ?>">
            <i class="bx bx-user"></i>
            <span>Account</span>
        </a>

        <?php if(isset($_SESSION['user'])): ?>
        <a href="logout.php">
            <i class="bx bx-log-out"></i>
            <span>Log out</span>
        </a>
        <?php else: ?>
        <a href="login.php">
            <i class="bx bx-log-in"></i>
            <span>Log in</span>
        </a>
        <?php endif; ?>
    </div>
</aside>