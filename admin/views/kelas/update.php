<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Kelas */
?>
<div class="kelas-update">

    <?= $this->render('_form', [
        'model' => $model,
        'kelas' => $kelas,
        'guru' => $guru,
        'jurusan' => $jurusan,
        'tahunAjaran' => $tahunAjaran
    ]) ?>

</div>
