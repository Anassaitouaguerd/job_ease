<?php
session_start();
?>

<header>
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#">
                <i class="fas fa-code"></i>
                <h1>JobEase &nbsp &nbsp</h1>
            </a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            language
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">FR</a>
                            <a class="dropdown-item" href="#">EN</a>
                        </div>
                    </li>
                    <span class="nav-item active">
                        <a class="nav-link" href="#">EN</a>
                    </span>
                    <?php
                    if(isset($_SESSION['userName'])){
                        ?>
                    <li class="nav-item">
                        <a class="nav-link" href="notification.php?id_user=<?= $_SESSION['userid'] ?>">notification</a>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link"><?= $_SESSION['userName'] ?></p>
                    </li>
                    <nav>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                    <img src="./views/dashboard/img/img_user.webp" class="rounded-circle"
                                        style="width: 50px;" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-end position-absolute">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Account Setting</a>
                                    <a class="dropdown-item" href="./controller/auth_controller.php?action='logout'">Log
                                        out</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <?php
                    }else{
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>