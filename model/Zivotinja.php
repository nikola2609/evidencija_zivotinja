<?php

class Zivotinja
{
    private $id;
    private $ime;
    private $vrsta_id;
    private $korisnik_id;
    private $otac_id;
    private $majka_id;
    private $datumRodjenja;
    private $pol;
    private $status;
    private $napomena;


    public function __construct($id=null, $ime=null, $vrsta_id=null, $korisnik_id=null, $otac_id=null, $majka_id=null,$datumRodjenja=null,$pol=null ,$status=null, $napomena=null)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->vrsta_id = $vrsta_id;
        $this->korisnik_id = $korisnik_id;
        $this->otac_id = $otac_id;
        $this->majka_id = $majka_id;
        $this->datumRodjenja = $datumRodjenja;
        $this->pol = $pol;
        $this->status = $status;
        $this->napomena = $napomena;
    }


    public function add(mysqli $conn){
        $upit = "INSERT INTO zivotinje (ime,vrsta_id,korisnik_id,otac_id,majka_id,datumRodjenja,pol,status,napomena) 
                 VALUES ('$this->ime','$this->vrsta_id','$this->korisnik_id','$this->otac_id','$this->majka_id','$this->datumRodjenja','$this->pol' ,'$this->status','$this->napomena');";
        return $conn->query($upit);
    }

    public function update(mysqli $conn){
        $upit = "UPDATE zivotinje set ime = '$this->ime',vrsta_id = '$this->vrsta_id',
                   korisnik_id = '$this->korisnik_id',otac_id = '$this->otac_id', majka_id='$this->majka_id',
                    datumRodjenja='$this->datumRodjenja', pol='$this->pol',
                   status='$this->status',napomena='$this->napomena'   WHERE id=$this->id";
        return $conn->query($upit);
    }

    public function delete(mysqli $conn){
        $upit = "DELETE FROM zivotinje WHERE id='$this->id'";
        return $conn->query($upit);
    }

    public static function getAll(mysqli $conn)
    {
        $upit = "SELECT * FROM zivotinje";
        return $conn->query($upit);
    }


    public static function getZivotinja($id, mysqli $conn){
        $upit = "SELECT * FROM zivotinje WHERE id='$id'";

        $zivotinja = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $zivotinja[]= $red;
            }
        }

        return $zivotinja;
    }
}