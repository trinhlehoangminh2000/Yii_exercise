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
        <?php 
            $next = $data["id"]+1;
            $prev = $data["id"]-1;    
        ?>
        <a class= "btn btn-primary" href= "/article/article-detail?id=<?= $prev?>">Previous article</a> 
        <a class= "btn btn-primary" href= "/article/article-detail?id=<?= $next?>">Next article</a> 
    </div>

</div>



