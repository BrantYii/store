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
use backend\models\Currencies;

/**
 * CurrenciesSearch represents the model behind the search form about `backend\models\Currencies`.
 */
class CurrenciesSearch extends Currencies
{
    public function rules()
    {
        return [
            [['currencies_id', 'iso_code', 'status', 'created_by', 'updated_by'], 'integer'],
            [['default_title', 'code', 'symbol', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Currencies::find();

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
            'currencies_id' => $this->currencies_id,
            'iso_code' => $this->iso_code,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'default_title', $this->default_title])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'symbol', $this->symbol]);

        return $dataProvider;
    }
}
