<?php

namespace admin\controllers;

use Yii;
use common\models\MataPelajaran;
use admin\models\MataPelajaranSearch;
use common\models\Guru;
use common\models\RefTingkatKelas;
use common\models\RefJurusan;
use common\models\GuruMataPelajaran;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;


/**
 * MataPelajaranController implements the CRUD actions for MataPelajaran model.
 */
class MataPelajaranController extends Controller
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
     * Lists all MataPelajaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MataPelajaranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single MataPelajaran model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "MataPelajaran ",
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"]) .
                    Html::a('Ubah', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    // public function actionDetailAkun($id)
    // {
    //     $request = Yii::$app->request;
    //     $model = GuruMataPelajaran::find()->where(['id_mata_pelajaran' => $id])->one();

    //     if ($request->isAjax) {
    //         Yii::$app->response->format = Response::FORMAT_JSON;
    //         return [
    //             'title' => "Detail Akun Siswa ",
    //             'content' => $this->renderAjax('detail-guru', [
    //                 'model' => $model,
    //             ]),
    //             'footer' => Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"])
    //             // Html::a('Ubah', ['update', 'id' => $id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
    //         ];
    //     } else {
    //         return $this->render('view', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    /**
     * Creates a new MataPelajaran model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new MataPelajaran();

        $tingkatKelas = ArrayHelper::map(RefTingkatKelas::find()->all(), 'id', 'tingkat_kelas');
        $jurusan = ArrayHelper::map(RefJurusan::find()->all(), 'id', 'jurusan');
        $guruPelajaran = ArrayHelper::map(Guru::find()->all(), 'id', 'nama_guru');
        // $modelGuru = new GuruMataPelajaran();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Tambah MataPelajaran",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        // 'modelGuru' => $modelGuru,
                        'kelas' => $tingkatKelas,
                        'jurusan' => $jurusan,
                        'guru' => $guruPelajaran,
                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"]) .
                        Html::button('Simpan', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            } else if ($model->load($request->post()) && $model->save()) {

                // $modelGuru->id_guru = $guruPelajaran;

                // $modelGuru->id_mata_pelajaran = $model->id;
                // $modelGuru->save();


                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "Tambah MataPelajaran",
                    'content' => '<span class="text-success">Create MataPelajaran berhasil</span>',
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"]) .
                        Html::a('Tambah Lagi', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])

                ];
            } else {
                return [
                    'title' => "Tambah MataPelajaran",
                    'content' => $this->renderAjax('create', [
                        'model' => $model,
                        // 'modelGuru' => $modelGuru,
                        'kelas' => $tingkatKelas,
                        'jurusan' => $jurusan,
                        'guru' => $guruPelajaran,
                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"]) .
                        Html::button('Simpan', ['class' => 'btn btn-primary', 'type' => "submit"])

                ];
            }
        } else {
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save() ) {
                // $modelGuru->id_mata_pelajaran = $model->id;
                // $modelGuru->save();
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    // 'modelGuru' => $modelGuru,
                    'kelas' => $tingkatKelas,
                    'jurusan' => $jurusan,
                    'guru' => $guruPelajaran,
                ]);
            }
        }
    }

    // public function actionGuruPelajaran($id_pelajaran)
    // {
    //     $request = Yii::$app->request;
    //     $model = new GuruMataPelajaran();
    //     // $siswa = $this->findModel($id_siswa);

    //     if ($request->isAjax) {
    //         /*
    //         *   Process for ajax request
    //         */
    //         Yii::$app->response->format = Response::FORMAT_JSON;
    //         if ($request->isGet) {
    //             return [
    //                 'title' => "Buat Akun Siswa",
    //                 'content' => $this->renderAjax('create-akun', [
    //                     'model' => $model,
    //                     // 'nis' => $nis
    //                 ]),
    //                 'footer' => Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"]) .
    //                 Html::button('Simpan', ['class' => 'btn btn-primary', 'type' => "submit"]),
    //             ];
    //         } else if ($model->load($request->post()) && $model->signup()) {
    //             // $lastInsertedId = Yii::$app->db->getlastInsertID();
    //             // $id_user->id_user = $lastInsertedId;
    //             // $id_user->save();

    //             // $id_user = User::find()->where(['username' => $nis])->one()->id;
    //             // $siswa->id_user = $id_user;
    //             // $siswa->save();

    //             return [
    //                 'forceReload' => '#crud-datatable-pjax',
    //                 'title' => "Buat Akun Siswa",
    //                 'content' => '<span class="text-success">Create Siswa berhasil</span>',
    //                 'footer' => Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"])
    //                 // Html::a('Tambah Lagi', ['create'], ['class' => 'btn btn-primary', 'role' => 'modal-remote']),
    //             ];
    //         } else {
    //             return [
    //                 'title' => "Buat Akun Siswa",
    //                 'content' => $this->renderAjax('create-akun', [
    //                     'model' => $model,
    //                     // 'nis' => $nis
    //                 ]),
    //                 'footer' =>  Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"]) .
    //                 Html::button('Simpan', ['class' => 'btn btn-primary', 'type' => "submit"]),
    //             ];
    //         }
    //     } else {
    //         /*
    //         *   Process for non-ajax request
    //         */

    //         if ($model->load($request->post()) && $model->save()) {

    //             // $id_user = User::find()->where(['username' => $nis])->one()->id;
    //             // $siswa->id_user = $id_user;
    //             // $siswa->save();

    //             return $this->redirect(['view', 'id' => $model->id]);
    //         } else {
    //             return $this->render('create-akun', [
    //                 // 'model' => $model,
    //                 // 'nis' => $nis
    //             ]);
    //         }
    //     }
    // }

    /**
     * Updates an existing MataPelajaran model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($id);

        $tingkatKelas = ArrayHelper::map(RefTingkatKelas::find()->all(), 'id', 'tingkat_kelas');
        $jurusan = ArrayHelper::map(RefJurusan::find()->all(), 'id', 'jurusan');
        $guruPelajaran = ArrayHelper::map(Guru::find()->all(), 'id', 'nama_guru');
        // $modelGuru = new GuruMataPelajaran();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($request->isGet) {
                return [
                    'title' => "Ubah MataPelajaran",
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'kelas' => $tingkatKelas,
                        'jurusan' => $jurusan,
                        'guru' => $guruPelajaran,
                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"]) .
                        Html::button('Simpan', ['class' => 'btn btn-primary', 'type' => "submit"])
                ];
            } else if ($model->load($request->post()) && $model->save()) {
                return [
                    'forceReload' => '#crud-datatable-pjax',
                    'title' => "MataPelajaran ",
                    'content' => $this->renderAjax('view', [
                        'model' => $model,
                        'kelas' => $tingkatKelas,
                        'jurusan' => $jurusan,
                        'guru' => $guruPelajaran,
                    ]),
                    'footer' => Html::button('Tutup', ['class' => 'btn btn-default float-left', 'data-dismiss' => "modal"]) .
                        Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'role' => 'modal-remote'])
                ];
            } else {
                return [
                    'title' => "Ubah MataPelajaran ",
                    'content' => $this->renderAjax('update', [
                        'model' => $model,
                        'kelas' => $tingkatKelas,
                        'jurusan' => $jurusan,
                        'guru' => $guruPelajaran,
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
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                    'kelas' => $tingkatKelas,
                    'jurusan' => $jurusan,
                    'guru' => $guruPelajaran,
                ]);
            }
        }
    }

    /**
     * Delete an existing MataPelajaran model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

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
            return $this->redirect(['index']);
        }
    }

    /**
     * Delete multiple existing MataPelajaran model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionBulkdelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

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
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the MataPelajaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MataPelajaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MataPelajaran::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
