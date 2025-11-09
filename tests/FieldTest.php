<?php

namespace Rougin\Dextra;

/**
 * @package Dextra
 *
 * @author Rougin Gutib <rougingutib@gmail.com>
 */
class FieldTest extends Testcase
{
    /**
     * @return void
     */
    public function test_field_formats_item_self()
    {
        $field = new Field('name');

        $this->assertEquals('item.name', $field->getItem());
        $this->assertEquals('self.name', $field->getSelf());
    }

    /**
     * @return void
     */
    public function test_field_as_array_state()
    {
        $field = new Field('tags');

        $field->asArray();

        $this->assertTrue($field->isArray());
    }
}
