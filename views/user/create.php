<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserCreateForm */

$this->title = 'Create User Create Form';
$this->params['breadcrumbs'][] = ['label' => 'User Create Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelUser' => $modelUser,
        'modelsAddress'=> (empty($modelsAddress)) ? [new Address] : $modelsAddress,
    ]) ?>

</div>
