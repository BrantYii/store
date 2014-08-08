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
use backend\models\CategoriesLanguage;

/**
 * CategoriesLanguageSearch represents the model behind the search form about `backend\models\CategoriesLanguage`.
 */
class CategoriesLanguageSearch extends CategoriesLanguage
{
    public function rules()
    {
        return [
            [['categories_language_id', 'categories_id', 'language_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['language_title', 'status'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = CategoriesLanguage::find();

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
            'categories_language_id' => $this->categories_language_id,
            'categories_id' => $this->categories_id,
            'language_id' => $this->language_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'language_title', $this->language_title])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
