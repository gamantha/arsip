<?php

namespace frontend\controllers;

use Yii;
use app\models\Arsip;
use app\models\ArsipSearch;
use app\models\File;
use app\models\FileSearch;
use app\models\Divisi;
use app\models\Tema;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\jui\Menu;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\AccessControl;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
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


         return $this->render('index', [
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
         ]);


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
    
    
    $searchModel = new ArsipSearch();
    $searchparams = Yii::$app->request->queryParams;
    $searchparams["ArsipSearch"]["perusahaan_id"] = $id ;
    
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
                ['label' => 'Kelola Surat', 'url' => ['manage/index/' . $id]],

            ],
          ];

    

     $dataProvider = $searchModel->search($searchparams);


      return $this->render('index_per_pt', [
          'searchModel' => $searchModel,
          'dataProvider' => $dataProvider,
      ]);

    }
    
    public function actionIndexpt3($id)
    {

     $searchModel = new ArsipSearch();
     $searchparams = Yii::$app->request->queryParams;
     $searchparams["ArsipSearch"]["perusahaan_id"] = $id ;
    
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
                ['label' => 'Kelola Surat', 'url' => ['manage/index/' . $id]],

            ],
          ];

    

     $dataProvider = $searchModel->search($searchparams);


      return $this->render('index_per_pt3', [
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
                 ['label' => 'Manage', 'url' => ['manage/index/' . $id]],

             ],
           ];

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionBalik($id)
    {
        return $this->redirect(Yii::$app->request->referrer);
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
                    ['label' => 'Input Surat', 'url' =>['/arsip/create/' . 'id=' . $_GET['id']]],
                    ['label' => 'Manage', 'url' => ['manage/index/' . $id]],

                ],
              ];

        //$model->perusahaan_id = $id;
        if ($model->load(Yii::$app->request->post())) {
                 $model->perusahaan_id = $id;
                 $model->created_at = new Expression('NOW()');
                 $year = new Expression('NOW()');
                 $yyyy = substr($year,0,4);
                 $model->year = intval($model->tanggal_simpan);
                 //ArrayHelper::map(Divisi::find()->asArray()->All(), 'divisi_id', 'nama_divisi');
                 //ArrayHelper::map(Tema::find()->asArray()->All(), 'tema_id', 'tema');
                 //$model->detail = $model->no_surat . '/' . $model->divisi->nama_divisi . '/' . $model->tema->tema . '/' . intval($model->tanggal_simpan);
                 //Nosurat/napa dept/ditujukan ke/perihal/yg menandtangani/bulan romawi/tahun
         if ($model->save())
         {
            echo 'berhasil';
            return $this->redirect(['view', 'id' => $model->id]);
         } else {
          return $this->render('create', [
                'model' => $model,
            ]);

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
                 ['label' => 'Manage', 'url' => ['manage/index/' . $id]],

             ],
           ];

        $model = $this->findModel($id);
        $filemodel = new File();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', 'Data Berhasil Tersimpan');
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
    
    public function actionMpdf1() {
        echo $_GET['ArsipSearch']['no_surat'];
    echo $_GET['ArsipSearch']['divisi_id'];
    echo $_GET['ArsipSearch']['tema'];
    echo $_GET['ArsipSearch']['jabatan_id'];
    echo $_GET['ArsipSearch']['penyimpanan_id'];
    echo $_GET['ArsipSearch']['jenis'];
    echo $_GET['ArsipSearch']['created_at'];
    echo $_GET['ArsipSearch']['modified_at'];
    echo $_GET['ArsipSearch']['receipt'];
    
    $searchModel = new ArsipSearch();
    $searchparams = Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($searchparams);
        
        $dataProvider->setPagination(false);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'content' => $this->renderPartial('index_per_pt2', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]),
            
            'options' => [
                'title' => 'Report File Penyimpanan',
                'subject' => 'Report File Penyimpanan'
            ],
            'methods' => [
                'SetHeader' => ['Generated By: SIG Arsip||Generated On: ' . date("r")],
                'SetFooter' => ['|Page {PAGENO}|'],
            ]
        ]);
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
                    $model->file_location = '';
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
