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
* This is the model class for table "currencies".
*
    * @property integer $currencies_id
    * @property string $default_title
    * @property string $code
    * @property integer $iso_code
    * @property string $symbol
    * @property integer $status
    * @property string $created_at
    * @property string $updated_at
    * @property integer $created_by
    * @property integer $updated_by
    *
            * @property BackendUser $createdBy
            * @property BackendUser $updatedBy
            * @property CurrenciesLanguage[] $currenciesLanguages
    */
class Currencies extends \backend\models\BaseModel
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'currencies';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['default_title', 'code', 'iso_code', 'created_by', 'updated_by'], 'required'],
            [['iso_code', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['default_title'], 'string', 'max' => 32],
            [['code'], 'string', 'max' => 3],
            [['symbol'], 'string', 'max' => 12],
            [['iso_code'], 'unique']
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'currencies_id' => Yii::t('app', 'Currencies ID'),
    'default_title' => Yii::t('app', 'Default Title'),
    'code' => Yii::t('app', 'Code'),
    'iso_code' => Yii::t('app', 'Iso Code'),
    'symbol' => Yii::t('app', 'Symbol'),
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
    public function getCurrenciesLanguages()
    {
    return $this->hasMany(CurrenciesLanguage::className(), ['currencies_id' => 'currencies_id']);
    }
}
