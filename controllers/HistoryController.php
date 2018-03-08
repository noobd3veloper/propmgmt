<?php

namespace app\controllers;

use Yii;
use app\models\History;
use app\models\HistorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HistoryController implements the CRUD actions for History model.
 */
class HistoryController extends Controller
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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index','create','update','view','delete'],
                'rules' => [
                    [
                        'actions' => ['view','create'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                    
                    [
                        'actions' => ['index'],
                        'allow' => Yii::$app->user->identity->roleID == 1,
                    ],
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                ],
            ], 
        ];
    }

    /**
     * Lists all History models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single History model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new History model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new History();

        
        
        if ($model->load(Yii::$app->request->post())) {
			$model->createdBy = Yii::$app->user->getIdentity()->id;
			$model->createdDate = time();
			if($model->save()) {
	            //return $this->redirect(['view', 'id' => $model->id]);
                //return $this->redirect(['index']);
                Yii::$app->session->setFlash('success', 'Successfully Created');
                return $this->redirect(['tenant/view', 'id' => $model->tenantID]);
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
     * Updates an existing History model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        

        if ($model->load(Yii::$app->request->post())) {
			$model->modifiedBy = Yii::$app->user->getIdentity()->id;
			$model->modifiedDate = time();
			if($model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                Yii::$app->session->setFlash('success', 'Successfully Updated');
                return $this->redirect(['tenant/view', 'id' => $model->tenantID]);
			} else {
				print_r($model->errors);
			}
        } else {

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing History model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the History model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return History the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = History::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
