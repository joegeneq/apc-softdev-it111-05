<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProvinceSearch represents the model behind the search form about `app\models\Province`.
 */
class ProvinceSearch extends Province
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'], //removed region id
            [['province_code', 'region_id', 'province_description'], 'safe'], //added province id
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Province::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('region'); //Added joinWith 

        $query->andFilterWhere([
            'id' => $this->id,
            //'region_id' => $this->region_id, //Removed region id from parameters
        ]);

        $query->andFilterWhere(['like', 'province_code', $this->province_code])
            ->andFilterWhere(['like', 'province_description', $this->province_description])
            ->andFilterWhere(['like', 'region.region_description', $this->region_id]); //Added filterwhere

        return $dataProvider;
    }
}
