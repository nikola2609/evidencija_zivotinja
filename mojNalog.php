<?php
session_start();

if (!isset($_SESSION['current_user'])) {
    header('Location: index.php');
    exit();
}

require "Database.php";
require "model/Korisnik.php";

$korisnik = Korisnik::getKorisnikUsername($_SESSION['current_user'],$konekcija)[0];


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evidencija zivotinja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="header">
    <div class="naslov">
        <h1>Evidencija zivotinja</h1>
    </div>

    <div class="navigacija d-flex justify-content-between">
        <ul class="nav" id="navigacija-lista" >
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="pocetna.php">Početna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="vrstaZivotinje.php">Vrsta Životinje</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="zivotinja.php">Životinja</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mojNalog.php">Moj nalog</a>
            </li>
            <li class="nav-item">
                <p class="">Prijavljen na sistem: <?=$_SESSION['current_user']?></p>
            </li>
        </ul>
        <div>
            <a class="btn btn-danger" href="odjava.php">Odjavi se</a>
        </div>
    </div>
</div>

<div class="content">
    <div class="naslov">
        <h2>Moj nalog</h2>
    </div>

    <div class="forma">
    <form method="post" id="formaRegistracija">
            <input type="hidden" name="id" value="<?=$korisnik['id']?>">

            <div class="input-group mb-3 container">
                <input class="form-control" type="text" name="username" placeholder="Username" value="<?=$korisnik['username']?>">
            </div>
            <div class="input-group mb-3 container">
                <input class="form-control" type="password" name="password" placeholder="Password" value="">
            </div>

            <div class="input-group mb-3 container">
                <input class="form-control" type="text" name="ime" placeholder="Ime" value="<?=$korisnik['ime']?>">
            </div>
            <div class="input-group mb-3 container">
                <input class="form-control" type="text" name="prezime" placeholder="Prezime" value="<?=$korisnik['prezime']?>">
            </div>
            <div class="input-group mb-3 container">
                <input class="form-control" type="date" name="datumrodjenja" value="<?=$korisnik['datumRodjenja']?>">
            </div>

            <div class="form-check container">
                <input class="form-check-input" type="radio" name="pol" value="M" id="radioM" <?php if($korisnik['pol']=='M') echo 'checked';?>>
                <label class="form-check-label" for="radioM">
                    Muški
                </label>
            </div>
            <div class="form-check container">
                <input class="form-check-input" type="radio" name="pol" value="Z" id="radioZ" <?php if($korisnik['pol']=='Z') echo 'checked';?>>
                <label class="form-check-label" for="radioZ">
                    Ženski
                </label>
            </div>

            <div class="d-grid gap-2 d-md-block">
                <button type="submit"  class="btn btn-success" style="background-color: rgba(27,133,24,0.76)">Izmeni nalog</button>
                <button type="button" id="obrisiNalogBtn" class="btn btn-danger" style="background-color: rgba(238,5,5,0.8)" >Obrisi nalog</button>
            </div>

        </form>
    </div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/mojNalog.js"></script>
</body>
</html>

