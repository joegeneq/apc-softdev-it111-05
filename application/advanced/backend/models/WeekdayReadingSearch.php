<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\WeekdayReading;

/**
 * WeekdayReadingSearch represents the model behind the search form about `backend\models\WeekdayReading`.
 */
class WeekdayReadingSearch extends WeekdayReading
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'weekday_cycle_num', 'weekday_week_num', 'yearly_reading_set_id'], 'integer'],
            [['weekday_reading', 'weekday_day', 'weekday_audio_link'], 'safe'],
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
        $query = WeekdayReading::find();

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
            'weekday_cycle_num' => $this->weekday_cycle_num,
            'weekday_week_num' => $this->weekday_week_num,
            'weekday_day' => $this->weekday_day,
            'yearly_reading_set_id' => $this->yearly_reading_set_id,
        ]);

        $query->andFilterWhere(['like', 'weekday_reading', $this->weekday_reading])
            ->andFilterWhere(['like', 'weekday_audio_link', $this->weekday_audio_link]);

        return $dataProvider;
    }
}
