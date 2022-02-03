<?php
session_start();

if (!isset($_SESSION['current_user'])) {
    header('Location: index.php');
    exit();
}

require "Database.php";
require "model/Korisnik.php";
require "model/VrstaZivotinje.php";

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
        <h2>Vrsta životinje</h2>
    </div>

    <div class="forma">
        <form method="post" id="formaVrsta">
            <input type="hidden" name="id" value="">

            <div class="input-group mb-3 container">
                <input class="form-control" type="text" name="naziv" placeholder="Naziv" value="">
            </div>
            <div class="input-group mb-3 container">
                <input class="form-control" type="text" name="vrsta" placeholder="Vrsta" value="">
            </div>

            <div class="input-group mb-3 container">
                <textarea class="form-control" name="opis" placeholder="Opis" value=""></textarea>
            </div>



            <div class="d-grid gap-2 d-md-block">
                <button type="submit"  class="btn btn-success" style="background-color: rgba(27,133,24,0.76)">Sačuvaj vrstu</button>
                <button type="reset" id="resetVrsta" class="btn btn-primary">Reset forme</button>
                <button type="button" id="obrisiVrstu" class="btn btn-danger" style="background-color: rgba(238,5,5,0.8)" >Obrisi vrstu</button>
            </div>

        </form>
    </div>

    <div class="prikazPodataka">
        <div class="d-flex p-1 justify-content-center align-items-center">
            <div>
                <h3>Vrste</h3>
            </div>
            <div class="w-50 p-3">
                <input class="form-control" type="text" placeholder="pretraga" id="pretraga">
            </div>
            <div>
                <input class="form-control" type="button" id="sortBtn" value="sortiraj">
            </div>
        </div>

       <div class="row row-cols-1 row-cols-sm-2 g-3">
           <?php
           $vrste=VrstaZivotinje::getAll($konekcija);
           while (($vrsta=$vrste->fetch_assoc())!=null){?>

           <div class="col">
               <div class="card" style="background-color: rgba(42,57,89,0.87);">
                   <div class="card-body">
                       <h5 class="card-title"><?=$vrsta['naziv']?></h5>
                       <p class="card-text"><?=$vrsta['vrsta']?></p>
                       <p class="card-text"><?=$vrsta['opis']?></p>
                       <input type="radio" name="vrstaCheck" value="<?=$vrsta['id']?>">
               </div>
           </div>
       </div>

        <?php }
        ?>
       </div>



    </div>
</div>



<br>
<br>
<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/vrstaZivotinje.js"></script>
</body>
</html>

