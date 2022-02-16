<?php

namespace app\controllers;
use yii\rest\ActiveController;

use app\models\Parcela;
use app\models\ParcelaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ParcelaController extends ActiveController
{
    public $modelClass = 'app\models\Parcela';
}