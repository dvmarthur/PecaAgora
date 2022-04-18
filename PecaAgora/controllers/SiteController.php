<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


class SiteController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    function request_get($url, $id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$url}{$id}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = json_decode(curl_exec($curl), true);
        curl_close($curl);

        return $response;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionObter()
    {
        $consulta = [];

        if (!empty($_POST['meli_id'])) {

            $id = str_replace('-', '', $_POST['meli_id']);
            $id = strtoupper($id);
            $response = $this->request_get('https://api.mercadolibre.com/items/', $id);

            if (isset($response['error'])) {
                Yii::$app->session->setFlash('error', 'Produto não encontrado!');
                return $this->render('index', $consulta);
            }

            $categoria_nome = $this->request_get('https://api.mercadolibre.com/categories/', $response['category_id']);

            $consulta = [
                'id' => $response['id'],
                'title' => $response['title'],
                'price' => $response['price'],
                'categoria' => $categoria_nome['name'],
                'available_quantity' => $response['available_quantity'],
                'thumbnail' => $response['thumbnail'],
                'permalink' => $response['permalink']
            ];
            Yii::$app->session->setFlash('success', 'Consulta realizada com sucesso!');
        } else {
            Yii::$app->session->setFlash('warning', 'Campo não pode ser vazio');
        }
        return $this->render('index', $consulta);
    }
}
