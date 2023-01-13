<?php
use yii\helpers\Html;
?>
<link rel="stylesheet" href="/css/site.css">
<div class="container text-center">
<!--    <img src= "/img/HPLogo48x48.svg" alt="HotelPlus" class="svgLogin">-->
    <?= Html::img('@web/img/HPLogo48x48.svg', ['alt'=>'Hotel Plus', 'class'=>'svgLogin']); ?>
</div>
<div class="card">
    <div class="card-body login-card-body text-center">
        <p class="login-box-msg">HotelPlus - BackOffice</p>
        <?php $form = \yii\bootstrap4\ActiveForm::begin(['id' => 'login-form']) ?>

        <?= $form->field($model,'username', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-8">
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => '<div class="icheck-primary">{input}{label}</div>',
                    'labelOptions' => [
                        'class' => ''
                    ],
                    'uncheck' => null
                ]) ?>
            </div>
            <div class="col-4 text-center">
                <?= Html::submitButton('Iniciar Sessão', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>

        <?php \yii\bootstrap4\ActiveForm::end(); ?>
        <!-- /.social-auth-links -->

<!--        <p class="mb-1">-->
<!--            <a href="forgot-password.html">Esqueci-me da minha password</a>-->
<!--        </p>-->
<!--        <p class="mb-0">-->
<!--            <a href="register.html" class="text-center">Contactar um administrador</a>-->
<!--        </p>-->
    </div>
    <!-- /.login-card-body -->
</div>