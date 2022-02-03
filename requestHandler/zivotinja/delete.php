<?php

require "../../Database.php";
require "../../model/Zivotinja.php";

if(isset($_POST['id'])){

    $zivotinja = new Zivotinja($_POST['id']);

    $status = $zivotinja->delete($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>