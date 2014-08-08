<?php

namespace backend\models;

use Yii;
use yii\helpers\Security;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "backend_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $role
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Categories[] $categories
 * @property CategoriesLanguage[] $categoriesLanguages
 * @property Languages[] $languages
 */
class BackendUser extends \backend\models\BaseModel implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'backend_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email'], 'required'],
            [['role', 'created_by', 'updated_by'], 'integer'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash', 'email'], 'string', 'max' => 255],
            [['auth_key', 'password_reset_token'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'role' => Yii::t('app', 'Role'),
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
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriesLanguages()
    {
        return $this->hasMany(CategoriesLanguage::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Languages::className(), ['updated_by' => 'id']);
    }
    
   
   //For Validation 
/** 
    * @inheritdoc 
    */ 
   public function getId() 
   { 
       return $this->getPrimaryKey(); 
   }    
       /** 
    * Finds user by username 
    * 
    * @param string     $username 
    * @return static|null 
    */ 
   public static function findByUsername($username) 
   { 
       return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]); 
   } 

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }    
   /** 
    * Validates password 
    * 
    * @param string $password password to validate 
    * @return boolean if password provided is valid for current user 
    */ 
   public function validatePassword($password) 
   { 
       return Security::validatePassword($password, $this->password_hash); 
   }
   
   public static function checkPermission($action,$controller)
   {
       return (int)BackendActionRoles::find()->joinWith(['backendAction','controller0'])->where(['backend_role'=> Yii::$app->user->identity->role,'backend_controllers.backend_controller'=>$controller,'backend_action.backend_action'=>$action,'backend_action_roles.status'=>1])->count();
   }
    
}
