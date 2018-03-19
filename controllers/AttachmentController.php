<?php

namespace app\controllers;

use Yii;
use app\models\Attachment;
use app\models\AttachmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
/**
 * AttachmentController implements the CRUD actions for Attachment model.
 */
class AttachmentController extends Controller
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
                'rules' => [
                    [
                        'actions' => ['index','create','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'matchCallback' => function ($rule, $action) {
                            $model = $this->findModel(Yii::$app->request->get('id'));
                            return Yii::$app->user->getIdentity()->id == $model->createdBy;
                        }
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->getIdentity()->roleID == 1;
                        }
                    ],
                ],
            ], 
        ];
    }

    /**
     * Lists all Attachment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AttachmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Attachment model.
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
     * Creates a new Attachment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Attachment();

        if ($model->load(Yii::$app->request->post())) {
			$model->createdBy = Yii::$app->user->getIdentity()->id;
            $model->createdDate = time();
            $image = UploadedFile::getInstance($model, 'attachmentFile');
            $image1 = Image::getImagine();
            list($width, $height, $type, $attr) = getimagesize($image->tempName);
            $newWidth = min(960, $width);
            $newHeight = min(720, $height);
            var_dump($width);
            var_dump($height);
            $newImage = Image::getImagine()->open($image->tempName)->thumbnail(new Box($newWidth, $newHeight));
            var_dump($newImage);
            $model->attachmentFile = $newImage;
            $model->attachmentName = $image->name;
			if($model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                Yii::$app->session->setFlash('success', 'Successfully Added');
				return $this->redirect(['history/view', 'id'=>$model->historyID]);
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
     * Updates an existing Attachment model.
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
            $image = UploadedFile::getInstance($model, 'attachmentFile');
            $image1 = Image::getImagine();
            list($width, $height, $type, $attr) = getimagesize($image->tempName);
            $newWidth = min(960, $width);
            $newHeight = min(720, $height);
            var_dump($width);
            var_dump($height);
            $newImage = Image::getImagine()->open($image->tempName)->thumbnail(new Box($newWidth, $newHeight));
            var_dump($newImage);
            $model->attachmentFile = $newImage;
            $model->attachmentName = $image->name;
			if($model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                Yii::$app->session->setFlash('success', 'Successfully Updated');
				return $this->redirect(['history/view', 'id'=>$model->historyID]);
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
     * Deletes an existing Attachment model.
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
     * Finds the Attachment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Attachment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Attachment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function displayImages($id)
    {
        $result = array();
        $sql = 'SELECT attachmentName
                      ,attachmentFile 
                      ,historyID
                      ,attachmentID 
                      ,createdBy
                FROM attachment 
                WHERE historyID = :id';
        $connection = Yii::$app->getDb();
        $list = $connection->createCommand($sql)->bindValue('id',$id)->queryAll(); 
        foreach($list as $item){
            $result[]=$item;
        }
        return $result;
    }
}
