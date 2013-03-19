<?php

class NewsController extends Controller
{
    protected $iNewsPerPage = 10;

	public function actionIndex()
	{
        //получаем все категории новостей
        $aCategories = NewsCategories::model()->findAll(array('order' => 'weight ASC'));
        //получаем новости
        $aNews = News::model()->scopeLast($this->iNewsPerPage)->with('category')->findAll();

		$this->render('index',array(
            'aCategories' => $aCategories,
            'aNews' => $aNews,
        ));
	}



    public function actionItem( $id ){

        if (!(int)$id){
            //@TODO выдать 404
        }
        $oNews = News::model()->with('category')->findByPk($id);

        $this->render('item',array(
            'oNews' => $oNews,
        ));

    }

    public function actionCategory( $id ){
        
    }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}