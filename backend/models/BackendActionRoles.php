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
* This is the model class for table "backend_action_roles".
*
    * @property integer $backend_action_roles_id
    * @property integer $backend_role
    * @property integer $backend_action
    * @property integer $controller
    * @property integer $status
    * @property string $created_at
    * @property string $updated_at
    * @property integer $created_by
    * @property integer $updated_by
    *
            * @property BackendControllers $controller0
            * @property BackendUser $createdBy
            * @property BackendUser $updatedBy
            * @property BackendRoles $backendRole
            * @property BackendAction $backendAction
    */
class BackendActionRoles extends \backend\models\BaseModel
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'backend_action_roles';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['backend_role', 'backend_action', 'controller'], 'required'],
            [['backend_role', 'backend_action', 'controller', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['backend_role', 'backend_action','controller'], 'unique', 'targetAttribute' => ['backend_role', 'backend_action','controller']]
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'backend_action_roles_id' => Yii::t('app', 'Backend Action Roles ID'),
    'backend_role' => Yii::t('app', 'Backend Role'),
    'backend_action' => Yii::t('app', 'Backend Action'),
    'controller' => Yii::t('app', 'Controller'),
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
    public function getController0()
    {
    return $this->hasOne(BackendControllers::className(), ['backend_controller_id' => 'controller']);
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
    public function getBackendRole()
    {
    return $this->hasOne(BackendRoles::className(), ['backend_roles_id' => 'backend_role']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getBackendAction()
    {
    return $this->hasOne(BackendAction::className(), ['backend_action_id' => 'backend_action']);
    }
}
