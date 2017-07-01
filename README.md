# PDO-Database-Class-Connection

A  PHP MySQL PDO class

<h2>Initialize</h2>

```php 
// Require Files;
require_once 'Config.php';
require_once 'PDO_Interface.php';
require_once 'PDO.Class.php';

// Create PDO_Connect Class

$db = new PDO_Connect();

```

<h2>How To Use</h2>
We will now demo the right ways to properly use this class and you can use this example 
<ul>
<li><h4>create a database with any name you want </h4><p>Then inject this SQL</p>
<code>
CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(255) NOT NULL,
 `member` tinyint(4) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
</code>
</li>
</ul>
<h2>simple query</h2>

```php
<?php
	$query = $db->query('id', 'users')->execute();
?>
```

<h2>Use Insert , lastInsertId Medols</h2>

```php
<?php
$db->insert('users', "`username` , `member`", ":username , :member")
            ->bind([
                'username'=>'Malek Academy',
                'member'=>1
                ])
            ->execute();

if($db->lastInsertId())    
    echo 'insert successfuly';
else
    echo 'insert failed';
?>

```
<h2>Use Update Medol</h2>

```php
<?php
$db->update('users', "`username` = :username , `member` = :member", 'id', '1')
        ->bind(
                [
                    'username'  => 'Mohammd',
                    'member'    => 0
                ]
            );

if($db->execute())
    echo 'update successfuly';
else
    echo 'update failed';
?>
```
<h2>Use Delete Medol</h2>

```php
<?php
$db->delete('users', 'id', ":id")->bind(['id' => 1]);

if($db->execute())
    echo 'delete successfuly';
else
    echo 'delete failed';
 ?>
 ```
 

<h2>Get Rows Count</h2>
get rows count with out binding

```php
<?php
$rows_count = $db->query('id', 'users')->execute()->rowCount();

echo $rows_count;
?>
```
get rows count with binding Safety

```php
<?php
$row_count = $db->query('id', 'users' , "WHERE `username` = :username")
                ->bind(
                      [
                        'username'=>$_GET['user']
                      ])
                ->execute()->rowCount();

echo $row_count;
?>
```
<h2>Use A single Fetch</h2>

```php
<?php
$query = $db->query('*', 'users' , "WHERE `username` = :username")
                ->bind(
                      [
                        'username'=>$_GET['user']
                      ])
                ->execute()->fetch();

echo '<pre>';
print_r($query);
echo '</pre>';

?>
```

<h2>Use Fetch All</h2>

```php
<?php
$query = $db->query('*', 'users' , "WHERE `member` = :member")
                ->bind(
                      [
                        'member'=>1
                      ])
                ->execute()->fetchAll();

echo '<pre>';
print_r($query);
echo '</pre>';

?>

```
 
<h2>Close Database Connection</h2>

```php

<?php
$db->close();
?>

```
