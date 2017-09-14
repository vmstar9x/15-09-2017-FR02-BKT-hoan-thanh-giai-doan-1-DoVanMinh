<?php

class UserController extends BaseController
{
    /**
     * Model Name
     */
    protected $model = 'User';
    protected $id = 'user_id';
    protected $checkField = array('user_id', 'username', 'status', 'privilege', 'user_time_created', 'user_time_updated');

    /**
     * Index, show list all user
     */
    public function index()
    {


        //$status = ($list['status'] == ACTIVE_VALUE) ? "<span class='text-success'>Activated</span>" : "<span class='text-error'>Deactive</span>";

        $this->indexPage('list-user', 'List User');
    }

    /**
     * Function Active
     */
    public function active()
    {
        $this->activeItem();
        redirect(BASE_URL . LIST_USER);
    }

    /**
     * Search and sort data
     */
    public function show()
    {
        $this->showData('list-user', 'User');
    }

    /**
     * Add user
     */
    public function add()
    {
        $data = array(
            'user' => array(),
            'message' => array(),             //Message
            'title' => 'Add',                 //Title page
            'btnName' => 'btn-add-user',      //Button name
        );

        $itemPost = array('username', 'pass', 'email', 'status');                    //List item has posted
        $dataInput = array();
        $this->updateUser('add', $data, 'btn-add-user', $itemPost, $dataInput);     //add user
        $this->loadView('updateUser', 'Add User', $data);                           //load view add page
    }

    /**
     * Edit user
     */
    public function edit()
    {
        $urlArray = urlAnalyze();
        $user_id = checkExits($urlArray, 3);

        $data = array(
            'user' => User::getUser($user_id),          //get user was edit
            'message' => array(),                       //message
            'title' => 'Edit',                          //title page
            'btnName' => 'btn-edit-user',               //button name
        );

        $checkUrl = User::checkIdUser($user_id);        //Check id user
        if ($checkUrl == 0) {
            directScript('Error, user id not exist.', '' . BASE_URL . LIST_USER);
        } else {
			
            $itemPost = array('username', 'pass', 'email', 'status');                                //List item has posted
            $dataInput = array();
            $this->updateUser('edit', $data, 'btn-edit-user', $itemPost, $dataInput, $user_id);     //edit user
        }

        $this->loadView('updateUser', 'Edit User', $data);          //load view edit page
    }

    /**
     * Check validate data input from form
     * return true or false
     */
    private function validateForm(&$dataValidate = array(), $itemPost = array(), &$data = array())
    {
        $dataValidate = array(
            'username' => array(
                'label' => 'username',
                'input' => trimInput(getValue($itemPost[0])),          //function -> trimInput()
                'rule' => array('required'),
                'message' => &$data['message']['name']
            ),

            'pass' => array(
                'label' => 'password',
                'input' => trimInput(getValue($itemPost[1])),
                'rule' => array('required'),
                'message' => &$data['message']['pass']
            ),

            'email' => array(
                'label' => 'email',
                'input' => trimInput(getValue($itemPost[2])),
                'rule' => array('required', 'valid_email'),
                'message' => &$data['message']['email']
            )
        );
        $validate = $this->validateData($dataValidate);                 //BaseController -> validateData()
        return $validate;
    }

    /**
     * Format data input from form
     * return data formatted
     */
    private function dataInputFormat($itemPost = array(), &$dataInput = array(), &$fileName, $data, $password = '')
    {
        $dataInput['username'] = trimInput(getValue($itemPost[0]));

        // Kiem tra xem password truyen len co rong hay khong (rong la do password khong co thay doi voi database)
		if (empty($password)){
			$dataInput['pass'] = md5(getValue($itemPost[1]));
		}


        $dataInput['user_email'] = trimInput(getValue($itemPost[2]));

        $dataInput['status'] = getValue($itemPost[3]);

        $dataInput['privilege'] = $dataInput['status'];

        $dataInput['user_time_updated'] = date('Y-m-d h:i:s');


        if (!empty($fileName['name'])) {
            $fileName['name'] = time() . $fileName['name'];
            $dataInput['user_img'] = $fileName['name'];
        }

        return $dataInput;
    }

    /**
     * get data when user input form
     * return data
     */
    private function getDataReturn($action, &$data = array(), $itemPost = array())
    {
        $data['user']['username'] = trimInput(getValue($itemPost[0]));
        $data['user']['pass'] = (getValue($itemPost[1]));
        $data['user']['user_email'] = trimInput(getValue($itemPost[2]));
        $data['user']['status'] = getValue($itemPost[3]);

        return $data;
    }

    /**
     * Function commmon to update user contain add and edit user
     */
    private function updateUser($action, &$data = array(), $button, $itemPost = array(), &$dataInput, &$user_id = null)
    {
        if (isset($_POST[$button])) {
			//$_POST['pass'];
            $fileName = $_FILES['fileToUpload'];
			
            $validate = $this->validateForm($dataValidate, $itemPost, $data);


            // kiem tra xem neu mat khau moi gui len giong voi database thi khong save
			if ($_POST['pass'] == User::getUser($user_id)['pass']){
				$this->dataInputFormat($itemPost, $dataInput, $fileName, $data, 'save');
			}else{
				$this->dataInputFormat($itemPost, $dataInput, $fileName, $data, '');
			}
            

            $oldImg = User::getUser($user_id)['user_img'];

            $uploadImg = $this->uploadImg($fileName, $data['message']['img']);
			
            if ($validate && $uploadImg) {
                if ($user_id == null) {                                              //Add User
                    $dataInput['user_time_created'] = date('Y-m-d h:i:s');
                    $dataInput['privilege'] = 1;
                } else {                                                            //Edit user

                    if ($fileName['name'] == '') {
                        $dataInput['user_img'] = $oldImg;
                    } else {
                        deleteFile($oldImg);
                    }

                    if (!empty($_POST['checkdel'])) {           //Check tick checkbox
                        deleteFile($oldImg);
                        $dataInput['user_img'] = $fileName['name'];
                    }
                }

                $result = User::updateUserProcess($dataInput, $user_id);

                if ($result) {
                    if (($user_id) == (User::getIdAdmin())) {
                        session_unset();
                        $_SESSION['username'] = getValue('username');
                        $_SESSION['log'] = true;
                    }
                    directScript('Successfull!', '' . BASE_URL . LIST_USER);
                } else {
                    $data['message']['name'] = 'Username is exist.';
                }
            }

            $this->getDataReturn($action, $data, $itemPost);
            return $data;
        }
    }
}