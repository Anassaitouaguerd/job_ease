<?php
session_start();
if(isset($_SESSION['userRole']) && $_SESSION['userRole'] == "admin"){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="side">
            <div class="h-100">
                <div class="sidebar_logo d-flex align-items-end">

                    <a href="dashboard.php" class="nav-link text-white-50">Dashboard</a>
                    <img class="close align-self-start" src="img/close.svg" alt="icon">
                </div>

                <ul class="sidebar_nav">
                    <li class="sidebar_item active" style="width: 100%;">
                        <a href="dashboard.php" class="sidebar_link"> <img src="img/1. overview.svg"
                                alt="icon">Overview</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="candidat.php" class="sidebar_link"> <img src="img/agents.svg" alt="icon">Candidat</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="offre.php" class="sidebar_link"> <img src="img/task.svg" alt="icon">Offre</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="contact.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">Contact</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="Jobs.php" class="sidebar_link"><img src="img/articles.svg" alt="icon">Jobs</a>
                    </li>

                </ul>
                <div class="line"></div>
                <a href="#" class="sidebar_link"><img src="img/settings.svg" alt="icon">Settings</a>


            </div>
        </aside>
        <div class="main">
            <?php 
            include_once "nav.php";
            ?>
            <section class="overview">
                <div class="row p-4">
                    <div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body  p-4">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <p class="mb-0">Offres</p>
                                        <div class="mt-4">
                                            <h3><strong>18</strong></h3>

                                        </div>
                                    </div>
                                    <div class="cursor">
                                        <img src="img/project-icon-1.svg" alt="icon">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <p class="mb-0">Active Offres</p>
                                        <div class="mt-4">
                                            <h3><strong>132</strong></h3>

                                        </div>
                                    </div>
                                    <div class="">
                                        <img src="img/project-icon-2.svg" alt="icon">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <p class="mb-0">Nombre visiteurs</p>
                                        <div class="mt-4">
                                            <h3><strong>12</strong></h3>
                                            <!-- <p><strong></strong> Completed</p> -->
                                        </div>
                                    </div>
                                    <div class="">
                                        <img src="img/project-icon-3.svg" alt="icon">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <p class="mb-0">Offres approuver</p>
                                        <div class="mt-4">
                                            <h3><strong>76%</strong></h3>
                                            <p><strong>57%</strong> Completed</p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <img src="img/project-icon-4.svg" alt="icon">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="px-4">
                <div class="card mb-3">
                    <div class="row g-0 px-2">
                        <div class="col-xl-8 col-md-12 col-sm-12 col-12 p-4 ">
                            <div>
                                <h4>Today’s trends</h4>
                                <p>as of 27 oct 2023, 22:48 PM</p>
                            </div>
                            <div class="w-100" id="chart">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="px-4 row">
                <div class="col-xl-6 col-md-12 col-sm-12 col-12 ">
                    <div class="card">
                        <div class="row p-4">
                            <div class="col">
                                <p class="title">Unresolved Offres</p>
                                <p><span>Group:</span> Support</p>
                            </div>
                            <a class="col d-flex justify-content-end fw-medium" href="#">View details</a>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12 col-sm-12 col-12 ">
                <div class="card">
                    <div class="row p-4">
                        <div class="col">
                            <p class="title">Offres</p>
                            <p>Today</p>
                        </div>
                        <a class="col d-flex justify-content-end fw-medium" href="#">View all</a>

                    </div>
                    <div class="Admin_task list-group">
                        <div class="list-group-item px-3 text d-flex justify-content-between align-items-center p-4">
                            <p>Create new offre</p>
                            <img class="cursor " id="add_admin_task" src="img/inactive.svg" alt="icon">
                        </div>
                        <div class="list-group-item px-3 text d-flex justify-content-between align-items-center p-4">
                            <p>Finish offre update</p>
                            <img src="img/warning.svg" alt="icon">
                        </div>
                        <div class="list-group-item px-3 text d-flex justify-content-between align-items-center p-4">
                            <p>Create new offre example</p>
                            <img src="img/successnew.svg" alt="icon">
                        </div>
                        <div class="list-group-item px-3 text d-flex justify-content-between align-items-center p-4">
                            <p>Update offre report</p>
                            <img src="img/default.svg" alt="icon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- edit modal -->
    <div class="modal">
        <div class="modal-content">
            <form id="forms">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="mb-4">
                    <label class="form-label">Offre description</label>
                    <input type="text" class="form-control task-desc">

                </div>
                <div class="mb-4">
                    <label class="form-label">Offre title</label>
                    <input type="text" class="form-control task-desc">

                </div>
                <div class="mb-4">
                    <label class="form-label">Offre company</label>
                    <input type="text" class="form-control task-desc">

                </div>
                <div class="mb-4">
                    <label class="form-label">Offre Location</label>
                    <input type="text" class="form-control task-desc">

                </div>

                <!-- select input -->
                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="task status" id="status">
                        <option value="img/default.svg">Default</option>
                        <option value="img/successnew.svg">New</option>
                        <option value="img/warning.svg">Urgent</option>
                    </select>
                </div>


                <div class="d-flex w-100 justify-content-center">
                    <button type="submit" class="btn btn-success btn-block mb-4 me-4 save">Save Edit</button>
                    <div class="btn btn-danger btn-block mb-4 annuler">Annuler</div>
                </div>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="styles/dashboard.js"></script>
    <script src="styles/script.js"></script>
</body>

</html>
<?php
}else{
    header('location: ../../index.php');
}
?>