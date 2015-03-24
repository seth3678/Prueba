<?php

class TerceroController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'rights',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('admin','delete','create','update','index','view'),
				'users'=>UserModule::getAdmins(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($view='tercero')
	{
		$model=new Tercero;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tercero']))
		{
			
			$model->attributes=$_POST['Tercero'];
			$model->fecha_cumple_annos=$_POST['Tercero']['fecha_cumple_annos'];
			$model->save();
			//var_dump($_POST['next']);die;
			
				if(isset($_POST['next'])){
				    $this->redirect(array('update','id'=>$model->id,'view'=>$_POST['next']));
				}
				else{
				$this->redirect(array('view','id'=>$model->id));
				}
		}
		
		$_multimedia=new Multimedia;
		// en la variable multimedia  se guardan todos los atributos
		//
		$multimedia=array();
		if(isset($model->multimedias))
			$multimedia=$model->multimedias;
		//var_dump($model->multimedias);die;
	
		$this->render('create',array(
			'model'=>$model,			
			'multimedia'=>$multimedia,
			'view'=>$view,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$view='tercero', $subview='imagenes')
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tercero']))
		{
			$model->attributes=$_POST['Tercero'];
			$model->save();
			
				if(isset($_POST['next'])){
				    $this->redirect(array('update','id'=>$model->id,'view'=>$_POST['next'],'subview'=>$subview));
				}
				else{
				$this->redirect(array('view','id'=>$model->id));
				}
		}
		
		$_multimedia=new Multimedia;
		// en la variable multimedia  se guardan todos los atributos
		//
		$multimedia=array();
		if(isset($model->multimedias))
			$multimedia=$model->multimedias;
		//var_dump($model->multimedias);die;

		$this->render('update',array(
			'model'=>$model,
			'view'=>$view,			
			'multimedia'=>$multimedia,
			'subview'=>$subview,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Tercero');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tercero('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tercero']))
			$model->attributes=$_GET['Tercero'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Tercero::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tercero-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
