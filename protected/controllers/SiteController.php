<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(array('site/index'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionRegister() {
		$model = new RegisterForm;

		if(isset($_POST['RegisterForm'])) {
			$model->attributes = $_POST['RegisterForm'];
			if($model->validate()) {
				$user = new User();
				$user->username = $model->username;
				$user->password = password_hash($model->password, PASSWORD_DEFAULT);
				$user->role = 'editor';
				$user->save();
				$this->redirect(array('site/login'));
			}
		}

		$this->render('register', array('model'=>$model));
	}

	public function actionToggleRole()
	{
		if(Yii::app()->user->isGuest) {
			$this->redirect(array('site/login'));
		}

		$userModel = User::model()->findByPk(Yii::app()->user->id);

		if($userModel === null) {
			throw new CHttpException(404, 'User not found.');
		}

		$newRole = ($userModel->role === 'editor') ? 'admin' : 'editor';
		$userModel->role = $newRole;

		if($userModel->save(false, array('role'))) {
			Yii::app()->user->setState('role', $newRole);
			Yii::app()->user->setFlash('success', "Role switched to $newRole");
		} else {
			Yii::app()->user->setFlash('error', "Failed to update role in the database.");
		}

		$this->redirect(Yii::app()->request->urlReferrer ?: array('site/index'));
	}
}