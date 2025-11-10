<?php

namespace Rougin\Dextra;

/**
 * @package Dextra
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class ModalTest extends Testcase
{
    /**
     * @return void
     */
    public function test_with_no_modal()
    {
        $el = new Modal('parent');

        // Only item field ---
        $el->addField('name');
        // -------------------

        $expect = $this->findFile('Simple');

        $actual = $el->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_params()
    {
        $modal = new Modal('parent');

        // Not an item field, should be a param ---
        $modal->addField('id', false);
        // ----------------------------------------

        // Item field -----------
        $modal->addField('name');
        // ----------------------

        $modal->showModal('myModal');

        $modal->hideModal('otherModal');

        $expect = $this->findFile('Params');

        $actual = $modal->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @param string $name
     *
     * @return string
     */
    protected function findFile($name)
    {
        $path = __DIR__ . '/Fixture/';

        $file = $path . $name . '.js';

        /** @var string */
        $html = file_get_contents($file);

        return trim($html);
    }
}
