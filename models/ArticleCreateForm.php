<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use app\models\ArticleCategory;
use yii\db\Transaction;
use yii\db\Query;
use \raoul2000\workflow\base\SimpleWorkflowBehavior;


/**
 * This is the model class for table "article".
 *
 * @property int $id_article
 * @property string $title
 * @property string|null $content
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $status
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property ArticleCategory[] $articleCategories
 */
class ArticleCreateForm extends ArticleList
{
    public $categories;

    public static function getAllCategories() {
        $rows = (new \yii\db\Query())
            ->select(['id_category','name'])
            ->from('category')
            ->all();
        return $rows;
    }

    public function behaviors()
    {
        $return = parent::behaviors();
        array_push($return, SimpleWorkflowBehavior::className());
        return $return;
    }
    public static function tableName()
    {
        return 'article';
    }

    public function rules()
    {
        $rule = parent::rules();
        array_push($rule,[['categories'],'string']);
        return $rule;
    }


    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id_user' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id_user' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleCategoriesName()
    {
        //return $this->hasMany(ArticleCategory::className(), ['article_id' => 'id_article']);\
        $row = $this->getArticleCategoriesId();
        $name = (new \yii\db\Query())
            ->select(['name'])
            ->from('category')
            ->where(['id_category' => $row])
            ->all();
        return $name[0]['name'];
    }

    public function getArticleCategoriesId()
    {
        //return $this->hasMany(ArticleCategory::className(), ['article_id' => 'id_article']);\
        $row = (new \yii\db\Query())
            ->select(['category_id'])
            ->from('article_category')
            ->where(['article_id' => $this->id_article])
            ->all();
        return  $row[0]['category_id'];
    }

    public function getId(){
        $row = (new \yii\db\Query())
            ->select(['id_article'])
            ->from('article')
            ->where(['title' => $this->title,'content'=>$this->content])
            ->one();
        return $row['id_article'];
    }

    public function save($runValidation = true, $attributeNames = NULL){
        //Saving the Article details
        $user = NewUser::find()
            ->where(['username'=> Yii::$app->user->identity->username])
            ->one();
        if($this->isNewRecord){
            $this->created_by = $user->id_user;
        } else {
            $this ->updated_by = $user->id_user;
        }

        $saveResult1 = parent::save($runValidation, $attributeNames);

        //Saving the article categories
        $connection = \Yii::$app->db;
        $transaction = $connection->beginTransaction();
        try {
            $connection->createCommand()
                ->delete('article_category', "article_id ='$this->id_article'")
                ->execute();
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }
        $articleCategory = new ArticleCategory();
        $articleCategory->article_id = $this->id_article;
        $articleCategory->category_id = $this->categories;
        $saveResult2 = $articleCategory->save();

        return $saveResult1 && $saveResult2;
    }
}
