# Symphony
**What's this?**
### Symphony is a collection of tools for speeding-up website building processes using PHP

## Quick Start
1. Clone the repo
2. On terminal: ```cd``` to ```Symphony/source```
3. On terminal: ```php -S localhost:8080 -c php.ini``` (**php.ini** for enabling **yaml** extension)
4. Start creating pages in ```Symphony/source/pages``` folder

## Creating A Simple Page
1. All of the Classes under namespace called: **Symphony**
2. Reserved function name: **onGET**
  - Function `onGET(): string` will be called when request method is **GET**
3. Reserved function name: **onPOST**
  - Function `onPOST(): string` will be called when request method is **POST**

```php
<?php
// Symphony/source/pages/home.php

// Setting title
Symphony\HTML::setTitle("Home");

// Adding JavaScript
Symphony\HTML::addJavaScript("main");

function onGET(){

  return "GET";
}

function onPOST(){

  return "POST";
}

?>
```

## Core Class
*File location*: ```Symphony/source/php/core.php```\
**Methods / APIs:**
- DevMode
  - By default disabled
  - Enabling: `Core::enableDevMode(): void`
  - **Note!** *Call this method before starting the `Core` and in `index.php` to avoid unknown bugs*


*File location*: ```Symphony/source/index.php```
```php
<?php
require_once 'php/core.php';

// Enabling Dev Mode
// To Enable DevMode Uncomment The Line Below
// Symphony\Core::enableDevMode();

// Starting Symphony
Symphony\Core::start();

?>
```

## Configurations Class
*File location*: ```Symphony/source/yaml/configurations.yaml```\
You can modify followings:
1. Paths
  - css
  - js
  - pages
2. Database credentials (MySQL)
  - name
  - user
  - password
  - host
  - port
  - charset
  - collate
3. Detailed URL Structure
  - prefix
  - sub_domain
  - domain_name
  - domain_extension
  - port
4. HTML defaults
  - lang
  - charset
  - title

The data above can be accessed using <code>Configurations</code> class.
Included in: ```Symphony/source/php/core.php```
```php
<?php
// Returns title defined in configurations.yaml under HTML
Configurations::HTML()["title"];
?>
```
**`Config` and `Conf` are alias to `Configurations`**\
There are 4 getters. All of them return key value paired arrays:
1. Paths: `Configurations::path(): array`
2. Database: `Configurations::database(): array`
3. URL: `Configurations::URL(): array`
4. HTML: `Configurations::HTML(): array`
4. Raw: `Configurations::raw(): array`

## Database Class
*Class for working with databases*
File location: ```Symphony/source/php/database.php```
**Methods / APIs:**
1. ```Database::execute(arg1, arg2): bool```
  - **arg1** is query to execute
  - **arg2** *(optional)* is array of placeholders for prepared statement
  - On success returns **true**, On error returns **false**
2. ```Database::fetchAll(): array```
  - Fetches all data
  - Returns key value paired array
3. ```Database::fetchOne(): array```
  - Fetches one data
  - Returns key value paired array
4. ```Database::rowCount(): int```
  - Returns row count
5. ```Database::lastID(): int```
  - Returns Last Inserted Id

```php
<?php
Database::execute("SELECT * FROM table WHERE id=?", [1]); // Returns true or false depending result
Database::fetchAll(); // Returns data for query executed above
Database::rowCount(); // Row count for query executed above
?>
```
## HTML Class
*Class for working with html structure of the page*\
File location: ```Symphony/source/php/HTML.php```\
**Methods / APIs:**
1. `HTML::setTitle(string:): void`
  - Sets title of the current page
  - Accepts one argument (string)
2. `HTML::addJavaScript(string:): void`
  - Adds JavaScript to `html > head`
  - You need to pass only name of the script to be added
  - **Note!** without extension `(.js)`
  - **Note!** without path
  - JavaScript path will be brought using `Conf::path()["js"]`
