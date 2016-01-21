<?php

include_once __DIR__ . '/../../inc/var.php';

$host = "http://".$_SERVER['HTTP_HOST'];
$url_add_news = $host . "/index.php?ctrl=AdminNews&act=New";

$table = '';
foreach( $items as $item ) {
    $id = $item->id;
    $title = $item->title;
    $table .=<<<_table
    <tr>
        <td><input type="radio" name="art_id" value="$id"></td>
        <td>$id</td>
        <td class="title" onclick="return art_edit($id)">$title</td>
    </tr>
_table;
}

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
        <!-- НОВАЯ СТАТЬЯ -->
        <div class="add_btns">
            <a class="btn_add" href="<?php echo $url_add_news ?>">Добавить</a>
        </div>
        <form id="art_form" method="post" action="add_article.php" onsubmit="return art_select(this)">           <!-- СПИСОК СТАТЕЙ -->
            <section id="main_section">
                <table class="table_art">
                    <thead>
                    <tr>
                        <th class="col_1" style="width: 5%;"></th>
                        <th class="col_2" style="width: 5%;">id</th>
                        <th>Заголовок</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?= $table ?>
                    </tbody>
                </table>
                <div class="add_btns">
<!--                    <input class="btn_add" type="submit" name="art_edit" value="Изменить">-->
                    <input class="btn_del" type="submit" name="art_del" value="Удалить">
                </div>
            </section>
            <div class="clear"></div>
        </form>
        <footer id="main_footer">
            <small>
                Copyright &copy; AleXX-GSM 2014
            </small>
            <address>http://www.alexxsite.ru</address>
        </footer>
    </div>
</div>
</body>
</html>