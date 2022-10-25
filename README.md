# Symphony is a collection of tools for speeding-up website building processes

**What's this?**
*One of my old project to automate workflow of building Websites*

## Quick Start
1. Clone the repo
2. On terminal: ```cd``` to ```Symphony_PHP/source```
3. On terminal: ```php -S localhost:8080 -c php.ini``` (**php.ini** for enabling **yaml** extension)
3. Start creating pages in pages folder

## Configurations
File location: ```Symphony_PHP/source/yaml/configurations.yaml```
**You can modify followings:**
1. Paths
2. Database credentials (MySQL)
3. Detailed URL Structure
4. HTML defaults

The data above can be accessed using <code>Configurations</code> class.
Included in: ```Symphony_PHP/source/php/core.php```
```php
<?php
// Returns title defined in configurations.yaml under HTML
Configurations::HTML()["title"];
?>
```
**```Config``` and ```Conf``` are alias to ```Configurations```**
There are 4 getter. All of them return key value arrays:
1. Paths: <code>Configurations::path();</code>
2. Database: <code>Configurations::database();</code>
3. URL: <code>Configurations::URL();</code>
4. HTML: <code>Configurations::HTML();</code>

# Database
*Class for working with databases*
File location: ```Symphony_PHP/source/php/database.php```
**Methods**
1. ```Database::execute(arg1, arg2);```
  - **arg1** is query to execute
  - **arg2** *(optional)* is array of placeholders for prepared statement
  - On success returns **true**, On error returns **false**
2. ```Database::fetchAll();```
  - Fetches all data
  - Return type array
3. ```Database::fetchOne();```
  - Fetches one data
  - Return type array
4. ```Database::rowCount();``` - Returns row count

```php
<?php
Database::execute("SELECT * FROM table WHERE id=?", [1]); // Returns true or false depending result
Database::fetchAll(); // Returns data for query executed above
Database::rowCount(); // Row count for query executed above
?>
