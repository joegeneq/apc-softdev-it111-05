<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "solemnities_or_feasts".
 *
 * @property integer $id
 * @property string $date
 * @property string $title
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
            [['date', 'title', 'type'], 'required'],
            [['date'], 'string', 'max' => 10],
            [['title'], 'string', 'max' => 100],
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
            'type' => 'Type',
        ];
    }
}
