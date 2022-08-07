<?php

namespace App\Controllers;

use App\Auth;
use App\Models\Manager\ArticleManager;
use App\models\Manager\DbManager;
use App\models\Manager\UserManager;
use App\models\User;

class AdminController extends DbManager
{
private $articleManager;
private $userManager;
private $user;
private $commentManager;

    /**
     * @param $articleManager
     * @param $userManager
     * @param $user
     * @param $commentManager
     */
    public function __construct($articleManager, $userManager, $user, $commentManager)
    {
        $this->articleManager = new ArticleManager();
        $this->userManager =  new UserManager();
        $this->userAuth =  new Auth();
        $this->commentManager =  new CommentManager();
    }


}