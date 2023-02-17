<?php

use yii\helpers\Url;

return [
    //[
    //'class' => 'kartik\grid\CheckboxColumn',
    //'width' => '20px',
    //],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    // [
    //     'class' => '\kartik\grid\DataColumn',
    //     'header' => 'Guru Mata Pelajaran',
    //     // 'attribute' => 'id_wali_kelas',
    //     'value' => function ($model) {
    //         return $model->waliKelas->nama_guru;
    //     }
    // ],
    [
        'label' => 'Guru Pelajaran',
        'class' => '\kartik\grid\DataColumn',
        'value' => 'guruPelajaran.namaGuru.nama_guru',
        // 'attribute'=>'mata_pelajaran',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'mata_pelajaran',
    ],
    [
        'label' => 'Tingkat Kelas',
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'id_tingkat_kelas',
        'value' => 'tingkatKelas.tingkat_kelas',
    ],
    [
        'label' => 'Jurusan',
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'id_jurusan',
        'value' => 'jurusan.jurusan',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $model->id]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'Lihat', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Ubah', 'data-toggle' => 'tooltip'],
        'deleteOptions' => [
            'role' => 'modal-remote', 'title' => 'Hapus',
            'data-confirm' => false, 'data-method' => false, // for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Peringatan',
            'data-confirm-message' => 'Apakah anda yakin ingin menghapus data ini?'
        ],
    ],

];
