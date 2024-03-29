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
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Tahun Ajaran',
        'attribute' => 'id_tahun_ajaran',
        'value' => function ($model) {
            return $model->tahunAjaran->tahun_ajaran;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'nama_kelas',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Tingkat Kelas',
        'attribute' => 'id_tingkat',
        'value' => function ($model) {
            return $model->tingkatKelas->tingkat_kelas;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Wali Kelas',
        'attribute' => 'id_wali_kelas',
        'value' => function ($model) {
            return $model->waliKelas->nama_guru;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Jurusan Kelas',
        'attribute' => 'id_jurusan',
        'value' => function ($model) {
            return $model->jurusan->jurusan;
        }
    ],
    // [
    //     'class' => 'kartik\grid\ActionColumn',
    //     'header' => 'Aksi',
    //     'template' => '{btn_aksi}',
    //     'buttons' => [
    //         "btn_aksi" => function ($action, $model, $key) {
    //             return Html::a('Lihat Siswa', ['view-siswa', 'id' => $model->id,], [
    //                 'class' => 'btn btn-success btn-block',
    //                 'role' => 'modal-remote',
    //                 'title' => 'Lihat',
    //                 'data-toggle' => 'tooltip'
    //             ]);
    //         },
    //     ]
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => 'Aksi',
        'template' => '{btn_aksi}',
        'buttons' => [
            "btn_aksi" => function ($action, $model, $key) {
                return Html::a('Lihat Siswa', ['siswa/index2', 'id' => $model->id,], [
                    'class' => 'btn btn-success btn-block',
                    'role' => 'modal-remote',
                    'title' => 'Lihat',
                    'data-toggle' => 'tooltip'
                ]);
            },
        ]
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
