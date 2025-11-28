<?php
require_once(__DIR__ . '/../models/user.php');
require_once(__DIR__ . '/../models/commandeModel.php');

class auth_controller{
    private $db;
    private $userModel;
    private $commandeModel;

    public function __construct($db){
        $this->db = $db;
        $this->userModel = new user($this->db);
        $this->commandeModel = new commandeModel($this->db);

    }

    public function handle($get){
        $action = $get['action'] ?? 'accueil';
        $error = null;

        switch ($action) {
            case 'login':
                require 'views/login.php';
                break;
            case 'accueil':
                require 'views/accueil.php';
                break;
            case 'create_account':
                require 'views/create_account.php';
                break;

            case 'my_orders':
                session_start();
                if(!isset($_SESSION['id_user'])){
                    $error = "Vous devez être connectés pour voir cette page";
                    header("Location: ?action=login");
                    exit;
                  }   

                $listOrders = $this->commandeModel->getAllDashboard();
                $orders = [];

                foreach ($listOrders as $order) {
                    $order['items'] = $this->commandeModel->getOrderItemsSummary($order['id_commande']);
                    $orders[] = $order;
                }
               
                require 'views/my_orders.php';
                break;   
            
            case 'my_account':
                session_start();
                if(!isset($_SESSION['id_user'])){
                    $error = "Vous devez être connectés pour voir cette page";
                    header("Location: ?action=login");
                    exit;
                } 
                $user = $this->userModel->findById($_SESSION['id_user']);
                require 'views/my_account.php';
                break;

            case 'dashboard':
                session_start();
                if(!isset($_SESSION['id_user'])){
                    $error = "Vous devez être connectés pour voir cette page";
                    header("Location: ?action=login");
                    exit;
                }    
                require 'views/dashboard.php';
                break;


            case 'manage_orders':
                 session_start();
                if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
                    header("Location: ?action=login");
                    exit;
                }

                $editOrder = null;
                if (isset($_GET['edit_id'])) {
                    $editOrder = $this->commandeModel->getByIdDashboard($_GET['edit_id']);
                }

                $listOrders = $this->commandeModel->getAllDashboard();
                $orders = [];

                foreach ($listOrders as $order) {
                    $order['items'] = $this->commandeModel->getOrderItemsSummary($order['id_commande']);
                    $orders[] = $order;
                }

                require 'views/manage_orders.php';
                break;

            case 'edit_order':
                session_start();
                if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
                    header("Location: ?action=login");
                    exit;
                }

                $id_commande = $_GET['id'] ?? null;
                if (!$id_commande) {
                    header("Location: ?action=manage_orders");
                    exit;
                }

                $order = $this->commandeModel->getByIdDashboard($id_commande);
                require 'views/edit_order.php';
                break;


            case 'manage_accounts':
                session_start();
                if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
                    header("Location: ?action=login");
                    exit;
                }

                $editUser = null;
                if (isset($_GET['edit_id'])) {
                    $editUser = $this->userModel->findById($_GET['edit_id']);
                }

                $users = $this->userModel->findAllUsers();
                require 'views/manage_accounts.php';
                break;

            case 'delete_user':
                session_start();
                if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
                    header("Location: ?action=login");
                    exit;
                }
                $id_user = $_GET['id_user'] ?? null;
                if ($id_user) {
                    $this->userModel->delete($id_user);
                }
                header("Location: ?action=manage_accounts");
                exit;


            case 'logout':
                $this->logout();
                exit;

            default:
                http_response_code(404);
                $error = "Page non trouvée";
                require '404.php';
                exit;
       }
    }

    public function handlePost($get,$post){
        $action = $get['action'] ?? 'accueil';
        $error = null;
        $success = null;

        switch($action){
            case 'login':
                $email = htmlspecialchars(trim($post['email'] ?? ''));
                $password = $post['password'] ?? '';
                $user = $this->userModel->findByEmail($email);

                if ($user && password_verify($post['password'],$user['password'])){
                    session_start();
                    $_SESSION['id_user'] = $user['id_user'];
                    $_SESSION['role'] = $user['role'] ?? 'client';
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];

                    header("Location: ?action=dashboard");
                    exit;
                }
                else{
                    $error = "Identifiants invalides";
                    require  'views/login.php';
                    return;
                }

                break;

            case 'create_account':
                
                $first_name = htmlspecialchars(trim($post['first_name'] ?? ''));
                $last_name = htmlspecialchars(trim($post['last_name'] ?? ''));
                $phone_number = htmlspecialchars(trim($post['phone_number'] ?? ''));
                $email = htmlspecialchars(trim($post['email'] ?? ''));
                $role = 'client';
                $password = $post['password'] ?? '';

                if(!empty($email) && !empty($password)){

                    //Vérifier si l'email n'est pas déja pris.
                    if($this->userModel->emailExist($email)){
                        $error = "Ce courriel est déjà utilisé par un autre compte";
                        require  'views/create_account.php';
                        return;
                    }

                    $this->userModel->create($first_name, $last_name, $phone_number, $email, $password, $role);
                    header("Location: ?action=login");
                    exit;
                }
                else{
                    $error = "Veuillez remplir tous les champs";
                }
                require 'views/create_account.php';
                break;

            case 'my_account':

                session_start();
                if(!isset($_SESSION['id_user'])){
                    header("Location: ?action=login");
                    exit;
                }

             if (isset($post['update_account'])) {
                $id_user = $_SESSION['id_user'];
                $first_name = htmlspecialchars(trim($post['first_name'] ?? ''));
                $last_name = htmlspecialchars(trim($post['last_name'] ?? ''));
                $phone_number = htmlspecialchars(trim($post['phone_number'] ?? ''));
                $email = htmlspecialchars(trim($post['email'] ?? ''));
                $password = trim($post['password'] ?? '');


                $user = $this->userModel->findByEmail($email);
               //Vérifier si l'email n'est pas déja pris.
                if($this->userModel->emailExist($email,$id_user)){
                    $error =  "Ce courriel est déjà associé à un autre compte";
                    require  'views/my_account.php';
                    return;
                }else{
                    $this->userModel->update($id_user, $first_name, $last_name, $phone_number, $email, $password);
                    $success = "Les modifications ont été enregistrées avec succès";
                    $user = $this->userModel->findById($id_user);

                }
             
                if (!isset($user)) {
                        $user = $this->userModel->findById($_SESSION['id_user']);
                    }
                }      
                require 'views/my_account.php';
                break;

            case 'manage_accounts':
                    session_start();
                    if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
                        header("Location: ?action=login");
                        exit;
                    }

                    if (isset($post['create_user'])) {
                        $first_name = htmlspecialchars(trim($post['first_name']));
                        $last_name = htmlspecialchars(trim($post['last_name']));
                        $phone_number = htmlspecialchars(trim($post['phone_number']));
                        $email = htmlspecialchars(trim($post['email']));
                        $role = htmlspecialchars(trim($post['role']));
                        $password = trim($post['password']);

                        if (empty($email) || empty($password)) {
                            $error = "Veuillez fournir un courriel et un mot de passe.";
                        } elseif ($this->userModel->emailExist($email)) {
                            $error = "Email déjà utilisé.";
                        } else {
                            $this->userModel->create($first_name, $last_name, $phone_number, $email, $password, $role);
                            $success = "Utilisateur ajouté avec succès.";
                        }
                    }


                    if (isset($post['update_user'])) {
                        $id_user = $post['id_user'];
                        $first_name = htmlspecialchars(trim($post['first_name']));
                        $last_name = htmlspecialchars(trim($post['last_name']));
                        $phone_number = htmlspecialchars(trim($post['phone_number']));
                        $email = htmlspecialchars(trim($post['email']));
                        $role = htmlspecialchars(trim($post['role']));
                        $password = trim($post['password']);

                        // Empêcher les doublons d'email
                        if ($this->userModel->emailExist($email,$id_user)) {
                            $error = "Email déjà utilisé.";
                            $users = $this->userModel->findAllUsers();
                            require 'views/manage_accounts.php';
                            return;
                        }

                        $this->userModel->update($id_user, $first_name, $last_name, $phone_number, $email, $password, $role);
                         $success = "Modifications enregistrées avec succès.";
                    }

                    $users = $this->userModel->findAllUsers();
                    require 'views/manage_accounts.php';
                    break;

         case 'edit_order':
                session_start();
                if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
                    header("Location: ?action=login");
                    exit;
                }
                if (isset($_POST['update_order'])) {

                $id_commande = $_POST['id_commande'] ?? null;
                $status = isset($post['status']) ? intval($post['status']) : null;

                    if ($id_commande && in_array($status, [0, 1], true)) {
                        $updated = $this->commandeModel->updateStatus($id_commande, $status);
                        if ($updated) {
                            
                            header("Location: ?action=manage_orders&success=1");
                            exit;
                        } else {
                            $error = "Erreur lors de la mise à jour.";
                        }
                    } else {
                        $error = "Données invalides.";
                    }
                }
          
                $order = $this->commandeModel->getByIdDashboard($id_commande);
                require 'views/edit_order.php';
                break;


           default:
                $error =  "action POST non valide";
                break;

        }
  
    }

    public function logout(){
        session_start();
        session_unset();
        $_SESSION = [];
        session_destroy();
        header("Location: ?page=accueil");
        exit;

    }
    
}
?>
