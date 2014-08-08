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
* This is the model class for table "languages".
*
    * @property integer $language_id
    * @property string $name
    * @property string $code
    * @property string $image
    * @property integer $status
    * @property integer $sort_order
    * @property string $created_at
    * @property string $updated_at
    * @property integer $created_by
    * @property integer $updated_by
    *
            * @property CategoriesLanguage[] $categoriesLanguages
            * @property BackendUser $createdBy
            * @property BackendUser $updatedBy
    */
class Languages extends \backend\models\BaseModel
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'languages';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['name', 'code'], 'required'],
            [['status', 'sort_order', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 32],
            [['code'], 'string', 'max' => 8],
            [['image'], 'string', 'max' => 64],
            [['code'], 'unique']
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'language_id' => Yii::t('app', 'Language ID'),
    'name' => Yii::t('app', 'Name'),
    'code' => Yii::t('app', 'Code'),
    'image' => Yii::t('app', 'Image'),
    'status' => Yii::t('app', 'Status'),
    'sort_order' => Yii::t('app', 'Sort Order'),
    'created_at' => Yii::t('app', 'Created At'),
    'updated_at' => Yii::t('app', 'Updated At'),
    'created_by' => Yii::t('app', 'Created By'),
    'updated_by' => Yii::t('app', 'Updated By'),
];
}

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getCategoriesLanguages()
    {
    return $this->hasMany(CategoriesLanguage::className(), ['language_id' => 'language_id']);
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
}
