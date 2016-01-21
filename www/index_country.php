<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>testim php</title>
</head>
<body>
<?php

require __DIR__ . '/classes/DB.php';

$countries = [];
$regions = [];
$cities = [];
$country_name = '';
$region_name = '';

$country_id_selected = isset( $_GET['country_id'] ) ? $_GET['country_id'] : NULL;
$region_id_selected = isset( $_GET['region_id'] ) ? $_GET['region_id'] : NULL;
$city_id_selected = isset( $_GET['city_id'] ) ? $_GET['city_id'] : NULL;

$db = new DB('country');
$countries = $db->queryAll('SELECT country_id, name FROM country');

if( $country_id_selected ) {
    $db = new DB('country');
    $regions = $db->queryAll("SELECT region_id, name FROM region WHERE country_id=$country_id_selected");
    if( $region_id_selected ) {
        $db = new DB('country');
        $cities = $db->queryAll("SELECT city_id, name FROM city WHERE country_id=$country_id_selected AND
                             region_id=$region_id_selected");
    }
}
?>
<h3>Выборка городов</h3>
<hr>
<form name="country" method="get" action="index.php">
	<label for="country_list">Страна:</label>
	<select name="country_id" id="country_id">
        <?php foreach( $countries as $country ): ?>
		<option <?php if( $country_id_selected == $country['country_id'] )
                    {
                        echo 'selected';
                        $country_name = $country['name'];
                    }?>
                value="<?=  $country['country_id']?>">
                <?= $country['name'] ?>
        </option>
        <?php endforeach; ?>
	</select>
    <input type="submit" value="Выбрать">
</form>
<form name="region" method="get" action="index.php">
    <label for="region_list">Регион:</label>
    <select name="region_id" id="region_list"
    <?php if( !$country_id_selected ): ?>
        <?='disabled>' ?>
        <option>-</option>
    <?php else: ?>
        <?='>'?>
        <?php foreach( $regions as $region): ?>
        <option <?php if( $region_id_selected == $region['region_id'] )
                    {
                        echo 'selected';
                        $region_name = $region['name'];
                    }?>
                value="<?=$region['region_id']?>">
            <?= $region['name'] ?>
        </option>
        <?php endforeach; ?>
    <?php endif; ?>

    </select>
    <input type="hidden" name="country_id" value="<?=$country_id_selected ?>">
    <input type="submit" name="print" value="Выбрать">
</form>
<?php
if( isset( $_GET['print'] ) ): ?>
    <hr>
    <h1><?= "$country_name ($region_name)"?></h1>
    <ul>
        <?php foreach( $cities as $city): ?>
            <li><?= $city['name'] ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>


</body>
</html>