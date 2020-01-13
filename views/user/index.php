<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Create Forms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create-form-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Create Form', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="container">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <div class="container">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id_user',
                [
                    'header'=>'Username',
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}',
                    'buttons' => [
                        'view' => function ($url,$model,$key) {
                            return Html::a($model->username, $url);
                        },
                    ],
                ],

                'password',
                //'created_at',
                //'updated_at',
                //'privilege',
                //'status',
                //'auth_key',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>'Action',
                    'template'=>'{view} {update} {link}'
                ],

            ],
        ]); ?>
    </div>



</div>
