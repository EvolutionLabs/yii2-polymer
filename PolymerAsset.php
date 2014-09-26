<?php

namespace evolutionlabs\polymer;

use yii\web\AssetBundle;
use yii\helpers\Url;

/**
 * Asset bundle for the Polymer files.
 *
 * @author Sérgio Peixoto <matematico2002@hotmail.com>
 *
 * @link http://www.polymer-project.org
 */
class PolymerAsset extends AssetBundle
{
    public $sourcePath = '@evolutionlabs/polymer/assets';
    public $js = ['bower_components/platform/platform.js'];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $link = [];

    public function registerAssetFiles($view)
    {
        foreach ($this->link as $link) {
            $options = [];
            $options['rel'] = 'import';
            if ($link[0] !== '/' && $link[0] !== '.' && strpos($link, '://') === false) {
                $options['href'] = Url::to($this->baseUrl . '/' . $link);
            } else {
                $options['href'] = Url::to($link);
            }
            $view->registerLinkTag($options);
        }
        parent::registerAssetFiles($view);
    }
}