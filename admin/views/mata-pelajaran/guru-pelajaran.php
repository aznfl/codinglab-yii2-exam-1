<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
// use kartik\date\DatePicker;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model common\models\AddAkun */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_guru')->widget(Select2::classname(), [
        'data' => $kelas,
        'options' => ['placeholder' => '-Pilih Guru Mata Pelajaran-'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Guru Mata Pelajaran'); ?>

    <?php if (!Yii::$app->request->isAjax) { ?>
        <div class="form-group">
            <?= Html::submitButton($model->signup ? 'Create' : 'Update', ['class' => $model->signup ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    <?php } ?>

    <?php ActiveForm::end(); ?>

</div>