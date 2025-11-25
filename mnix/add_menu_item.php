<?php

require_once(__DIR__ . '/../controller.php');
require_once(__DIR__ . '/../helpers.php');
require_once(__DIR__ . '/../models/MenuModel.php');


class AddProductController {
    private $menuModel;

    public function __construct($db) {
        $this->menuModel = new MenuModel($db);
    }

    public function handle($get) {
        include(__DIR__ . '/../views/add_product.php');
    }

    public function handlePost($get, $post) {
    $erreur = null;

    if (
        isset($post['name']) &&
        isset($post['ingredients']) &&
        isset($post['prix']) &&
        isset($post['id_category']) &&
        isset($post['available']) &&
        isset($_FILES['image_path'])
    ) {
        $name = trim($post['name']);
        $ingredients = trim($post['ingredients']);
        $ingredients = $ingredients !== '' ? $ingredients : null;
        $prix = floatval($post['prix']);
        $id_category = intval($post['id_category']);
        $available = intval($post['available']);
        $image = $_FILES['image_path'];
        $imagePath = null;

        if (
            empty($name) ||
            $prix <= 0 ||
            !in_array($id_category, [1, 2, 3, 4]) ||
            !in_array($available, [0, 1]) ||
            $image['error'] !== UPLOAD_ERR_OK
        ) {
            $erreur = "Tous les champs obligatoires doivent être correctement remplis";
        } else {
           
            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];
            $maxSize = 2 * 1024 * 1024; 

            if (!in_array($image['type'], $allowedTypes)) {
                $erreur = "Type d’image non autorisé. Seuls JPEG, PNG, JPG ou WEBP sont acceptés.";
            } elseif ($image['size'] > $maxSize) {
                $erreur = "L’image dépasse la taille maximale autorisée (2 Mo).";
            } else {
               
                $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
                $newFileName = uuid() . '.' . $ext;
                $destination = __DIR__ . '/../uploads/' . $newFileName;

                if (move_uploaded_file($image['tmp_name'], $destination)) {
                    $imagePath = 'uploads/' . $newFileName;

                    
                    $this->menuModel->insert($name, $ingredients, $prix, $id_category, $available, $imagePath);

                    header("Location: ?action=products");
                    exit;
                } else {
                    $erreur = "Erreur lors du téléchargement de l’image.";
                }
            }
        }
    } else {
        $erreur = "Formulaire incomplet.";
    }
    session_start();
    if (!isset($_SESSION['id_user']) || $_SESSION['role'] !== 'admin') {
        header("Location: ?action=login");
        exit;
    }

    include(__DIR__ . '/../views/add_product.php');
}
}          

?>
