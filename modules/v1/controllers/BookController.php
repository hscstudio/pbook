<?php

namespace app\modules\v1\controllers;

use Yii;
use yii\rest\Controller; 
use app\models\Book;

class BookController extends Controller
{     
	public function behaviors()
	{          
		$behaviors = parent::behaviors();          
		$behaviors['authenticator'] = [            
			'class' =>  \app\components\CustomAuth::className(),
			'tokenParam'=>'key',
			'except'=>['index']
		];          
		$behaviors['rateLimiter'] = [
            'class' => \app\components\RateLimiter::className(),
        ];
		return $behaviors;     
	}
	
	protected function verbs()     
	{         
		return [             
			'index' => ['GET'],         
			'list' => ['GET'],
			'search' => ['POST'],
			'view' => ['GET'],
			'update' => ['PUT'],
			'delete' => ['DELETE'],
			'create' => ['POST'],
		];
	}
 
	public function actionIndex()     
	{         
		$model = Book::find()->all();         
		$result = [];
		if(!empty($model)){
			$msg = "found";	
			$result = $model;
		}
		return [
			'message'=> $msg,
			'result'=> $result,
		];
	}

	public function actionList()
	{
		$model = Book::find()->all();
		$result = [];
		if(!empty($model)){
			$msg = "found";	
			$result = $model;
		}
		return [
			'message'=> $msg,
			'result'=> $result,
		];
	}

	/**
	 *
	 * @param string $q for keyword of searching title, year, author, publisher
	 * @param string $field for column searching
	 * @return array
	 */
	public function actionSearch($q='', $field='title')
	{
		$allowed_columns = ['title','author','publisher','year'];
		$columns = explode(',', $field);	
		$wheres[] = "OR";
		$msg = 'not found';
		$result = [];
		foreach($columns as $column){
			if (in_array($column,$allowed_columns)){
				$wheres[] = ['LIKE',$column,$q];	
			}			
		}
		$model = Book::find()->where($wheres)->all();
		if(!empty($model)){
			$msg = "found";	
			$result = $model;
		}
		return [
			'message'=> $msg,
			'result'=> $books,
		];
	}

	public function actionView($id)
	{
		$model = $this->findModel($id);
		$msg = 'not found';
		$result = [];
		if($model){
			$msg = "found";	
			$result = $model;
		}
		return [
			'message'=> $msg,
			'result'=> $result,
		];
	}
	
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);
		$msg = 'update fail';
		$result = [];
		
		$request = Yii::$app->request;
        if ($request->isPut){
			$model->attributes= $request->bodyParams;
			if($model->save()){
				$msg = "update success";	
				
				$book = $this->findModel($id);
				$result = [];
				if($book){
					$result = $book;
				}			
			}
        }		
		
		return [
			'message'=> $msg,
			'result'=> $result,
		];
	}
	
	public function actionDelete($id)
	{
		$model = $this->findModel($id);
		$msg = 'delete fail';
		$result = [];
		if($model){
			if($model->delete()){
				$msg = "delete success";	
			}			
		}
		
		return [
			'message'=> $msg,
			'result'=> $result,
		];
	}
	
	public function actionCreate()
    {
        $model = new Book();
		$msg = 'create fail';
		$result = [];
        $request = Yii::$app->request;
        if ($request->isPost){
			$model->attributes= $request->bodyParams;
			if($model->save()){
				$msg = "create success";	
				
				$book = $this->findModel($model->id);
				$result = [];
				if($book){
					$result = $book;
				}
			}
        }	
		
		return [
			'message'=> $msg,
			'result'=> $result,
		];
    }
	
	protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        } else {
            return [];
        }
    }
} 
