<?php
 require_once __DIR__ . '/../config/database.php';

class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $phone;
    private $role;
    private $status;
    private $created_at;

    public function __construct($id = null, $name = "", $password = "", $email = "", $phone = "", $role = "") {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
        $this->role = $role;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getPassword() { return $this->password; }
    public function getEmail() { return $this->email; }
    public function getPhone() { return $this->phone; }
    public function getRole() { return $this->role; }

    // Setters
    public function setName($name) { $this->name = $name; }
    public function setPassword($password) { $this->password = $password; }
    public function setEmail($email) { $this->email = $email; }
    public function setPhone($phone) { $this->phone = $phone; }
    public function setRole($role) { $this->role = $role; }

    // Authentifier
    public function authenticate($username, $password) {
        $con = connexion::connect();
        $stmt = $con->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user->getPassword())) {
            return $user;
        }
        return false;
    }

    // Récupérer un utilisateur par ID
    public function getUserById($id) {
        $con = connexion::connect();
        $stmt = $con->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        return $stmt->fetch();
    }

// Inscription
public function register($name, $email, $password) {
    $con = connexion::connect();

    //  Hachage du mot de passe
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $con->prepare("INSERT INTO users (name, email, password) 
                           VALUES (:name, :email, :password)");

    return $stmt->execute([
        'name' => $name,
        'email' => $email,
        'password' => $passwordHash,
    ]);
}

//update role
public function updaterole($id)
{
    $con = connexion::connect();
    $sql = "UPDATE users SET role = 'merchant' WHERE id = :id;";
    $stmt = $con->prepare($sql);
    return $stmt->execute(['id' => $id]);
}



}
