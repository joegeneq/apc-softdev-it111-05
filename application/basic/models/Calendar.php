<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calendar".
 *
 * @property integer $Calendar_ID
 * @property string $Calendar_Year
 * @property string $Calendar_Month
 * @property string $Calendar_Date
 * @property integer $YEARLY_READING_SET_Reading_ID
 *
 * @property YearlyReadingSet $yEARLYREADINGSETReading
 * @property Day[] $days
 */
class Calendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Calendar_Year', 'Calendar_Month', 'Calendar_Date', 'YEARLY_READING_SET_Reading_ID'], 'required'],
            [['Calendar_Year', 'Calendar_Month', 'Calendar_Date'], 'safe'],
            [['YEARLY_READING_SET_Reading_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Calendar_ID' => 'Calendar  ID',
            'Calendar_Year' => 'Calendar  Year',
            'Calendar_Month' => 'Calendar  Month',
            'Calendar_Date' => 'Calendar  Date',
            'YEARLY_READING_SET_Reading_ID' => 'Yearly  Reading  Set  Reading  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYEARLYREADINGSETReading()
    {
        return $this->hasOne(YearlyReadingSet::className(), ['Reading_ID' => 'YEARLY_READING_SET_Reading_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDays()
    {
        return $this->hasMany(Day::className(), ['CALENDAR_Calendar_ID' => 'Calendar_ID']);
    }
}
