<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Телефонный справочник</title>
</head>
<body>
    <div class="form-container">
        <div class="header-form">Телефонный справочник</div>

        <form action="app/add_contact.php" method="post" class="contact-form">
            <input type="text" id="name" name="name" required placeholder="Введите имя" class="form-input">
            <input type="text" id="phone" name="phone" required placeholder="Введите номер" class="form-input">
            <button type="submit" class="form-button">Добавить</button>
        </form>
    </div>

    <hr>

    <div class="contact-list-container">
        <div class="header-contact-list">Список контактов</div>

        <table class="table-contact-list">
            <tr>
                <th class="th-name">Имя</th>
                <th class="th-phone">Телефонный номер</th>
                <th class="th-actions">Действия</th>
            </tr>
            <?php
                $contacts = json_decode(file_get_contents('contact.json'), true);
                foreach ($contacts as $contact) {
                    echo "<tr>";
                    echo "<td class='td-name'>{$contact['name']}</td>";
                    echo "<td class='td-phone'>{$contact['phone']}</td>";
                    echo "<td class='td-delete-button'><a href='app/delete_contact.php?id={$contact['id']}'>Удалить</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>