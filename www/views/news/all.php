<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>testim php</title>
</head>
<body>
<?php foreach( $items as $item ): ?>
    <h2><?=$item->title; ?></h2>
    <img src="<?=$item->img; ?>">
    <div><?=$item->intro; ?></div>
    <hr>
<?php endforeach; ?>
</body>
</html>
