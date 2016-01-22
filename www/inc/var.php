<?php

$head =<<<_head
<head lang="ru">
    <meta charset="utf-8">
    <title>админка</title>
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/cufon-yui.js"></script>
    <script type="text/javascript" src="js/Beryozki_400.font.js"></script>
    <script type="text/javascript">Cufon.replace("h1");</script>
    <script src="js/scripts.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>
_head;

$admin_menu = <<<_MENU
<ul class="admin_menu">
<li class="menu_li"><a class="admin_menu" href="index.php">главная</a></li>
<li class="menu_li"><a class="admin_menu" href="pages.php">страницы</a></li>
<li class="menu_act">статьи<span></span></li>
<li class="menu_li"><a class="admin_menu" href="images.php">изображения</a></li>
</ul>
_MENU;

?>