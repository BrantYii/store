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
* This is the model class for table "currencies_language".
*
    * @property integer $currencies_language_id
    * @property string $currencies_language_title
    * @property integer $currencies_id
    * @property integer $language_id
    * @property integer $status
    * @property string $created_at
    * @property string $updated_at
    * @property integer $created_by
    * @property integer $updated_by
    *
            * @property BackendUser $createdBy
            * @property BackendUser $updatedBy
            * @property Currencies $currencies
            * @property Languages $language
    */
class CurrenciesLanguage extends \backend\models\BaseModel
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'currencies_language';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['currencies_language_title', 'currencies_id', 'language_id', 'created_by', 'updated_by'], 'required'],
            [['currencies_id', 'language_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['currencies_language_title'], 'string', 'max' => 50]
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'currencies_language_id' => Yii::t('app', 'Currencies Language ID'),
    'currencies_language_title' => Yii::t('app', 'Currencies Language Title'),
    'currencies_id' => Yii::t('app', 'Currencies ID'),
    'language_id' => Yii::t('app', 'Language ID'),
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
    public function getCurrencies()
    {
    return $this->hasOne(Currencies::className(), ['currencies_id' => 'currencies_id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getLanguage()
    {
    return $this->hasOne(Languages::className(), ['language_id' => 'language_id']);
    }
}
