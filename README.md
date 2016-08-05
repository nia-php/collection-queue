# nia - Collection Queue

Generic queue component.

## Installation

Require this package with Composer.

```bash
    composer require nia/collection-queue
```

## Tests
To run the unit test use the following command:

```bash
    $ cd /path/to/nia/component/
    $ phpunit --bootstrap=vendor/autoload.php tests/
```

## How to use
The following sample shows you how to use the `Nia\Collection\Queue\FifoQueue` class of the queue component.

```php
    $queue = new FifoQueue([
        3,
        4,
        5
    ]);

    $queue->enqueue(6);

    while ($element = $queue->dequeue()) {
        echo $element . "\ņ";
    }

    // Outputs:
    //  3
    //  4
    //  5
    //  6
```
