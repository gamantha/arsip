<?php

namespace frontend\controllers;

use Yii;
use app\models\Arsip;
use app\models\ArsipSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\jui\Menu;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\AccessControl;
use yii\db\Expression;

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

    public function actionIndexpt($id)
    {

     $searchModel = new ArsipSearch();
     $searchparams = Yii::$app->request->queryParams;
     $searchparams["ArsipSearch"]["perusahaan_id"] = $id ;
    echo '<br/><br/><br/><pre>';
//print_r($searchparams);
    echo '</pre>';

    $this->view->params['addMenuItem'] = 		['label' => 'Surat',
            'url' => ['#'],
            'template' => '<a href="{url}" >{label}<i class="fa fa-angle-left pull-right"></i></a>',
            'items' => [
                ['label' => 'Input Surat', 'url' =>['/arsip/create/' . $id]],
                ['label' => 'Cari Surat', 'url' => ['/arsip/indexpt/' . $id]],
                ['label' => 'Manage', 'url' => ['manage/index/' . $id]],

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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
}
