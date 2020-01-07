<?php

namespace app\controllers;

use app\models\ContactForm;
use Yii;
use kartik\depdrop\DepDrop;
use app\models\Contact;

class ContactController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Contact();
        //if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionSubSubject() {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        Yii::debug(isset($_POST['depdrop_parents']));
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            Yii::debug($parents);
            if ($parents != null) {
                $id_subject = $parents[0];
                //$out = Contact::getSubSubject($id_subject);
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                 $out= [
                    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                 ];
                return ['output'=>$out, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

}
