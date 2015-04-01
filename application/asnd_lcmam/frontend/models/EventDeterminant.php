<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "event_determinant".
 *
 * @property integer $id
 * @property string $year
 * @property string $sunday_cycle
 * @property string $weekday_cycle
 * @property string $week_ot_before_lent
 * @property string $ash_wednesday
 * @property string $easter_sunday
 * @property string $pentecost_sunday
 * @property string $week_ot_after_pentecost
 * @property string $first_sunday_of_advent
 */
class EventDeterminant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_determinant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year'], 'required'],
            [['year'], 'unique', 'targetClass' => '\frontend\models\EventDeterminant', 'message' => 'This year has already been taken'],
            [['year', 'ash_wednesday', 'easter_sunday', 'pentecost_sunday', 'first_sunday_of_advent'], 'safe'],
            [['sunday_cycle', 'weekday_cycle'], 'string', 'max' => 1],
            [['week_ot_before_lent', 'week_ot_after_pentecost'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Year',
            'sunday_cycle' => 'Sunday Cycle',
            'weekday_cycle' => 'Weekday Cycle',
            'week_ot_before_lent' => 'Week OT Before Lent',
            'ash_wednesday' => 'Ash Wednesday',
            'easter_sunday' => 'Easter Sunday',
            'pentecost_sunday' => 'Pentecost Sunday',
            'week_ot_after_pentecost' => 'Week OT After Pentecost',
            'first_sunday_of_advent' => 'First Sunday Of Advent',
        ];
    }
}
