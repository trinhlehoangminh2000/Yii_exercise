<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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
    public function getArticleCategories()
    {
        return $this->hasMany(ArticleCategory::className(), ['article_id' => 'id_article']);
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
        $saveResult = parent::save($runValidation, $attributeNames);
        $articleCategoryResult;
        try {
            Yii::$app->db->createCommand()
                ->insert('article_category', [
                    'article_id' => $this->id_article,
                    'category_id' => $this->categories
                ])->execute();
            $articleCategoryResult = TRUE;
        } catch (Exception $e){
            $articleCategoryResult = FALSE;
        }
        return $saveResult && $articleCategoryResult;
    }
}
