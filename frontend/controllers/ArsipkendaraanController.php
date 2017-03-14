<?php

namespace frontend\controllers;

use Yii;
use app\models\ArsipKendaraan;
use app\models\ArsipkendaraanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Nonsurat;
use app\models\UploadForm;
use app\models\NonsuratSearch;
use app\models\File;
use app\models\FileKendaraan;
use yii\web\UploadedFile;

use yii\db\Expression;
use kartik\mpdf\Pdf;

use yii\data\ActiveDataProvider;

/**
 * ArsipkendaraanController implements the CRUD actions for ArsipKendaraan model.
 */
class ArsipkendaraanController extends Controller
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
     * Lists all ArsipKendaraan models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new ArsipkendaraanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        
    }

    /**
     * Displays a single ArsipKendaraan model.
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
     * Creates a new ArsipKendaraan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArsipKendaraan();

        if ($model->load(Yii::$app->request->post())) {

                  $model->created_at = new Expression('NOW()');
                $model->modified_at = new Expression('NOW()');

               if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                print_r($model->errors);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ArsipKendaraan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ArsipKendaraan model.
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
     * Finds the ArsipKendaraan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArsipKendaraan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArsipKendaraan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpload($id)
    {
        
        $uploadmodel = new UploadForm();
        $model = new FileKendaraan();

        if (Yii::$app->request->isPost) {
            $uploadmodel->docFile = UploadedFile::getInstance($uploadmodel, 'docFile');
             
                    $model->created_at = new \yii\db\Expression('NOW()');
                    $model->arsip_kendaraan_id = $id;
                    $model->save();
                    $uploadmodel->uploadArsipKendaraan($model->id);
                    $model->file_location = $model->id . '_' . $uploadmodel->docFile->baseName . '.' . $uploadmodel->docFile->extension;
                    $model->save();
                    Yii::$app->getSession()->setFlash('success', 'Data Berhasil Tersimpan');
                    return $this->redirect(['arsipkendaraan/update/'. $model->arsip_kendaraan_id]);

            
        } //isPost

        return $this->render('upload', ['uploadmodel' => $uploadmodel]);
    }
    


}
