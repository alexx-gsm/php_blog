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
        <form method="post" action="<?= $url_all_news ?>">
            <div id="add_btn">
                <input class="btn_add" type="submit" name="art_list" value="К списку">
                <input class="btn_add" type="submit" name="art_new" value="Новая">
            </div>
        </form>
        <form method="post" action="<?= $url_add_news ?>">
            <div class="art_title">
                <p>Заголовок:</p>
                <input type="text" name="title" size="100" value="title">
            </div>
            <div class="art_intro">
                <p class="art_intro">Вводная часть</p>
                <textarea id="intro" cols="100" rows="10"></textarea>
            </div>
            <div class="art_text">
                <p class="art_text">Основная часть</p>
                <textarea id="editor" name="editor" cols="100" rows="20"></textarea>
                <script>CKEDITOR.replace( 'editor' );</script>
            </div>
            <input type="hidden" name="id" value="id">
            <input type="hidden" name="id_news" value="">
            <input class="btn_add button" type="submit" name="art_save" value="Сохранить">
        </form>
    </div>
</div>
</body>
</html>