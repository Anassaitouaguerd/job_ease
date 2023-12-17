<?php
session_start();
require_once "../../model/script_connexion.php";
require_once "../../model/crud.php";
$job = new jobe($conn);
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                    <li class="sidebar_item " style="width: 100%;">
                        <a href="dashboard.php" class="sidebar_link"> <img src="img/1. overview.svg"
                                alt="icon">Overview</a>
                    </li>
                    <li class="sidebar_item ">
                        <a href="candidat.php" class="sidebar_link "> <img src="img/agents.svg" alt="icon">Candidat</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="offre.php" class="sidebar_link"> <img src="img/task.svg" alt="icon">Offre</a>
                    </li>
                    <li class="sidebar_item">
                        <a href="contact.php" class="sidebar_link"><img src="img/agent.svg" alt="icon">Contact</a>
                    </li>
                    <li class="sidebar_item active" style="width: 100%;">
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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Add new job
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add New Job</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../../controller/crud_jobs_controller.php" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="jobImage">Job Image:</label>
                                        <input type="file"
                                            class="form-control-file border border-5 border-info rounded-pill"
                                            id="jobImage" name="jobImage">
                                    </div>
                                    <div class="form-group">
                                        <label for="jobName">Job Name:</label>
                                        <input type="text" class="form-control" id="jobName" name="jobName" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jobDescription">Job Description:</label>
                                        <textarea class="form-control" id="jobDescription" name="jobDescription"
                                            required style="resize : none;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="jobCompany">Company:</label>
                                        <input type="text" class="form-control" id="jobCompany" name="jobCompany"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jobLocation">Location:</label>
                                        <input type="text" class="form-control" id="jobLocation" name="jobLocation"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jobLocation">status:</label>
                                        <select name="jobstatus" class="form-control select" id="jobstatus">
                                            <option value="open">
                                                open
                                            </option>
                                            <option value="close">
                                                close
                                            </option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" name="save_job" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="agent table align-middle bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th>Title</th>
                            <th>description</th>
                            <th>company</th>
                            <th>location</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $display_offer = $job->display_job();
                       
                        foreach($display_offer as $rows){
                        ?>

                        <tr class="freelancer">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="../../styles/img/<?= $rows['image_path'] ?>" alt=""
                                        style="width: 45px; height: 45px" class="rounded-circle" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1 f_name"><?= $rows['title'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1 f_title"><?= $rows['description'] ?></p>

                            </td>
                            <td class="f_position">
                                <?= $rows['company'] ?>
                            </td>
                            <td class="f_location">
                                <span class="f_status"><?= $rows['location'] ?></span>
                            </td>
                            <td class="f_status">
                                <span class="f_status"><?= $rows['status_job'] ?></span>
                            </td>
                            <td class="f_contolle d-flex">
                                <!-- =========================== button delete ============================== -->
                                <button type="button" class="bg-light border-0" onclick="delet_job(event)">
                                    <input type="hidden" id="delet_job" value="<?= $rows['job_id']?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                    </svg>
                                </button>
                                <!-- =========================== button edit ============================== -->
                                <button type="button" class="bg-light border-0" data-bs-toggle="modal"
                                    data-bs-target="#modal_edit_<?= $rows['job_id'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-feather" viewBox="0 0 16 16">
                                        <path
                                            d="M15.807.531c-.174-.177-.41-.289-.64-.363a3.765 3.765 0 0 0-.833-.15c-.62-.049-1.394 0-2.252.175C10.365.545 8.264 1.415 6.315 3.1c-1.95 1.686-3.168 3.724-3.758 5.423-.294.847-.44 1.634-.429 2.268.005.316.05.62.154.88.017.04.035.082.056.122A68.362 68.362 0 0 0 .08 15.198a.528.528 0 0 0 .157.72.504.504 0 0 0 .705-.16 67.606 67.606 0 0 1 2.158-3.26c.285.141.616.195.958.182.513-.02 1.098-.188 1.723-.49 1.25-.605 2.744-1.787 4.303-3.642l1.518-1.55a.528.528 0 0 0 0-.739l-.729-.744 1.311.209a.504.504 0 0 0 .443-.15c.222-.23.444-.46.663-.684.663-.68 1.292-1.325 1.763-1.892.314-.378.585-.752.754-1.107.163-.345.278-.773.112-1.188a.524.524 0 0 0-.112-.172ZM3.733 11.62C5.385 9.374 7.24 7.215 9.309 5.394l1.21 1.234-1.171 1.196a.526.526 0 0 0-.027.03c-1.5 1.789-2.891 2.867-3.977 3.393-.544.263-.99.378-1.324.39a1.282 1.282 0 0 1-.287-.018Zm6.769-7.22c1.31-1.028 2.7-1.914 4.172-2.6a6.85 6.85 0 0 1-.4.523c-.442.533-1.028 1.134-1.681 1.804l-.51.524-1.581-.25Zm3.346-3.357C9.594 3.147 6.045 6.8 3.149 10.678c.007-.464.121-1.086.37-1.806.533-1.535 1.65-3.415 3.455-4.976 1.807-1.561 3.746-2.36 5.31-2.68a7.97 7.97 0 0 1 1.564-.173Z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <!--============= start madal editing  ===================================================-->
                        <div class="modal fade" id="modal_edit_<?= $rows['job_id']?>" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">update info Job</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="forms" action="../../controller/crud_jobs_controller.php"
                                            method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="job_id" value="<?= $rows['job_id'] ?>">
                                            <div class="mb-3">
                                                <label for="jobImage" class="form-label">Job Image:</label>
                                                <input type="file" class="form-control"
                                                    value="<?= $rows['image_path']?>" id="jobImage" name="jobImage">
                                            </div>
                                            <div class="mb-3">
                                                <label for="jobName" class="form-label">Job Name:</label>
                                                <input type="text" class="form-control" value="<?= $rows['title'] ?>"
                                                    id="jobName" name="jobName" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jobDescription" class="form-label">Job Description:</label>
                                                <textarea class="form-control" id="jobDescription"
                                                    value="<?= $rows['description'] ?>" name="jobDescription" required
                                                    style="resize: none;"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jobCompany" class="form-label">Company:</label>
                                                <input type="text" class="form-control" value="<?= $rows['company'] ?>"
                                                    id="jobCompany" name="jobCompany" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jobLocation" class="form-label">Location:</label>
                                                <input type="text" class="form-control" value="<?= $rows['location'] ?>"
                                                    id="jobLocation" name="jobLocation" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jobStatus" class="form-label">Status:</label>
                                                <select name="jobstatus" class="form-control select" id="jobstatus">
                                                    <option value="actif">
                                                        actif
                                                    </option>
                                                    <option value="inactif">
                                                        inactif
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <p class="error text-danger"></p>
                                                <button type="submit" name="edit_job" class="btn btn-success me-4">Save
                                                    Edit</button>
                                                <button type="button" class="btn btn-danger annuler"
                                                    data-bs-dismiss="modal">Annuler</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--============= end madal editing  ===================================================-->
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
            <!-- edit modal -->

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                crossorigin="anonymous">
            </script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="styles/dashboard.js"></script>
            <script src="styles/agents.js"></script>
            <script>
            function delet_job(e) {
                const delet_job = e.currentTarget.querySelectorAll("input");
                const del = delet_job[0].value;
                const req = new XMLHttpRequest();
                req.open('GET', `../../controller/crud_jobs_controller.php?delet=${del}`);
                req.send();
                req.onload = function() {
                    if (req.status === 200) {
                        const respons = JSON.parse(req.responseText);
                        location.reload();
                    } else {
                        console.log('Request failed with status:', req.status);
                    }
                };
            }
            </script>

</body>

</html>