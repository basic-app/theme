<?php
/**
 * @author PhpTheme Dev Team <dev@getphptheme.com>
 * @license MIT
 * @link http://getphptheme.com
 */
namespace BasicApp\Theme\Tests;

use BasicApp\Theme\GridCellButtonDelete;
use PhpTheme\Themes\Bootstrap4\Grid;

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
                . '<a style="color: #ff0000;" href="#" data-toggle="modal" data-target="#delete-button-1" title="Delete">' 
                    . '<i class="fa fa-times-circle"></i>' 
                . '</a>' 
            . '</td>');
    }

}