<?php

namespace app\controllers;
use yii\rest\ActiveController;

use app\models\Sector;
use app\models\SectorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class SectorController extends ActiveController
{
    public $modelClass = 'app\models\Sector';
}