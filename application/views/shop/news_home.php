<?php require('HeadAndheader.php'); ?>
<hr id="header-horizontal-line"/>
<div id="content">

    <div id="current-path">
        <p>Startsait > News </p>
    </div>
    <fieldset>
        <legend id="fieldset-title">News</legend>
        <?php foreach ($news as $new): ?>
            <div>
                <h1 class="news_header"><?php echo $new->title;?></h1>
                <h4>posted by <?php echo $new->username; ?> on <?php echo $new->date;?></h4>

                <p>
                    <?php echo $new->text;?>
                </p>
            </div>
        <?php endforeach; ?>
    </fieldset>
</div>


<?php require('Footer.php'); ?>
