<?php

namespace Rougin\Dextra;

use LegacyPHPUnit\TestCase;
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
    public function test_close_generates_javascript()
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
    public function test_depot_returns_close()
    {
        $depot = new Depot('items');

        $expect = 'Rougin\Dextra\Close';

        $actual = $depot->withClose();

        $this->assertInstanceOf($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_depot_returns_edit()
    {
        $depot = new Depot('items');

        $expect = 'Rougin\Dextra\Edit';

        $actual = $depot->withEdit();

        $this->assertInstanceOf($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_depot_returns_init()
    {
        $depot = new Depot('items');

        $expect = 'Rougin\Dextra\Init';

        $actual = $depot->withInit();

        $this->assertInstanceOf($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_depot_returns_load()
    {
        $pagee = new Pagee;
        $depot = new Depot('items');

        $expect = 'Rougin\Dextra\Load';

        $actual = $depot->withLoad($pagee);

        $this->assertInstanceOf($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_depot_returns_modal()
    {
        $depot = new Depot('items');

        $expect = 'Rougin\Dextra\Modal';

        $actual = $depot->withModal('modal');

        $this->assertInstanceOf($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_depot_returns_remove()
    {
        $depot = new Depot('items');

        $expect = 'Rougin\Dextra\Remove';

        $actual = $depot->withRemove();

        $this->assertInstanceOf($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_depot_returns_store()
    {
        $depot = new Depot('items');

        $expect = 'Rougin\Dextra\Store';

        $actual = $depot->withStore();

        $this->assertInstanceOf($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_depot_returns_trash()
    {
        $depot = new Depot('items');

        $expect = 'Rougin\Dextra\Trash';

        $actual = $depot->withTrash();

        $this->assertInstanceOf($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_depot_returns_update()
    {
        $depot = new Depot('items');

        $expect = 'Rougin\Dextra\Update';

        $actual = $depot->withUpdate();

        $this->assertInstanceOf($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_edit_generates_javascript()
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
    public function test_form_generates_javascript()
    {
        $el = new Form('items');

        $el->setName('test');

        $expect = $this->findFile('Form');

        $actual = $el->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_init_generates_javascript()
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
    public function test_load_generates_javascript()
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
    public function test_method_generates_javascript()
    {
        $el = new Method('items');

        $el->setName('test');

        $expect = $this->findFile('Method');

        $actual = $el->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_modal_generates_javascript()
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
    public function test_remove_generates_javascript()
    {
        $depot = new Depot('items');

        $el = $depot->withRemove();

        $el->setLink('/api/items');

        $el->setAlert('Success', 'Item has been removed.');

        $expect = $this->findFile('Remove');

        $actual = $el->getHtml();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_select_generates_javascript()
    {
        $select = new Select('tags', 'tags', '/api/tags');

        $expect = $this->findFile('Select');

        $actual = (string) $select;

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_store_generates_javascript()
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
    public function test_trash_generates_javascript()
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
    public function test_update_generates_javascript()
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
        return file_get_contents($file);
    }
}
