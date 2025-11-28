<?php

class user{
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function create($first_name, $last_name, $phone_number, $email, $password, $role) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $this->db->prepare("INSERT INTO users (first_name, last_name, phone_number, email, password, role) VALUES (?, ?, ?, ?, ?, ?)");
        return $query->execute([$first_name, $last_name, $phone_number, $email, $hash, $role]);
    }


    public function update($id_user, $first_name, $last_name, $phone_number, $email, $password = null, $role = null) {
    if (!empty($password)) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        if ($role !== null) {
            $query = $this->db->prepare("UPDATE users SET first_name = ?, last_name = ?, phone_number = ?, email = ?, password = ?, role = ? WHERE id_user = ?");
            return $query->execute([$first_name, $last_name, $phone_number, $email, $hash, $role, $id_user]);
        } else {
            $query = $this->db->prepare("UPDATE users SET first_name = ?, last_name = ?, phone_number = ?, email = ?, password = ? WHERE id_user = ?");
            return $query->execute([$first_name, $last_name, $phone_number, $email, $hash, $id_user]);
        }
    } else {
        if ($role !== null) {
            $query = $this->db->prepare("UPDATE users SET first_name = ?, last_name = ?, phone_number = ?, email = ?, role = ? WHERE id_user = ?");
            return $query->execute([$first_name, $last_name, $phone_number, $email, $role, $id_user]);
        } else {
            $query = $this->db->prepare("UPDATE users SET first_name = ?, last_name = ?, phone_number = ?, email = ? WHERE id_user = ?");
            return $query->execute([$first_name, $last_name, $phone_number, $email, $id_user]);
        }
    }
}


    public function delete($id_user) {
        $query = $this->db->prepare("DELETE FROM users WHERE id_user = ?");
        return $query->execute([$id_user]);
    }


    public function findAllUsers() {
        $query = $this->db->query("SELECT id_user, first_name, last_name, email, phone_number, role FROM users ORDER BY id_user DESC");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    public function findById($id_user){
        $query = $this->db->prepare("SELECT * from users WHERE id_user = ?");
        $query ->execute([$id_user]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
     
    public function findByEmail($email){
        $query = $this->db->prepare("SELECT * from users WHERE email = ?");
        $query ->execute([$email]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function emailExist($email, $exclude_id = null) {
        if ($exclude_id) {
            $query = $this->db->prepare("SELECT id_user FROM users WHERE email = ? AND id_user != ?");
            $query->execute([$email, $exclude_id]);
        } else {
            $query = $this->db->prepare("SELECT id_user FROM users WHERE email = ?");
            $query->execute([$email]);
        }
        return $query->fetch(PDO::FETCH_ASSOC) !== false;
    }  
}

?>