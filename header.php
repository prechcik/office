<?php
define("code",true);
include('config.php');
include('functions.php');
session_start();
   if (!isset($_SESSION['uname'])) {
       header('Location: login.php');
   }
   setlocale(LC_MONETARY, 'en_US.UTF-8');
?>


<html>
    <head>
        <title>Office</title>
        <link rel="stylesheet" href="styles.css">
        
    </head>
    <body>
        <div id="main">
            <div id="maintoolbar">
                <div id="buttons">
                <a href="index.php" class="toolbar-button">
                    <div class="toolbar-button">
                        <img src="images/home.png" width="50" height="50" alt="Home" />
                        Home
                    </div>
                </a>
                <a href="#" class="toolbar-button">
                    <div class="toolbar-button">
                        <img src="images/new.png" width="50" height="50" alt="New" />
                        New
                    </div>
                </a>
                <a href="#" class="toolbar-button">
                    <div class="toolbar-button imgopen">
                        <img src="images/open.png" width="50" height="50" alt="Open" />
                        Open
                    </div>
                </a>
                <a href="#" class="toolbar-button">
                    <div class="toolbar-button imgsearch">
                        <img src="images/search.png" width="50" height="50" alt="Search" />
                        Search
                    </div>
                </a>
                <a href="settings.php" class="toolbar-button">
                    <div class="toolbar-button imgsettings">
                        <img src="images/settings.png" width="50" height="50" alt="Settings" />
                        Settings
                    </div>
                </a>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="toolbar-button">
                    <div class="toolbar-button imghelp">
                        <img src="images/help.png" width="50" height="50" alt="Help" />
                        Help
                    </div>
                </a>
                <a href="logout.php" class="toolbar-button">
                    <div class="toolbar-button imglogout">
                        <img src="images/logout.png" width="50" height="50" alt="Logout" />
                        Logout
                    </div>
                </a>
            </div>
                
                <div id="userinfo">
                    <p>Logged in as <?php echo $_SESSION['uname']; ?>.</p>
                    <p>Usergroup: <?php echo $_SESSION['groupname']; ?></p>
                </div>
                <div id="companylogo">
                    <?php if ($logourl!=""&&$companyname!="") {
                      ?>
                    <img src="<?php echo $logourl; ?>" alt="<?php echo $companyname; ?>" />
                    <p id="company_name"><?php echo $companyname; ?></p>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div id="clr"></div>
            