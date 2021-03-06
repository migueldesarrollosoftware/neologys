<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\modules\inter\helpers\comboHelper;
use frontend\modules\inter\Module as m;
USE common\helpers\h;

use common\widgets\cbodepwidget\cboDepWidget as ComboDep;
?>

<div class="citas-search">
    <?php $form = ActiveForm::begin(
          [
           // 'action' => ['index','id'=>$id, 'modelPrograma'=>$modelPrograma],
            'method' => 'get',
            'options' => ['data-pjax' => 1],
          ]); 
    ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
        <div class="form-group">
            <?= Html::submitButton("<span class='fa fa-search'></span>".m::t('verbs', 'Search'), ['class' => 'btn btn-primary']) ?>
       
         <?php
          //$url= Url::to(['unique-university','id'=>$profile->id,'gridName'=>'check-multiple','idModal'=>'buscarvalor']);
            echo  Html::button(h::awe('refresh').h::space(10).m::t('verbs','Refresh Stages'), ['href' => '#', 'title' => m::t('verbs','Refresh'),'id'=>'button_refresh_etapa', 'class' => 'btn-warning']); 
           ?> 
          </div>      
    </div>
  
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= 
            $form->field($model, 'codperiodo')->
                         dropDownList
                         (
                         //frontend\modules\inter\helpers\ComboHelper::  
                         
                            \frontend\modules\inter\helpers\ComboHelper::getCboPeriodos(), ['prompt'=>'--'.m::t('verbs','Choose a value')."--",]
                         )
        ?>
    </div>
 
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= 
            $form->field($model, 'modo_id')->
                         dropDownList
                         (
                            comboHelper::getCboModos(), ['prompt'=>'--'.m::t('verbs','Choose a value')."--",]
                         )
        ?>
    </div>
    
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
    <?= ComboDep::widget([
               'model'=>$model,               
               'form'=>$form,
               'data'=> common\helpers\ComboHelper::getCboFacultades(),
               'campo'=>'facultad_id',
               'idcombodep'=>'vwinterconvocadossearch-carrera_id',
               /* 'source'=>[ //fuente de donde se sacarn lso datos 
                    /*Si quiere colocar los datos directamente 
                     * para llenar el combo aqui , hagalo coloque la matriz de los datos
                     * aqui:  'id1'=>'valor1', 
                     *        'id2'=>'valor2,
                     *         'id3'=>'valor3,
                     *        ...
                     * En otro caso 
                     * de la BD mediante un modelo  
                     */
                        /*Docbotellas::className()=>[ //NOmbre del modelo fuente de datos
                                        'campoclave'=>'id' , //columna clave del modelo ; se almacena en el value del option del select 
                                        'camporef'=>'descripcion',//columna a mostrar 
                                        'campofiltro'=>'codenvio'/* //cpolumna 
                                         * columna que sirve como criterio para filtrar los datos 
                                         * si no quiere filtrar nada colocwue : false | '' | null
                                         *
                        
                         ]*/
                   'source'=>[\common\models\masters\Carreras::className()=>
                                [
                                  'campoclave'=>'id' , //columna clave del modelo ; se almacena en el value del option del select 
                                        'camporef'=>'nombre',//columna a mostrar 
                                        'campofiltro'=>'facultad_id'  
                                ]
                                ],
                            ]
               
               
        )  ?>
 </div> 
    <?php 
 if(count(h::request()->get()) >0){
  if(array_key_exists('VwInterConvocadosdocentesSearch', h::request()->get())){
   if(array_key_exists('carreradest_id', h::request()->get()['VwInterConvocadosdocentesSearch'])){
   $carrera_id=h::request()->get()['VwInterConvocadosdocentesSearch']['carreradest_id'];
   $facultad_id=h::request()->get()['VwInterConvocadosdocentesSearch']['facultad_id'];  
         }else{
    $carrera_id=null;
   $facultad_id=null; 
      }
  }else{
     $carrera_id=null;
   $facultad_id=null;  
  }
 }else{
  $carrera_id=null;
   $facultad_id=null;     
 }
 ?>
    
    
    
    
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= 
            $form->field($model, 'carreradest_id')->
                         dropDownList
                         (
                            (is_null($carrera_id))?[]:common\helpers\ComboHelper::getCboCarreras($facultad_id), ['prompt'=>'--'.m::t('verbs','Choose a value')."--",]
                         )
        ?>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= 
            $form->field($model, 'estado')->
                         dropDownList
                         (
                         \frontend\modules\inter\helpers\ComboHelper::getCboStatusConvocado(), ['prompt'=>'--'.m::t('verbs','Choose a value')."--",]
                         )
        ?>
    </div>
    
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= 
            $form->field($model, 'current_etapa')->
                         dropDownList
                         (
                            comboHelper::getCboStages(1), ['prompt'=>'--'.m::t('verbs','Choose a value')."--",]
                         )
        ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, 'codigodocente') ?>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, 'nombres') ?>
    </div> 
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, 'ap') ?>
    </div> 
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, 'am') ?>
    </div> 
    <?php ActiveForm::end(); ?>
</div>
