<?php

declare(strict_types=1);

namespace app\modules\products\controllers;

use app\models\Products;
use Yii;
use yii\base\InvalidConfigException;
use yii\data\ArrayDataProvider;
use yii\db\StaleObjectException;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class DefaultController extends ActiveController
{
    public $modelClass = Products::class;

    public function actions(): array
    {
        $actions = parent::actions();
        unset($actions['index'], $actions['delete'], $actions['create'], $actions['update']);

        return $actions;
    }

    public function actionIndex(): ArrayDataProvider
    {
        return new ArrayDataProvider([
            'allModels' => Products::find()->all()
        ]);
    }

    public function actionView(int $id): Products
    {
        return Products::findOne($id);
    }

    /**
     * @throws InvalidConfigException
     */
    public function actionCreate(): array
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->getBodyParams(), '') && $model->validate() && $model->save()) {
            Yii::$app->response->setStatusCode(201);
            return ['status' => 'success', 'model' => $model];
        } else {
            Yii::$app->response->setStatusCode(422);
            return ['status' => 'error', 'errors' => $model->getErrors()];
        }
    }

    /**
     * @throws InvalidConfigException
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id): array
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->getBodyParams(), '') && $model->validate() && $model->save()) {
            Yii::$app->response->setStatusCode(200);
        } elseif (!$model->hasErrors()) {
            Yii::$app->response->setStatusCode(204);
        } else {
            Yii::$app->response->setStatusCode(400);
            return ['status' => 'error', 'errors' => $model->getErrors()];
        }

        return ['status' => 'success', 'model' => $model];
    }

    /**
     * @throws \Throwable
     * @throws StaleObjectException
     * @throws NotFoundHttpException
     */
    public function actionDelete($id): ?array
    {
        $model = $this->findModel($id);

        if ($model->delete() === false) {
            Yii::$app->response->setStatusCode(500);
            return ['error' => 'Не удалось удалить ресурс.'];
        }

        Yii::$app->response->setStatusCode(204);

        return null;
    }

    /**
     * @throws NotFoundHttpException
     */
    protected function findModel($id): Products
    {
        $model = Products::findOne($id);

        if ($model === null) {
            throw new NotFoundHttpException('Ресурс не найден');
        }

        return $model;
    }
}