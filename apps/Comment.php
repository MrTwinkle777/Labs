<?php

namespace App;

class Comment
{
    public User $user;
    public string $userComment;

    function __construct($user, $comment)
    {
        $this->user = $user;
        $this->userComment = $comment;
    }

    function getInfo()
    {
        echo "$this->userComment"."<br>";
    }
}
?>