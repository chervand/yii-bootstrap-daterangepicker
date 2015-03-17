Date Range Picker for Bootstrap
========================

`BootstrapDateRangePicker` is a Yii PHP framework wrapper for [Date Range Picker for Bootstrap](https://github.com/dangrossman/bootstrap-daterangepicker).

Usage
-----

```php
$this->widget('vendor.chervand.yii-bootstrap-daterangepicker.BootstrapDateRangePicker', [
	'model' => $model,
	'attribute' => 'date_range',
	'options' => [...],
]);
```

```php
$this->widget('vendor.chervand.yii-bootstrap-daterangepicker.BootstrapDateRangePicker', [
	'name' => 'daterangepicker',
	'options' => [...],
]);
```

```php
$this->widget('vendor.chervand.yii-bootstrap-daterangepicker.BootstrapDateRangePicker', [
	'selector' => '#daterangepicker',
    'theme' => 'bs2',
	'options' => [...],
]);
```

```php
$this->widget('vendor.chervand.yii-bootstrap-daterangepicker.BootstrapDateRangePicker', [
    'name' => 'daterangepicker',
    'htmlOptions' => ['class' => 'form-control'],
    'value'=> date('d.m.Y') . ' - ' . date('d.m.Y'),
    'options' => [
        'format' => 'DD.MM.YYYY',
        'startDate' => 'js:moment()',
        'endDate' => 'js:moment()',
        'dateLimit' => ['days' => 31],
        'opens' => 'left',
        'applyClass' => 'btn-primary',
        'cancelClass' => 'btn-default',
        'ranges' => [
            'Today' => ['js:moment()', 'js:moment()'],
            'Yesterday' => ['js:moment().subtract(1, "days")', 'js:moment() . subtract(1, "days")'],
            'Last 7 Days' => ['js:moment() . subtract(6, "days")', 'js:moment()'],
            'Last 30 Days' => ['js:moment() . subtract(29, "days")', 'js:moment()'],
            'This Month' => ['js:moment().startOf("month")', 'js:moment().endOf("month")'],
            'Last Month' => ['js:moment().subtract(1, "month").startOf("month")', 'js:moment().subtract(1, "month").endOf("month")']
        ]
    ],
    'callback' => 'js:function(start,end,label){console.log(start.toISOString(),end.toISOString(),label);}'
]),
```
