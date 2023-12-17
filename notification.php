<?php
include_once "model/script_connexion.php";
include_once "model/aprouve.php";
    $id_user = $_GET['id_user'];

$not = new aprouve_offer($conn);
?>

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

    <!--------------------------  card  --------------------->
    <section class="light" id="section_principe" style="min-height: 400px;">
        <?php
    include_once "views/header.php";
    ?>
        <div class="container_session">
            <h1>Session Content</h1>
            <div class="session-content">
                <?php
                if(isset($not)){ 
                    // echo "welcom";
            $noti = $not->display_notification($id_user);
            foreach($noti as $rows){
                    if($rows['status'] == "aprouve"){
            ?>
                <h1>
                    <?php
           echo $rows['title'];
            ?>
                </h1>
                <span class="custom-span ">
                    Your offer is accepted and now is approved
                </span>
                <?php
                    }else if($rows['status'] == "inaprouve"){
            ?>
                <span class="custom-span-red">
                    Your offer is not rejected and we disapprove your offer
                </span>
                <?php
                    }else if($rows['status'] == "save"){
                        ?>
                <span class="custom-span-yellow">
                    Your offer is in review mode
                </span>
                <?php
             }
            }
            }
        
            ?>
            </div>
        </div>
    </section>



    <!-- footer start -->
    <?php 
include "views/footer.php";
?>
    <!-- footer end -->
</body>
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<style>
.container_session {
    max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.session-content {
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #fafafa;
}

.custom-span {
    margin: 20px;
    display: inline-block;
    background-color: #4CAF50;
    color: #fff;
    padding: 8px 12px;
    border-radius: 4px;
    font-weight: bold;
}

.custom-span-red {
    margin: 20px;
    display: inline-block;
    background-color: #FF5733;
    color: #fff;
    padding: 8px 12px;
    border-radius: 4px;
    font-weight: bold;
}

.custom-span-yellow {
    margin: 20px;
    display: inline-block;
    background-color: #FFD700;
    color: #000;
    padding: 8px 12px;
    border-radius: 4px;
    font-weight: bold;
}
</style>

</html>