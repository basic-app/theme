<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Theme\Cells;

use CodeIgniter\View\Cells\Cell;

class Tag extends Cell
{
    protected string $view = VENDORPATH . 'basic-app/theme/templates/tag.php';

    public $tag;

    public $attributes = [];

    public $slot;
}