<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\GuruMataPelajaran */
?>
<div class="guru-mata-pelajaran-view">
    <div class="table-responsive">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                // 'class' => '\kartik\grid\DataColumn',
                'label' => 'Guru Pelajaran',
                'attribute' => 'id_guru',
                'value' => function ($model) {
                    return $model->namaGuru->nama_guru;
                }
            ],
            [
                // 'class' => '\kartik\grid\DataColumn',
                'label' => 'Mata Pelajaran',
                'attribute' => 'id_mata_pelajaran',
                'value' => function ($model) {
                    return $model->mataPelajaran->mata_pelajaran;
                }
            ],
            [
                // 'class' => '\kartik\grid\DataColumn',
                'label' => 'Tingkat Kelas',
                'attribute' => 'id_mata_pelajaran',
                'value' => function ($model) {
                    return $model->mataPelajaran->tingkatKelas->tingkat_kelas;
                }
            ],
            [
                // 'class' => '\kartik\grid\DataColumn',
                'label' => 'Jurusan',
                'attribute' => 'id_mata_pelajaran',
                'value' => function ($model) {
                    return $model->mataPelajaran->jurusan->jurusan;
                }
            ],
        ],
    ]) ?>
    </div>

</div>
