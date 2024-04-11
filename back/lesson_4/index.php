<?php
function generateRandomName():string {
    $names = array(
        'Олег',
        'Марат',
        'Илья',
        'Леонид',
        'Василий'
    );
    return $names[array_rand($names)];
}
function generateRandomSurname():string {
    $surnames = array(
        'Петров',
        'Петушков',
        'Сидоров',
        'Баранов',
        'Осипов',
        'Смирнов'
    );
    return $surnames[array_rand($surnames)];
}
function generateRandomPhone() {
    $phone = '+7 ('.rand(100,999).') '.rand(100,999).'-'.rand(10,99).'-'.rand(10,99);
    return $phone;
}
function translit($value)
{
    $converter = array(
        'а' => 'a',    'б' => 'b',    'в' => 'v',    'г' => 'g',    'д' => 'd',
        'е' => 'e',    'ё' => 'e',    'ж' => 'zh',   'з' => 'z',    'и' => 'i',
        'й' => 'y',    'к' => 'k',    'л' => 'l',    'м' => 'm',    'н' => 'n',
        'о' => 'o',    'п' => 'p',    'р' => 'r',    'с' => 's',    'т' => 't',
        'у' => 'u',    'ф' => 'f',    'х' => 'h',    'ц' => 'c',    'ч' => 'ch',
        'ш' => 'sh',   'щ' => 'sch',  'ь' => '',     'ы' => 'y',    'ъ' => '',
        'э' => 'e',    'ю' => 'yu',   'я' => 'ya',

        'А' => 'A',    'Б' => 'B',    'В' => 'V',    'Г' => 'G',    'Д' => 'D',
        'Е' => 'E',    'Ё' => 'E',    'Ж' => 'Zh',   'З' => 'Z',    'И' => 'I',
        'Й' => 'Y',    'К' => 'K',    'Л' => 'L',    'М' => 'M',    'Н' => 'N',
        'О' => 'O',    'П' => 'P',    'Р' => 'R',    'С' => 'S',    'Т' => 'T',
        'У' => 'U',    'Ф' => 'F',    'Х' => 'H',    'Ц' => 'C',    'Ч' => 'Ch',
        'Ш' => 'Sh',   'Щ' => 'Sch',  'Ь' => '',     'Ы' => 'Y',    'Ъ' => '',
        'Э' => 'E',    'Ю' => 'Yu',   'Я' => 'Ya',
    );
    $value = strtr($value, $converter);
    return $value;
}
function generateRandomEmail($name, $surname) {
    $domains = ['mail.ru', 'gmail.com', 'yandex.ru'];
    $randomDomain = $domains[array_rand($domains)];
    $email = strtolower(translit($name .$surname. '@' . $randomDomain));
    return $email;
}
function generateUniqueID() {
    return uniqid();
}
function generateRandomUser() {
    $name = generateRandomName();
    $surname = generateRandomSurname();
    $phone = generateRandomPhone();
    $email = generateRandomEmail($name, $surname);
    $id = generateUniqueID();

    return [
        'id' => $id,
        'name' => $name,
        'surname' => $surname,
        'phone' => $phone,
        'email' => $email
    ];
}

// Запись пользователя в csv
function recordUser($user) {
    $file = fopen('users.csv', 'a');
    fputcsv($file, $user);
    fclose($file);
}
// Генерация случайного пользователя и запись в csv
$userData = generateRandomUser();
recordUser($userData);

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
    <h3 class="random_user">Данные случайного пользователя:</h3>
        <div class="user">
            <ul>
                <li><strong>ID:</strong> <?= $userData['id'] ?></li>
                <li><strong>Имя:</strong> <?= $userData['name'] ?></li>
                <li><strong>Фамилия:</strong> <?= $userData['surname'] ?></li>
                <li><strong>Телефон:</strong> <?= $userData['phone'] ?></li>
                <li><strong>Почта:</strong> <?= $userData['email'] ?></li>
            </ul>
        </div>
</section>
<section class="table_user">
    <h3>Все пользователи: </h3>
    <table class="table-fill">
        <thead>
        <tr>
            <th class="text-left">ID</th>
            <th class="text-left">Имя</th>
            <th class="text-left">Фамилия</th>
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
                <td class="text-left"><?= $user[4] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</section>
</body>
</html>
