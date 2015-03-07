<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SundayReading;

/**
 * SundayReadingSearch represents the model behind the search form about `backend\models\SundayReading`.
 */
class SundayReadingSearch extends SundayReading
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sunday_week_num', 'yearly_reading_set_id'], 'integer'],
            [['sundayr_cycle_type', 'sunday_reading', 'sunday_audio_link'], 'safe'],
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
        $query = SundayReading::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'sunday_week_num' => $this->sunday_week_num,
            'yearly_reading_set_id' => $this->yearly_reading_set_id,
        ]);

        $query->andFilterWhere(['like', 'sundayr_cycle_type', $this->sundayr_cycle_type])
            ->andFilterWhere(['like', 'sunday_reading', $this->sunday_reading])
            ->andFilterWhere(['like', 'sunday_audio_link', $this->sunday_audio_link]);

        return $dataProvider;
    }
}
