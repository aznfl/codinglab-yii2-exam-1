<?php

namespace admin\controllers;

use Yii;
use common\models\GuruMataPelajaran;
use admin\models\GuruPelajaranSearch;
use admin\models\GuruSearch;
use common\models\Guru;
use common\models\MataPelajaran;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;


/**
 * GuruPelajaranController implements the CRUD actions for GuruMataPelajaran model.
 */
class GuruPelajaranController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulkdelete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all GuruMataPelajaran models.
     * @return mixed
     */
    public function actionIndex($id_mapel)
    {
        $searchModel = new GuruPelajaranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['id_mata_pelajaran' => $id_mapel]);

        $mapel = MataPelajaran::find()->where(['id' => $id_mapel])->one();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'mapel' => $mapel,
            'id_mapel' => $id_mapel
        ]);
    }


    /**
     * Displays a single GuruMataPelajaran model.
     * @param integer $id_guru
     * @param integer $id_mata_pelajaran
     * @return mixed
     */
    public function actionView($id_guru, $id_mata_pelajaran)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "GuruMataPelajaran ",
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id_guru, $id_mata_pelajaran),
                ]),
                'footer' => Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"]) .
                    Html::a('Ubah', ['update', 'id_guru' => $id_guru, 'id_mata_pelajaran' => $id_mata_pelajaran], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id_guru, $id_mata_pelajaran),
            ]);
        }
    }

    public function actionListGuru($id_mapel)
    {
        $searchModel = new GuruSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Pilih Guru",
                'content' => $this->renderAjax('pilih-guru', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id_mapel' => $id_mapel,
                ]),
            ];
        } else {
            return $this->render('pilih-guru', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'id_mapel' => $id_mapel,
            ]);
        }
    }
    
    /**
     * Creates a new GuruMataPelajaran model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_guru, $id_mapel)
    {
        $searchModel = new GuruSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $request = Yii::$app->request;
        $model = new GuruMataPelajaran();
        
        $model->id_mata_pelajaran = $id_mapel;
        $model->id_guru = $id_guru;
        $model->setStatusGuruMapel();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                // 'forceClose' => true,
                'forceReload' => '#crud-datatable-pjax',
                'content' => $this->renderAjax('pilih-guru', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id_mapel' => $id_mapel,
                ]),
            ];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['list-guru','id_mapel' => $id_mapel]);
        }
    }

    /**
     * Updates an existing GuruMataPelajaran model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_guru
     * @param integer $id_mata_pelajaran
     * @return mixed
     */
    public function actionUpdate($id_guru, $id_mata_pelajaran)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id_guru, $id_mata_pelajaran);

        $guru = ArrayHelper::map(Guru::find()->all(), 'id', 'nama_guru');
        $pelajaran = ArrayHelper::map(MataPelajaran::find()->all(), 'id', 'mata_pelajaran');

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Ubah GuruMataPelajaran",
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'guru' => $guru,
                        'pelajaran' => $pelajaran
                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"]) .
                        Html::button('Simpan', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "GuruMataPelajaran ",
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                        'guru' => $guru,
                        'pelajaran' => $pelajaran
                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"]) .
                        Html::a('Ubah', ['update', 'id_guru' => $model->id_guru, 'id_mata_pelajaran' => $model->id_mata_pelajaran], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Ubah GuruMataPelajaran ",
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'guru' => $guru,
                        'pelajaran' => $pelajaran
                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"]) .
                        Html::button('Simpan', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_guru' => $model->id_guru, 'id_mata_pelajaran' => $model->id_mata_pelajaran]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'guru' => $guru,
                    'pelajaran' => $pelajaran
                ]);
            }
        }
    }

    /**
     * Delete an existing GuruMataPelajaran model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_guru
     * @param integer $id_mata_pelajaran
     * @return mixed
     */
    public function actionDelete($id_guru, $id_mapel)
    {
        $request = Yii::$app->request;
        $this->findModel($id_guru, $id_mapel)->delete();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index', 'id_mapel' => $id_mapel]);
        }
    }

    /**
     * Delete multiple existing GuruMataPelajaran model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_guru
     * @param integer $id_mata_pelajaran
     * @return mixed
     */
    public function actionBulkdelete()
    {
        // $request = Yii::$app->request;
        // $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        // foreach ( $pks as $pk ) {
        //     $model = $this->findModel($pk);
        //     $model->delete();
        // }

        // if($request->isAjax){
        //     /*
        //     *   Process for ajax request
        //     */
        //     Yii::$app->response->format = Response::FORMAT_JSON;
        //     return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        // }else{
        //     /*
        //     *   Process for non-ajax request
        //     */
        //     return $this->redirect(['index']);
        // }

    }

    /**
     * Finds the GuruMataPelajaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_guru
     * @param integer $id_mata_pelajaran
     * @return GuruMataPelajaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_guru, $id_mata_pelajaran)
    {
        if (($model = GuruMataPelajaran::findOne(['id_guru' => $id_guru, 'id_mata_pelajaran' => $id_mata_pelajaran])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
