<nav class="navbar navbar-expand px-3 border-bottom">
    <button class="btn" id="sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse navbar">
        <ul class="navbar-nav">
            <li class="nav-item align-self-center flex-wrap px-4">
                <p class="marquee">
                    <span>Hi, <strong><?php echo $_SESSION['name'] ?></strong> &nbsp;&nbsp;&nbsp; </span>
                </p>
            </li>
            <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                    <?php
                    if($_SESSION['image'] == ""){
                        echo '<img src="assets/images/Profile.jpg" class="avatar img-fluid rounded-circle" alt="">';
                    }else{
                        echo '<img src="assets/images/user/'.$_SESSION['image'].'" class="avatar img-fluid rounded-circle" alt="">';
                    }
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <ul>
                        <li>
                            <a href="profile.php" class="dropdown-item">Profile</a>
                        </li>
                        <li>
                            <a href="logout.php" class="dropdown-item border-top">Logout</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>