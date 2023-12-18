<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        JobEase
    </title>

    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</head>

<body>
    <!-- header start -->
    <?php 
	include "views/header.php";
	?>
    <!-- header end -->

    <section action="#" method="get" class="search">
        <h2>Find Your Dream Job</h2>
        <form class="form-inline" id="search_form" oninput="search(event)">
            <div class="form-group mb-2">
                <input type="text" name="keywords" placeholder="Keywords">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" name="location" placeholder="Location">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" name="company" placeholder="Company">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
    </section>

    <!--------------------------  card  --------------------->
    <section class="light" id="section_principe" style="min-height: 400px;">
        <h2 class="text-center py-3">Latest Job Listings</h2>
        <div class="container py-2" id="all_jobs">
            <!-- insert job  -->
        </div>
    </section>



    <!-- footer start -->
    <?php 
include "views/footer.php";
?>
    <!-- footer end -->
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function search(e) {
    document.querySelector("#all_jobs").innerHTML = "";
    const inputs = e.currentTarget.querySelectorAll("input");
    // console.log(inputs);
    let keyword = inputs[0].value;
    let location = inputs[1].value;
    let company = inputs[2].value;
    const request = new XMLHttpRequest();
    request.open('GET', `controller/search_job.php?name=${keyword}&location=${location}&company=${company}`);
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState === 4 && request.status === 200) {
            // console.log(JSON.parse(request.responseText));
            const respons = JSON.parse(request.responseText);
            if (!respons) return;

            for (let i = 0; i < respons.length; i++) {
                document.querySelector("#all_jobs").insertAdjacentHTML('beforeend', `
            <article class="postcard light green">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="styles/img/${respons[i]['image_path']}" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h3 class="postcard__title green"><a href="#">${respons[i]["title"]}</a></h3>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="fas fa-calendar-alt mr-2"></i>${respons[i]["date_created"]}
                        </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">${respons[i]["description"]}</div>
                    <ul class="postcard__tagbox">
                        <li class="tag__item"><i class="fas fa-tag mr-2"></i>${respons[i]["location"]}</li>
                        <li class="tag__item"><i class="fas fa-clock mr-2"></i>${respons[i]["company"]}</li>
                        <li class="tag__item play green">
                        <?php
                        if(isset($_SESSION['userName'])){
                        ?>
                            <button type="button" class="b_apply" value="${respons[i]["job_id"]}" onclick="succec(event)"><i class="fas fa-play mr-2">APPLY NOW</i></button>
                            <?php
                            } else if (empty($_SESSION['userName'])){
                                ?> 
                                <a href="login.php" ><i class="fas fa-play mr-2">APPLY NOW</i></a>
                                <?php
                            }
                                ?>
                        </li>
                    </ul>
                </div>
            </article>
            `)
            }

        }
    }


}
search({
    currentTarget: document.getElementById("search_form")
});

function succec(e) {
    const input = e.currentTarget.value;
    const req = new XMLHttpRequest();
    req.open('GET', `controller/aprouve_controller.php?id=${input}`);
    req.send();
    req.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            const res = req.responseText;
            if (res === "false") {
                console.log("ay7aja");
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "you are do apply already !",
                    footer: '<a href="#">Why do I have this issue?</a>'
                });
            } else if (res === "succes") {
                Swal.fire({
                    title: "Good Luck!",
                    text: "You are apply the new job !",
                    icon: "success"
                });
                let button = e.currentTarget;
                button.disabled = true;
                button.style.backgroundColor = 'red';
                button.style.color = "white";

            }
        }

    }

}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</html>