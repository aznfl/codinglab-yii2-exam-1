<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
// use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\AddAkun */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guru-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['value' => $nama, 'readOnly' => true])->label('Nama Guru')?>
    
    <?= $form->field($model, 'username')->textInput(['autofocus' => true])?>

    <?= $form->field($model, 'email')->textInput()?>

    <?= $form->field($model, 'password')->passwordInput() ?>


    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->signup ? 'Create' : 'Update', ['class' => $model->signup ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>