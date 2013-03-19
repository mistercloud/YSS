<?php

class UrlRules extends CBaseUrlRule
{
    public function createUrl($manager,$sRoute,$aParams ,$ampersand)
    {


        //@TODO добавить кеширование

        //формируем ссылку
        $sUrl = $sRoute;
        foreach($aParams as $sParamName => $sParamValue){

            $sUrl .= '/'.$sParamName.'/'.$sParamValue;
        }
        $oUrl = Urls::model()->findbyattributes(array('direct_to' => $sUrl ) );
        if ($oUrl){
            return $oUrl->url;
        }

        return $sUrl;
    }

    public function parseUrl($manager,$request,$sPath,$rawPathInfo)
    {
        if (!$sPath){
            $sPath = '/';
        }
        $oUrl = Urls::model()->findByPk($sPath);
        if ($oUrl){
            return $oUrl->direct_to;
        }

        // проверка если ссылка с синонимом, но обращение идет напрямую
        $oUrl = Urls::model()->findbyattributes(array('direct_to' => $sPath ) );
        if ($oUrl){
            Yii::app()->request->redirect('/'.$oUrl->url, true);
        }


        return false;  // не применяем данное правило
    }
}