<?php

namespace BasicApp\Theme;

use PhpTheme\Helpers\Html;

trait TableTrait
{

    use TableLinkColumnTrait;
    
    use TableUpdateLinkColumnTrait;
    
    use TableDeleteLinkColumnTrait;

    use TableBooleanColumnTrait;

}