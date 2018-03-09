<?php

// You might connect to your database here. However, don't
// hard-code your database credentials here! Instead,
// copy the file `/.env.example` to `/.env`, and
// place your credentials there. Notice, this
// file shouldn't be in your repository.

// You can access the credentials you have defined in
// `/.env` by calling the `getenv($name)` function.
// For example, use `getenv('DB_HOST')` to get the
// host of your database. Yours should be "localhost"

// Make sure to include support for DB_PORT. See the
// PHP Documentation for the MySQL PDO DSN:
// http://php.net/manual/en/ref.pdo-mysql.connection.php
$host = getenv('DB_HOST');
$port = getenv('DB_PORT)');
$database = getenv('DB_DATABASE');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 

// $dbh = new PDO($dsn, $username, $password, $options);

$dsn = "mysql: host=$host;port=$port;dbname=$database";





// $dsn = "mysql:host=localhost;dbname=my_guitar_shop";
// $username = 'root';
// $password = null;
$conn = new PDO($dsn, $username, $password, $options);
function getMany($query, array $binds = [], $conn)
{
    $statement = $conn->prepare($query);
    foreach($binds as $key => $value) {
        $statement->bindValue($key, $value);
    }
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}

function getOne($query, array $binds = [], $conn)
{
    $statement = $conn->prepare($query);
    foreach($binds as $key => $value) {
        $statement->bindValue($key, $value);
    }
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}