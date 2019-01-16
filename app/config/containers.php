<?php

$container['events'] = function (){
    return new Zend\EventManager\EventManager;
};

$container['settings'] = function (){
    return [
            'db' => [
                'dsn' => 'mysql:host=us-cdbr-iron-east-01.cleardb.net;',
                'database' => 'heroku_93aa2de8e50a437',
                'username' => 'b542637a486a8f',
                'password' => '04d3d573',
                'options' => [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                ]
            ]
        ];
};

$container['db'] = function ($c){
    $dsn = $c['settings']['db']['dsn'] . 'dbname=' . $c['settings']['db']['database'];
    $username = $c['settings']['db']['username'];
    $password = $c['settings']['db']['password'];
    $options = $c['settings']['db']['options'];

    $pdo = new \PDO($dsn, $username, $password, $options);

    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    return $pdo;
};

$container['users_model'] = function ($c) {
    return new \App\Models\Users($c);
};

return $container;
