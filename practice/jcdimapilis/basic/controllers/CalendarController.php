<?php

namespace app\controllers;

use Yii;
use app\models\Calendar;
use app\models\CalendarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CalendarController implements the CRUD actions for Calendar model.
 */
class CalendarController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Calendar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CalendarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Calendar model.
     * @param integer $Calendar_ID
     * @param integer $YEARLY_READING_SET_Reading_ID
     * @return mixed
     */
    public function actionView($Calendar_ID, $YEARLY_READING_SET_Reading_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($Calendar_ID, $YEARLY_READING_SET_Reading_ID),
        ]);
    }

    /**
     * Creates a new Calendar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Calendar();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Calendar_ID' => $model->Calendar_ID, 'YEARLY_READING_SET_Reading_ID' => $model->YEARLY_READING_SET_Reading_ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Calendar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Calendar_ID
     * @param integer $YEARLY_READING_SET_Reading_ID
     * @return mixed
     */
    public function actionUpdate($Calendar_ID, $YEARLY_READING_SET_Reading_ID)
    {
        $model = $this->findModel($Calendar_ID, $YEARLY_READING_SET_Reading_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Calendar_ID' => $model->Calendar_ID, 'YEARLY_READING_SET_Reading_ID' => $model->YEARLY_READING_SET_Reading_ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Calendar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Calendar_ID
     * @param integer $YEARLY_READING_SET_Reading_ID
     * @return mixed
     */
    public function actionDelete($Calendar_ID, $YEARLY_READING_SET_Reading_ID)
    {
        $this->findModel($Calendar_ID, $YEARLY_READING_SET_Reading_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Calendar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Calendar_ID
     * @param integer $YEARLY_READING_SET_Reading_ID
     * @return Calendar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Calendar_ID, $YEARLY_READING_SET_Reading_ID)
    {
        if (($model = Calendar::findOne(['Calendar_ID' => $Calendar_ID, 'YEARLY_READING_SET_Reading_ID' => $YEARLY_READING_SET_Reading_ID])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
