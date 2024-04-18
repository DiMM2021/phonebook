<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $contacts = json_decode(file_get_contents('../contact.json'), true);

    foreach ($contacts as $key => $contact) {
        if ($contact['id'] === $id) {
            unset($contacts[$key]);
            break;
        }
    }

    file_put_contents('../contact.json', json_encode(array_values($contacts), JSON_UNESCAPED_UNICODE)); 

    header('Location: ../index.php'); 
    exit;
}
?>