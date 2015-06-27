<?php

/**
 * Script which displays a list of talks in HTML.
 */

$it = new FilesystemIterator(__DIR__);
foreach ($it as $key => $file) {
    if (!$file->isDir()) {
        continue;
    }

    $json = "$file/talk.json";

    if (!file_exists($json)) {
        continue;
    }

    $data = file_get_contents($json);
    if ($data === false) {
        continue;
    }

    $data = json_decode($data);
    if (json_last_error() !== JSON_ERROR_NONE) {
        continue;
    }

    $data->dir = $file->getBaseName();
    $talks[] = $data;
}

// Sort talks by date descending
usort($talks, function ($one, $other) {
    $one = strtotime($one->date);
    $other = strtotime($other->date);
    if ($one == $other) {
        return 0;
    }
    return ($one < $other) ? 1 : -1;
});

?><!DOCTYPE html>
<html>
<head>
    <title>Talks by Ivan Habunek</title>
    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.5/united/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Talks by Ivan Habunek</h1>
    <h3><a target="_blank" href="http://twitter.com/ihabunek">@ihabunek</a></h3>

    <?php foreach($talks as $talk) { ?>
        <hr />
        <h3><?= $talk->title ?></h3>
        <p><?= $talk->description ?></p>
        <p>
            <?php if (isset($talk->event_url)) { ?>
                <a href="<?= $talk->event_url ?>"><?= $talk->event ?></a>
            <?php } else { ?>
                <?= $talk->event ?>
            <?php } ?><br />
            <?= $talk->date ?>
        </p>
        <a class="btn btn-primary btn-sm" href="<?= $talk->dir ?>">Slides</a>
        <?php if (isset($talk->video)) { ?>
            <a class="btn btn-primary btn-sm" href="<?= $talk->video ?>">Video</a>
        <?php } ?>
        <?php if (isset($talk->rate)) { ?>
            <a class="btn btn-primary btn-sm" href="<?= $talk->rate ?>">Rate the talk</a>
        <?php } ?>
    <?php } ?>
</div>
</body>
</html>
