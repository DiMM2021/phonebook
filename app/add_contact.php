<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['phone'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $contacts = json_decode(file_get_contents('../contact.json'), true);

    $newContact = [
        'id' => uniqid(), 
        'name' => $name,
        'phone' => $phone
    ];

    $contacts[] = $newContact;

    file_put_contents('../contact.json', json_encode($contacts, JSON_UNESCAPED_UNICODE));

    header('Location: ../index.php'); 
    exit;
}
?>