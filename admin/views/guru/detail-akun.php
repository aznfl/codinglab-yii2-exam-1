<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Siswa */
?>
<div class="guru-view">
    <div class="table-responsive">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nama_guru',
                [
                    // 'class' => '\kartik\grid\DataColumn',
                    'label' => 'Username',
                    'attribute' => 'username',
                    'value' => function ($model) {
                        return $model->username->username;
                    }
                ],
                [
                    // 'class' => '\kartik\grid\DataColumn',
                    'label' => 'Email',
                    'attribute' => 'email',
                    'value' => function ($model) {
                        return $model->username->email;
                    }
                ],
            ],
        ]) ?>
    </div>

</div>