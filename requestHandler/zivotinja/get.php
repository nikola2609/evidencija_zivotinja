<?php

require "../../Database.php";
require "../../model/Zivotinja.php";

if(isset($_POST['id'])){

    $obj = Zivotinja::getZivotinja($_POST['id'],$konekcija);

    echo json_encode($obj);

}

?>