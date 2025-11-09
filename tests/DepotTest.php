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
    public function test_close_generates_javascript()
    {
        $depot = new Depot('items');

        $close = $depot->withClose();
        $close->resetField('name');
        $close->resetField('description');
        $close->hideModal('itemModal');
        $close->hideModal('deleteModal');

        $expected = file_get_contents(__DIR__ . '/Fixture/Close.js');

        $this->assertEquals($expected, $close->getHtml());
    }

    /**
     * @return void
     */
    public function test_edit_generates_javascript()
    {
        $depot = new Depot('items');

        $edit = $depot->withEdit();
        $edit->addField('name');
        $edit->addField('description');
        $edit->showModal('itemModal');

        $expected = file_get_contents(__DIR__ . '/Fixture/Edit.js');

        $this->assertEquals($expected, $edit->getHtml());
    }

    /**
     * @return void
     */
    public function test_form_generates_javascript()
    {
        $form = new Form('items');
        $form->setName('test');

        $expected = file_get_contents(__DIR__ . '/Fixture/Form.js');

        $this->assertEquals($expected, $form->getHtml());
    }

    /**
     * @return void
     */
    public function test_init_generates_javascript()
    {
        $depot = new Depot('items');

        $init = $depot->withInit();
        $init->addSelect('tags', 'tags', '/api/tags');

        $expected = file_get_contents(__DIR__ . '/Fixture/Init.js');

        $this->assertEquals($expected, $init->getHtml());
    }

    /**
     * @return void
     */
    public function test_load_generates_javascript()
    {
        $depot = new Depot('items');
        $pagee = new Pagee;

        $load = $depot->withLoad($pagee);
        $load->setLink('/api/items');

        $expected = file_get_contents(__DIR__ . '/Fixture/Load.js');

        $this->assertEquals($expected, $load->getHtml());
    }

    /**
     * @return void
     */
    public function test_method_generates_javascript()
    {
        $method = new Method('items');
        $method->setName('test');

        $expected = file_get_contents(__DIR__ . '/Fixture/Method.js');

        $this->assertEquals($expected, $method->getHtml());
    }

    /**
     * @return void
     */
    public function test_modal_generates_javascript()
    {
        $depot = new Depot('items');

        $modal = $depot->withModal('itemModal');
        $modal->addField('name');
        $modal->addField('description');

        $expected = file_get_contents(__DIR__ . '/Fixture/Modal.js');

        $this->assertEquals($expected, $modal->getHtml());
    }

    /**
     * @return void
     */
    public function test_remove_generates_javascript()
    {
        $depot = new Depot('items');

        $remove = $depot->withRemove();
        $remove->setLink('/api/items');
        $remove->setAlert('Success', 'Item has been removed.');

        $expected = file_get_contents(__DIR__ . '/Fixture/Remove.js');

        $this->assertEquals($expected, $remove->getHtml());
    }

    /**
     * @return void
     */
    public function test_select_generates_javascript()
    {
        $select = new Select('tags', 'tags', '/api/tags');

        $expected = file_get_contents(__DIR__ . '/Fixture/Select.js');

        $this->assertEquals($expected, (string) $select);
    }

    /**
     * @return void
     */
    public function test_store_generates_javascript()
    {
        $depot = new Depot('items');

        $store = $depot->withStore();
        $store->addField('name');
        $store->addField('description');
        $store->setLink('/api/items');
        $store->setAlert('Success', 'Item has been created.');

        $expected = file_get_contents(__DIR__ . '/Fixture/Store.js');

        $this->assertEquals($expected, $store->getHtml());
    }

    /**
     * @return void
     */
    public function test_trash_generates_javascript()
    {
        $depot = new Depot('items');

        $trash = $depot->withTrash();
        $trash->addField('name');
        $trash->showModal('deleteModal');

        $expected = file_get_contents(__DIR__ . '/Fixture/Trash.js');

        $this->assertEquals($expected, $trash->getHtml());
    }

    /**
     * @return void
     */
    public function test_update_generates_javascript()
    {
        $depot = new Depot('items');

        $update = $depot->withUpdate();
        $update->addField('name');
        $update->addField('description');
        $update->setLink('/api/items');
        $update->setAlert('Success', 'Item has been updated.');

        $expected = file_get_contents(__DIR__ . '/Fixture/Update.js');

        $this->assertEquals($expected, $update->getHtml());
    }
}
