<?php
namespace app\models;
use yii\db\activeRecord;

class ArticleList extends activeRecord
{
    public static function tableName(){
        return "article";
    }
}
?>