<?php

namespace app\controllers;

use Yii;
use app\models\ArticleList;
use app\models\ArticleListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ArticleCreateForm;
use app\models\ArticleCategory;

/**
 * ArticleController implements the CRUD actions for ArticleList model.
 */
class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

        ];
    }

    /**
     * Lists all ArticleList models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            echo '<script>alert("No access")</script>';
            return $this ->render('//site/index');
        }
        $searchModel = new ArticleListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArticleList model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            echo '<script>alert("No access")</script>';
            return $this ->render('//site/index');
        }
        $model = $this->findModelWithCategoryName($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new ArticleList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            echo '<script>alert("No access")</script>';
            return $this ->render('//site/index');
        }
        $model = new ArticleCreateForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' =>$model->id_article]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ArticleList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            echo '<script>alert("No access")</script>';
            return $this ->render('//site/index');
        }
        $model = $this->findModelWithCategoryId($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_article]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing ArticleList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            echo '<script>alert("No access")</script>';
            return $this ->render('//site/index');
        }
         Yii::$app->db->createCommand()
            ->update('article', ['status'=> 0], "id_article='$id'")->execute();


        return $this->redirect(['index']);
    }

    /**
     * Finds the ArticleList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArticleList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticleCreateForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModelWithCategoryId($id)
    {
        if (($model = ArticleCreateForm::findOne($id)) !== null) {
            $model->categories = $model->getArticleCategoriesId();
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModelWithCategoryName($id)
    {
        if (($model = ArticleCreateForm::findOne($id)) !== null) {
            $model->categories = $model->getArticleCategoriesName();
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
