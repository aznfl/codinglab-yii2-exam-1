<?php

use yii\helpers\Url;
use yii\helpers\Html;

return [
    //[
    //'class' => 'kartik\grid\CheckboxColumn',
    //'width' => '20px',
    //],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Nama Guru',
        'attribute' => 'cari_guru',
        'value' => 'namaGuru.nama_guru',
    ],
    // [
    //     'class' => '\kartik\grid\DataColumn',
    //     'label' => 'Mata Pelajaran',
    //     'attribute' => 'id_mata_pelajaran',
    //     'value' => 'mataPelajaran.mata_pelajaran',
    // ],
    // [
    //     'class' => '\kartik\grid\DataColumn',
    //     'label' => 'Tingkat Kelas',
    //     'attribute' => 'id_mata_pelajaran',
    //     'value' => 'mataPelajaran.tingkatKelas.tingkat_kelas',
    // ],
    // [
    //     'class' => '\kartik\grid\DataColumn',
    //     'label' => 'Jurusan',
    //     'attribute' => 'id_mata_pelajaran',
    //     'value' => 'mataPelajaran.jurusan.jurusan',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => 'Aksi',
        'template' => '{btn_aksi}',
        'buttons' => [
            "btn_aksi" => function ($action, $model, $key) {
                return Html::a('Hapus', ['delete', 'id_guru' => $model->id_guru, 'id_mapel' => $model->id_mata_pelajaran], [
                    'class' => 'btn btn-danger btn-block',
                    // 'data-method' => 'POST',
                    // 'role' => 'modal-remote',
                    'title' => 'Hapus',
                    'data-toggle' => 'tooltip',
                    'role' => 'modal-remote', 'title' => 'Hapus',
                    'data-confirm' => false, 'data-method' => false, // for overide yii data api
                    'data-request-method' => 'post',
                    // 'data-toggle' => 'tooltip',
                    'data-confirm-title' => 'Peringatan',
                    'data-confirm-message' => 'Apakah anda yakin ingin menghapus data ini?'
                ]);
            },
        ],
        'deleteOptions' => [
            'role' => 'modal-remote', 'title' => 'Hapus',
            'data-confirm' => false, 'data-method' => false, // for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Peringatan',
            'data-confirm-message' => 'Apakah anda yakin ingin menghapus data ini?'
        ],
    ],
    // [
    //     'class' => 'kartik\grid\ActionColumn',
    //     'dropdown' => false,
    //     'vAlign' => 'middle',
    //     'urlCreator' => function ($action, $model, $key, $index) {
    //         return Url::to([$action, 'id_guru' => $model->id_guru, 'id_mata_pelajaran' => $model->id_mata_pelajaran]);
    //     },
    //     'viewOptions' => ['role' => 'modal-remote', 'title' => 'Lihat', 'data-toggle' => 'tooltip'],
    //     'updateOptions' => ['role' => 'modal-remote', 'title' => 'Ubah', 'data-toggle' => 'tooltip'],
    //     'deleteOptions' => [
    //         'role' => 'modal-remote', 'title' => 'Hapus',
    //         'data-confirm' => false, 'data-method' => false, // for overide yii data api
    //         'data-request-method' => 'post',
    //         'data-toggle' => 'tooltip',
    //         'data-confirm-title' => 'Peringatan',
    //         'data-confirm-message' => 'Apakah anda yakin ingin menghapus data ini?'
    //     ],
    // ],

];
