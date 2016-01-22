<?php

include __DIR__ . '/../../inc/var.php';


$table = '';
foreach( $items as $item ) {
    $id = $item->id;
    $title = $item->title;
    $table .=<<<_table
    <tr>
        <td><input type="radio" name="radio_id" value="$id"></td>
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
            <a class="btn_add" href="<?= $addNews ?>">Добавить</a>
        </div>
        <form id="art_form" method="post" action="<?= $addNews ?>">           <!-- СПИСОК СТАТЕЙ -->
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
                <nav><?= $pageNav?></nav>
            </section>
            <div class="clear"></div>
        </form>
        <div class="add_btns">
            <button type="button" class="btn_del" onclick="return art_select()">Удалить</button>
        </div>
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