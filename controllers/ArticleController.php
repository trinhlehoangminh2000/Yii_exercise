<?php

    namespace app\controllers;

    use yii\web\Controller;
    use app\models\ArticleList;

    class ArticleController extends Controller
    {

        public function actionArticleDetail($id)
        {   
            $article = ArticleList::find()
                ->where(['id'=> $id])
                ->one();
            
            return $this->render('articleDetail',[
                'data' => $article,
            ]);
        }
    }
?>
