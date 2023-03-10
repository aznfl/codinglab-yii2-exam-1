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
            // 'id',
            'nis',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat:ntext',
            // 'id_kelas',
            [
                // 'class' => '\kartik\grid\DataColumn',
                'label' => 'Kelas',
                'attribute' => 'id_kelas',
                'value' => function ($model) {
                    return $model->namaKelas->nama_kelas;
                }
            ],
            // 'id_user',
        ],
    ]) ?>
    </div>

</div>
