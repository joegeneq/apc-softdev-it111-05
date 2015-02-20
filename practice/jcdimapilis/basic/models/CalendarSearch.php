<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Calendar;

/**
 * CalendarSearch represents the model behind the search form about `app\models\Calendar`.
 */
class CalendarSearch extends Calendar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Calendar_ID', 'YEARLY_READING_SET_Reading_ID'], 'integer'],
            [['Calendar_Year', 'Calendar_Month', 'Calendar_Date'], 'safe'],
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
        $query = Calendar::find();

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
            'Calendar_ID' => $this->Calendar_ID,
            'Calendar_Year' => $this->Calendar_Year,
            'Calendar_Month' => $this->Calendar_Month,
            'Calendar_Date' => $this->Calendar_Date,
            'YEARLY_READING_SET_Reading_ID' => $this->YEARLY_READING_SET_Reading_ID,
        ]);

        return $dataProvider;
    }
}
