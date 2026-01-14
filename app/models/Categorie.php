<?php
class Categorie extends BaseModel {
private int $id;
private string $nom ;
private $vehicules=[];


public function __construct(PDO $pdo , int $id=0,string $nom =''){
    parent::__construct($pdo);
    $this->id=$id;
    $this->nom=$nom;
}
// GETTERS 
public function getId(): int {return $this->id ;}
public function getNom(): string {return $this->nom ;}
public function getVehicules(): array {return $this->vehicules;}

 
 public function loadVehicules(): void {
        $sql = "SELECT v.* FROM vehicules v 
                INNER JOIN categories c ON v.categorie_id = c.id 
                WHERE c.id = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $this->id]);
        $this->vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     

public function save(): bool {
        if ($this->id > 0) {
            $stmt = $this->db->prepare("UPDATE categories SET nom = :nom WHERE id = :id");
            $result=$stmt->execute(['nom' => $this->nom, 'id' => $this->id]);
            return $result;

        } else {
            $stmt = $this->db->prepare("INSERT INTO categories (nom) VALUES (:nom)");
            $result = $stmt->execute(['nom' => $this->nom]);
            if ($result) {
                 $this->id = $this->db->lastInsertId(); 
                }
            return $result;
        }
    }


public static function find(PDO $pdo, int $id) {
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new Categorie($pdo, $data['id'], $data['nom']);
        }
        return null;
    }
  


}
?>