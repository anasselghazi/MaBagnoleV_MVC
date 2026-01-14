<?php
class User extends BaseModel {
    private int $id;
    private string $email;
    private string $password;

    public function __construct(PDO $pdo, int $id = 0, string $email = '', string $password = '') {
        parent::__construct($pdo);
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }

     public function login(string $email, string $password): bool {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $this->id = $user['id'];
            $this->email = $user['email'];
            return true; 
        }
        return false; 
    }
}