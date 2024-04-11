<?php
$socialNetworks = array(
    ['title'=> 'Github', 'link' =>'https://github.com/UskovaKate/','icon'=>'fa fa-github'],
    ['title'=> 'Wordpress', 'link' =>'https://is20-2019.susu.ru/uskovaep/','icon'=>'fa fa-wordpress'],
    ['title'=> 'VK', 'link' =>'https://vk.com/id200384502','icon'=>'fa fa-vk'],
    ['title'=> 'Behance', 'link' =>'https://www.behance.net/kateuskova','icon'=>'fa fa-behance'],
    ['title'=> 'Instagram', 'link' =>'https://www.instagram.com/uskovakate.web/','icon'=>'fa fa-instagram']
);

$skills = array(
    'HTML',
    'CSS',
    'Wordpress',
    'Github',
    'PHP',
    'JavaScript'
);

$skillsOther = array(
    'Figma',
    'Microsoft Access',
    'Tilda',
    'Notion',
    '1С: Предприятие 8',
    '1С: Бухгалтерия'
);
?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Екатерина Ускова">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="templates/style.css">
    <link rel="shortcut icon" href="templates/images/icon.png" >
    <title>UskovaKate</title>
</head>
<body>
<header class="header" id="site-header">
    <div class="container">
        <div class="header-info">
            <h6 class="header_title"><a href="index.php"><?= $name ?></a></h6>
            <nav class="navbar">
                <a href="#about">О себе</a>
                <a href="#skills">Навыки</a>
                <a href="#education">Образование</a>
                <a href="#contacts">Контакты</a>
                <a href="gallery.php">Галерея</a>
            </nav>
        </div>
    </div>
</header>