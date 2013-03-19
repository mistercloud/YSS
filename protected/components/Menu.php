<?

Yii::import('zii.widgets.CPortlet');

class Menu extends CPortlet
{
    public $iMenuId = 1;
    public $sTemplate = 'menu';

    protected $aMenuItems = array();
    public function init(){

        //получаем элементы меню по id меню
        $this->aMenuItems = MenuItems::model()->scopeMenuId($this->iMenuId)->findAll();

        parent::init();
    }

    protected function renderContent(){
        $this->render('menu/'.$this->sTemplate,array(
            'aMenuItems' => $this->aMenuItems,
        ));
    }
}