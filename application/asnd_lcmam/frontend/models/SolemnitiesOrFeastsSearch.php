<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\SolemnitiesOrFeasts;

/**
 * SolemnitiesOrFeastsSearch represents the model behind the search form about `frontend\models\SolemnitiesOrFeasts`.
 */
class SolemnitiesOrFeastsSearch extends SolemnitiesOrFeasts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['date', 'title', 'type', 'first_reading', 'first_reading_audio', 'responsorial_psalm', 'responsorial_psalm_audio', 'second_reading', 'second_reading_audio', 'alleluia_verse', 'alleluia_verse_audio', 'gospel', 'gospel_audio', 'rule', 'cycle_type'], 'safe'],
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
        $query = SolemnitiesOrFeasts::find();

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

        $query->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'first_reading', $this->first_reading])
            ->andFilterWhere(['like', 'first_reading_audio', $this->first_reading_audio])
            ->andFilterWhere(['like', 'responsorial_psalm', $this->responsorial_psalm])
            ->andFilterWhere(['like', 'responsorial_psalm_audio', $this->responsorial_psalm_audio])
            ->andFilterWhere(['like', 'second_reading', $this->second_reading])
            ->andFilterWhere(['like', 'second_reading_audio', $this->second_reading_audio])
            ->andFilterWhere(['like', 'alleluia_verse', $this->alleluia_verse])
            ->andFilterWhere(['like', 'alleluia_verse_audio', $this->alleluia_verse_audio])
            ->andFilterWhere(['like', 'gospel', $this->gospel])
            ->andFilterWhere(['like', 'gospel_audio', $this->gospel_audio])
            ->andFilterWhere(['like', 'rule', $this->rule])
            ->andFilterWhere(['like', 'cycle_type', $this->cycle_type]);

        return $dataProvider;
    }
}
