<?php
namespace grozzzny\lang;


use Yii;
use yii\easyii2\AdminModule;
use yii\easyii2\models\ModuleEasyii2Interface;

/**
 * lang module definition class
 */
class Module extends \yii\base\Module implements ModuleEasyii2Interface
{
    public $model;

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'grozzzny\lang\controllers';

    public $settings = [
        'modelLang' => '\grozzzny\lang\models\Lang',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->layout = AdminModule::getInstance()->controllerLayout;
    }

    public function getTitle()
    {
        // TODO: Implement getTitle() method.
        return Yii::t('app', 'Language');
    }

    public function getName()
    {
        // TODO: Implement getName() method.
        return $this->id;
    }

    public function getIcon()
    {
        // TODO: Implement getIcon() method.
        return 'globe';
    }

    public function getSettings()
    {
        // TODO: Implement getSettings() method.
        return $this->settings;
    }
}
