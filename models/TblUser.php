<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property int $user_id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $email
 * @property string|null $password
 * @property string|null $contact
 * @property string $created
 * @property string|null $updated
 */
class TblUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created', 'updated'], 'safe'],
            [['firstname', 'lastname', 'email', 'password'], 'string', 'max' => 255],
            [['firstname', 'lastname', 'email', 'password', 'contact'], 'required'],
            [['contact'], 'string', 'max' => 12],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'password' => 'Password',
            'contact' => 'Contact',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
