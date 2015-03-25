<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\SundayReading;

/**
 * SundayReadingSearch represents the model behind the search form about `frontend\models\SundayReading`.
 */
class SundayReadingSearch extends SundayReading
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sunday_weeknum'], 'integer'],
            [['sunday_name', 'sunday_first_reading', 'sunday_first_audio', 'sunday_second_reading', 'sunday_second_audio', 'sunday_alleluia_verse', 'sunday_alleluia_audio', 'sunday_responsorial_psalm', 'sunday_responsorial_audio', 'sunday_gospel', 'sunday_gospel_audio', 'sunday_before_gospel', 'sunday_before_gospel_audio', 'sunday_cycle_type', 'sunday_reading_type', 'sunday_description', 'sunday_first_optional', 'sunday_second_optional', 'sunday_responsorial_optional', 'sunday_alleluia_optional', 'sunday_gospel_optional', 'sunday_before_gospel_optional'], 'safe'],
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
            'sunday_weeknum' => $this->sunday_weeknum,
        ]);

        $query->andFilterWhere(['like', 'sunday_name', $this->sunday_name])
            ->andFilterWhere(['like', 'sunday_first_reading', $this->sunday_first_reading])
            ->andFilterWhere(['like', 'sunday_first_audio', $this->sunday_first_audio])
            ->andFilterWhere(['like', 'sunday_second_reading', $this->sunday_second_reading])
            ->andFilterWhere(['like', 'sunday_second_audio', $this->sunday_second_audio])
            ->andFilterWhere(['like', 'sunday_alleluia_verse', $this->sunday_alleluia_verse])
            ->andFilterWhere(['like', 'sunday_alleluia_audio', $this->sunday_alleluia_audio])
            ->andFilterWhere(['like', 'sunday_responsorial_psalm', $this->sunday_responsorial_psalm])
            ->andFilterWhere(['like', 'sunday_responsorial_audio', $this->sunday_responsorial_audio])
            ->andFilterWhere(['like', 'sunday_gospel', $this->sunday_gospel])
            ->andFilterWhere(['like', 'sunday_gospel_audio', $this->sunday_gospel_audio])
            ->andFilterWhere(['like', 'sunday_before_gospel', $this->sunday_before_gospel])
            ->andFilterWhere(['like', 'sunday_before_gospel_audio', $this->sunday_before_gospel_audio])
            ->andFilterWhere(['like', 'sunday_cycle_type', $this->sunday_cycle_type])
            ->andFilterWhere(['like', 'sunday_reading_type', $this->sunday_reading_type])
            ->andFilterWhere(['like', 'sunday_description', $this->sunday_description])
            ->andFilterWhere(['like', 'sunday_first_optional', $this->sunday_first_optional])
            ->andFilterWhere(['like', 'sunday_second_optional', $this->sunday_second_optional])
            ->andFilterWhere(['like', 'sunday_responsorial_optional', $this->sunday_responsorial_optional])
            ->andFilterWhere(['like', 'sunday_alleluia_optional', $this->sunday_alleluia_optional])
            ->andFilterWhere(['like', 'sunday_gospel_optional', $this->sunday_gospel_optional])
            ->andFilterWhere(['like', 'sunday_before_gospel_optional', $this->sunday_before_gospel_optional]);

        return $dataProvider;
    }
}
