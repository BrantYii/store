<?php
/**
* Copyright (C) 2014 Dinesh Sharma - All Rights Reserved
* You may use, distribute and modify this code under the
* terms of the GPL license.
*
* You should have received a copy of the GPL license with
* this file. If not, please visit :
* https://gnu.org/licenses/gpl.html
*/

namespace backend\models;

use Yii;

/*
* This is the model class for table "categories_language".
*
    * @property integer $categories_language_id
    * @property integer $categories_id
    * @property integer $language_id
    * @property string $language_title
    * @property string $status
    * @property integer $created_at
    * @property integer $updated_at
    * @property integer $created_by
    * @property integer $updated_by
    *
            * @property Languages $language
            * @property BackendUser $createdBy
            * @property BackendUser $updatedBy
            * @property Categories $categories
    */
class CategoriesLanguage extends \backend\models\BaseModel
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'categories_language';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['categories_id', 'language_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['language_title'], 'required'],
            [['status'], 'string'],
            [['language_title'], 'string', 'max' => 32]
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'categories_language_id' => Yii::t('app', 'Categories Language ID'),
    'categories_id' => Yii::t('app', 'Categories ID'),
    'language_id' => Yii::t('app', 'Language ID'),
    'language_title' => Yii::t('app', 'Language Title'),
    'status' => Yii::t('app', 'Status'),
    'created_at' => Yii::t('app', 'Created At'),
    'updated_at' => Yii::t('app', 'Updated At'),
    'created_by' => Yii::t('app', 'Created By'),
    'updated_by' => Yii::t('app', 'Updated By'),
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getLanguage()
    {
    return $this->hasOne(Languages::className(), ['language_id' => 'language_id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getCreatedBy()
    {
    return $this->hasOne(BackendUser::className(), ['id' => 'created_by']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getUpdatedBy()
    {
    return $this->hasOne(BackendUser::className(), ['id' => 'updated_by']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getCategories()
    {
    return $this->hasOne(Categories::className(), ['categories_id' => 'categories_id']);
    }
}
