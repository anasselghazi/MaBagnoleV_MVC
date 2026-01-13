<?php
class Vehicule extends BaseModel {
    private int $id ;
    private string $modele ;
    private float $prix ;
    private int $categorie_id;

    public function __construct(PDO $pdo , int $id=0,string $modele='',float $prix=0,int $categorie_id=0 ){
        parent::__construct($pdo);
        $this->$id;
        $this->$modele;
        $this->$prix;
        $this->$categorie_id;
    }
    //getters
    public function getId(): int {return $this->id;}
    public function getModel():string {return $this->modele;}
    public function getPrix():float {return $this->prix;}
    public function getCategorieId():int {return $this->categorie_id;}

}





?>