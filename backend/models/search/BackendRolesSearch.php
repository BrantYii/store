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
use backend\models\BackendRoles;

/**
 * BackendRolesSearch represents the model behind the search form about `backend\models\BackendRoles`.
 */
class BackendRolesSearch extends BackendRoles
{
    public function rules()
    {
        return [
            [['backend_roles_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['backend_roles', 'backend_roles_desc', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = BackendRoles::find();

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
            'backend_roles_id' => $this->backend_roles_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'backend_roles', $this->backend_roles])
            ->andFilterWhere(['like', 'backend_roles_desc', $this->backend_roles_desc]);

        return $dataProvider;
    }
}
