<?php

namespace EasyCSV;

abstract class AbstractBase
{
    protected $_handle;
    protected $_delimiter = ',';
    protected $_enclosure = '"';

    public function __construct($path, $mode = 'r+')
    {
        if ( ! file_exists($path)) {
            touch($path);
        }
        $this->_handle = fopen($path, $mode);
    }

    public function __destruct()
    {
        if (is_resource($this->_handle)) {
            fclose($this->_handle);
        }
    }

    public function setDelimiter($delimiter)
    {
        $this->_delimiter = $delimiter;
    }

    public function getDelimiter()
    {
        return $this->_delimiter;
    }

    public function getHandle()
    {
        return $this->_handle;
    }
}
