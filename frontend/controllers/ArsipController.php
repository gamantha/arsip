<?php

namespace frontend\controllers;

use Yii;
use app\models\Arsip;
use app\models\ArsipSearch;
use app\models\File;
use app\models\FileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\jui\Menu;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\AccessControl;
use yii\db\Expression;
use app\models\UploadForm;
use yii\web\UploadedFile;
use kartik\mpdf\Pdf;

/**
 * ArsipController implements the CRUD actions for Arsip model.
 */
class ArsipController extends Controller
{
    public function behaviors()
    {
        return [
         'access' => [
             'class' => AccessControl::className(),
             'only' => ['logout', 'signup','indexpt'],
             'rules' => [
                 /*[
                     'actions' => ['signup'],
                     'allow' => true,
                     'roles' => ['?'],
                 ],
                 */
                 [
                     'actions' => ['indexpt'],
                     'allow' => true,
                     'roles' => ['@'],
                 ],
             ],
         ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }



    /**
     * Lists all Arsip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArsipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

/*
         return $this->render('index', [
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
         ]);
*/

echo 'not valid URL';
    }

    public function actionIndexpt2($id)
    {
    //ARIF BELAJAR NGODING  
     //echo $id;
    //echo $_GET['ArsipSearch[no_surat]'];
    echo '<br>';
    //print_r($_GET['no_surat']);
    //print_r($_GET['ArsipSearch']);
    echo $_GET['ArsipSearch']['no_surat'];
    echo $_GET['ArsipSearch']['divisi_id'];
    echo $_GET['ArsipSearch']['tema_id'];
    echo $_GET['ArsipSearch']['jabatan_id'];
    echo $_GET['ArsipSearch']['penyimpanan_id'];
    echo $_GET['ArsipSearch']['jenis'];
    echo $_GET['ArsipSearch']['created_at'];
    echo $_GET['ArsipSearch']['modified_at'];
    echo $_GET['ArsipSearch']['receipt'];
    
    $searchModel = new ArsipSearch();
    $searchparams = Yii::$app->request->queryParams;
    $searchparams["ArsipSearch"]["perusahaan_id"] = $id ;
    echo '<br/><br/><br/><pre>';
    $test = 'namaarif';
    print_r($test);
    
    echo '<br>';
    
    if($_POST){
        print_r($_POST);
    }
    echo '</pre>';

    $this->view->params['addMenuItem'] = 		['label' => 'Surat',
            'url' => ['#'],
            'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
            'items' => [
                ['label' => 'Input Surat', 'url' =>['/arsip/create/' . $id]],
                ['label' => 'Cari Surat', 'url' => ['/arsip/indexpt/' . $id]],
                ['label' => 'Kelola Surat', 'url' => ['manage/index/' . $id]],

            ],
          ];

    

     $dataProvider = $searchModel->search($searchparams);


      return $this->render('index_per_pt2', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);

    //ACTIVE QUERY PELAJARAN    
    /*$arsips = Arsip::find()->andWhere(['no_surat'=>$_GET['ArsipSearch']['no_surat']])
                           ->andWhere(['divisi_id'=>$_GET['ArsipSearch']['divisi_id']])
                           ->andWhere(['perusahaan_id'=>$_GET['id']])->All();
    
    
    //echo '<pre>';
    //print_r($arsips);
    foreach($arsips as $arsip){
       echo '<pre>';
        print_r($arsip->id);
    }*/
     
      //ArsipSearch[no_surat]=1&ArsipSearch[divisi_id]=&ArsipSearch[tema_id]=&ArsipSearch[jabatan_id]=&ArsipSearch[penyimpanan_id]=&ArsipSearch[jenis]=&ArsipSearch[created_at]=&ArsipSearch[modified_at]=&ArsipSearch[receipt]=&id=1

    }
    
    public function actionIndexpt($id)
    {

     $searchModel = new ArsipSearch();
     $searchparams = Yii::$app->request->queryParams;
     $searchparams["ArsipSearch"]["perusahaan_id"] = $id ;
    echo '<br/><br/><br/><pre>';
    $test = 'namaarif';
    print_r($test);
    //echo $_GET['ArsipSearch[no_surat]'];
    echo '<br>';
    //print_r($_GET['no_surat']);
       
        //ArsipSearch[no_surat]=1&ArsipSearch[divisi_id]=&ArsipSearch[tema_id]=&ArsipSearch[jabatan_id]=&ArsipSearch[penyimpanan_id]=&ArsipSearch[jenis]=&ArsipSearch[created_at]=&ArsipSearch[modified_at]=&ArsipSearch[receipt]=&

        //id=1
        //ArsipSearch[no_surat]=1
    
    if($_POST){
        print_r($_POST);
    }
    echo '</pre>';

    $this->view->params['addMenuItem'] = 		['label' => 'Surat',
            'url' => ['#'],
            'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
            'items' => [
                ['label' => 'Input Surat', 'url' =>['/arsip/create/' . $id]],
                ['label' => 'Cari Surat', 'url' => ['/arsip/indexpt/' . $id]],
                ['label' => 'Kelola Surat', 'url' => ['manage/index/' . $id]],

            ],
          ];

    

     $dataProvider = $searchModel->search($searchparams);


      return $this->render('index_per_pt', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);

    }

    /**
     * Displays a single Arsip model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
     $this->view->params['addMenuItem'] = 		['label' => 'Surat',
             'url' => ['#'],
             'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
             'items' => [
                 ['label' => 'Input Surat', 'url' =>['/arsip/create/' . $id]],
                 ['label' => 'Cari Surat', 'url' => ['/arsip/indexpt/' . $id]],
                 ['label' => 'Manage', 'url' => ['manage/index/' . $id]],

             ],
           ];

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Arsip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Arsip();

        $this->view->params['addMenuItem'] = 		['label' => 'Surat',
                'url' => ['#'],
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Input Surat', 'url' =>['/arsip/create/' . $id]],
                    ['label' => 'Cari Surat', 'url' => ['/arsip/indexpt/' . $id]],
                    ['label' => 'Manage', 'url' => ['manage/index/' . $id]],

                ],
              ];

        //$model->perusahaan_id = $id;
        if ($model->load(Yii::$app->request->post())) {
                 $model->perusahaan_id = $id;
                  $model->created_at = new Expression('NOW()');
         if ($model->save())
         {
           echo 'berhasil';
                      return $this->redirect(['view', 'id' => $model->id]);
         } else {
          echo '<pre>Gagal : <br/>';
          print_r($model->getErrors());
          print_r($_POST);
          echo '</pre>';
         }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Arsip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
     $this->view->params['addMenuItem'] = 		['label' => 'Surat',
             'url' => ['#'],
             'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
             'items' => [
                 ['label' => 'Input Surat', 'url' =>['/arsip/create/' . $id]],
                 ['label' => 'Cari Surat', 'url' => ['/arsip/indexpt/' . $id]],
                 ['label' => 'Manage', 'url' => ['manage/index/' . $id]],

             ],
           ];

        $model = $this->findModel($id);
        $filemodel = new File();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'filemodel' => $filemodel,
            ]);
        }
    }

    /**
     * Deletes an existing Arsip model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionReport() {
    // get your HTML raw content without any layouts or scripts
    $content = $this->renderPartial('_reportView');
    
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_CORE, 
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $content,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}', 
         // set mPDF properties on the fly
        'options' => ['title' => 'Krajee Report Title'],
         // call mPDF methods on the fly
        'methods' => [ 
            'SetHeader'=>['Krajee Report Header'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
    
    // return the pdf output as per the destination setting
    return $pdf->render(); 
}
    
    
    /**
     * Finds the Arsip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Arsip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Arsip::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionUpload($id)
    {
        
        $uploadmodel = new UploadForm();
        $model = new File();

        if (Yii::$app->request->isPost) {
            $uploadmodel->docFile = UploadedFile::getInstance($uploadmodel, 'docFile');
             
                    $model->created_at = new \yii\db\Expression('NOW()');
                    $model->arsip_id = $id;
                    $model->save();
                    $uploadmodel->upload($model->id);
                    $model->file_location = $model->id . '_' . $uploadmodel->docFile->baseName . '.' . $uploadmodel->docFile->extension;
                    $model->save();
                    Yii::$app->getSession()->setFlash('success', 'Data Berhasil Tersimpan');
                    return $this->redirect(['arsip/update/'. $model->arsip_id]);

            
        } //isPost

        return $this->render('upload', ['uploadmodel' => $uploadmodel]);
    }
    
}
