<?php
use yii\bootstrap4\ActiveForm;
?>
<div class="user-form">

   <div class="row">
     <?php  $form = ActiveForm::begin(['id'=> 'user_form', 'classs' => 'user_form']) ?>
      <div class="col-lg-12">
          <?php $form->field($model, 'name') ?>
      </div>

      <div class="col-lg-12">
          <?php $form->field($model, 'email') ?>
      </div>
   </div>

</div>