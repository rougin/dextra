# Dextra

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]][link-license]
[![Build Status][ico-build]][link-build]
[![Coverage Status][ico-coverage]][link-coverage]
[![Total Downloads][ico-downloads]][link-downloads]

`Dextra` is a PHP utility package that provides templates based on [alpine.js](https://alpinejs.dev/) for handling frontend CRUD.

## Installation

Install the package using [Composer](https://getcomposer.org/):

``` bash
$ composer require rougin/dextra
```

## Basic usage

Use the `Depot` class to initialize the CRUD methods:

``` html
// app/plates/items/depot.php

<script type="text/javascript">
<?php $depot = new Depot('items') ?>

// ...
</script>
```

Then use the available methods below once defined:

### withInit

Creates an `init` method. This method initializes any defined `Select` elements using [tom-select](https://tom-select.js.org/). After initialization, it calls the `load` method with the initial page number to fetch data:

``` html
// app/plates/items/depot.php

<script type="text/javascript">

// ...

<?= $depot->withInit(1) ?>
</script>
```

### withLoad

Creates the `load` method. This method fetches paginated data from a `GET` request. Upon receiving a response, it updates the component's `items` data property with the fetched data and the `limit` data property with the expected items per page (e.g., `10`):

``` html
// app/plates/items/depot.php

<script type="text/javascript">

// ...

<?= $depot->withLoad(10)
  ->setLink($url->set('/v1/items')) ?>
</script>
```

It also provides configuration for `page` and `limit` keys by using `setPageKey` and `setLimitKey` methods respectively. The default values are `p` for `page` and `l` for `limit`:

``` html
// app/plates/items/depot.php

<script type="text/javascript">

// ...

<?= $depot->withLoad(10)
  ->setPageKey('p')
  ->setLimitKey('l')
  ->setLink($url->set('/v1/items')) ?>
</script>
```

### withStore

Creates a `store` method. This is used for sending a `POST` request to the specified link to create a new item. It collects data from the defined fields, and shows an alert upon successful creation before reloading the data:

``` html
// app/plates/items/depot.php

<script type="text/javascript">

// ...

<?= $depot->withStore()
  ->addField('name')
  ->addField('detail')
  ->setAlert('Item created!', 'Item successfully created.')
  ->setLink($url->set('/v1/items')) ?>
</script>
```

### withEdit

Creates an `edit` method. This method is used to populate a modal with the data of a selected item. It takes an `item` object as a parameter and assigns its properties to the corresponding fields in the modal. It can also show or hide other modals:

``` html
// app/plates/items/depot.php

<script type="text/javascript">

// ...

<?= $depot->withEdit()
  ->addField('name')
  ->addField('detail')
  ->addField('id')
  ->showModal('item-detail-modal') ?>
</script>
```

### withUpdate

Creates an `update` method. This method is used for sending a `PUT` request to the specified link to update an existing item. It collects data from the defined fields, includes the item's ID in the request, and shows an alert upon successful update before reloading the data:

``` html
// app/plates/items/depot.php

<script type="text/javascript">

// ...

<?= $depot->withUpdate()
  ->addField('name')
  ->addField('detail')
  ->setAlert('Item updated!', 'Item successfully updated.')
  ->setLink($url->set('/v1/items')) ?>
</script>
```

### withTrash

Creates a `trash` method. This method is used to populate a modal for confirming the deletion of an item. It takes an `item` object as a parameter and assigns its properties to the corresponding fields in the modal. It can also show or hide other modals:

``` html
// app/plates/items/depot.php

<script type="text/javascript">

// ...

<?= $depot->withTrash()
  ->addField('name')
  ->addField('id')
  ->showModal('delete-item-modal') ?>
</script>
```

### withRemove

Creates a `remove` method. This method is used for sending a `DELETE` request to the specified link to remove an item. It takes the item's ID as a parameter, includes it in the request, and shows an alert upon successful deletion before reloading the data:

``` html
// app/plates/items/depot.php

<script type="text/javascript">

// ...

<?= $depot->withRemove()
  ->addField('name')
  ->addField('detail')
  ->setAlert('Item deleted!', 'Item successfully deleted.')
  ->setLink($url->set('/v1/items')) ?>
</script>
```

### withClose

Creates a `close` method. This method is used to close modals and reset the values of specified fields. It can also hide other modals and reset fields based on a provided script:

``` html
// app/plates/items/depot.php

<script type="text/javascript">

// ...

<?= $depot->withClose()
  ->withScript($script)
  ->hideModal('delete-item-modal')
  ->hideModal('item-detail-modal')
  ->resetField('detail')
  ->resetField('error')
  ->resetField('id')
  ->resetField('name')
  ->resetField('loadError') ?>
</script>
```

The `setDefaults` method can also be used for resetting the data with default values:

``` html
// app/plates/items/depot.php

<script type="text/javascript">
<?= $script = $form->script('items')
  ->with('name')
  ->with('detail')
  ->with('items', array())
  ->with('empty', false)
  ->with('loadError', false)
  ->with('id', null)
  ->with('delete', false)
  ->withError()
  ->withLoading() ?>

<?= $depot->withClose()
  ->setDefaults($script->getFields()) ?>

// ...
</script>
```

> [!NOTE]
> The `Script` class from [Fortem](https://github.com/rougin/fortem) can be used for resetting the data.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more recent changes.

## Contributing

See [CONTRIBUTING](CONTRIBUTING.md) on how to contribute.

## License

The MIT License (MIT). Please see [LICENSE][link-license] for more information.

[ico-build]: https://img.shields.io/github/actions/workflow/status/rougin/dextra/build.yml?style=flat-square
[ico-coverage]: https://img.shields.io/codecov/c/github/rougin/dextra?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/rougin/dextra.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-version]: https://img.shields.io/packagist/v/rougin/dextra.svg?style=flat-square

[link-build]: https://github.com/rougin/dextra/actions
[link-changelog]: https://github.com/rougin/dextra/blob/master/CHANGELOG.md
[link-contributing]: https://github.com/rougin/dextra/blob/master/CONTRIBUTING.md
[link-contributors]: https://github.com/rougin/dextra/contributors
[link-coverage]: https://app.codecov.io/gh/rougin/dextra
[link-downloads]: https://packagist.org/packages/rougin/dextra
[link-license]: https://github.com/rougin/dextra/blob/master/LICENSE.md
[link-packagist]: https://packagist.org/packages/rougin/dextra
