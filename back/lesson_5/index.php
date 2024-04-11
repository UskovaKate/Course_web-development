<?php
function generateUniqueID() {
    return uniqid();
}
// Запись пользователя в csv
function recordUser($user) {
    $file = fopen('users.csv', 'a');
    fputcsv($file, $user);
    fclose($file);
}


// Запись в csv из формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $id = generateUniqueID();

    $user = [
        $id,
        $name,
        $phone,
        $email
    ];
    recordUser($user);
}

// Чтение пользователей из csv
$users = [];
if (($file = fopen('users.csv', 'r')) !==false){
    while (($data = fgetcsv($file)) !== false) {
        $users[] = $data;
    }
}
fclose($file);
?>



<html lang="ru" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="style.css">
    <title>Генератор пользователей</title>
    <link rel="shortcut icon" href="user.svg" type="image/svg+xml" >
</head>
<body>
<section>
    <h3>Форма регистрации:</h3>
    <form  class="user" method="post">
        <div>
            <label for="name">ФИО:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="phone">Номер телефона:</label>
            <input type="text" name="phone" id="phone" required>
        </div>
        <div>
            <label for="email">Почта:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <button type="submit">Зарегистрироваться</button>
    </form>
</section>
<section class="table_user">
    <h3>Все пользователи: </h3>
    <table class="table-fill">
        <thead>
        <tr>
            <th class="text-left">ID</th>
            <th class="text-left">ФИО</th>
            <th class="text-left">Телефон</th>
            <th class="text-left">Почта</th>
        </tr>
        </thead>
        <tbody class="table-hover">
        <?php foreach ($users as $user): ?>
            <tr>
                <td class="text-left"><?= $user[0] ?></td>
                <td class="text-left"><?= $user[1] ?></td>
                <td class="text-left"><?= $user[2] ?></td>
                <td class="text-left"><?= $user[3] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<!-- <section>
        <div class="signin">
            <div class="content">
                <h2>Регистрация</h2>
                <div class="user">
                    <div class="inputBox">
                        <input type="text" name="name" id="name" required> <i>ФИО</i>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="phone" id="phone" required> <i>Номер телефона</i>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" id="email" required> <i>Почта</i>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Зарегистрировать">
                    </div>
                </div>
            </div>
        </div>
    </section>-->
</body>
</html>
