<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

use PhpTheme\Core\PostLink;
use PhpTheme\Core\HtmlHelper;

class GridCellButtonDelete extends \PhpTheme\Themes\Bootstrap4\GridCellButton
{

    public $icon = 'fa fa-times-circle';

    public $id;

    public $confirmMessage;

    protected static $_id = 0;

    protected function getConfirmMessage()
    {
        return $this->confirmMessage ?? t('theme', 'Are you sure?');
    }

    protected function getId()
    {
        if ($this->id)
        {
            return $this->id;
        }

        static::$_id++;

        return 'delete-button-' . static::$_id;
    }

    protected function getLabel()
    {
        return $this->label ?? t('theme', 'Delete');
    }

    protected function renderLink(array $options = []) : string
    {
        $options = HtmlHelper::mergeOptions($options, [
            'attributes' => [
                'style' => [
                    'color' => '#ff0000;'
                ],
                'href' => '#',
                'data-toggle' => 'modal',
                'data-target' => '#' . $this->id
            ]
        ]);

        return parent::renderLink($options);
    }

    public function toString() : string
    {
        $this->id = $this->getId();

        $theme = $this->getGrid()->getTheme();

        if ($theme)
        {
            $deleteButton = $theme->postLink([
                'tag' => 'button',
                'attributes' => [
                    'type' => 'submit',
                    'class' => 'btn btn-danger',
                    'name' => 'delete'
                ],
                'url' => $this->getUrl(),
                'label' => $this->getLabel()
            ]);

            $popup = $theme->popup([
                'id' => $this->id,
                'title' => $this->getLabel(),
                'content' => '<p>' . $this->getConfirmMessage() . '</p>',
                'footer' => $deleteButton
            ]);

            $theme->endBody .= $popup;
        }

        return parent::toString();
    }
    
}