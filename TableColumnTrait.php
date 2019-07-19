<?php

namespace BasicApp\Theme;

trait TableColumnTrait
{

    use TableNumberColumnTrait;

    public function getHeader()
    {
        $return = parent::getHeader();

        if (!$return && $this->attribute && $this->row)
        {
            return $this->row->label($this->attribute);
        }

        return $return;
    }

}