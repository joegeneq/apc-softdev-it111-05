<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Event;

/**
 * EventSearch represents the model behind the search form about `frontend\models\Event`.
 */
class EventSearch extends Event
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['event_name', 'event_type', 'date', 'event_first_reading', 'event_first_audio', 'event_second_reading', 'event_second_audio', 'event_alleluia_verse', 'event_alleluia_audio', 'event_responsorial_psalm', 'event_responsorial_audio', 'event_gospel', 'event_gospel_audio', 'event_first_optional', 'event_second_optional', 'event_responsorial_optional', 'event_alleluia_optional', 'event_gospel_optional'], 'safe'],
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
        $query = Event::find();

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
        ]);

        $query->andFilterWhere(['like', 'event_name', $this->event_name])
            ->andFilterWhere(['like', 'event_type', $this->event_type])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'event_first_reading', $this->event_first_reading])
            ->andFilterWhere(['like', 'event_first_audio', $this->event_first_audio])
            ->andFilterWhere(['like', 'event_second_reading', $this->event_second_reading])
            ->andFilterWhere(['like', 'event_second_audio', $this->event_second_audio])
            ->andFilterWhere(['like', 'event_alleluia_verse', $this->event_alleluia_verse])
            ->andFilterWhere(['like', 'event_alleluia_audio', $this->event_alleluia_audio])
            ->andFilterWhere(['like', 'event_responsorial_psalm', $this->event_responsorial_psalm])
            ->andFilterWhere(['like', 'event_responsorial_audio', $this->event_responsorial_audio])
            ->andFilterWhere(['like', 'event_gospel', $this->event_gospel])
            ->andFilterWhere(['like', 'event_gospel_audio', $this->event_gospel_audio])
            ->andFilterWhere(['like', 'event_first_optional', $this->event_first_optional])
            ->andFilterWhere(['like', 'event_second_optional', $this->event_second_optional])
            ->andFilterWhere(['like', 'event_responsorial_optional', $this->event_responsorial_optional])
            ->andFilterWhere(['like', 'event_alleluia_optional', $this->event_alleluia_optional])
            ->andFilterWhere(['like', 'event_gospel_optional', $this->event_gospel_optional]);

        return $dataProvider;
    }
}
