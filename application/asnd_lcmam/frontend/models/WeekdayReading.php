<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "weekday_reading".
 *
 * @property integer $id
 * @property string $weekday_first_reading
 * @property string $weekday_first_audio
 * @property string $weekday_alleluia_verse
 * @property string $weekday_alleluia_audio
 * @property string $weekday_responsorial_psalm
 * @property string $weekday_responsorial_audio
 * @property string $weekday_gospel
 * @property string $weekday_gospel_audio
 * @property integer $weekday_cycle_num
 * @property integer $weekday_weeknum
 * @property string $weekday_reading_type
 */
class WeekdayReading extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weekday_reading';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['weekday_cycle_num', 'weekday_weeknum', 'weekday_reading_type'], 'required'],
            [['weekday_cycle_num', 'weekday_weeknum'], 'integer'],
            [['weekday_first_reading', 'weekday_first_audio', 'weekday_alleluia_verse', 'weekday_alleluia_audio', 'weekday_responsorial_psalm', 'weekday_responsorial_audio', 'weekday_gospel', 'weekday_gospel_audio', 'weekday_reading_type'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'weekday_first_reading' => 'Weekday First Reading',
            'weekday_first_audio' => 'Weekday First Audio',
            'weekday_alleluia_verse' => 'Weekday Alleluia Verse',
            'weekday_alleluia_audio' => 'Weekday Alleluia Audio',
            'weekday_responsorial_psalm' => 'Weekday Responsorial Psalm',
            'weekday_responsorial_audio' => 'Weekday Responsorial Audio',
            'weekday_gospel' => 'Weekday Gospel',
            'weekday_gospel_audio' => 'Weekday Gospel Audio',
            'weekday_cycle_num' => 'Weekday Cycle Num',
            'weekday_weeknum' => 'Weekday Weeknum',
            'weekday_reading_type' => 'Weekday Reading Type',
        ];
    }
}
