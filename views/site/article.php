<?php

/* @var $this yii\web\View */

$this->title = 'Article list';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">Articles list:</p>
    </div>

<?php 
    /*$post = Yii::$app->db->createCommand('SELECT * FROM article')
        ->queryAll();
    for ($x = 0; $x < count($post); $x++) {
        echo "<br>";
        echo $post[$x]["title"];
        echo "<a class= 'btn btn-default' href='site/article-detail?id=".$post[$x]["id"]."'>READ MORE</a>";
    }*/
    echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView'=> function($model)
        {
            return '<a href="/article/article-detail?id='.$model->id.'">'.$model->title.'</a>';
        }
    ]);
?>

</div>
