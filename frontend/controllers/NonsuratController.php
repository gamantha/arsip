<?php

namespace frontend\controllers;

use Yii;
use app\models\Nonsurat;
use app\models\UploadForm;
use app\models\NonsuratSearch;
use app\models\File;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use kartik\mpdf\Pdf;

use yii\data\ActiveDataProvider;

/**
 * NonsuratController implements the CRUD actions for Nonsurat model.
 */
class NonsuratController extends Controller
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
     * Lists all Nonsurat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NonsuratSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionIndexpt4($id)
    {
    //ARIF BELAJAR NGODING  
     //echo $id;
    //echo $_GET['ArsipSearch[no_surat]'];
    echo '<br>';
    //print_r($_GET['no_surat']);
    //print_r($_GET['ArsipSearch']);
    
    
    $searchModel = new NonsuratSearch();
    $searchparams = Yii::$app->request->queryParams;
    $searchparams["NonsuratSearch"]["perusahaan_id"] = $id ;
    
    echo '<br>';
    
    if($_POST){
        print_r($_POST);
    }
    echo '</pre>';

    $this->view->params['addMenuItem'] = 		['label' => 'Surat',
            'url' => ['#'],
            'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
            'items' => [
                ['label' => 'Input Non - Surat', 'url' =>['/nonsurat/create/' . $id]],
                ['label' => 'Kelola Surat', 'url' => ['manage/index/' . $id]],

            ],
          ];

    

     $dataProvider = $searchModel->search($searchparams);


      return $this->render('index_per_pt4', [
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
    

    public function actionSearch()
    {


$tags=[];
$tagstring='';
        if ($_POST) {
            //echo '<br/><br/><br/><br/><br/><br/>search tema : ' . $_POST['tags'];
            $tagstring = trim($_POST['tags']);
            $tagarray = explode(',', $tagstring);
            foreach ($tagarray as $key => $value) {
                array_push($tags, $value);
            //  $tags = $tags . ',' . $value;

            }
        }
//echo '<br/><br/>'.$tags;
        //$tags = ['makan', 'kpp'];
        $query = Nonsurat::find()
        ->andWhere(['like','tema', $tags]);
        //->All();
$dataProvider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        //'pageSize' => 10,
    ],
    'sort' => [
        'defaultOrder' => [

        ]
    ],
]);

            return $this->render('search',[
                'searchtags' => $tagstring,
                'dataProvider' => $dataProvider,
                ]);
    }


    public function actionIndexpt3($id)
    {

     $searchModel = new NonsuratSearch();
     $searchparams = Yii::$app->request->queryParams;
     $searchparams["NonsuratSearch"]["perusahaan_id"] = $id ;
    
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
                ['label' => 'Input Non - Surat', 'url' =>['/nonsurat/create/' . $id]],
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
     * Displays a single Nonsurat model.
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
     * Creates a new Nonsurat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        
        
        $model = new Nonsurat();

        $this->view->params['addMenuItem'] = 		['label' => 'Surat',
                'url' => ['#'],
                'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
                'items' => [
                    ['label' => 'Input Surat', 'url' =>['/nonsurat/create/' . 'id=' . $_GET['id']]],
                    ['label' => 'Manage', 'url' => ['manage/index/' . $id]],

                ],
              ];

        //$model->perusahaan_id = $id;
        if ($model->load(Yii::$app->request->post())) {
                 $model->perusahaan_id = $id;
                  $model->created_at = new Expression('NOW()');
                                    $model->modified_at = new Expression('NOW()');
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
     * Updates an existing Nonsurat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
     $this->view->params['addMenuItem'] = 		['label' => 'Non Surat',
             'url' => ['#'],
             'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
             'items' => [
                 ['label' => 'Input Non - Surat', 'url' =>['/nonsurat/create/' . $id]],
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
     * Deletes an existing Nonsurat model.
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
        echo $_GET['NonsuratSearch']['no_surat'];
    echo $_GET['NonsuratSearch']['divisi_id'];
    //echo $_GET['NonsuratSearch']['tema'];
    echo $_GET['NonsuratSearch']['penyimpanan_id'];
    echo $_GET['NonsuratSearch']['status'];
    echo $_GET['NonsuratSearch']['created_at'];
    echo $_GET['NonsuratSearch']['modified_at'];
    
    $searchModel = new NonsuratSearch();
    $searchparams = Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($searchparams);
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'content' => $this->renderPartial('index_per_pt4', [
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
                    return $this->redirect(['nonsurat/update/'. $model->arsip_id]);

            
        } //isPost

        return $this->render('upload', ['uploadmodel' => $uploadmodel]);
    }

    /**
     * Finds the Nonsurat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nonsurat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nonsurat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function beforeAction($action) {

        // This is of no use as this runs *after* the 'behaviors' method
$today = new Expression('NOW()');
       $changetoinvalids = Nonsurat::find()->andWhere(['<=','expire_date',$today])
->andWhere(['status' => 'valid'])
       ->All();
       if (sizeof($changetoinvalids) > 0)
       {
          foreach ($changetoinvalids as $key2 => $value2) {
            # code...
             Yii::$app->getSession()->addFlash('danger', $value2->judul .  ' is now expired');
             $value2->status = 'expired';
             $value2->save();
          }
             
       }

$onemonth = new Expression('DATE_ADD(NOW(), INTERVAL 1 MONTH)');
       $about_to_invalids = Nonsurat::find()->andWhere(['<=','expire_date',$onemonth])
->andWhere(['status' => 'valid'])
       ->All();
       if (sizeof($about_to_invalids) > 0)
       {
          foreach ($about_to_invalids as $key1 => $value1) {
            # code...
             Yii::$app->getSession()->addFlash('warning', $value1->judul .  ' is about to expire in a month');
          }
             
       }




    if (!parent::beforeAction($action)) {
        return false;
    }

    // other custom code here

    return true; // or false to not run the action


    }


}
