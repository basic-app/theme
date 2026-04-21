<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Theme\Cells;

use CodeIgniter\View\Cells\Cell;

abstract class BaseFormInputCell extends Cell
{
    public array $attributes = [];

    public $label;

    public $error;
}