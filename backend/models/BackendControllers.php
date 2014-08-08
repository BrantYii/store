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
* This is the model class for table "backend_controllers".
*
    * @property integer $backend_controller_id
    * @property string $backend_controller
    * @property string $backend_controller_display
    * @property integer $status
    * @property string $created_at
    * @property string $updated_at
    * @property integer $created_by
    * @property integer $updated_by
    *
            * @property BackendActionRoles[] $backendActionRoles
            * @property BackendUser $updatedBy
            * @property BackendUser $createdBy
    */
class BackendControllers extends \backend\models\BaseModel
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'backend_controllers';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['backend_controller', 'backend_controller_display'], 'required'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['backend_controller'], 'string', 'max' => 50],
            [['backend_controller_display'], 'string', 'max' => 55],
            [['backend_controller'], 'unique']
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'backend_controller_id' => Yii::t('app', 'Backend Controller ID'),
    'backend_controller' => Yii::t('app', 'Backend Controller'),
    'backend_controller_display' => Yii::t('app', 'Backend Controller Display'),
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
    public function getBackendActionRoles()
    {
    return $this->hasMany(BackendActionRoles::className(), ['controller' => 'backend_controller_id']);
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
}
