<?php require('HeadAndheader.php'); ?>
<hr id="header-horizontal-line"/>
<div id="content">

    <div id="current-path">
        <p>Startsait > News </p>
    </div>
    <fieldset>
        <legend id="fieldset-title">News</legend>
        <?php foreach ($news as $new): ?>
            <div class="news">
                <h1><?php echo $new->title;?></h1>
                <h2>posted by <?php echo $new->username; ?> on <?php echo $new->date;?></h2>

                <p>
                    <?php echo $new->text;?>
                </p>
            </div>
        <?php endforeach; ?>
    </fieldset>
</div>


<?php require('Footer.php'); ?>
