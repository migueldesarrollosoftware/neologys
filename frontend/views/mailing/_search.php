<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MailingModelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mailing-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'universidad_id') ?>

    <?= $form->field($model, 'facultad_id') ?>

    <?= $form->field($model, 'ruta') ?>

    <?= $form->field($model, 'activo') ?>

    <?php // echo $form->field($model, 'idioma') ?>

    <?php // echo $form->field($model, 'titulo') ?>

    <?php // echo $form->field($model, 'remitente') ?>

    <?php // echo $form->field($model, 'cuerpo') ?>

    <?php // echo $form->field($model, 'copiato') ?>

    <?php // echo $form->field($model, 'transaccion') ?>

    <?php // echo $form->field($model, 'codocu') ?>

    <?php // echo $form->field($model, 'posic') ?>

    <?php // echo $form->field($model, 'texto') ?>

    <?php // echo $form->field($model, 'parametros') ?>

    <?php // echo $form->field($model, 'reply') ?>

    <?php // echo $form->field($model, 'order') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('base_labels', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('base_labels', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
