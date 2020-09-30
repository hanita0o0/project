<?php

namespace app\controllers;

use app\models\City;
use app\models\Region;
use app\models\TypeLocation;
use Yii;
use app\models\Location;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LocationController implements the CRUD actions for Location model.
 */
class LocationController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::class,
                'only'=>['create','index','view','update','delete'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Location models.
     * @return mixed
     */
    public function actionIndex($type)
    {
        $type_location_id = TypeLocation::find()->id_type_location($type)->one();
        $dataProvider = new ActiveDataProvider([
            'query' => Location::find()->andWhere(['type_location_id'=>$type_location_id->id])->orderBy(['id'=>SORT_DESC]),
             'pagination'=>[
                 'pageSize'=>4
             ],

            ]);



        return $this->render('index', [
            'dataProvider' => $dataProvider,'type'=>$type
        ]);
    }

    /**
     * Displays a single Location model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
        $type = $model->typeLocation->name;;
        $model->province_id = $model->province->name;
        $model->city_id = $model->city->name;
        $model->region_id = $model->region->name;
        $model->type_location_id = $type;
        return $this->render('view', [
            'model' => $model,'type'=>$type
        ]);
    }

    /**
     * Creates a new Location model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type)
    {

        $model = new Location();

        $type_location_id = TypeLocation::find()->id_type_location($type)->one();
        $model->type_location_id = $type_location_id->id;
        $model->created_at=time();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,'type'=>$type
        ]);
    }

    /**
     * Updates an existing Location model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$type)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,'type'=>$type
        ]);
    }

    /**
     * Deletes an existing Location model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $model=$this->findModel($id);
        $type = $model->typeLocation->name;
        $model->delete();

        return $this->redirect(['index','type'=>$type]);
    }

    /**
     * Finds the Location model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Location the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Location::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCity_lists($id)
    {
        $cities= City::find()
            ->where(['province_id' => $id])
            ->orderBy('id DESC')
            ->all();

        if (!empty($cities)) {
            echo "<option disabled selected>"."انتخاب کنید"."</option>";
            foreach($cities as $city) {
                echo "<option value='".$city->id."'>".$city->name."</option>";
            }
        } else {
            echo "<option>-</option>";
        }

    }
    public function actionRegion_lists($id)
    {
        $regions= Region::find()
            ->where(['city_id' => $id])
            ->orderBy('id DESC')
            ->all();

        if (!empty($regions)) {
            echo "<option disabled selected>"."انتخاب کنید"."</option>";
            foreach($regions as $region) {

                echo "<option value='".$region->id."'>".$region->name."</option>";
            }

        } else {
            echo "<option>--</option>";
        }


    }

}
