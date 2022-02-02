<?php

class VrstaZivotinje
{

    private $id;
    private $naziv;
    private $vrsta;
    private $opis;


    public function __construct($id=null, $naziv=null, $vrsta=null, $opis=null)
    {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->vrsta = $vrsta;
        $this->opis = $opis;
    }


    public function add(mysqli $conn){
        $upit = "INSERT INTO vrstazivotinje (naziv,vrsta,opis) 
                 VALUES ('$this->naziv','$this->vrsta','$this->opis');";
        return $conn->query($upit);
    }

    public function update(mysqli $conn){
        $upit = "UPDATE vrstazivotinje set naziv = '$this->naziv',vrsta = '$this->vrsta',
                   opis = '$this->opis'  WHERE id='$this->id'";
        return $conn->query($upit);
    }

    public function delete(mysqli $conn){
        $upit = "DELETE FROM vrstazivotinje WHERE id='$this->id'";
        return $conn->query($upit);
    }

    public static function getAll(mysqli $conn)
    {
        $upit = "SELECT * FROM vrstazivotinje";
        return $conn->query($upit);
    }


    public static function getVrstaZivotinje($id, mysqli $conn){
        $upit = "SELECT * FROM vrstazivotinje WHERE id='$id'";

        $vrstaZ = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $vrstaZ[]= $red;
            }
        }

        return $vrstaZ;
    }


}