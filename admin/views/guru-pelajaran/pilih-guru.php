<?php

use common\models\GuruMataPelajaran;
use common\models\MataPelajaran;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\GuruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gurus';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<!-- <div class="element-wrapper">
    <h6 class="element-header">
            </h6>
    <div class="element-box"> -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="ajaxCrudDatatable">
                    <div id="table-responsive">
                        <?= GridView::widget([
                            'id' => 'crud-datatable',
                            'pager' => [
                                'firstPageLabel' => 'Awal',
                                'lastPageLabel'  => 'Akhir'
                            ],
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            // 'id_mapel' => $id_mapel,
                            'pjax' => true,
                            'columns' => [
                                [
                                    'class' => 'kartik\grid\SerialColumn',
                                    'width' => '30px',
                                ],
                                [
                                    'class' => '\kartik\grid\DataColumn',
                                    'attribute' => 'nama_guru',
                                ],
                                [
                                    'class' => 'kartik\grid\ActionColumn',
                                    'header' => 'Aksi',
                                    'template' => '{btn_aksi}',
                                    'buttons' => [
                                        "btn_aksi" => function ($action, $model, $key) use ($id_mapel) {
                                            $guru = $model->cekStatusMapel($id_mapel);
                                            if (Yii::$app->request->isAjax) {
                                                if (
                                                    $guru == 1
                                                ) {
                                                    return Html::a('Batal Pilih', ['create', 'id_guru' => $model->id, 'id_mapel' => $id_mapel], [
                                                        // 'data-method' => 'POST',
                                                        'class' => 'btn btn-success btn-block',
                                                        'role' => 'modal-remote',
                                                        'title' => 'Pilih',
                                                        'data-toggle' => 'tooltip'
                                                    ]);
                                                } else {
                                                    return Html::a('Pilih', ['create', 'id_guru' => $model->id, 'id_mapel' => $id_mapel], [
                                                        // 'viewOptions' => ['role' => 'modal-remote', 'title' => 'Lihat', 'data-toggle' => 'tooltip'],
                                                        'class' => 'btn btn-warning btn-block',
                                                        'role' => 'modal-remote',
                                                        'title' => 'Batal Pilih',
                                                        'data-toggle' => 'tooltip'
                                                    ]);
                                                }
                                            } else {
                                                if (
                                                    $guru == 1
                                                ) {
                                                    return Html::a('Batal Pilih', ['create', 'id_guru' => $model->id, 'id_mapel' => $id_mapel], [
                                                        // 'data-method' => 'POST',
                                                        'class' => 'btn btn-success btn-block',
                                                        // 'role' => 'modal-remote',
                                                        'title' => 'Pilih',
                                                        // 'data-toggle' => 'tooltip'
                                                    ]);
                                                } else {
                                                    return Html::a('Pilih', ['create', 'id_guru' => $model->id, 'id_mapel' => $id_mapel], [
                                                        // 'viewOptions' => ['role' => 'modal-remote', 'title' => 'Lihat', 'data-toggle' => 'tooltip'],
                                                        'class' => 'btn btn-warning btn-block',
                                                        // 'role' => 'modal-remote',
                                                        'title' => 'Batal Pilih',
                                                        // 'data-toggle' => 'tooltip'
                                                    ]);
                                                }
                                            }
                                            // return $model->cekStatusMapel($id_mapel);
                                        },

                                    ]
                                ]
                            ],
                            'striped' => true,
                            'condensed' => true,
                            'responsive' => true,
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>