<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EventDeterminant;

/**
 * EventDeterminantSearch represents the model behind the search form about `frontend\models\EventDeterminant`.
 */
class EventDeterminantSearch extends EventDeterminant
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['year', 'sunday_cycle', 'weekday_cycle', 'week_ot_before_lent', 'ash_wednesday', 'easter_sunday', 'pentecost_sunday', 'week_ot_after_pentecost', 'first_sunday_of_advent'], 'safe'],
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
        $query = EventDeterminant::find();

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
            'year' => $this->year,
            'ash_wednesday' => $this->ash_wednesday,
            'easter_sunday' => $this->easter_sunday,
            'pentecost_sunday' => $this->pentecost_sunday,
            'first_sunday_of_advent' => $this->first_sunday_of_advent,
        ]);

        $query->andFilterWhere(['like', 'sunday_cycle', $this->sunday_cycle])
            ->andFilterWhere(['like', 'weekday_cycle', $this->weekday_cycle])
            ->andFilterWhere(['like', 'week_ot_before_lent', $this->week_ot_before_lent])
            ->andFilterWhere(['like', 'week_ot_after_pentecost', $this->week_ot_after_pentecost]);

        return $dataProvider;
    }
}
