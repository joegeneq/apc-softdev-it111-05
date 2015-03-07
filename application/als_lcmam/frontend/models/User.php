<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $address
 * @property string $contact_num
 * @property string $user_type
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'firstname', 'middlename', 'lastname', 'address', 'contact_num', 'user_type'], 'required'],
            [['username', 'password', 'firstname', 'middlename', 'lastname', 'address', 'user_type'], 'string', 'max' => 45],
            [['contact_num'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'firstname' => 'Firstname',
            'middlename' => 'Middlename',
            'lastname' => 'Lastname',
            'address' => 'Address',
            'contact_num' => 'Contact Num',
            'user_type' => 'User Type',
        ];
    }
}
