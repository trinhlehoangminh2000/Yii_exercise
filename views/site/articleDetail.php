<?php
/* @var $this yii\web\View */
$this->title = 'Article';

?>

<div class="site-index">

    <div class="jumbotron">
        <h1><?= $data["title"]?></h1>
    </div>
    <div class="container">
        <p> 
            <?= $data["content"]?>
        </P>
    </div> 
</div>



