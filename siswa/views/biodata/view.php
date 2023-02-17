<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
/* @var $model common\models\Siswa */
?>
<div class="siswa-view">
    <div class="table-responsive">
        <div class="form-group">
            <?= Html::a('Ubah Data', ['update', 'id' => $model->id], [
                'class' => 'btn btn-success btn-block',
                'role' => 'modal-remote',
                'title' => 'Lihat',
                'data-toggle' => 'tooltip'
            ]) ?>
        </div>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nis',
                'nama',
                'tempat_lahir',
                'tanggal_lahir',
                'alamat:ntext',
                // 'id_kelas',
                // 'id_user',
            ],
        ]) ?>
    </div>

</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>