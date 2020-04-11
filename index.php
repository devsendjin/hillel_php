<?php

require_once 'vendor/autoload.php';

use App\Model\{Model, User, Post};

Model::dbConnect();

/*
//FIND USER - static
$foundUser = User::find(3);
var_dump($foundUser);
*/


/*
//CREATE USER
$user = new User(3, 'Third name', 'third.mail@gmail.com');
$user->create();
var_dump($user);
*/


/*
//CREATE POST
$post = new Post(2, 'Second post', 'Second post content');
$post->create();
var_dump($post);
*/


/*
//READ USER
$foundUser = User::find(3);
$foundUserData = $foundUser->read();
foreach ($foundUserData as $fieldName => $value) {
    echo "$fieldName - $value <br>";
}
*/


/*
//UPDATE USER
$foundUser = User::find(3);
$foundUser->setName('some test name 3');
$foundUser->setEmail('some test email 3');
$foundUser->update();
var_dump(User::find(3));
*/


/*
//DELETE USER
$foundUser = User::find(3);
$foundUser->delete();
var_dump(User::find(3));
*/
