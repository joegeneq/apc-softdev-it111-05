<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Date;

/**
 * DateSearch represents the model behind the search form about `frontend\models\Date`.
 */
class DateSearch extends Date
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'event_id', 'weekday_reading_id', 'sunday_reading_id'], 'integer'],
            [['date_month', 'date_week', 'date_day', 'year_year_year'], 'safe'],
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
        $query = Date::find();

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
            'year_year_year' => $this->year_year_year,
            'event_id' => $this->event_id,
            'weekday_reading_id' => $this->weekday_reading_id,
            'sunday_reading_id' => $this->sunday_reading_id,
        ]);

        $query->andFilterWhere(['like', 'date_month', $this->date_month])
            ->andFilterWhere(['like', 'date_week', $this->date_week])
            ->andFilterWhere(['like', 'date_day', $this->date_day]);

        return $dataProvider;
    }
}
