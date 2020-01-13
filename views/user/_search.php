<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-create-form-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <!--
    <?= $form->field($model, 'id_user') ?>
    -->

    <h3>Find by username</h3>
    <?= $form->field($model, 'username')->label(false) ?>

    <!--
    <div class="col-lg-6">
        <?= $form->field($model, 'password') ?>
    </div>


    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>
    -->
    <?php // echo $form->field($model, 'privilege') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'pull-right btn btn-primary']) ?>
        <!--<?= Html::resetButton('Reset', ['class' => 'pull-right btn btn-outline-secondary']) ?>-->
    </div>

    <?php ActiveForm::end(); ?>

</div>
