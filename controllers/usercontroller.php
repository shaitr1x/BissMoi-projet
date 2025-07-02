<?php
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../models/product.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class usercontroller {
    //appel des vues

   public static function dashboardclient()
{
    $produitsPopulaires = Produit::getPopular();
    require_once __DIR__ . '/../views/client/dashboardclient.php';
}

    public static function accueil() {
    $produitsPopulaires = Produit::getPopular();
        require_once __DIR__ . '/../views/accueil.php';
    }
    public static function dashboardcommercant()
    {
         if (session_status() === PHP_SESSION_NONE) session_start();
    $id_commercant = $_SESSION['user']['id'];
    $produits = Produit::getPopularbycommercant(4,$id_commercant);
    require_once __DIR__ . '/../views/commercant/dashboardcommercant.php';
    }
     public static function dashboardadmin()
    {
         require_once __DIR__ . '/../views/admin/dashboardadmin.php';
    }
    public static function gestionProduit()
    {   
         $id_commercant = $_SESSION['user']['id'];
         $produits = Produit::getAllByMerchant($id_commercant);
        require_once __DIR__ . '/../views/commercant/gestion_de_produit.php';
    }


    public static function gestionProduct() {
    $produits = Produit::getAll(); // Récupération des produits de la BDD
    require_once __DIR__ . '/../views/commercant/gestion_de_produits.php';
}
     // connexion
     public static function login()
      {
        if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = new User();
            $authenticatedUser = $user->authenticate($username, $password);

            if ($authenticatedUser) {
                $_SESSION['user'] = [
                    'id' => $authenticatedUser->getId(),
                    'name' => $authenticatedUser->getName(),
                    'role' => $authenticatedUser->getRole(),
                ];
                switch ($_SESSION['user']['role']) {
    case 'client':
        header('Location: index.php?controller=user&action=dashboardclient');
        break;

    case 'admin':
        header('Location: index.php?controller=user&action=dashboardadmin');
        break;

    case 'merchant':
        header('Location: index.php?controller=user&action=dashboardcommercant');
        break;

    default:
        header('Location: index.php?controller=user&action=login');
        break;
}      
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } else {
            require_once __DIR__ . '/../views/login.php';
        }
    }

    //inscription 
        public static function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = new User();
            $success = $user->register($name, $email, $password);

            if ($success) {
                header('Location: index.php?controller=user&action=login');
            } else {
                echo "Erreur lors de l'inscription.";
            }
        } else {
            require_once __DIR__ . '/../views/register.php';
        }
    }
    //mise à jour du role
public static function updaterole() {
    if (session_status() === PHP_SESSION_NONE) session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['user_id'] ?? '';

        $user = new User();
        $success = $user->updaterole($id); 

        if ($success) {
            $_SESSION['user']['role'] = 'merchant';

            header('Location: index.php?controller=user&action=dashboardcommercant');
            exit;           
        } else {
            echo "Erreur lors de la mise à jour du rôle.";
        }
    } else {
        require_once __DIR__ . '/../views/client/devenircom.php';
    }
}


    //deconnexion

    public static function logout() {
    session_start();
    $_SESSION = [];
    session_destroy();
    header('Location: index.php?controller=user&action=accueil');
    exit;
}

    
}
