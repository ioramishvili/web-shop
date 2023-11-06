<?php

declare(strict_types=1);

namespace app\modules\admin\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

class DefaultController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex(): string
    {
        return $this->render('index');
    }
}