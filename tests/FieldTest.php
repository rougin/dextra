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
    public function test_as_array()
    {
        $field = new Field('tags');

        $field->asArray();

        $actual = $field->isArray();

        $this->assertTrue($actual);
    }

    /**
     * @return void
     */
    public function test_as_self()
    {
        $field = new Field('name');

        $expect = 'self.name';

        $actual = $field->getSelf();

        $this->assertEquals($expect, $actual);
    }

    /**
     * @return void
     */
    public function test_name_only()
    {
        $field = new Field('name', false);

        $actual = $field->__toString();

        $this->assertEquals('name', $actual);
    }

    /**
     * @return void
     */
    public function test_with_item()
    {
        $field = new Field('name');

        $expect = 'item.name';

        $actual = $field->getItem();

        $this->assertEquals($expect, $actual);
    }
}
