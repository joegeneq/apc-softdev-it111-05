<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "date".
 *
 * @property integer $id
 * @property string $date_month
 * @property string $date_week
 * @property string $date_day
 * @property string $year_year_year
 * @property integer $event_id
 * @property integer $weekday_reading_id
 * @property integer $sunday_reading_id
 *
 * @property Year $yearYearYear
 * @property Event $event
 * @property WeekdayReading $weekdayReading
 * @property SundayReading $sundayReading
 */

class Date extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'date';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'year_year_year', 'event_id', 'weekday_reading_id', 'sunday_reading_id'], 'required'],
            [['id', 'event_id', 'weekday_reading_id', 'sunday_reading_id'], 'integer'],
            [['year_year_year'], 'safe'],
            [['date_month', 'date_week', 'date_day'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_month' => 'Date Month',
            'date_week' => 'Date Week',
            'date_day' => 'Date Day',
            'year_year_year' => 'Year',
            'event_id' => 'Event ID',
            'weekday_reading_id' => 'Weekday Reading ID',
            'sunday_reading_id' => 'Sunday Reading ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYearYearYear()
    {
        return $this->hasOne(Year::className(), ['year_year' => 'year_year_year']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWeekdayReading()
    {
        return $this->hasOne(WeekdayReading::className(), ['id' => 'weekday_reading_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSundayReading()
    {
        return $this->hasOne(SundayReading::className(), ['id' => 'sunday_reading_id']);
    }
}
