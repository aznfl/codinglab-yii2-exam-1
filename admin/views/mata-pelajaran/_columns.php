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
    // [
    //     'class' => '\kartik\grid\DataColumn',
    //     'header' => 'Guru Mata Pelajaran',
    //     'attribute' => 'id',
    //     'value' => function ($model) {
    //         return $model->guruPelajaran->namaGuru->nama_guru;
    //     }
    // ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'mata_pelajaran',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Tingkat Kelas',
        'attribute' => 'tingkat_kelas',
        'value' => function ($model) {
            return $model->tingkatKelas->tingkat_kelas;
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'label' => 'Jurusan Kelas',
        'attribute' => 'jurusan',
        'value' => function ($model) {
            return $model->jurusan->jurusan;
        }
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'header' => 'Aksi',
        'template' => '{btn_aksi}',
        'buttons' => [
            "btn_aksi" => function ($action, $model, $key) {
                return Html::a('Lihat Guru', ['guru-pelajaran/index', 'id_mapel' => $model->id], [
                    // 'viewOptions' => ['title' => 'Lihat', 'data-toggle' => 'tooltip'],
                    'class' => 'btn btn-warning btn-block',
                    'data-pjax' => 0,
                    'target' => '_blank',
                    'title' => 'Lihat',
                    // 'data-toggle' => 'tooltip',
                    // 'linkOptions'=> [
                    //     'target' => "_blank"
                    // ]
                ]);
            }
        ],
        // 'buttonOptions' => [
        //     'target' => "_blank"
        // ]
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
