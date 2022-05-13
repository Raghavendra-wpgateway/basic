<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'User form';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($session->hasFlash('db_success')): ?>

        <div class="alert alert-success">
            <?= $session->getFlash('db_success') ?>
        </div>

        <?php elseif($session->hasFlash('db_error')): ?>

        <div class="alert alert-danger">
            <?= $session->getFlash('db_error') ?>
        </div>

    <?php endif; ?>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'user-form']); ?>

                    <?= $form->field($model, 'firstname')->textInput(['placeholder' => 'type your firstname here..']) ?>
                    <?= $form->field($model, 'lastname')->textInput(['placeholder' => 'type your lastname here..']) ?>
                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'type your email here..']) ?>
                    <?= $form->field($model, 'password')->textInput(['placeholder' => 'type your password here..']) ?>
                    <?= $form->field($model, 'contact')->textInput(['placeholder' => 'type your contact here..']) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
</div>
