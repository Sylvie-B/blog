<!--    foreach article :   -->
<div id="article">
    <h2><?= $title ?></h2>
    <article>
        <div>
            <?= $author ?>
        </div>
        <div>
            <?= $art_text ?>
        </div>
    </article>
    <div class="comt"><?= $user . " : " . $com_text ?></div>
</div>
