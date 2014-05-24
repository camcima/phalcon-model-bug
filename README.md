Phalcon ORM Bug
=================

Repository to demonstrate the bug in Phalcon Model.

There are 3 tags in this repository, one for each of the following databases: sqlite, mysql and postgresql.

The bug happens in all of them, which means that it is not tied to any adapter in particular.

To run the test, just run phpunit:

```
$ phpunit
```

Bug details can be found in this issue at [Phalcon Forum](http://forum.phalconphp.com/discussion/1619/invalid-model-relation).

Hope this helps track down the issue!

