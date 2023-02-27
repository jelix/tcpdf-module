This is a module for Jelix, providing a Response object and a class, to generate PDF
and sent it to a browser.

This module is for Jelix 1.6.x and higher and was move into its own repository
since Jelix 1.7. See the jelix/jelix repository to see its history.


Installation for Jelix 1.7+
============================

Install it by hands like any other Jelix modules, or use Composer if your
Jelix application is using Composer.

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


Installation for Jelix 1.6
==========================

Install it by hands like any other Jelix modules, or use Composer if your
Jelix application is using Composer.

In your project, you should create a composer.json file, and it should contain
at least:

```
{
  "require": {
    "jelix/composer-module-setup": "^1.1.0",
    "jelix/tcpdf-module": "^1.7.4"
  },
  "config": {
    "allow-plugins": {
      "jelix/composer-module-setup": true
    }
  },
  "extra": {
    "jelix": {
      "app-dir" : "./",
      "var-config-dir" : "var/config/",
      "config-file-16" : "mainconfig.ini.php"
    }
  }
}
```

- `app-dir` must indicate the path to the directory containing `project.xml`
- `var-config-dir` must indicate the path of the `var/config` directory of your application
- `config-file-16` must indicate the name of the configuration file to modify (`mainconfig.ini.php` or `localconfig.ini.php`)

Then launch `composer install`.

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

