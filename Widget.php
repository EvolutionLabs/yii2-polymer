<?php

namespace evolutionlabs\polymer;

use Yii;
use yii\helpers\Json;

/**
 * \speixoto\polymer\Widget is the base class for all polymer widgets.
 *
 * @author Sérgio Peixoto <matematico2002@hotmail.com>
 *
 * @link http://www.polymer-project.org
 */
class Widget extends \yii\base\Widget
{
    protected $_assetBundle;
    /**
     * Initializes the widget.
     */
    public function init()
    {
        $view = $this->getView();
        $this->_assetBundle = PolymerAsset::register($view);
    }
}