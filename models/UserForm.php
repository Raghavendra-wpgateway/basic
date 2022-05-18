<?php

namespace app\models;





class userForm extends \yii\db\ActiveRecord
{

   /**
     * This is the model class for table "tbl_user".
     * @property string $firstname
     * @property string $lastname
     * @property string $email
     * @property string $password
     * @property string $contact
     */

   public function rules()
   {
       return [
           [['firstname', 'email', 'lastname', 'password', 'contact'], 'required'],
           ['email', 'email'],
           [['contact'], 'integer', 'max' => 999999999999],
           [['firstname', 'lastname'], 'string', 'max' => 50 ]
       ];
   }

   public static function tableName()
   {
       return 'tbl_user';
   }
}