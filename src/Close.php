<?php

namespace Rougin\Dextra;

/**
 * @package Dextra
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class Close extends Method
{
    /**
     * @var array<string, mixed>
     */
    protected $data = array();

    /**
     * @var string
     */
    protected $name = 'close';

    /**
     * @var \Rougin\Fortem\Script|null
     */
    protected $script = null;

    /**
     * @return string
     */
    public function getHtml()
    {
        $fn = 'function ()';
        $fn .= '{';
        $fn .= 'const self = this;';

        foreach ($this->modals as $name => $type)
        {
            $fn .= 'Modal.' . $type . '(\'' . $name . '\');';
        }

        $fn .= 'setTimeout(() =>';
        $fn .= '{';

        $fields = $this->data;

        foreach ($this->resets as $field)
        {
            $exists = array_key_exists($field, $fields);

            $value = $exists ? $fields[$field] : null;

            /** @var string */
            $value = json_encode($value);

            $fn .= 'self.' . $field . ' = ' . $value . ';';
        }

        $fn .= '}, 1000)';
        $fn .= '}';

        return $fn;
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return self
     */
    public function setDefaults($data)
    {
        $this->data = $data;

        return $this;
    }
}
