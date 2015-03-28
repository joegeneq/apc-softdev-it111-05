<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\WeekdayReading;

/**
 * WeekdayReadingSearch represents the model behind the search form about `frontend\models\WeekdayReading`.
 */
class WeekdayReadingSearch extends WeekdayReading
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'weekday_daynum', 'weekday_cycle_num', 'weekday_weeknum'], 'integer'],
            [['weekday_name', 'weekday_day', 'weekday_first_reading', 'weekday_first_audio', 'weekday_alleluia_verse', 'weekday_alleluia_audio', 'weekday_responsorial_psalm', 'weekday_responsorial_audio', 'weekday_gospel', 'weekday_gospel_audio', 'weekday_reading_type', 'weekday_first_optional', 'weekday_responsorial_optional', 'weekday_alleluia_optional', 'weekday_gospel_optional'], 'safe'],
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
            'weekday_daynum' => $this->weekday_daynum,
            'weekday_cycle_num' => $this->weekday_cycle_num,
            'weekday_weeknum' => $this->weekday_weeknum,
        ]);

        $query->andFilterWhere(['like', 'weekday_name', $this->weekday_name])
            ->andFilterWhere(['like', 'weekday_day', $this->weekday_day])
            ->andFilterWhere(['like', 'weekday_first_reading', $this->weekday_first_reading])
            ->andFilterWhere(['like', 'weekday_first_audio', $this->weekday_first_audio])
            ->andFilterWhere(['like', 'weekday_alleluia_verse', $this->weekday_alleluia_verse])
            ->andFilterWhere(['like', 'weekday_alleluia_audio', $this->weekday_alleluia_audio])
            ->andFilterWhere(['like', 'weekday_responsorial_psalm', $this->weekday_responsorial_psalm])
            ->andFilterWhere(['like', 'weekday_responsorial_audio', $this->weekday_responsorial_audio])
            ->andFilterWhere(['like', 'weekday_gospel', $this->weekday_gospel])
            ->andFilterWhere(['like', 'weekday_gospel_audio', $this->weekday_gospel_audio])
            ->andFilterWhere(['like', 'weekday_reading_type', $this->weekday_reading_type])
            ->andFilterWhere(['like', 'weekday_first_optional', $this->weekday_first_optional])
            ->andFilterWhere(['like', 'weekday_responsorial_optional', $this->weekday_responsorial_optional])
            ->andFilterWhere(['like', 'weekday_alleluia_optional', $this->weekday_alleluia_optional])
            ->andFilterWhere(['like', 'weekday_gospel_optional', $this->weekday_gospel_optional]);

        return $dataProvider;
    }
}
