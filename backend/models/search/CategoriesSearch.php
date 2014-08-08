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
use backend\models\Categories;

/**
 * CategoriesSearch represents the model behind the search form about `backend\models\Categories`.
 */
class CategoriesSearch extends Categories
{
    public function rules()
    {
        return [
            [['categories_id', 'parent_id', 'created_by', 'updated_by'], 'integer'],
            [['default_title', 'image', 'status', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Categories::find()->where('parent_id!=0');

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
            'categories_id' => $this->categories_id,
            'parent_id' => $this->parent_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'default_title', $this->default_title])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
