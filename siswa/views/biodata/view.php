<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use johnitvn\ajaxcrud\CrudAsset;
use yii\widgets\Pjax;

$this->title = 'Siswa';

CrudAsset::register($this);

/* @var $this yii\web\View */
/* @var $model common\models\Siswa */
?>
<div class="siswa-view">
    <div class="form-group">
        <?= Html::a('Ubah Data', ['update', 'id' => $model->id], [
            'class' => 'btn btn-success',
            'role' => 'modal-remote',
            'title' => 'Lihat',
            // 'data-pjax' => 1
            // 'data-toggle' => 'tooltip'
        ])
        ?>
    </div>
    <?php Pjax::begin(['id' => 'id-pjax']); ?>
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
            // 'id_user',
        ],
    ]) ?>
    <?php Pjax::end(); ?>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>