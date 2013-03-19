<?php
Yii::import('zii.widgets.CPortlet');

class Callback extends CPortlet
{
    public function init(){
        parent::init();
    }

    protected function renderContent(){
        $this->render('callback/main',array(

        ));
    }
}