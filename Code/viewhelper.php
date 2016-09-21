<?php
namespace PdvPolymer\ViewHelpers\Custom;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;
class ButtonUpViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper
{
    //the tagname which is also the name
    protected $tagName = 'button-up';
    /**
     * this method is used to initialize the specific tag arguments
     */
    public function initializeArguments()
    {
        parent::initializeArguments(); 
    }
    /**
     * generate the tag for the element and the link for the element.
     * @return string the link and the tag for the element
     */
    public function render(){
        $tag = '<link rel="import" href="typo3conf/ext/pdvpolymer/Resources/Public/Elements/Custom/button-up.html">';
        return $tag . $this->tag->render();
    }
}
