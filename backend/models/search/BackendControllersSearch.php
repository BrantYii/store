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

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BackendControllers;

/**
 * BackendControllersSearch represents the model behind the search form about `backend\models\BackendControllers`.
 */
class BackendControllersSearch extends BackendControllers
{
    public function rules()
    {
        return [
            [['backend_controller_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['backend_controller', 'backend_controller_display', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = BackendControllers::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
            'pageSize' => 10,
            ],            
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'backend_controller_id' => $this->backend_controller_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'backend_controller', $this->backend_controller])
            ->andFilterWhere(['like', 'backend_controller_display', $this->backend_controller_display]);

        return $dataProvider;
    }
}
