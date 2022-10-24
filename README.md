# Symphony is a collection of tools for speeding-up website building processes

<b>What's this?</b><br>
<i>One of my old project to automate workflow of building Websites</i><br>

<b>Quick Start</b>
1. Clone the repo
2. Start creating pages in pages folder

<b>Page creation rules:</b>

## Configurations
Location: <code>source/yaml/configurations.yaml</code>
<b>You can modify followings:</b>
1. Paths
2. Database credentials (MySQL)
3. Detailed URL Structure
4. HTML defaults

The data above can be accessed using <code>Configurations</code> class
Location: <code>source/php/configurations.php</code>
```php
<?php
include_once 'configurations.php';
// Opens configurations.yaml file and makes variables ready to use
Configurations::init();

// Returns title defined in configurations.yaml under HTML
Configurations::HTML()["title"];

?>
```
<b><code>Config</code> and <code>Conf</code> are alias to <code>Configurations</code></b>
There are 4 getter. All of them return key value arrays
1. Paths: <code>Configurations::path();</code>
2. Database: <code>Configurations::database();</code>
3. URL: <code>Configurations::URL();</code>
4. HTML: <code>Configurations::HTML();</code>
