<?php
require 'vendor/autoload.php';

use App\User as User;
use App\Comment as Comment;


//user validation check
$bedUser = new User(-5, 'dawd','125458888','ff@fef');
$bedUse1 = new User(5, 'd','12545','Ffffgamil.com');
$bedUse1 = new User(5, 'Goolllllllllllllllllllllllllllllllllllll', '125ff88n', 'Ffff@gamil.com');
echo '<br>';

//Creating users
$admin = new User(1, 'Gool', '125ff88n', 'Ffff@gmail.com');
$newUser1 = new User(2, 'Pool', "123qwer123", 'ff@fef.com');
$newUser2 = new User(3, 'Fool', "qwer123qwer", 'ivan@mail.ru');

//output of user creation time (with milliseconds)
echo $admin->getDateTimeCreated()->format('d M Y H:i:s u')."<br>";
echo $newUser2->getDateTimeCreated()->format('d M Y H:i:s u')."<br>";
echo '<br>';

//Creating comments
$comment1 = new Comment($admin, "Hello World I admin");
$comment2 = new Comment($newUser1, "Hello World I {$newUser1->name}");
$comment3 = new Comment($admin, "Hello World Its again me ADMIN");
$comment4 = new Comment($newUser2, "Oh My name {$newUser2->name}");

//creating datetime 
$datetime = new DateTime("now");

//Creating a user and comment whose creation time is after datetime
$newUser3= new User(4, 'Newuser', '123456tttt', 'new@user.mom');
$comment5 = new Comment($newUser3, "YES Im NEW user {$newUser3->name}, created afted datetime");

//creating an array of comments
$arrayComments = [
    $comment1,
    $comment2,
    $comment3,
    $comment4,
    $comment5,
];

//Go through all comments and output only those comments whose users were created after $datetime
foreach ($arrayComments as $comment){
    if ($comment->user->dateCreate > $datetime){
        echo $comment->userComment."<br>";
    }
}

?>