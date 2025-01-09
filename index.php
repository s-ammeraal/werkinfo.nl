<?php
    include('DB/db.php');
    global $db;

    $query = $db->prepare("SELECT * FROM vacatures");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, inital-scale=1.0">
    <title>Werkinfo.nl</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand d-flex text-light align-items-center">
                <strong>Werkinfo.nl</strong>
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="nav-link text-light" aria-current="page" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-disabled="true" href="about.php">Over ons</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="row d-flex justify-content-center mt-2">
        <div class="title">
            <h2 class="text-center">
                Onze Vacatures
            </h2>
        </div>
        <?php
            foreach ($result as $job) {
                echo "
                    <div class='col-lg-2 col-md-4 col-sm6 border rounded m-3 p-3'>
                        <div class='container-fluid'>
                            <h4 class='header text-center'>$job[name]</h4>
                            <div class='banner-img'>
                                <img src=$job[img] alt='cover image' class='img-fluid rounded'>
                            </div>
                            <div class='pay-and-hours'>
                                <p class='text-center'>€$job[pay_monthly]/maand (bruto)</p>
                                <p class='text-center'>$job[hours_weekly] uur/week</p>
                            </div>
                            <div class='footer text-center'>
                                <a href='job_detail.php?id=" . $job['id'] . "'>View more</a>
                           </div>
                        </div>
                    </div>
                    ";
            }
        ?>
    </div>
</main>
</body>