<?php
class Vehicule extends BaseModel {
    private int $id ;
    private string $modele ;
    private float $prix ;
    private int $categorie_id;

    public function __construct(PDO $pdo , int $id=0,string $modele='',float $prix=0,int $categorie_id=0 ){
        parent::__construct($pdo);
        $this->id=$id;
        $this->modele=$modele;
        $this->prix=$prix;
        $this->categorie_id=$categorie_id;
    }
    //getters
    public function getId(): int {return $this->id;}
    public function getModel():string {return $this->modele;}
    public function getPrix():float {return $this->prix;}
    public function getCategorieId():int {return $this->categorie_id;}

 
    public function save(): bool {
        if ($this->id > 0) {
             $sql = "UPDATE vehicules SET modele = :modele, prix = :prix, categorie_id = :cat_id WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                'modele' => $this->modele,
                'prix'   => $this->prix,
                'cat_id' => $this->categorie_id,
                'id'     => $this->id
            ]);
        } else {

             $sql = "INSERT INTO vehicules (modele, prix, categorie_id) VALUES (:modele, :prix, :cat_id)";
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([
                'modele' => $this->modele,
                'prix'   => $this->prix,
                'cat_id' => $this->categorie_id
            ]);
             if ($result) {
                $this->id =$this->db->lastInsertId();
            }
            return $result;
        }
    }

     
                    
      
    public static function find(PDO $pdo, int $id): ?Vehicule {
        $stmt = $pdo->prepare("SELECT * FROM vehicules WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($data) {
             return new Vehicule($pdo, $data['id'], $data['modele'], $data['prix'], $data['categorie_id']);
        }
        return null;
    }




}





?>