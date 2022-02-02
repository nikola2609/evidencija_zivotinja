<?php

require "../../Database.php";
require "../../model/VrstaZivotinje.php";

if(isset($_POST['id'])){

    $obj = VrstaZivotinje::getVrstaZivotinje($_POST['id'],$konekcija);

    echo json_encode($obj);

}

?>