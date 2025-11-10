<?php

namespace Rougin\Dextra;

use LegacyPHPUnit\TestCase;
use Rougin\Fortem\Script;
use Rougin\Gable\Pagee;

/**
 * @package Dextra
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class DepotTest extends Testcase
{
    /**
     * @return void
     */
    public function test_close_with_script()
    {
        $script = new Script('test_script');

        $close = new Close('parent');

        $actual = $close->withScript($script);

        $expect = 'Rougin\Dextra\Close';

        $this->assertInstanceOf($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_form_with_fields()
    {
        $form = new Form('items');

        $form->addField('tags')->asArray();

        $form->addField('items')->asArray();

        $expect = $this->findFile('Form');

        $actual = $form->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_method_returns_name()
    {
        $method = new Method('parent');

        $expect = 'myMethod';

        $method->setName($expect);

        $actual = $method->getName();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_method_with_name()
    {
        $el = new Method('items');

        $el->setName('test');

        $expect = $this->findFile('Method');

        $actual = $el->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_close()
    {
        $depot = new Depot('items');

        $el = $depot->withClose();

        $el->resetField('name');

        $el->resetField('description');

        $el->hideModal('itemModal');

        $el->hideModal('deleteModal');

        $expect = $this->findFile('Close');

        $actual = $el->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_edit()
    {
        $depot = new Depot('items');

        $el = $depot->withEdit();

        $el->addField('name');

        $el->addField('description');

        $el->showModal('itemModal');

        $expect = $this->findFile('Edit');

        $actual = $el->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_init()
    {
        $depot = new Depot('items');

        $el = $depot->withInit();

        $el->addSelect('tags', 'tags', '/api/tags');

        $expect = $this->findFile('Init');

        $actual = $el->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_load()
    {
        $depot = new Depot('items');

        $pagee = new Pagee;

        $el = $depot->withLoad($pagee);

        $el->setLink('/api/items');

        $expect = $this->findFile('Load');

        $actual = $el->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_modal()
    {
        $depot = new Depot('items');

        $el = $depot->withModal('itemModal');

        $el->addField('name');

        $el->addField('description');

        $expect = $this->findFile('Modal');

        $actual = $el->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_remove()
    {
        $depot = new Depot('items');

        $el = $depot->withRemove();

        $el->addField('name');

        $el->setLink('/api/items');

        $el->setAlert('Success', 'Item has been removed.');

        $expect = $this->findFile('Remove');

        $actual = $el->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_select()
    {
        $select = new Select('tags', 'tags', '/api/tags');

        $expect = $this->findFile('Select');

        $actual = $select->__toString();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_store()
    {
        $depot = new Depot('items');

        $el = $depot->withStore();

        $el->addField('name');

        $el->addField('description');

        $el->setLink('/api/items');

        $el->setAlert('Success', 'Item has been created.');

        $expect = $this->findFile('Store');

        $actual = $el->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_trash()
    {
        $depot = new Depot('items');

        $el = $depot->withTrash();

        $el->addField('name');

        $el->showModal('deleteModal');

        $expect = $this->findFile('Trash');

        $actual = $el->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_with_update()
    {
        $depot = new Depot('items');

        $el = $depot->withUpdate();

        $el->addField('name');

        $el->addField('description');

        $el->setLink('/api/items');

        $el->setAlert('Success', 'Item has been updated.');

        $expect = $this->findFile('Update');

        $actual = $el->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @param  string $name
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
