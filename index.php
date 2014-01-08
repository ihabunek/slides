<?php

/**
 * Script which displays a list of talks in HTML.
 */

$talks = array();
foreach(scandir(__DIR__) as $file) {
    if ($file[0] == '.') {
        continue;
    }

    $dir = __DIR__ . '/' . $file;
    $json = $dir . '/talk.json';

    if (!is_dir($dir)) {
        continue;
    }

    if (!file_exists($json)) {
        continue;
    }

    $data = file_get_contents($json);
    if ($data === false) {
        continue;
    }

    $data = json_decode($data);
    if ($data === false) {
        continue;
    }

    $data->dir = basename($dir);
    $talks[] = $data;
}

?><!DOCTYPE html>
<html>
<head>
    <title>Talks</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Talks by <a target="_blank" href="http://twitter.com/ihabunek">@ihabunek</a></h1>

    <?php foreach($talks as $talk) { ?>
    <h3><a href="<?= $talk->dir ?>"><?= $talk->title ?></a></h3>
    <p>
        <?= $talk->description ?><br />
        <?= $talk->location ?>
    </p>

    <?php } ?>
</div>
</body>
</html>
