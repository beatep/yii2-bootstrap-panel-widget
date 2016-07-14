<?php
/**
 * @package   yii2-bootstrap-panel-widget
 * @author WeArDe <wearde.studio@gmail.com>
 * @link http://wearde.pp.ua
 * @version   1.0.0
 */

namespace beatep\panel;

use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\base\InvalidConfigException;

class Panel extends Widget
{
    /**
     * @var array the HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /** @var $headerTitle string the panel-title */
    public $headerTitle;
    /** @var $header bool showing header */
    public $header = true;    
	/**
	 * @var string
	 * The class icon to display in the header title of the panel.
	 * @see <http://getbootstrap.com/components/#glyphicons> or <http://fontawesome.io/icons/>
	 */
	public $headerIcon;
	/** @var $headerButtons array */
	public $headerButtons = array();
    /** @var $content mixed */
    public $content;
    /** @var $footer bool showing footer*/
    public $footer = false;
    /** @var $footerTitle string the panel-footer title */
    public $footerTitle;
    /** @var $type string Bootstrap Contextual Color Type default */
    public $type = 'default';

    /**
     * Bootstrap Contextual Color Types
     */
    const TYPE_DEFAULT = 'default'; // use default
    const TYPE_PRIMARY = 'primary';
    const TYPE_INFO = 'info';
    const TYPE_DANGER = 'danger';
    const TYPE_WARNING = 'warning';
    const TYPE_SUCCESS = 'success';

    /**
     * @inheritdoc
     */
    public function init()
    {
	    parent::init();
        $this->_initOptions();
        echo Html::beginTag('div',$this->options);

        $this->_initHeader();

        echo Html::beginTag('div',['class' => 'panel-body']);
        echo $this->content;
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        echo Html::endTag('div');
        $this->_initFooter();
        echo Html::endTag('div');
        
    }

    /**
     * Initialize bootstrap Panel styling
     */
    private function _initOptions()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        if (!isset($this->options['class'])) {
            $this->options['class'] = 'panel panel-'.$this->type;
        }
        $view = $this->getView();

        PanelAsset::register($view);
    }

    /**
     * Initialize Panel header
     */
    private function _initHeader(){

        if($this->header) {
	        $icon = '';
    		if ($this->headerIcon) {
				if (strpos($this->headerIcon, 'icon') === false && strpos($this->headerIcon, 'fa') === false)
					$icon = '<span class="glyphicon glyphicon-' . $this->headerIcon . '"></span> ';
				else
					$icon = '<i class="' . $this->headerIcon . '"></i> ';
			}	        
            echo Html::tag('div', $this->renderButtons().Html::tag('h3', $icon.$this->headerTitle, ['class' => 'panel-title', 'style' => 'display: inline;']), ['class' => 'panel-heading']);
        }
    }

    /**
     * Initialize Panel header
     */
    private function _initFooter(){
        if($this->footer)
            echo Html::tag('div', $this->footerTitle, ['class' => 'panel-footer']);
    }
    
    private function renderButtons() {
		
		if (empty($this->headerButtons))
			return;

		$return = '<div class="pull-right">';

		if (!empty($this->headerButtons) && is_array($this->headerButtons)) {
			
			foreach ($this->headerButtons as $options) {
								
				$return .= Html::a($options['label'], $options['url'], $options['options']); 
			}
		}
		$return .= '</div>';
		return  $return;
	}

    
}
