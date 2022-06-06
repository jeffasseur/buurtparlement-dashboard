<header>
    <div class="menu-button">
        <button id="menu-btn">
            <i class="bx bx-menu fs-1"></i>
        </button>
    </div>

    <div class="title">
        <h2><?php echo $title; ?></h2>
        <p>Hallo, welkom bij het Buurtparlement</p>
    </div>

    <div class="right">
        <div class="profile">
            <div class="info">
                <p><?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['firstname'] . " " . $_SESSION['user']['lastname']; } ?></p>
            </div>
            <a href="account.php" class="profile-photo">
                <img class="rounded-circle" src="./assets/img/logo.png" alt="Profile">
            </a>
        </div>

        <div class="notification">
            <i class="bx bx-bell pe-4"></i>
        </div>
    </div>
</header>