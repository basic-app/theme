<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\SiteTheme\Cells;

use CodeIgniter\View\Cells\Cell;

abstract class BaseFormGroup extends Cell
{
    public array $attributes = [];

    public $slot;

    public array $error = [];

    public array $label = [];
}