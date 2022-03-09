<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\validators\Validator;

class userForm extends Model
{
    private $name;
    private $email;
   public function rules()
   {
       return [
           [['name', 'email'], 'required'],
           ['email', 'email']
       ];
   }
}