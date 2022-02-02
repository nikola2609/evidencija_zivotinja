<?php
require "Database.php";
require "model/Prijava.php";

$greska="";
session_start();

if (isset($_SESSION['current_user'])) {
    header('Location: pocetna.php');
    exit();
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $odg=Prijava::prijaviSe($conn,$username,$password);
    if($odg!=null && $odg->num_rows==1){
        $red=$odg->fetch_assoc();
        $_SESSION['current_user']=$red['username'];
        header('Location: pocetna.php');
        exit();
    }else{
        $greska="Pogrešno korisničko ime ili lozinka!";
    }
}
?>