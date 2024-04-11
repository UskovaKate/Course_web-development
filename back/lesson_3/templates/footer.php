<footer class="footer">
    <div class="container">
        <section>
            <h4>Остались вопросы?</h4>
            <p>Напишите мне на почту</p>
            <a href="mailto:uskovakate@mail.ru" class="button">Написать</a>
        </section>
        <div class="contacts-footer" id="contacts">
            <?php foreach ($socialNetworks as $sociaItem):?>
            <a href="<?=$sociaItem['link']; ?>" title="<?=$sociaItem['title']; ?>" target="_blank"><i class="<?=$sociaItem['icon']; ?>"></i></a>
            <?php endforeach; ?>
        </div>
        <span class="copyright">© 2023 <a href="https://is20-2019.susu.ru/uskovaep/" target="_blank"><?= $name ?></a></span>
    </div>
</footer>
<script src="templates/script.js"></script>
</body>
</html>
