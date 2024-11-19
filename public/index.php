<?php
require_once "../config/co_bdd.php";
require_once "../classes/ContactManager.php" ;

$contactManager = new ContactManager($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['phonenumber'])) {
    $username = trim($_POST['username']);
    $phonenumber = trim($_POST['phonenumber']);
    $id = isset($_POST['id']) ? (int)$_POST['id'] : null;

    if (!empty($username) && !empty($phonenumber)) {
        if ($id) {
            $contactManager->updateContact($id, $username, $phonenumber);
        } else {
            $contactManager->addContact($username, $phonenumber);
        }
    }
}

$contactToEdit = null;
if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $contactToEdit = $contactManager->getContactById($id);
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $contactManager->deleteContact($id);
}

$contacts = $contactManager->getAllContacts();

include_once '../views/header.php';
include_once '../views/contactsList.php';
include_once '../views/footer.php';

