Yii2 Bootstrap Panel
===================
Yii2 Bootstrap Panel

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist beatep/yii2-bootstrap-panel-widget "dev-master"
```

or add

```
"beatep/yii2-bootstrap-panel-widget": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :


```php
<?php \beatep\panel\Panel::widget([
         'header' => true, // show header or false not showing
         'headerTitle' => 'title', // Title text can use tag
         'content' => '', // some content in body
         'footer' => false, // show footer or false not showing
         'footerTitle' => 'text', // Title for footer
         'type' => 'danger', // get style for panel \beatep\panel::TYPE_DEFAULT, 'default' is default
]); ?>


Or can use begin and end of the widget

<?php \beatep\panel\Panel::begin([
         'header' => true, // show header or false not showing
         'headerTitle' => 'title', // Title text can use tag
         'footer' => false, // show footer or false not showing
         'footerTitle' => 'text', // Title for footer
         'type' => 'danger', // get style for panel \beatep\panel::TYPE_DEFAULT, 'default' is default
]); ?>

...
...
...

<?php \beatep\panel\Panel::end(); ?>
