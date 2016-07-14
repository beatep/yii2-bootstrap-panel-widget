Yii2 Bootstrap Panel
===================
Yii2 Bootstrap Panel with posibility to add icons and/or buttons in header

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
         'headerIcon' => 'tint', //optional
         'headerButtons' => [
		[
			'label' => '+',
			'options' => ['class' => 'btn btn-xs btn-primary'],
			'url' => '/controller/new',
		],
	], //optional
         'content' => '', // some content in body
         'type' => 'danger', // get style for panel \beatep\panel::TYPE_DEFAULT, 'default' is default
]); ?>


Or can use begin and end of the widget

<?php \beatep\panel\Panel::begin([
         'header' => true, // show header or false not showing
         'headerTitle' => 'title', // Title text can use tag
         'footer' => true, // show footer or false not showing
         'footerTitle' => 'text', // Title for footer
         'type' => 'success', // get style for panel \beatep\panel::TYPE_DEFAULT, 'default' is default
]); ?>

...
...
...

<?php \beatep\panel\Panel::end(); ?>
