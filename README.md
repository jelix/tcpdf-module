This is a module for Jelix, providing a Response object and a class, to generate PDF
and sent it to a browser.

This module is for Jelix 1.7.x and higher. See the jelix/jelix repository to see
its history before Jelix 1.7.


Installation
============

Install it by hands like any other Jelix modules, or use Composer if you installed
Jelix 1.7+ with Composer.

In your project:

```
composer require "jelix/tcpdf-module"
```


Launch the configurator for your application to enable the module

```bash
php yourapp/dev.php module:configure jtcpdf
```

And then launch the installer to activate the module

```bash
php yourapp/install/installer.php
```


Using the module
================

In your controller, you should retrieve the "tcpdf" response type. The response object
has a ```tcpdf``` member which is simply a ```TCPDF``` object (or precisely, an object
inheriting from ```TCPDF```). See TCPDF documentation about its use and its API.

```php

class myCtrl extends jController {

    function index() {
        $resp = $this->getResponse('tcpdf');
        $resp->outputFileName = 'article.pdf';
        $resp->doDownload = true;

        // initialize the tcpdf object
        $resp->initPdf();
        $resp->tcpdf->AddPage();
        $resp->tcpdf->SetTitle('a title');
        $resp->tcpdf->Text(10,10,'a text');
        //...
        return $resp;
    }
}
```


If you want to override some tcpdf methods, you can use your own object. 
Example:

```php
class myCtrl extends jController {

    function index() {
        $resp = $this->getResponse('tcpdf');

        $resp->outputFileName = 'article.pdf';
        $resp->doDownload = true;

        // initialize the tcpdf object
        $resp->tcpdf = new MyTcPdf();
        $resp->tcpdf->AddPage();
        $resp->tcpdf->SetTitle('a title');
        $resp->tcpdf->Text(10,10,'a text');
        ...
        return $resp;
    }
}
```

```MyTcPdf``` of course shall inherit from ```TCPDF``` or ```jTcpdf``` (see it in the
classes/ directory).

