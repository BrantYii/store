<?php

namespace backend\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
class BaseModel extends ActiveRecord{
    
    const STATUS_ACTIVE = 1;
   
    public function behaviors() {
        		return [
                            'timestamp'=>[
                        'class'=>\yii\behaviors\TimestampBehavior::className(),
                        'value' => new Expression('NOW()'),                                    
                            ]
                        ];
        parent::behaviors();
    }
    
    public function afterValidate() {
            if($this->isNewRecord)
            {
                $this->created_by = \Yii::$app->user->id;
                $this->updated_by = \Yii::$app->user->id;
            } else {
                $this->updated_by = \Yii::$app->user->id;                
            }        
            parent::afterValidate();
    }
}

?>
