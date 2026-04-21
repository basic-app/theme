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

    public ?string $label = null;

    public array $labelAttributes = [];

    public ?string $error = null;

    public array $errorAttributes = [];
}