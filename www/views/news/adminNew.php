<?php

include_once __DIR__ . '/../../inc/var.php';

$host = "http://".$_SERVER['HTTP_HOST'];
$url_add_news = $host . "/index.php?ctrl=AdminNews&act=New";
$url_all_news = $host . "/index.php?ctrl=AdminNews&act=All";

?>
<!doctype html>
<html>
<?= $head ?>
<body>
<div id="main_div">
    <header>
        <h1>админка</h1>
    </header>
    <aside id="main_aside">
        <?= $admin_menu ?>
    </aside>
    <div id="wrapper">
        <div class="add_btns">
            <a class="btn_add" href="<?= $url_all_news ?>">К списку</a>
            <a class="btn_add" href="<?= $url_add_news ?>">Новая</a>
        </div>
        <form method="post" action="<?= $url_add_news ?>">
            <div class="art_title">
                <p>Заголовок:</p>
                <input type="text" name="title" size="100" value="<?= $item->title ?>" required>
            </div>
            <div class="art_intro">
                <p class="art_intro">Вводная часть</p>
                <textarea id="intro" name="intro" cols="100" rows="10" required><?= $item->intro ?></textarea>
            </div>
            <div class="art_text">
                <p class="art_text">Основная часть</p>
                <textarea id="text" name="text" cols="100" rows="20"><?= $item->text ?></textarea>
                <script>CKEDITOR.replace( 'text' );</script>
            </div>
            <input type="hidden" name="id_news" value="<?= $item->id ?>">
            <input class="btn_add button" type="submit" name="news_save" value="Сохранить">
        </form>
    </div>
</div>
</body>
</html>