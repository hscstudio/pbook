<?php

namespace app\controllers;

use Yii;
use app\models\BookSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SearchController implements the CRUD actions for BookSearch model.
 */
class SearchController extends Controller
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
     * Lists all BookSearch models.
     * @return mixed
     */
    public function actionIndex()
    {
		$model = new BookSearch();
		$dataProvider = new ActiveDataProvider([
            'query' => BookSearch::find(),
        ]);
		
        if ($model->load(Yii::$app->request->post())) {
			$dataProvider = new ActiveDataProvider([
				'query' => BookSearch::find()
					->where([
						'LIKE','title',$model->title,
					])
					->orWhere([
						'LIKE','author',$model->title,
					])
					->orWhere([
						'LIKE','publisher',$model->title,
					])
					->orWhere([
						'LIKE','year',$model->title,
					]),
			]);
			return $this->render('index', [
				'model' => $model,
				'dataProvider' => $dataProvider,
			]);
        } else {
            return $this->render('index', [
				'model' => $model,
				'dataProvider' => $dataProvider,
			]);
        }
    }

    /**
     * Displays a single BookSearch model.
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
     * Finds the BookSearch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BookSearch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BookSearch::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
