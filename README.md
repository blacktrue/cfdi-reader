
# CFDI-READER  

Lee cualquier atributo de un CFDI V3.2

## Instalacion por composer

```
composer require blacktrue/cfdi-reader
```

## Ejemplo de uso

```php
require "vendor/autoload.php";

use Blacktrue\Reader\Cfdi;

$cfdi = new Cfdi;
$cfdi->setXml(file_get_contents('F13132.xml'));

echo $cfdi->UUID;
echo $cfdi->subTotal;
echo $cfdi->total;
echo $cfdi->getTotalImpuestosTrasladados();
```