<header class="header bg-light" id="header">
        <div class="header_toggle"> 
            <i class='bx bx-menu' id="header-toggle"></i> 
        </div>
        <div class="d-flex align-items-center">
            <div class="header_img me-4"> 
                <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.PtAghFSwI4d40TBvu7DFDwHaHa%26pid%3DApi&f=1" alt="Profile picture">
            </div>
            <div>
                <i id="notification" class='bx bx-bell nav_icon fs-3'></i> 
            </div>
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="dashboard.php" class="nav_logo">
                     <i class='bx bx-layer nav_logo-icon'></i> 
                     <span class="nav_logo-name">Buurtparlement</span> 
                </a>
                <div class="nav_list"> 

                    <a href="dashboard.php" class="nav_link <?php if(isset($dashboard) && $dashboard==true){echo "active";} ?>"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Overzicht</span> 
                    </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-calendar nav_icon'></i> 
                        <span class="nav_name">Agenda</span> 
                    </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-message-square-detail nav_icon'></i> 
                        <span class="nav_name">Berichten</span> 
                    </a> 
                    <a href="filemanager.php" class="nav_link <?php if(isset($filemanager) && $filemanager==true){echo "active";} ?>"> 
                        <i class='bx bx-folder nav_icon'></i> 
                        <span class="nav_name">Bestanden</span> 
                    </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-news nav_icon'></i> 
                        <span class="nav_name">Forum</span> 
                    </a>                     
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-user nav_icon'></i> 
                        <span class="nav_name">Account</span> 
                    </a> 
                </div>
            </div> 
            <a href="#" class="nav_link"> 
                <i class='bx bx-log-out nav_icon'></i> 
                <span class="nav_name">Uitloggen</span> 
            </a>
        </nav>
    </div>