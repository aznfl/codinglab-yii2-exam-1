<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();
echo "<?php\n";
?>
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap4\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<!-- <div class="element-wrapper">
<h6 class="element-header">
<?php
//  Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass))) 
?>
</h6>
<div class="element-box"> -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="ajaxCrudDatatable">
                    <div id="table-responsive">
                        <?= "<?=" ?>GridView::widget([
                        'id'=>'crud-datatable',
                        'pager' => [
                        'firstPageLabel' => 'Awal',
                        'lastPageLabel' => 'Akhir'
                        ],
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'pjax'=>true,
                        'columns' => require(__DIR__.'/_columns.php'),
                        'toolbar'=> [
                        ['content'=>
                        Html::a('<i class="fas fa-redo"></i> ', [''],
                        ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                        '{toggleData}'
                        // .'{export}'
                        ],
                        ],
                        'striped' => true,
                        'condensed' => true,
                        'responsive' => true,
                        'panel' => [
                        // 'type' => 'primary',
                        // 'heading' => '<i class="glyphicon glyphicon-list"></i> <?= Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?> listing',
                        'before'=>Html::a('Tambah', ['create'],
                        ['role'=>'modal-remote','title'=> 'Create new <?= Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>','class'=>'btn btn-default']),
                        // 'after'=>BulkButtonWidget::widget([
                        // 'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                        // ["bulk-delete"] ,
                        // [
                        // "class"=>"btn btn-danger btn-xs",
                        // 'role'=>'modal-remote-bulk',
                        // 'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                        // 'data-request-method'=>'post',
                        // 'data-confirm-title'=>'Are you sure?',
                        // 'data-confirm-message'=>'Are you sure want to delete this item'
                        // ]),
                        // ]).
                        '<div class="clearfix"></div>',
                        ]
                        ])<?= "?>\n" ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= '<?php Modal::begin([
"id"=>"ajaxCrudModal",
"footer"=>"",// always need it for jquery plugin
])?>' . "\n" ?>
<?= '<?php Modal::end(); ?>' ?>