<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Wali */

?>
<div class="wali-create">
    <?= $this->render('_form', [
        'model' => $model,
        'status_wali' => $status_wali
    ]) ?>
</div>
