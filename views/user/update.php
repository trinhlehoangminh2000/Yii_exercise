<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserCreateForm */

$this->title = 'Update User Create Form: ' . $modelUser->id_user;
$this->params['breadcrumbs'][] = ['label' => 'User Create Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelUser->id_user, 'url' => ['view', 'id' => $modelUser->id_user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-create-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelUser' => $modelUser,
        'modelsAddress'=> (empty($modelsAddress)) ? [new Address] : $modelsAddress,
    ]) ?>

</div>
