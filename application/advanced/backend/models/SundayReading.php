<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sunday_reading".
 *
 * @property integer $id
 * @property string $sundayr_cycle_type
 * @property string $sunday_reading
 * @property integer $sunday_week_num
 * @property string $sunday_audio_link
 * @property integer $yearly_reading_set_id
 *
 * @property Date[] $dates
 * @property YearlyReadingSet $yearlyReadingSet
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
            [['sundayr_cycle_type', 'sunday_reading', 'sunday_week_num', 'sunday_audio_link', 'yearly_reading_set_id'], 'required'],
            [['sunday_week_num', 'yearly_reading_set_id'], 'integer'],
            [['sundayr_cycle_type', 'sunday_reading', 'sunday_audio_link'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sundayr_cycle_type' => 'Sundayr Cycle Type',
            'sunday_reading' => 'Sunday Reading',
            'sunday_week_num' => 'Sunday Week Num',
            'sunday_audio_link' => 'Sunday Audio Link',
            'yearly_reading_set_id' => 'Yearly Reading Set ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDates()
    {
        return $this->hasMany(Date::className(), ['sunday_reading_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYearlyReadingSet()
    {
        return $this->hasOne(YearlyReadingSet::className(), ['id' => 'yearly_reading_set_id']);
    }
}
