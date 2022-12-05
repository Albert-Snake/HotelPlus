<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contactos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p><b>Telefone:</b> 265 530 650</p>
    <p><b>Email:</b> geral@hotelplus.pt</p>
    <p><b>Morada:</b> Avenida da Praça Pública, nº15, Torres Vedras</p>
</div>
