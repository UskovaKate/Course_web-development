<?php
function generateUniqueID() {
    return uniqid();
}

$servername = "localhost";
$username = "979105166";
$password = "6P%jK{uXv4o)T";
$db = "uskova_ekaterina";

$mysql = new mysqli($servername, $username, $password, $db);
if ($mysql->connect_error) {
    die("Ошибка подключения: " . $mysql->connect_error);
}

$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)";
if ($mysql->query($createUsersTable) === FALSE) {
    echo "Ошибка при создании таблицы 'users': " . $mysql->error;
}

$createCredentialsTable = "CREATE TABLE IF NOT EXISTS credentials (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    type VARCHAR(50) NOT NULL,
    value VARCHAR(255) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
if ($mysql->query($createCredentialsTable) === FALSE) {
    echo "Ошибка при создании таблицы 'credentials': " . $mysql->error;
}

// Добавление пользователя в базу данных
function addNewUser($mysql, $name, $phone, $email) {
    // Вставка пользователя в таблицу "users"
    $insertUserQuery = "INSERT INTO users (name) VALUES ('$name')";
    if ($mysql->query($insertUserQuery) === TRUE) {
        $userId = $mysql->insert_id;
    } else {
        echo "Ошибка при добавлении пользователя: " . $mysql->error;
        return;
    }

    // Вставка пользователя в таблицу "credentials"
    $insertPhoneQuery = "INSERT INTO credentials (user_id, type, value) VALUES ('$userId', 'phone', '$phone')";
    $insertEmailQuery = "INSERT INTO credentials (user_id, type, value) VALUES ('$userId', 'email', '$email')";

    if ($mysql->query($insertPhoneQuery) === FALSE || $mysql->query($insertEmailQuery) === FALSE) {
        echo "Ошибка при добавлении учетных данных: " . $mysql->error;
        return;
    }

    echo "Пользователь успешно зарегистрирован!";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($mysql, $_POST['name']);
    $phone = mysqli_real_escape_string($mysql, $_POST['phone']);
    $email = mysqli_real_escape_string($mysql, $_POST['email']);

    addNewUser($mysql, $name, $phone, $email);
}

// Получение всех пользователей из базы данных
$users = [];
$selectUsersQuery = "SELECT users.id, users.name, phone.value AS phone, email.value AS email
                     FROM users
                     INNER JOIN credentials AS phone ON users.id = phone.user_id AND phone.type = 'phone'
                     INNER JOIN credentials AS email ON users.id = email.user_id AND email.type = 'email'";
$result = $mysql->query($selectUsersQuery);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = [$row["id"], $row["name"], $row["phone"], $row["email"]];
    }
}



$perPage = 5;
$totalUsers = count($users);
$totalPages = ceil($totalUsers / $perPage);

$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

$offset = ($currentPage - 1) * $perPage;
$usersPerPage = array_slice($users, $offset, $perPage);
$mysql->close();
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
        <?php foreach ($usersPerPage as $user): ?>
            <tr>
                <td class="text-left"><?= $user[0] ?></td>
                <td class="text-left"><?= $user[1] ?></td>
                <td class="text-left"><?= $user[2] ?></td>
                <td class="text-left"><?= $user[3] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <?php if ($i === $currentPage): ?>
                <span><?= $i ?></span>
            <?php else: ?>
                <a href="?page=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
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


