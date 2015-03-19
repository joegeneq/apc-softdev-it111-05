<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "solemnities_or_feasts".
 *
 * @property integer $id
 * @property string $date
 * @property string $title
 * @property string $first_reading
 * @property string $first_reading_audio
 * @property string $responsorial_psalm
 * @property string $responsorial_psalm_audio
 * @property string $second_reading
 * @property string $second_reading_audio
 * @property string $gospel
 * @property string $gospel_audio
 * @property string $type
 */
class SolemnitiesOrFeasts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solemnities_or_feasts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'title'], 'required'],
            [['date'], 'string', 'max' => 10],
            [['title', 'first_reading', 'first_reading_audio', 'responsorial_psalm', 'responsorial_psalm_audio', 'second_reading', 'second_reading_audio', 'gospel', 'gospel_audio'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'title' => 'Title',
            'first_reading' => 'First Reading',
            'first_reading_audio' => 'First Reading Audio',
            'responsorial_psalm' => 'Responsorial Psalm',
            'responsorial_psalm_audio' => 'Responsorial Psalm Audio',
            'second_reading' => 'Second Reading',
            'second_reading_audio' => 'Second Reading Audio',
            'gospel' => 'Gospel',
            'gospel_audio' => 'Gospel Audio',
            'type' => 'Type',
        ];
    }
}
