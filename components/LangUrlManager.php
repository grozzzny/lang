<?php
namespace grozzzny\lang\components;

use Yii;
use yii\web\UrlManager;
use grozzzny\lang\models\Lang;

class LangUrlManager extends UrlManager
{
    /**
     * @return string | Lang
     */
    protected static function classLang()
    {
        return Lang::className();
    }

    public function createUrl($params)
    {
        $classLang = static::classLang();

        if (isset($params['lang_id'])) {
            //Если указан идентификатор языка, то делаем попытку найти язык в БД,
            //иначе работаем с языком по умолчанию
            $lang = $classLang::findOne($params['lang_id']);
            if ($lang === null) {
                $lang = $classLang::getDefaultLang();
            }
            unset($params['lang_id']);
        } else {
            //Если не указан параметр языка, то работаем с текущим языком
            $lang = $classLang::getCurrent();
        }

        //Получаем сформированный URL(без префикса идентификатора языка)
        $url = parent::createUrl($params);

        $lang_url = $classLang::getDefaultLang()->url == $lang->url ? '' : $lang->url;

        if($url == '/') {
            return '/' . $lang_url;
        } else {
            return empty($lang_url) ? $lang_url . $url : '/' . $lang_url . $url;
        }
    }
}