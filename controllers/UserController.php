<?php

namespace app\controllers;

use app\models\Address;
use app\models\Model;
use app\models\UserCreateForm;
use app\models\UserSearch;
use app\models\Countries;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for UserCreateForm model.
 */
class UserController extends Controller
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
     * Lists all UserCreateForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        Countries::getCountries();
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserCreateForm model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $addressString = "";
        foreach ($model->addresses as $address){
            $addressString .= $address->street .", ". $address->number .", ". $address->city;
        }
        $model->addressString = $addressString;
        return $this->render('view', [
            'model' => $model,
        ]);
    }


    public function actionCreate()
    {
        $modelUser = new UserCreateForm();
        $modelsAddress = [new Address];
        if ($modelUser->load(Yii::$app->request->post())) {
            $modelsAddress = Model::createMultiple(Address::classname());
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());
            // validate all models
            $valid = $modelUser->validate();
            $valid = Model::validateMultiple($modelsAddress) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelUser->save(false)) {
                        foreach ($modelsAddress as $modelAddress) {
                            $modelAddress->user_id = $modelUser->id_user;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelUser->id_user]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('create', [
            'modelUser' => $modelUser,
            'modelsAddress' => (empty($modelsAddress)) ? [new Address] : $modelsAddress
        ]);
    }

    public function actionUpdate($id)
    {
        $modelUser = $this->findModel($id);
        $modelsAddress = $modelUser->addresses;
        if ($modelUser->load(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($modelsAddress, 'id_address', 'id_address');
            $modelsAddress = Model::createMultiple(Address::classname(), $modelsAddress);
            Model::loadMultiple($modelsAddress, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsAddress, 'id_address', 'id_address')));
            // validate all models
            $valid = $modelUser->validate();
            $valid = Model::validateMultiple($modelsAddress) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelUser->save(false)) {
                        if (!empty($deletedIDs)) {
                            Address::deleteAll(['id_address' => $deletedIDs]);
                        }
                        foreach ($modelsAddress as $modelAddress) {
                            $modelAddress->user_id = $modelUser->id_user;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelUser->id_user]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('update', [
            'modelUser' => $modelUser,
            'modelsAddress' => (empty($modelsAddress)) ? [new Address] : $modelsAddress
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $name = $model->username;
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Record < strong>"'. $name . '"</strong > deleted successfully .');
        }
        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = UserCreateForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
