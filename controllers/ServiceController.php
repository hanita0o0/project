<?php

namespace app\controllers;

use app\models\Location;
use app\models\TypeLocation;
use Yii;
use app\models\Service;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServiceController implements the CRUD actions for Service model.
 */
class ServiceController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Service models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Service::find()->orderBy(['id'=>SORT_DESC]),
        ]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Service model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model=$this->findModel($id);
        $model->code_phone_id = $model->codePhone->code;
        $model->location_id = $model->location->name;
        $model->type_service_id = $model->typeService->name;
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Service model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Service();
        if($model->load(Yii::$app->request->post()) ){
           $model->created_by=Yii::$app->user->id;
           $model->created_at=time();
            if ( $model->save()) {

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionSelect($type)

    {

        $type_location_id= TypeLocation::find()->Where(['type_service_id'=>$type])->one();

        $locateAll = Location::find()
            ->select(['id','name'])
            ->where(['type_location_id'=>$type_location_id->id,])
            ->orderBy('id DESC')
            ->all();

        $location = [];
        // if any location associate for any service so would ignore
        foreach ($locateAll as $value){
            $serv = Service::find()->where(['location_id'=>$value])->one();
            if (! $serv){
                // if not associate insert new location list
                array_push($location,$value);
            }else{
                continue;
            }
        }

//
//        echo "</pre>";
//        var_dump($locate);
//        echo "</pre>";
//        exit;

         if (!empty($location)) {
            echo "<option disabled selected>"."انتخاب کنید"."</option>";
            foreach($location as $value) {

                echo "<option value='".$value->id."'>".$value->name."</option>";
            }

        } else {
            echo "<option>--</option>";

         }


    }

    /**
     * Updates an existing Service model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Service model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Service the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Service::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
