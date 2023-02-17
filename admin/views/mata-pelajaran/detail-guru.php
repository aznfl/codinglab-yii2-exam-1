<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Siswa */
?>
<div class="siswa-view">
    <div class="table-responsive">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nama',
                [
                    // 'class' => '\kartik\grid\DataColumn',
                    'label' => 'Username (NIS)',
                    'attribute' => 'username',
                    'value' => function ($model) {
                        return $model->guruPelajaran->nama_guru;
                    }
                ],
            ],
        ]) ?>
    </div>

</div>