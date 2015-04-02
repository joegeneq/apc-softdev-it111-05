<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sunday_reading".
 *
 * @property integer $id
 * @property integer $sunday_weeknum
 * @property string $sunday_name
 * @property string $sunday_first_reading
 * @property string $sunday_first_audio
 * @property string $sunday_second_reading
 * @property string $sunday_second_audio
 * @property string $sunday_alleluia_verse
 * @property string $sunday_alleluia_audio
 * @property string $sunday_responsorial_psalm
 * @property string $sunday_responsorial_audio
 * @property string $sunday_gospel
 * @property string $sunday_gospel_audio
 * @property string $sunday_before_gospel
 * @property string $sunday_before_gospel_audio
 * @property string $sunday_cycle_type
 * @property string $sunday_reading_type
 * @property string $sunday_description
 * @property string $sunday_first_optional
 * @property string $sunday_second_optional
 * @property string $sunday_responsorial_optional
 * @property string $sunday_alleluia_optional
 * @property string $sunday_gospel_optional
 * @property string $sunday_before_gospel_optional
 */
class SundayReading extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sunday_reading';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sunday_weeknum', 'sunday_cycle_type', 'sunday_reading_type'], 'required'],
            [['sunday_weeknum'], 'integer'],
            [['sunday_name', 'sunday_before_gospel', 'sunday_description', 'sunday_first_optional', 'sunday_second_optional', 'sunday_responsorial_optional', 'sunday_alleluia_optional', 'sunday_gospel_optional', 'sunday_before_gospel_optional'], 'string', 'max' => 100],
            [['sunday_first_reading', 'sunday_second_reading', 'sunday_alleluia_verse', 'sunday_responsorial_psalm', 'sunday_gospel', 'sunday_reading_type'], 'string', 'max' => 45],
            [['sunday_first_audio', 'sunday_second_audio', 'sunday_alleluia_audio', 'sunday_responsorial_audio', 'sunday_gospel_audio', 'sunday_before_gospel_audio'], 'string', 'max' => 1000],
            [['sunday_cycle_type'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sunday_weeknum' => 'Sunday Week Number',
            'sunday_name' => 'Sunday Name',
            'sunday_first_reading' => 'Sunday First Reading',
            'sunday_first_audio' => 'Sunday First Reading Audio',
            'sunday_second_reading' => 'Sunday Second Reading',
            'sunday_second_audio' => 'Sunday Second Reading Audio',
            'sunday_alleluia_verse' => 'Sunday Alleluia Verse',
            'sunday_alleluia_audio' => 'Sunday Alleluia Verse Audio',
            'sunday_responsorial_psalm' => 'Sunday Responsorial Psalm',
            'sunday_responsorial_audio' => 'Sunday Responsorial Psalm Audio',
            'sunday_gospel' => 'Sunday Gospel',
            'sunday_gospel_audio' => 'Sunday Gospel Audio',
            'sunday_before_gospel' => 'Sunday Reading Before Gospel',
            'sunday_before_gospel_audio' => 'Sunday Reading Before Gospel Audio',
            'sunday_cycle_type' => 'Sunday Cycle Type',
            'sunday_reading_type' => 'Sunday Reading Type',
            'sunday_description' => 'Sunday Description',
            'sunday_first_optional' => 'Sunday First Reading Optional',
            'sunday_second_optional' => 'Sunday Second Reading Optional',
            'sunday_responsorial_optional' => 'Sunday Responsorial Psalm Optional',
            'sunday_alleluia_optional' => 'Sunday Alleluia Verse Optional',
            'sunday_gospel_optional' => 'Sunday Gospel Optional',
            'sunday_before_gospel_optional' => 'Sunday Reading Before Gospel Optional',
        ];
    }
}
