<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\WeekdayReading;

/**
 * weekdayReadingSearch represents the model behind the search form about `frontend\models\WeekdayReading`.
 */
class weekdayReadingSearch extends WeekdayReading
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'weekday_cycle_num', 'weekday_weeknum'], 'integer'],
            [['weekday_first_reading', 'weekday_first_audio', 'weekday_alleluia_verse', 'weekday_alleluia_audio', 'weekday_responsorial_psalm', 'weekday_responsorial_audio', 'weekday_gospel', 'weekday_gospel_audio', 'weekday_reading_type'], 'safe'],
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
            'weekday_weeknum' => $this->weekday_weeknum,
        ]);

        $query->andFilterWhere(['like', 'weekday_first_reading', $this->weekday_first_reading])
            ->andFilterWhere(['like', 'weekday_first_audio', $this->weekday_first_audio])
            ->andFilterWhere(['like', 'weekday_alleluia_verse', $this->weekday_alleluia_verse])
            ->andFilterWhere(['like', 'weekday_alleluia_audio', $this->weekday_alleluia_audio])
            ->andFilterWhere(['like', 'weekday_responsorial_psalm', $this->weekday_responsorial_psalm])
            ->andFilterWhere(['like', 'weekday_responsorial_audio', $this->weekday_responsorial_audio])
            ->andFilterWhere(['like', 'weekday_gospel', $this->weekday_gospel])
            ->andFilterWhere(['like', 'weekday_gospel_audio', $this->weekday_gospel_audio])
            ->andFilterWhere(['like', 'weekday_reading_type', $this->weekday_reading_type]);

        return $dataProvider;
    }
}
