<?php

namespace frontend\controllers;

use Yii;
use app\models\Kendaraan;
use app\models\KendaraanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * KendaraanController implements the CRUD actions for Kendaraan model.
 */
class KendaraanController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Kendaraan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KendaraanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kendaraan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Kendaraan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kendaraan();
                $uploadmodel = new UploadForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {



                   //     $uploadmodel->docFile = UploadedFile::getInstance($uploadmodel, 'docFile');
                    //$uploadmodel->uploadImageKendaraan($model->id);
                      // $model->image = $model->id . '_' . $uploadmodel->docFile->baseName . '.' . $uploadmodel->docFile->extension;
                       $model->save();
                    Yii::$app->getSession()->setFlash('success', 'Data Berhasil Tersimpan');




            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'uploadmodel' => $uploadmodel
            ]);
        }
    }

    /**
     * Updates an existing Kendaraan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
                        $uploadmodel = new UploadForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

                        $uploadmodel->docFile = UploadedFile::getInstance($uploadmodel, 'docFile');
                    $uploadmodel->uploadImageKendaraan($model->id);
                       $model->image = $model->id . '_' . $uploadmodel->docFile->baseName . '.' . $uploadmodel->docFile->extension;
                       $model->save();
                    Yii::$app->getSession()->setFlash('success', 'Data Berhasil Tersimpan');

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                                'uploadmodel' => $uploadmodel
            ]);
        }
    }

    /**
     * Deletes an existing Kendaraan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kendaraan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kendaraan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kendaraan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
