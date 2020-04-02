<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Theme;

class Theme extends \PhpTheme\Theme\Theme
{

    public $baseUrl;

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

    const GRID_HEADER_BUTTON_DELETE = GridHeaderButtonDelete::class;

    const GRID_HEADER_BUTTON_UPDATE = GridHeaderButtonUpdate::class;

    public $copyright = '&copy; Copyright {year}.';

    public $poweredBy = 'Powered by <a href="http://basic-app.com" target="_blank">Basic App</a>.';

    public function __construct()
    {
        parent::__construct();

        $this->lang = service('request')->getLocale();

        if ($this->baseUrl)
        {
            $first_symbol = mb_substr($this->baseUrl, 0, 1);

            if ($first_symbol == '/')
            {
                $this->baseUrl = base_url() . $this->baseUrl;
            }
            else
            {
                $this->baseUrl = base_url() . '';
            }
        }
        else
        {
            $this->baseUrl = base_url();
        }
    }

    public function getCopyright($copyright = '')
    {
        if (!$copyright)
        {
            $copyright = $this->copyright;
        }

        if ($this->poweredBy)
        {
            $copyright .= ' ' . $this->poweredBy;
        }

        return strtr($copyright, ['{year}' => date('Y')]);
    }

    public function createForm(object $model)
    {
        $class = static::FORM;

        $form = new $class($model, $this);

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

    public function grid(array $options = [])
    {
        return $this->widget(static::GRID, array_merge($options, ['theme' => $this]));
    }    

    public function gridCellButtonDelete(array $options = [])
    {
        return $this->widget(static::GRID_CELL_BUTTON_DELETE, $options);
    }

    public function gridCellButtonUpdate(array $options = [])
    {
        return $this->widget(static::GRID_CELL_BUTTON_UPDATE, $options);
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function getLang()
    {
        return $this->lang;
    }

    public function getHead()
    {
        return $this->head;
    }

    public function beginBody()
    {
        return $this->beginBody;
    }

    public function endBody()
    {
        return $this->endBody;
    }

}