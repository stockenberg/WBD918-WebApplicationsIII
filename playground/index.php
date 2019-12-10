<?php


require('./class.php');

function userFactory(User $param): User
{
    // todo: load user specific stuff
    return new User($param);
}


var_dump(userFactory('value'));

userFactory();
