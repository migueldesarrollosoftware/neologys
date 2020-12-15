<?php

use yii\helpers\Html;
use common\helpers\comboHelper;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\grid\GridView;
use common\models\masters\Matricula;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
 use common\widgets\linkajaxgridwidget\linkAjaxGridWidget;

/* @var $this yii\web\View */
/* @var $model common\models\masters\AsesoresCurso */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
echo \common\widgets\spinnerWidget\spinnerWidget::widget();
?>
<div class="asesores-curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-6"> 
	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	 <?php //echo $form->field($modelDocente, 'id')->label(\Yii::t('base_labels','Race'))->textInput(['disabled'=>true,'value'=> $modelDocente->carrera->nombre]) ?>	
	 </div> 
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">	
	 <?= $form->field($modelDocente, 'id')->label(\Yii::t('base_labels','Full Name'))->textInput(['disabled'=>true,'value'=> $modelDocente->fullName()]) ?>
	 </div>
	 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	 <?= $form->field($modelDocente, 'codoce')->label(\Yii::t('base_labels','Registration number'))->textInput(['disabled'=>true]) ?>	
	 </div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6"> 
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <br>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                 <?php 
                echo Html::img($modelDocente->image($modelDocente->codoce),['width'=>180,'height'=>240, 'class'=>"img-thumbnail cuaizquierdo"]);
                    ?>
            </div>
	   
	
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
	<?php Pjax::begin(['id'=>'mi_grilla']); ?>
    <?php 
//$idsInPlanes= common\models\masters\PlanesEstudio::find()
        //->select(['curso_id'])->andWhere(['tipoproceso'=>'100'])->column();
// echo $this->render('_search', ['model' => $searchModel]); 
//var_dump($idsInPlanes); die();
/*echo Matricula::find()->select(['id','curso_id','seccion','periodo'])->
                where(['alumno_id'=>$modelDocente->id])->andWhere(['curso_id'=>$idsInPlanes])->createCommand()->rawSql;die();*/
?>
            
    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query'=> frontend\modules\repositorio\models\RepoVwAsesoresAsignados::find()->
                andWhere(['docente_id'=>$modelDocente->id]),
                        ]),
            'summary'=>'',
            'columns' => [
                   
                    //'codcur',
                    'descripcion',
                    'seccion',
                   'codesp',
                   'codalu',
                    'ap',
                    'nombres',
                [
                    'format'=>'raw',
                    'value'=>function($model){
                       $links=$model->listAttachedFiles();
                       $cadenaHtml='';
                       foreach($links as $codocu=>$link){
                          $cadenaHtml.=Html::a($codocu,$link,['data-pjax'=>'0']).'<br>';
                       }
                       return $cadenaHtml;
                    },
                ]
           
              ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>
        
        
     
</div>
   


    <?php ActiveForm::end(); ?>


</div>
 
