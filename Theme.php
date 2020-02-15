<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

class Theme extends \PhpTheme\Theme\Theme
{

    public $baseUrl = '';

    public $head = '';

    public $beginBody = '';

    public $endBody = '';

    public $lang = 'en';

    const PAGER = Pager::class;

    const FORM = Form::class;

    const IMAGE_PREVIEW = FormImagePreview::class;

    const FILE_PREVIEW = FormFilePreview::class;

    const GRID_CELL_BUTTON_DELETE = GridCellButtonDelete::class;

    const GRID_CELL_BUTTON_UPDATE = GridCellButtonUpdate::class;

    const GRID_CELL_BUTTON_BOOLEAN = GridCellButtonBoolean::class;

    public function createForm(object $model, array $errors = [])
    {
        $class = static::FORM;

        $form = new $class($model, $errors, $this);

        return $form;
    }

    public function pager(array $options = [])
    {
        return $this->widget(static::PAGER, $options);
    }

    public function imagePreview(array $options = [])
    {
        return $this->widget(static::IMAGE_PREVIEW, $options);
    }

    public function filePreview(array $options = [])
    {
        return $this->widget(static::FILE_PREVIEW, $options);
    }

    public function gridCellButtonDelete(array $options = [])
    {
        return $this->widget(static::GRID_CELL_BUTTON_DELETE, $options);
    }

    public function gridCellButtonUpdate(array $options = [])
    {
        return $this->widget(static::GRID_CELL_BUTTON_UPDATE, $options);
    }

}