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
* This is the model class for table "categories".
*
    * @property integer $categories_id
    * @property string $default_title
    * @property string $image
    * @property integer $parent_id
    * @property string $status
    * @property string $created_at
    * @property string $updated_at
    * @property integer $created_by
    * @property integer $updated_by
    *
            * @property BackendUser $updatedBy
            * @property BackendUser $createdBy
            * @property CategoriesLanguage[] $categoriesLanguages
    */
class Categories extends \backend\models\BaseModel
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'categories';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['default_title', 'parent_id'], 'required'],
            [['parent_id', 'created_by', 'updated_by'], 'integer'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['default_title', 'image'], 'string', 'max' => 64]
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'categories_id' => Yii::t('app', 'Categories ID'),
    'default_title' => Yii::t('app', 'Default Title'),
    'image' => Yii::t('app', 'Image'),
    'parent_id' => Yii::t('app', 'Parent ID'),
    'status' => Yii::t('app', 'Displayed'),
    'created_at' => Yii::t('app', 'Created At'),
    'updated_at' => Yii::t('app', 'Updated At'),
    'created_by' => Yii::t('app', 'Created By'),
    'updated_by' => Yii::t('app', 'Updated By'),
];
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
    public function getCreatedBy()
    {
    return $this->hasOne(BackendUser::className(), ['id' => 'created_by']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getCategoriesLanguages()
    {
    return $this->hasMany(CategoriesLanguage::className(), ['categories_id' => 'categories_id']);
    }
}
