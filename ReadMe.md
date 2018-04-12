# Zend Framework 3 & Doctrine 2 - Re-usable form component examples

This module requires [this module](https://github.com/rkeet/zf-doctrine-form). This module provides examples of how to 
use that other module.

## Setting it up

Because this is an example, we're taking the most simplistic approach. I'm going to list a bunch of steps, you follow 
them, everyone ends up happy. (Ok, ignore that :p but don't for the quickest way to a working example... your choice :) )

1. Download the latest [Zend Skeleton Application](https://github.com/zendframework/ZendSkeletonApplication) - as a 
.zip & extract to your new demo project. For demo purposes, your project's name is: playground
2. Once you've extracted the .zip file in your playground project folder, run `composer install`
3. We're not messing around. When Composer asks if you want to install something, the answer is "yes" (or `y`). 
4. Want to "inject module" somewhere? Yes please! Here: `[1] module.config.php` and yes, also for "similar modules"

Seriously, just install it all. This is a demo for this module, not how to properly figure out what to get and what to 
ignore. Most of the stuff we won't use, but it won't be in the way either.

Once that installation is done, run `composer require rkeet/zf-doctrine-form-examples`. That installs this module and 
it's requirements. 

If you find you have some issues, it might be because either this module or the one it provides examples for has had 
updates. In that case, replace the above command with: 
`composer require rkeet/zf-doctrine-form:dev-master rkeet/zf-doctrine-form-examples:dev-master`. That should install 
the latest versions of both of the modules (which are hopefully compatible by the time you've found this module).

When you've installed all of this, you've got some basic Zend Framework configuration to do. I'll list the steps you 
have to take here so you can tick them off as you go along. Code examples are also below for the setup, copy them in 
and replace the all caps bits where needed. 

* Create a `local.php` file in `config/autoload/` to provide database configuration (required config below)
* Create a `development.config.php` file in `config/`, copied from the `*.dist` file in the same location
* In `modules.config.php` in `config/`, make sure the following modules are enabled loaded: 
    * `Zend\I18n`
    * `Keet\Form`
    * `Keet\Form\Examples`

---

You should now be done.

If all has gone right, you now have the ZF Skeleton Application running without errors. You will also have available to you the following URL's:
* [Coordinates](http://playground.loc/coordinates)
* [Addresses](http://playground.loc/addresses)
* [Cities](http://playground.loc/cities)

These links are provided to give you a visual representation and working implementation of the following:

* OneToOne - Nullable - Address contains Coordinates
* OneToOne - Required - City contains Coordinates
* OneToMany - Nullable - City contains Addresses

Make sure to have a look at the *FieldsetInputFilterFactory classes (in order: Coordinates, Address, City). They get
increasingly complex but clearly show how to create a nested structure. Have a look at the corresponding classes for how
to add these factory created objects in a manner Zend Framework understands.

**Remember:** the way these are created, even though the examples are specific for the usage of Doctrine, will work for 
both sets of provided Fieldsets and InputFilters in the [actual module](https://github.com/rkeet/zf-doctrine-form). The
main difference is which hydrator is used!