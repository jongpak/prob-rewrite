# Prob/Rewrite
*A library for path of url using mod_rewrite*

## Usage

### basic
```php
<?php

use Prob\Rewrite\Url;

$url = new Url();
$url->setSite('http://somesite.com');
$url->setDispatcher('index.php');
$url->setPath('/post/56');

echo $url->parse();         // http://somesite.com/post/56
echo $url->parse(false);    // http://somesite.com/index.php/post/56
```