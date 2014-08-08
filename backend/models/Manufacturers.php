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
* This is the model class for table "manufacturers".
*
    * @property integer $manufacturers_id
    * @property string $default_name
    * @property string $image
    * @property string $default_url
    * @property integer $status
    * @property string $created_at
    * @property string $updated_at
    * @property integer $created_by
    * @property integer $updated_by
    *
            * @property BackendUser $createdBy
            * @property BackendUser $updatedBy
            * @property ManufacturersLanguage[] $manufacturersLanguages
    */
class Manufacturers extends \backend\models\BaseModel
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'manufacturers';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['default_name', 'created_by', 'updated_by'], 'required'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['default_name'], 'string', 'max' => 32],
            [['image'], 'string', 'max' => 64],
            [['default_url'], 'string', 'max' => 255],
            [['default_name'], 'unique']
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'manufacturers_id' => Yii::t('app', 'Manufacturers ID'),
    'default_name' => Yii::t('app', 'Default Name'),
    'image' => Yii::t('app', 'Image'),
    'default_url' => Yii::t('app', 'Default Url'),
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
    public function getManufacturersLanguages()
    {
    return $this->hasMany(ManufacturersLanguage::className(), ['manufacturers_id' => 'manufacturers_id']);
    }
}
