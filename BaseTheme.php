<?php

namespace BasicApp\Theme;

use CodeIgniter\View\Exceptions\ViewException;
use Config\Services;

abstract class BaseTheme
{

    protected $_namespaces = [];

    public function __construct(array $options = [])
    {
        foreach($options as $key => $value)
        {
            $this->$key = $value;
        }

        $this->addNamespace('App');
    }

    public function addNamespace(string $namespace)
    {
        $this->_namespaces[] = $namespace;
    }

    public function view(string $view, array $params = [], array $options = [])
    {
        foreach(array_reverse($this->_namespaces) as $namespace)
        {
            $filename = $namespace . '/' . $view;

            $is_located = Services::locator()->locateFile(
                $filename,
                'Views',
                'php'
            );

            if ($is_located)
            {
                return view($filename, $params, $options);
            }
        }

        throw ViewException::forInvalidFile($view);
    }

    public function view_cell($name, array $params = [], int $ttl = 0, ?string $cacheName = null)
    {
        foreach(array_reverse($this->_namespaces) as $namespace)
        {
            $class_name = $namespace . "\\Cells\\" . ucfirst($name) . 'Cell';

            if (class_exists($class_name))
            {
                return view_cell($class_name, $params, $ttl, $cacheName);
            }
        }

        throw ViewException::forInvalidCellClass($name);
    }

}