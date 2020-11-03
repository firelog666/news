<?php


namespace backend\controllers;

use frontend\models\SignupForm;
use common\models\User;
use common\models\UserSearch;
use Exception;
use Throwable;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    private $service;


    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['logout', 'index', 'create', 'view', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = User::findOne($id);
        return $this->render('view', [
            'model' => $model
        ]);
    }

    /**
     * @return string|yii\web\Response
     * @throws Exception
     */
    public function actionCreate()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $model = $model->signup();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return string|yii\web\Response
     * @throws Exception
     */
    public function actionUpdate($id)
    {
        $model = User::findOne($id);

        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post())) {
                if (!empty($_POST['User']['newPassword'])) {
                    $model->setPassword($_POST['User']['newPassword']);
                }
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return yii\web\Response
     * @throws NotFoundHttpException
     * @throws Throwable
     * @throws yii\db\StaleObjectException
     */
    public function actionDelete($id): Yii\web\Response
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return User|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}