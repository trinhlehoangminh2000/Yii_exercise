<?php

use yii\helpers\Html;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\ArticleList */

$this->title = 'Create Article List';
$this->params['breadcrumbs'][] = ['label' => 'Article Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="article-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
