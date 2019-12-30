<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\ArticleCreateForm;

$categoriesForm =[];
$categories = ArticleCreateForm::getAllCategories();
foreach ($categories as $category){
    $categoriesForm += [$category['id_category']=>$category['name']];
}
?>

<div class="article-list-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput();?>

    <?= $form->field($model, 'updated_at')->textInput() ?> 

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'categories')->widget(Select2::classname(), [
        'data' => $categories,
        'options' => ['placeholder' => 'Select a category'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
