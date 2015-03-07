<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "weekday_reading".
 *
 * @property integer $id
 * @property integer $weekday_cycle_num
 * @property string $weekday_reading
 * @property integer $weekday_week_num
 * @property string $weekday_day
 * @property string $weekday_audio_link
 * @property integer $yearly_reading_set_id
 *
 * @property Date[] $dates
 * @property YearlyReadingSet $yearlyReadingSet
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
            [['weekday_cycle_num', 'weekday_reading', 'weekday_week_num', 'weekday_day', 'weekday_audio_link', 'yearly_reading_set_id'], 'required'],
            [['weekday_cycle_num', 'weekday_week_num', 'yearly_reading_set_id'], 'integer'],
            [['weekday_day'], 'safe'],
            [['weekday_reading', 'weekday_audio_link'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'weekday_cycle_num' => 'Weekday Cycle Num',
            'weekday_reading' => 'Weekday Reading',
            'weekday_week_num' => 'Weekday Week Num',
            'weekday_day' => 'Weekday Day',
            'weekday_audio_link' => 'Weekday Audio Link',
            'yearly_reading_set_id' => 'Yearly Reading Set ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDates()
    {
        return $this->hasMany(Date::className(), ['weekday_reading_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYearlyReadingSet()
    {
        return $this->hasOne(YearlyReadingSet::className(), ['id' => 'yearly_reading_set_id']);
    }
}
