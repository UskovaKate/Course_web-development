<?php $name="Uskovakate"; ?>
<!--Шапка-->
    <?php include ('templates/header.php'); ?>
<main>
    <!-- Баннер -->
    <section class="banner" >
      <div class="container">
        <div class="row">
            <figure>
              <img src="templates/images/header.jpg"  alt="Ускова Екатерина">
            </figure>
          </div>
            <section class="contacts">
                <h1>
                  Екатерина Ускова
                  <span>Web-developer</span>
                </h1>
                <?php foreach ($socialNetworks as $sociaItem):?>
                    <a href="<?=$sociaItem['link']; ?>" title="<?=$sociaItem['title']; ?>" target="_blank"><i class="<?=$sociaItem['icon']; ?>"></i></a>
                <?php endforeach; ?>
            </section>
      </div>
    </section>

      <!--Обо мне -->
          <section class="about" id="about">
            <div class="container">
              <h2 class="heading">Обо мне</h2>
            <div class='contmeleft'>
            <img width='600px' src='templates/images/about_me.jpg' alt="1 курс" >
              <p>Привет! Меня зовут Ускова Екатерина. В этом году я закончила ЮУрГУ по специальности "Бизнес-информатика".
                Вижу себя и развиваюсь в web-разработке, постоянно нахожусь в процессе обучения.
                Я с удовольствием берусь изучать новую информацию, при этом обладаю высокой самоорганизованностью.
                Стремлюсь к постоянному профессиональному и личностному развитию.</p>
            <button class="btn-show-more">Больше информации</button>
            <div class="show-more-content">
            <p>Начала изучать программирование в университете, выполняя учебные задания (Python, PHP, Frontend).
              Потом стала сама изучать frontend по Sololearn, курсу Coursera и Яндекса, Сode basics.
              Обладаю навыками работы с базами данных, понимания web-разработки, разработки конфигураций 1с, работы в 1С:Бухгалтерии 8,
полученными в ходе обучения в университете и самообучения. Имеется сертификат 1С Профессионал: Предприятию 8.3.
              Есть опыт работы с Tilda, Figma, Wordpress, Canva, создавала дизайны и сайты с помощью данных ресурсов.</p>
          </div>
          </div>
      </div>
          </section>

    <!--Навыки-->
    <section class="skills-section" id="skills">
      <div class="container">
          <div class="skills">
             <h2 class="heading">Навыки</h2>
             <ul class="skills-list">
                 <?php foreach ($skills as $skill) {
                     echo "<li>$skill</li>";
                 }?>
             </ul>
          </div>
          <div class="skills-other">
            <h2 class="heading">Прочее</h2>
            <ul class="skills-list">
                <?php foreach ($skillsOther as $skillO) {
                    echo "<li>$skillO</li>";
                }?>
            </ul>
        </div>
      </div>
    </section>

    <!--Образование-->
    <section id="education">
    <div class="container">
      <h2 class="heading">Образование</h2>
      <div class="education">
      <div class="one">
        <section>
        <span class="year">2019 - 2023</span>
        <h3 class="univercity">Южно-Уральский государственный университет</h3>
        <span class="programme">Бакалавриат</span>
        <p>Специальность "Бизнес-информатика"</p>
      </section>
    </div>
    <div class="two">
      <section>
        <img width='300px' src='templates/images/education.jpg' alt="Защита диплома">
      </section>
      </div>
      <div class="three">
        <section>
          <span class="year">2022 - 2023</span>
          <h3 class="univercity">Южно-Уральский государственный университет</h3>
          <span class="programme">Программа переподготовки</span>
          <p>"Стратегическое управление ИТ проектами организации"</p>
        </section>
      </div>
    </div>
    </div>
  </section>
    </main>

    <!--Подвал -->
    <?php require ('templates/footer.php'); ?>