<?php

class MacaronixIndexController {
    private $menuModel;

    public function __construct($db) {
        $this->menuModel = new MenuModel($db);
    }
    public function handle($get) {
        $products = $this->menuModel->getAll();
        include(__DIR__ . '/../views/carouselmenu.php');
    }

    public function handlePost($get, $post) {
        
    }
}
?>