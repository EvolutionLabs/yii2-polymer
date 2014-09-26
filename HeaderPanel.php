<?php

namespace evolutionlabs\polymer;

use Yii;
use yii\helpers\Html;

class HeaderPanel extends Widget
{
    /**
     * @var string Controls header and scrolling behavior. Options are standard, seamed, waterfall, waterfall-tall,
     * waterfall-medium-tall, scroll and cover. Default is standard.
     *  - standard: The header is a step above the panel. The header will consume the panel at the point of entry,
     * preventing it from passing through to the opposite side.
     *  - seamed: The header is presented as seamed with the panel.
     *  - waterfall: Similar to standard mode, but header is initially presented as seamed with panel, but then
     * separates to form the step.
     *  - waterfall-tall: The header is initially taller (tall class is added to the header). As the user scrolls,
     * the header separates (forming an edge) while condensing (tall class is removed from the header).
     *  - scroll: The header keeps its seam with the panel, and is pushed off screen.
     *  - cover: The panel covers the whole core-header-panel including the header. This allows user to style the panel
     * in such a way that the panel is partially covering the header.
     */
    public $mode;

    /**
     * @var string The class used in waterfall-tall mode. Change this if the header accepts a different class
     * for toggling height, e.g. "medium-tall"
     */
    public $tallClass;

    /**
     * @var boolean If true, the drop-shadow is always shown no matter what mode is set to.
     */
    public $shadow;

    /**
     * @var array the HTML attributes for the container tag.
     */
    public $options = [];

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        $link = $this->_assetBundle->link;
        $link[] = 'bower_components/core-header-panel/core-header-panel.html';
        $this->_assetBundle->link = $link;
        $options = $this->options;
        if ($this->mode) {
            $options['mode'] = $this->mode;
        }
        if ($this->tallClass) {
            $options['tallClass'] = $this->tallClass;
        }
        if ($this->shadow) {
            $options['shadow'] = $this->shadow;
        }
        echo Html::beginTag('core-header-panel', $options);
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo Html::endTag('core-header-panel');
        parent::run();
    }
}