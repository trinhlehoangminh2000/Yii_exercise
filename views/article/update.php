<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArticleList */

$this->title = 'Update Article List: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Article Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_article]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
