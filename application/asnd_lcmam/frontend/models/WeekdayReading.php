<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "weekday_reading".
 *
 * @property integer $id
 * @property integer $weekday_daynum
 * @property string $weekday_name
 * @property string $weekday_day
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
 * @property string $weekday_first_optional
 * @property string $weekday_responsorial_optional
 * @property string $weekday_alleluia_optional
 * @property string $weekday_gospel_optional
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
            [['weekday_daynum', 'weekday_weeknum', 'weekday_reading_type'], 'required'],
            [['weekday_daynum', 'weekday_cycle_num', 'weekday_weeknum'], 'integer'],
            [['weekday_name', 'weekday_first_reading', 'weekday_alleluia_verse', 'weekday_responsorial_psalm', 'weekday_gospel', 'weekday_reading_type'], 'string', 'max' => 45],
            [['weekday_day'], 'string', 'max' => 10],
            [['weekday_first_audio', 'weekday_alleluia_audio', 'weekday_responsorial_audio', 'weekday_gospel_audio'], 'string', 'max' => 1000],
            [['weekday_first_optional', 'weekday_responsorial_optional', 'weekday_alleluia_optional', 'weekday_gospel_optional'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'weekday_daynum' => 'Weekday Day Number',
            'weekday_name' => 'Weekday Name',
            'weekday_day' => 'Weekday Day',
            'weekday_first_reading' => 'Weekday First Reading',
            'weekday_first_audio' => 'Weekday First Reading Audio',
            'weekday_alleluia_verse' => 'Weekday Alleluia Verse',
            'weekday_alleluia_audio' => 'Weekday Alleluia Verse Audio',
            'weekday_responsorial_psalm' => 'Weekday Responsorial Psalm',
            'weekday_responsorial_audio' => 'Weekday Responsorial Psalm Audio',
            'weekday_gospel' => 'Weekday Gospel',
            'weekday_gospel_audio' => 'Weekday Gospel Audio',
            'weekday_cycle_num' => 'Weekday Cycle Number',
            'weekday_weeknum' => 'Weekday Week Number',
            'weekday_reading_type' => 'Weekday Reading Type',
            'weekday_first_optional' => 'Weekday First Reading Optional',
            'weekday_responsorial_optional' => 'Weekday Responsorial Psalm Optional',
            'weekday_alleluia_optional' => 'Weekday Alleluia Verse Optional',
            'weekday_gospel_optional' => 'Weekday Gospel Optional',
        ];
    }
}
