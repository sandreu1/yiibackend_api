<?php

namespace app\controllers;
use yii\rest\ActiveController;


use app\models\Finca;
use app\models\FincaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class FincaController extends ActiveController
{
    public $modelClass = 'app\models\Finca';
}