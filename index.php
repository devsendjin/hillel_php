<?php

require_once 'vendor/autoload.php';

use App\Model\{Database, Model, User, Post};

$dbInstance = Database::getInstance()->getConnection();
Model::dbConnect($dbInstance);

/*
//FIND USER / POST - static
var_dump(User::find(1));

var_dump(Post::find(1));
*/


/*
//CREATE USER / POST
$user = new User(4, 'Fourth name', 'fourth.mail@gmail.com');
$user->create(['name', 'email']);
var_dump(User::find(4));

$post = new Post(3, 'Third post title', 'Third post content');
$post->create(['title', 'content']);
var_dump(Post::find(3));
*/


/*
//READ USER /POST
$foundUser = User::find(3);
$foundUserData = $foundUser->read();
foreach ($foundUserData as $fieldName => $value) {
    echo "$fieldName - $value <br>";
}

$foundPost = Post::find(3);
$foundPostData = $foundPost->read();
foreach ($foundPostData as $fieldName => $value) {
    echo "$fieldName - $value <br>";
}
*/


/*
//UPDATE USER / POST
$foundUser = User::find(4);
$foundUser->setName('Fourth name 4');
$foundUser->setEmail('some test email 4');
$foundUser->update(['name']);
var_dump(User::find(4));

$foundPost = Post::find(4);
$foundPost->setName('Fourth name 4');
$foundPost->setEmail('some test email 4');
$foundPost->update(['name']);
var_dump(Post::find(4));
*/


/*
//DELETE USER / POST
$foundUser = User::find(3);
$foundUser->delete();
var_dump(User::find(3));

$foundPost = Post::find(3);
$foundPost->delete();
var_dump(Post::find(3));
*/
