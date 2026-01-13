<?php
class Categorie extends BaseModel {
private int $id;
private string $nom ;
private $vehicules=[];


public function __construct(PDO $pdo , int $id=0,string $nom =''){
    parent::__construct($pdo);
    $this->$id;
    $this->$nom;
}
// GETTERS 
public function getId(): int {return $this->id ;}
public function getNom(): string {return $this->nom ;}
public function getVehicules(): arry {return $this->vehicules;}

public function loadVehicules():void{ }

public function save(): bool {

    return true ;
}
public static function find(int $id){
    
}

}
?>