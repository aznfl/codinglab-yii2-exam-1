<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MataPelajaran */
?>
<div class="mata-pelajaran-view">
    <div class="table-responsive">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'mata_pelajaran',
                [
                    // 'class' => '\kartik\grid\DataColumn',
                    'label' => 'Tingkat Kelas',
                    'attribute' => 'id_tingkat',
                    'value' => function ($model) {
                        return $model->tingkatKelas->tingkat_kelas;
                    }
                ],
                [
                    // 'class' => '\kartik\grid\DataColumn',
                    'label' => 'Jurusan Kelas',
                    'attribute' => 'id_jurusan',
                    'value' => function ($model) {
                        return $model->jurusan->jurusan;
                    }
                ],
            ],
        ]) ?>
    </div>

</div>