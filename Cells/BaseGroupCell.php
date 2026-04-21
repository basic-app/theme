<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Theme\Cells;

use CodeIgniter\View\Cells\Cell;

abstract class BaseGroupCell extends Cell
{
    public array $attributes = [];

    public array $label;

    public array $labelAttributes = [];

    public array $error;

    public array $errorAttributes = [];
}