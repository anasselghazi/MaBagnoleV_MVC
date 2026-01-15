 <?php

class CategoryManager extends BaseModel {

    public function getAllWithVehicules(): array {
        $sql = "SELECT c.id AS cat_id, c.nom AS cat_nom, 
                       v.id AS veh_id, v.modele, v.prix 
                FROM categories c
                LEFT JOIN vehicules v ON c.id = v.categorie_id
                ORDER BY c.id";

        $stmt = $this->db->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $categories = [];
        foreach ($rows as $row) {
            $id = $row['cat_id'];
            if (!isset($categories[$id])) {
                $categories[$id] = [
                    'id' => $id,
                    'nom' => $row['cat_nom'],
                    'vehicules' => []
                ];
            }
            if ($row['veh_id']) {
                $categories[$id]['vehicules'][] = [
                    'id' => $row['veh_id'],
                    'modele' => $row['modele'],
                    'prix' => $row['prix']
                ];
            }
        }
        return array_values($categories);
    }

 
    public function save(): bool {
    return false;
}

 public static function find(int $id) {
    return null;
}
}