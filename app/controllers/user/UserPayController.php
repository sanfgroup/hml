<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 22.10.13
 * Time: 18:08
 */

class UserPayController {
    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Inject the models.
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    function getIndex() {

        list($user,$redirect) = $this->user->checkAuthAndRedirect('user');
        if($redirect){return $redirect;}

        return View::make('site/user/pay', compact('user'));
    }

} 