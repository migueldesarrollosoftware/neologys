<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\TransaccionForm;
?>
<aside class="main-sidebar">

    <section class="sidebar">
      
        <!-- Sidebar user panel -->
       
        <!-- search form -->
        
        <!-- /.search form -->

        <?php /* dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        )*/ ?>
        
        
        
        
        
          <?php $items=\common\components\MenuHelper::getAssignedMenu(yii::$app->user->id
                   ,null/*root*/, 
                    null,false/*refresh*/);?>  
       
        <?=dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' =>$items 
            ]
        ) ?>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
        <?php
        $model=New TransaccionForm();
        $form = ActiveForm::begin(['id' => 'transaccion-form',
            'action'=>Url::to(['site/resolve-transa']),
            'method'=>'POST',
            'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'transaccion')
            ->label(false)?>
       
        <?php ActiveForm::end(); ?>
      </div>  
        
        
    </section>

</aside>
