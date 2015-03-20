<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sunday_reading".
 *
 * @property integer $id
 * @property integer $sunday_weeknum
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
            [['sunday_first_reading', 'sunday_first_audio', 'sunday_second_reading', 'sunday_second_audio', 'sunday_alleluia_verse', 'sunday_alleluia_audio', 'sunday_responsorial_psalm', 'sunday_responsorial_audio', 'sunday_gospel', 'sunday_gospel_audio', 'sunday_reading_type'], 'string', 'max' => 45],
            [['sunday_before_gospel', 'sunday_before_gospel_audio'], 'string', 'max' => 100],
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
            'sunday_weeknum' => 'Sunday Weeknum',
            'sunday_first_reading' => 'Sunday First Reading',
            'sunday_first_audio' => 'Sunday First Audio',
            'sunday_second_reading' => 'Sunday Second Reading',
            'sunday_second_audio' => 'Sunday Second Audio',
            'sunday_alleluia_verse' => 'Sunday Alleluia Verse',
            'sunday_alleluia_audio' => 'Sunday Alleluia Audio',
            'sunday_responsorial_psalm' => 'Sunday Responsorial Psalm',
            'sunday_responsorial_audio' => 'Sunday Responsorial Audio',
            'sunday_gospel' => 'Sunday Gospel',
            'sunday_gospel_audio' => 'Sunday Gospel Audio',
            'sunday_before_gospel' => 'Sunday Before Gospel',
            'sunday_before_gospel_audio' => 'Sunday Before Gospel Audio',
            'sunday_cycle_type' => 'Sunday Cycle Type',
            'sunday_reading_type' => 'Sunday Reading Type',
        ];
    }
}
