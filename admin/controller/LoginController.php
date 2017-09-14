<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginController extends BaseController
{

    /**
     * Model name
     */
    protected $model = "user";

    /*
     * Constructor function
     */
    public function __construct()
    {
        parent::__construct();

        //Check cookie
        if (isset($_COOKIE)) {
            if (!empty($_COOKIE['username'])) {
                $_SESSION['log'] = true;
                $_SESSION['username'] = $_COOKIE['username'];
            }
        }

        //Check session
        if ( isset($_SESSION['log'])) {
            global $url;
            $url = rtrim($url, "/");
            $urlArray = explode("/", $url);
            if (isset($urlArray[2]) && $urlArray[2] == 'logout'){
                redirect(BASE_URL . LIST_USER);
            }
        }
    }

    /*
     * Override function BaseController to avoid header loop error
     */
    public function checkLogin()
    {
    }

    /*
     * Login
     */
    public function index()
    {

        $data = array(
            'title' => 'Login',                                 //Title page
            'account' => array('username' => '', 'pass' => ''),                 //store value when user input
            'message' => array('name' => '', 'pass' => '', 'account' => '')     //Message
        );

        if (isset($_POST['btn-login'])) {                   //press button login

            //Validate data input
            $dataValidate = array(
                'username' => array(
                    'label' => 'username',
                    'input' => trimInput(getValue('username')),
                    'rule' => array('required'),
                    'message' => &$data['message']['name']
                ),

                'pass' => array(
                    'label' => 'password',
                    'input' => trimInput(getValue('pass')),
                    'rule' => array('required'),
                    'message' => &$data['message']['pass']
                )
            );

            $validateInput = $this->validateData($dataValidate);            //return true if valid or false id invalid

            if ($validateInput) {

                $username = getValue('username');
                $password = getValue('pass');

                $result = User::loginProcess($username, $password);                //Login handle

                if ($result) {
                    $_SESSION['username'] = $username;
                    $_SESSION['user_img'] = $result['user_img'];
                    $_SESSION['log'] = true;

                    if (isset($_POST['remember'])) {                                //If click remember checkbox
                        setcookie('username', $username, time() + TIME_COOKIE);     //set cookie
                    } else {
                        setcookie('username', $username, time() - TIME_COOKIE);     //unset cookie
                    }
                    redirect(BASE_URL . LIST_USER);     //redirect to list user
                } else {
                    $data['message']['account'] = 'Account is not exist.';
                }
            }
            $data['account']['username'] = getValue('username');

        }
        $this->view->load(($this->model), 'login', $data);
        $this->view->show();
    }

    /*
     * Logout
     */
    public function logout()
    {
        setcookie('username');
        session_destroy();
        redirect(BASE_URL . LOGIN);
    }

}
