<?php

namespace app\controllers;

use app\models\ArticleList;

class TestController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $article = ArticleList::hello();
        var_dump($article);
    }

}
