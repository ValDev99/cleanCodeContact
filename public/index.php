<?php
require ('../config/co_bdd.php');
require ('../classes/ContactManager.php') ;

$contactManager = new ContactManager($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['phonenumber'])) {
    $username = trim($_POST['username']);
    $phonenumber = trim($_POST['phonenumber']);

    if (!empty($username) && !empty($phonenumber)) {
        $contactManager->addContact($username, $phonenumber);
    }
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $contactManager->deleteContact($id);
}

$contacts = $contactManager->getAllContacts();

include '../views/header.php';
include '../views/contactsList.php';
include '../views/footer.php';
