<?php
namespace api\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;

class TestController extends Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}

}
