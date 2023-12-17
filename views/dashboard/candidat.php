<?php
session_start();
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="side">
            <div class="h-100">
                <div class="sidebar_logo d-flex align-items-end">

                    <a href="#" class="nav-link text-white-50">Dashboard</a>

                </div>

                <ul class="sidebar_nav">
                    <li class="sidebar_item " style="width: 100%;">
                        <a href="dashboard.php" class="sidebar_link"> <img src="img/1. overview.svg"
                                alt="icon">Overview</a>
                    </li>
                    <li class="sidebar_item active" style="width: 100%;">
                        <a href="candidat.php" class="sidebar_link "> <img src="img/agents.svg" alt="icon">Candidat</a>
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
                <a href="#" class="sidebar_link"><img src="img/settings.svg" alt="">Settings</a>


            </div>
        </aside>
        <div class="main">
            <?php 
            include_once "nav.php";
            ?>
            <section class="Agents px-4">
                <table class="agent table align-middle bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Position</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                        style="width: 45px; height: 45px" class="rounded-circle" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">John Doe</p>
                                        <p class="text-muted mb-0 f_email">john.doe@gmail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">Software engineer <br> IT department</p>

                            </td>
                            <td>
                                <span class="f_status">Active</span>
                            </td>
                            <td class="f_position">Senior</td>
                            <td>
                                <img class="delet_user" src="img/user-x.svg" alt="">
                                <img class="ms-2 edit" src="img/edit.svg" alt="">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" class="rounded-circle"
                                        alt="" style="width: 45px; height: 45px" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">Alex Ray</p>
                                        <p class="text-muted mb-0 f_email">alex.ray@gmail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">Consultant<br>Finance</p>

                            </td>
                            <td>
                                <span class="f_status">Onboarding</span>
                            </td>
                            <td class="f_position">Junior</td>
                            <td>
                                <img class="delet_user" src="img/user-x.svg" alt="">
                                <img class="ms-2 edit" src="img/edit.svg" alt="">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" class="rounded-circle"
                                        alt="" style="width: 45px; height: 45px" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">Kate Hunington</p>
                                        <p class="text-muted mb-0 f_email">kate.hunington@gmail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">Designer<br>UI/UX</p>

                            </td>
                            <td>
                                <span class="f_status">Awaiting</span>
                            </td>
                            <td class="f_position">Senior</td>
                            <td>
                                <img class="delet_user" src="img/user-x.svg" alt="">
                                <img class="ms-2 edit" src="img/edit.svg" alt="">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                        style="width: 45px; height: 45px" class="rounded-circle" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">John Doe</p>
                                        <p class="text-muted mb-0 f_email">john.doe@gmail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">Software engineer <br> IT department</p>

                            </td>
                            <td>
                                <span class="f_status">Active</span>
                            </td>
                            <td class="f_position">Senior</td>
                            <td>
                                <img class="delet_user" src="img/user-x.svg" alt="">
                                <img class="ms-2 edit" src="img/edit.svg" alt="">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" class="rounded-circle"
                                        alt="" style="width: 45px; height: 45px" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">Alex Ray</p>
                                        <p class="text-muted mb-0 f_email">alex.ray@gmail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">Consultant<br>Finance</p>

                            </td>
                            <td>
                                <span class="f_status">Onboarding</span>
                            </td>
                            <td class="f_position">Junior</td>
                            <td>
                                <img class="delet_user" src="img/user-x.svg" alt="">
                                <img class="ms-2 edit" src="img/edit.svg" alt="">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" class="rounded-circle"
                                        alt="" style="width: 45px; height: 45px" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">Kate Hunington</p>
                                        <p class="text-muted mb-0 f_email">kate.hunington@gmail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">Designer<br>UI/UX</p>

                            </td>
                            <td>
                                <span class="f_status">Awaiting</span>
                            </td>
                            <td class="f_position">Senior</td>
                            <td>
                                <img class="delet_user" src="img/user-x.svg" alt="">
                                <img class="ms-2 edit" src="img/edit.svg" alt="">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                        style="width: 45px; height: 45px" class="rounded-circle" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">John Doe</p>
                                        <p class="text-muted mb-0 f_email">john.doe@gmail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">Software engineer <br> IT department</p>

                            </td>
                            <td>
                                <span class="f_status">Active</span>
                            </td>
                            <td class="f_position">Senior</td>
                            <td>
                                <img class="delet_user" src="img/user-x.svg" alt="">
                                <img class="ms-2 edit" src="img/edit.svg" alt="">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" class="rounded-circle"
                                        alt="" style="width: 45px; height: 45px" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">Alex Ray</p>
                                        <p class="text-muted mb-0 f_email">alex.ray@gmail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">Consultant<br>Finance</p>

                            </td>
                            <td>
                                <span class="f_status">Onboarding</span>
                            </td>
                            <td class="f_position">Junior</td>
                            <td>
                                <img class="delet_user" src="img/user-x.svg" alt="">
                                <img class="ms-2 edit" src="img/edit.svg" alt="">
                            </td>
                        </tr>
                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" class="rounded-circle"
                                        alt="" style="width: 45px; height: 45px" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name">Kate Hunington</p>
                                        <p class="text-muted mb-0 f_email">kate.hunington@gmail.com</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title">Designer<br>UI/UX</p>

                            </td>
                            <td>
                                <span class="f_status">Awaiting</span>
                            </td>
                            <td class="f_position">Senior</td>
                            <td>
                                <img class="delet_user" src="img/user-x.svg" alt="">
                                <img class="ms-2 edit" src="img/edit.svg" alt="">
                            </td>
                        </tr>
                    </tbody>
                </table>


            </section>
            <!-- edit modal -->
            <div class="modal">
                <div class="modal-content">
                    <form id="forms">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="">
                                    <label class="form-label">First name</label>
                                    <input type="text" class="form-control first_name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label class="form-label">Last name</label>
                                    <input type="text" class="form-control last_name">
                                </div>
                            </div>
                        </div>

                        <!-- Text input -->
                        <div class="mb-4">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control email">
                        </div>

                        <!-- Text input -->
                        <div class="mb-4">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control title_user">
                        </div>

                        <!-- Number input -->
                        <div class=" mb-4">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control status">
                        </div>

                        <!-- Message input -->
                        <div class=" mb-4">
                            <label class="form-label">Position</label>
                            <textarea class="form-control position" rows="4"></textarea>
                        </div>

                        <!-- Submit button -->
                        <div class="d-flex w-100 justify-content-center">
                            <p class="error text-danger"></p>
                            <button type="submit" class="btn btn-success btn-block mb-4 me-4 save">Save Edit</button>
                            <button class="btn btn-danger btn-block mb-4 annuler">Annuler</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="styles/dashboard.js"></script>
    <script src="styles/agents.js"></script>
</body>

</html>