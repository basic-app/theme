<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace BasicApp\Theme\Tests;

use BasicApp\Theme\GridCellButtonDelete;
use PhpTheme\Grid\Grid;

class GridCellButtonDeleteTest extends \PHPUnit\Framework\TestCase
{

    public function testIndex()
    {
        $grid = new Grid;

        $cell = new GridCellButtonDelete([
            'url' => '#',
            'label' => 'Delete'
        ], $grid);

        $content = $cell->toString();

        $this->assertEquals($content, '<td>' 
            . '<form method="POST" action="#">' 
                . '<button type="submit" title="Delete">' 
                    . '<i class="fa fa-times-circle"></i>' 
                . '</button>' 
            . '</form>' 
        . '</td>');
    }

}