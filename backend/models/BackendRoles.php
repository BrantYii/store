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
* This is the model class for table "backend_roles".
*
    * @property integer $backend_roles_id
    * @property string $backend_roles
    * @property string $backend_roles_desc
    * @property integer $status
    * @property string $created_at
    * @property string $updated_at
    * @property integer $created_by
    * @property integer $updated_by
    *
            * @property BackendActionRoles[] $backendActionRoles
            * @property BackendUser $createdBy
            * @property BackendUser $updatedBy
            * @property BackendUser[] $backendUsers
    */
class BackendRoles extends \backend\models\BaseModel
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'backend_roles';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['backend_roles', 'created_by', 'updated_by'], 'required'],
            [['backend_roles_desc'], 'string'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['backend_roles'], 'string', 'max' => 25],
            [['backend_roles'], 'unique']
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'backend_roles_id' => Yii::t('app', 'Backend Roles ID'),
    'backend_roles' => Yii::t('app', 'Backend Roles'),
    'backend_roles_desc' => Yii::t('app', 'Backend Roles Desc'),
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
    return $this->hasMany(BackendActionRoles::className(), ['backend_role' => 'backend_roles_id']);
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
    public function getBackendUsers()
    {
    return $this->hasMany(BackendUser::className(), ['role' => 'backend_roles_id']);
    }
}
