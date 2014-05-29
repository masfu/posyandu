<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\core;

/**
 * Description of AuthUser
 *
 * @author masfu
 */
use \App;
use app\models\Ibu;
use app\models\Bidan;
use app\models\Admin;
use system\auth\BaseAuth;
use system\core\HttpException;

class Auth extends BaseAuth {

    
    /**
     * 
     * @param type $username
     * @param type $password
     * @param type $is_remember
     * @param type $role
     * @return boolean
     * @throws HttpException
     */
    public function authenticate($username, $password, $is_remember, $role) {
        
        switch ($role) {
            case 'Ibu':
                $model = new Ibu();
                break;
            case 'Bidan':
                $model = new Bidan();
                break;
            case 'Admin':
                $model = new Admin();
                break;
            default:
                throw new HttpException('Access is forbidden', 403);
                break;
        }

        $result = $model->find()->where("username = ? ", array($username))->One();
        if (count($result) == 0) {
            App::instance()->session->setFlashData('error', self::USERNAME_ERROR);
            return false;
        } elseif ($result['password'] != crypt($password, $result['salt'])) {
            App::instance()->session->setFlashData('error', self::PASSWORD_ERROR);
            return false;
        } else {
            $this->setUser($username);
            $this->setRole($role);
            if ($is_remember == 'checked') {
                $this->setRemember('remember', $data);
            }
            return true;
        }
    }

}
