<?php
class MenuModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    
    public function getAll() {
        $query = $this->db->query("SELECT p.id_product, p.name AS product_name, p.prix, p.ingredients, p.available, p.image_path, c.name AS category_name 
        FROM products p
        JOIN 
        categories c ON p.id_category = c.id_category
        ORDER BY 
        p.id_category
        ");
        $products = $query->fetchAll();
        return $products ?: [];

    }

    public function getById($id) {
        $query = $this->db->prepare("SELECT p.id_product, p.name AS product_name, p.ingredients, p.prix, p.id_category, p.available, p.image_path, c.name AS category_name
        FROM products p
        JOIN categories c 
        ON p.id_category = c.id_category
        WHERE p.id_product = ?");
        $query->execute([$id]);
        $product = $query->fetch();

        if (!$product) {
            return null;
        } else {
            
            return $product;
        }
    }

    public function getByCategoryId($categoryId) {
        $query = $this->db->prepare("SELECT p.id_product, p.name AS product_name, p.prix, p.available, c.name AS category_name
        FROM products p
        JOIN categories c ON p.id_category = c.id_category
        WHERE p.id_category = ?");
        $query->execute([$categoryId]);
        $products = $query->fetchAll();
        return $products ?: [];
    }


    public function insert($name, $ingredients, $prix, $id_category, $available, $imagePath) {
        $query = $this->db->prepare("INSERT INTO products (name, ingredients, prix, id_category, available, image_path)
        VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$name, $ingredients, $prix, $id_category, $available, $imagePath]);
        return $this->db->lastInsertId();
        
    }

    public function update($id, $name, $ingredients, $prix, $id_category, $available, $imagePath) {
        $query = $this->db->prepare("UPDATE products SET name=?, ingredients=?, prix=?, id_category=?, available=?, image_path=? WHERE id_product=?");
        $query->execute([$name, $ingredients, $prix, $id_category, $available, $imagePath, $id]);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM products WHERE id_product=?");
        $query->execute([$id]);
    }
}




?>