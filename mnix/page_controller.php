<?php

class page_controller{
    private $db;
    private $menuModel;

    public function __construct($db){
        $this->db = $db;
        $this->menuModel = new MenuModel($db);

    }

    public function handle($get){
        $page = $get['page'] ?? 'accueil';

        switch ($page) {
            case 'accueil':
                 $products = $this->menuModel->getAll();
                require 'views/accueil.php';
                break;
            default:
                http_response_code(404);
                $error = "page non trouvée";
                require '404.php';
                exit;
       }
    }

}
?>
