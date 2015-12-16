<?php

namespace frontend\controllers;

use Yii;
use app\models\Upload;
use app\models\Arsip;
use app\models\UploadSearch;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\Html;

/**
 * UploadController implements the CRUD actions for Upload model.
 */
class UploadController extends Controller
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
     * Lists all Upload models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UploadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Upload model.
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
     * Creates a new Upload model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Upload();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Upload model.
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
     * Deletes an existing Upload model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionDownloadsurat($id)
    {
       $arsipModel = Upload::find()
       ->andWhere(['arsip_id'=>$id])
       ->orderBy('last_update DESC')
       ->One();
       ;
echo (Html::a('<span class="fa fa-search"></span>download',  $arsipModel->location . '/'.$arsipModel->nama_file));
    }

    public function actionUpload($id)
   {

    //echo $id;

       $model = new UploadForm();
       $arsipModel = Arsip::findOne($id);
       $uploadmodel = new Upload();

date_default_timezone_set("Asia/Jakarta");
       if (Yii::$app->request->isPost) {
           $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
           if ($model->upload($arsipModel->id,$arsipModel->no_surat)) {
               // file is uploaded successfully
                $uploadmodel->location = 'uploads/surat';
                $uploadmodel->arsip_id = $arsipModel->id;
                $uploadmodel->nama_file =  $arsipModel->id . '-' . $arsipModel->no_surat . '-' .$model->imageFile->baseName  .'.' . $model->imageFile->extension;
                $uploadmodel->last_update = date('Y-m-d H:i:s',time());
                $uploadmodel->save();
         Yii::$app->session->setFlash('success', 'File is uploaded');
                 return $this->redirect(['arsip/index']);
           }

       }

       return $this->render('upload', ['model' => $model]);

   }



    /**
     * Finds the Upload model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Upload the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Upload::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
