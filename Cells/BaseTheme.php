<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Theme\Cells;

use BasicApp\Theme\Interfaces\ThemeInterface;

abstract class BaseTheme implements ThemeInterface
{
    public function tag(array $params = []) : string
    {
        return view_cell('BasicApp\Theme\Tag', $params);
    }
}