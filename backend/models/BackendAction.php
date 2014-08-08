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
* This is the model class for table "backend_action".
*
    * @property integer $backend_action_id
    * @property string $backend_action
    * @property string $backend_action_desc
    * @property integer $status
    * @property string $created_at
    * @property string $updated_at
    * @property integer $created_by
    * @property integer $updated_by
    *
            * @property BackendUser $createdBy
            * @property BackendUser $updatedBy
            * @property BackendActionRoles[] $backendActionRoles
    */
class BackendAction extends \backend\models\BaseModel
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'backend_action';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['backend_action', 'created_by', 'updated_by'], 'required'],
            [['backend_action_desc'], 'string'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['backend_action'], 'string', 'max' => 55],
            [['backend_action'], 'unique']
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'backend_action_id' => Yii::t('app', 'Backend Action ID'),
    'backend_action' => Yii::t('app', 'Backend Action'),
    'backend_action_desc' => Yii::t('app', 'Backend Action Desc'),
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
    public function getBackendActionRoles()
    {
    return $this->hasMany(BackendActionRoles::className(), ['backend_action' => 'backend_action_id']);
    }
}
