<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideUserInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements ConfideUserInterface
{
	protected $fillable = array('username', 'email', 'password');
    use ConfideUser;
    use HasRole;
}