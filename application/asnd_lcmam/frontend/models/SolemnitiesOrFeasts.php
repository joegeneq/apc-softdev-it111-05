<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "solemnities_or_feasts".
 *
 * @property integer $id
 * @property string $date
 * @property string $title
 * @property string $type
 * @property string $first_reading
 * @property string $first_reading_audio
 * @property string $responsorial_psalm
 * @property string $responsorial_psalm_audio
 * @property string $second_reading
 * @property string $second_reading_audio
 * @property string $alleluia_verse
 * @property string $alleluia_verse_audio
 * @property string $gospel
 * @property string $gospel_audio
 * @property string $rule
 * @property string $cycle_type
 */
class SolemnitiesOrFeasts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solemnities_or_feasts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'title', 'type'], 'required'],
            [['date'], 'string', 'max' => 10],
            [['title'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 20],
            [['first_reading', 'first_reading_audio', 'responsorial_psalm', 'responsorial_psalm_audio', 'second_reading', 'second_reading_audio', 'alleluia_verse', 'alleluia_verse_audio', 'gospel', 'gospel_audio'], 'string', 'max' => 60],
            [['rule', 'cycle_type'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'title' => 'Title',
            'type' => 'Type',
            'first_reading' => 'First Reading',
            'first_reading_audio' => 'First Reading Audio',
            'responsorial_psalm' => 'Responsorial Psalm',
            'responsorial_psalm_audio' => 'Responsorial Psalm Audio',
            'second_reading' => 'Second Reading',
            'second_reading_audio' => 'Second Reading Audio',
            'alleluia_verse' => 'Alleluia Verse',
            'alleluia_verse_audio' => 'Alleluia Verse Audio',
            'gospel' => 'Gospel',
            'gospel_audio' => 'Gospel Audio',
            'rule' => 'Rule',
            'cycle_type' => 'Cycle Type',
        ];
    }
}
