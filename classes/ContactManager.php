<?php
class ContactManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function addContact($username, $phonenumber) {
        $stmt = $this->pdo->prepare('INSERT INTO contact (username, phonenumber) VALUES (:username, :phonenumber)');
        $stmt->execute(['username' => $username, 'phonenumber' => $phonenumber]);
    }

    public function getAllContacts() {
        $stmt = $this->pdo->query('SELECT * FROM contact');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteContact($id) {
        $stmt = $this->pdo->prepare('DELETE FROM contact WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
