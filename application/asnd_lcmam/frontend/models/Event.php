<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $event_name
 * @property string $event_type
 * @property string $date
 * @property string $event_first_reading
 * @property string $event_first_audio
 * @property string $event_second_reading
 * @property string $event_second_audio
 * @property string $event_alleluia_verse
 * @property string $event_alleluia_audio
 * @property string $event_responsorial_psalm
 * @property string $event_responsorial_audio
 * @property string $event_gospel
 * @property string $event_gospel_audio
 * @property string $event_first_optional
 * @property string $event_second_optional
 * @property string $event_responsorial_optional
 * @property string $event_alleluia_optional
 * @property string $event_gospel_optional
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_type'], 'required'],
            [['event_name', 'event_type', 'date', 'event_first_reading', 'event_first_audio', 'event_second_reading', 'event_second_audio', 'event_alleluia_verse', 'event_alleluia_audio', 'event_responsorial_psalm', 'event_responsorial_audio', 'event_gospel', 'event_gospel_audio'], 'string', 'max' => 45],
            [['event_first_optional', 'event_second_optional', 'event_responsorial_optional', 'event_alleluia_optional', 'event_gospel_optional'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_name' => 'Event Name',
            'event_type' => 'Event Type',
            'date' => 'Date',
            'event_first_reading' => 'Event First Reading',
            'event_first_audio' => 'Event First Reading Audio',
            'event_second_reading' => 'Event Second Reading',
            'event_second_audio' => 'Event Second Reading Audio',
            'event_alleluia_verse' => 'Event Alleluia Verse',
            'event_alleluia_audio' => 'Event Alleluia Verse Audio',
            'event_responsorial_psalm' => 'Event Responsorial Psalm',
            'event_responsorial_audio' => 'Event Responsorial Psalm Audio',
            'event_gospel' => 'Event Gospel',
            'event_gospel_audio' => 'Event Gospel Audio',
            'event_first_optional' => 'Event First Reading Optional',
            'event_second_optional' => 'Event Second Reading Optional',
            'event_responsorial_optional' => 'Event Responsorial Psalm Optional',
            'event_alleluia_optional' => 'Event Alleluia Verse Optional',
            'event_gospel_optional' => 'Event Gospel Optional',
        ];
    }
}
