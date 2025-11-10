<?php

namespace Rougin\Dextra;

/**
 * @package Dextra
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class Load extends Method
{
    /**
     * @var integer
     */
    protected $limit = 10;

    /**
     * @var string
     */
    protected $limitKey = 'l';

    /**
     * @var string
     */
    protected $name = 'load';

    /**
     * @var string
     */
    protected $pageKey = 'p';

    /**
     * @param string  $parent
     * @param integer $limit
     */
    public function __construct($parent, $limit = 10)
    {
        $this->setLimit($limit);

        $this->parent = $parent;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        $fn = 'function (page)';
        $fn .= '{';
        $fn .= 'const self = this;';
        $fn .= 'self.loading = true;';
        $fn .= 'let data = { ' . $this->pageKey . ': page };';
        $fn .= 'self.pagee.page = page;';
        $fn .= 'data.' . $this->limitKey . ' = ' . $this->limit . ';';
        $fn .= 'const search = new URLSearchParams(data);';
        $fn .= 'axios.get(\'' . $this->link . '\' + \'?\' + search.toString())';
        $fn .= '.then(function (response)';
        $fn .= '{';
        $fn .= 'const result = response.data;';
        $fn .= 'if (result.items.length === 0)';
        $fn .= '{';
        $fn .= 'self.empty = true;';
        $fn .= '}';
        $fn .= 'self.pagee.limit = result.limit;';
        $fn .= 'self.pagee.pages = result.pages;';
        $fn .= 'self.pagee.total = result.total;';
        $fn .= 'self.items = result.items;';
        $fn .= '})';
        $fn .= '.catch(function (error)';
        $fn .= '{';
        $fn .= 'self.loadError = true;';
        $fn .= '})';
        $fn .= '.finally(function ()';
        $fn .= '{';
        $fn .= 'self.loading = false;';
        $fn .= '})';
        $fn .= '}';

        return $fn;
    }

    /**
     * @param integer $limit
     *
     * @return self
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    /**
     * @param string $limit
     *
     * @return self
     */
    public function setLimitKey($limit)
    {
        $this->limitKey = $limit;

        return $this;
    }

    /**
     * @param string $page
     *
     * @return self
     */
    public function setPageKey($page)
    {
        $this->pageKey = $page;

        return $this;
    }
}
