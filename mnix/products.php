<?php

require_once(__DIR__ . '/../controller.php');
require_once(__DIR__ . '/../models/MenuModel.php');

class ProductListController {
    private $menuModel;

    public function __construct($db) {
        $this->menuModel = new MenuModel($db);
    }

    public function handle($get) {
        $products = $this->menuModel->getAll();
        session_start();
        if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
            header("Location: ?action=login");
            exit;
        }

        include(__DIR__ . '/../views/list_products.php');
    }
}

?>
