<?php
use config\co_bdd;
use classes\ContactManager ;

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

use views\header;
use views\contactsList;
use views\footer;

