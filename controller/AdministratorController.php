<?php
class AdministratorController
{
    //    users params (data)
	public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $password = '';
    public $re_password = '';
    public $role_id = '';
    public $registrate = '';
    public $error = [];
    public $id_class = '';
    public $id_parent = '';
    public $id_grade = '';

    //    students params (data)
//    public $sfirst_name = '';
//    public $slast_name = '';
//    public $id_class = '';
//    public $id_parent = '';
//    public $id_grade = '';


	public function administratorpage()
	{
		View::load('administrator', 'administratorpage');
	}
	/*
	 * Method for logout user! just unset session[rola];
     */
    public function logout()
    {
        unset($_SESSION['rola']);
        header('Location:http://dnevnik/login/login');
    }
    /*
	 * Method for creating new user!;
     */
    public function newuserform()
    {
    	View::load('administrator', 'newuserform');
    }
    /*
	 * Method for creating new student!;
     */
    public function newstudentform()
    {
    	View::load('administrator', 'newstudentform');
    }
    /*
	 * Method for creating new student!;
     */
    public function scheduleform()
    {
    	View::load('administrator', 'scheduleform');
    }
    /*
     * Method for validating  data from USER registration form and sending to administrator Model!
     */
    public function registration()
    {
        if (isset($_POST)) {
            $this->first_name = $_POST['first_name'];
            $this->last_name = $_POST['last_name'];
            $this->email = $_POST['email'];
            $this->password = $_POST['password'];
            $this->re_password = $_POST['re_password'];
            $this->role_id = $_POST['role_id'];

            //Remove any excess whitespace
            $this->first_name = trim($this->first_name);
            $this->last_name = trim($this->last_name);
            $this->email = trim($this->email);
            $this->password = trim($this->password);
            $this->re_password = trim($this->re_password);
            $this->role_id = trim($this->role_id);

            //Check that the input values are of the proper format
            if (!preg_match('/^[a-zA-Z]+$/', $this->first_name)) {
                $this->error['first_name'] = 'Uneti ponovo ime!';
            }
            if (!preg_match('/^[a-zA-Z]+$/', $this->last_name)) {
                $this->error['last_name'] = 'Uneti ponovo prezime!';
            }
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->error['email'] = 'Email adresa nije validna!';
            }
            if (!preg_match('/^[1-9][0-9]*$/', $this->role_id) && filter_var($this->role_id, FILTER_VALIDATE_INT)) {
                $this->error['role_id'] = 'Uneti ponovo prezime!';
            }
            if (empty($this->first_name)) {
               $this->error['first_name'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->last_name)) {
                $this->error['last_name'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->email)) {
                $this->error['email'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->role_id)) {
                $this->error['role_id'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->password)) {
                $this->error['password'] = 'Polje ne sme biti prazno!';
            }
            if ($this->re_password != $this->password || empty($this->re_password)) {
                $this->error['password'] = 'Sifre se ne poklapaju!';
            }
            // //if have errors adds ?, if there only one err add =error + msg, if have more errs adding & after each err msg.
            if (!empty($this->error)) {
                $errors = '?';
                $lastKey = $this->_array_key_last($this->error);
                foreach ($this->error as $error => $msg) {
                    if ($error == $lastKey) {
                        $errors .= $error . '=' . $msg;
                    } else {
                        $errors .= $error . '=' . $msg . '&';
                    }
                }
                header('Location: '. $_SERVER['HTTP_REFERER'] .'?error=' . $msg);
            } else {
                // creates a new password hash, Use the md5 algorithm
                $enc_pass = md5($this->password);
                global $conn;
                $user = new Administrator($conn);
                // checking if email exists in db.
                if ($user->checkIfAvailable($this->email)) {
                    $is_created = $user->register($this->first_name,$this->last_name,$this->email, $enc_pass, $this->role_id);
                    if($is_created){
                        $msg = 'Uspesno ste se registrovali!';
                        header('Location: '. $_SERVER['HTTP_REFERER'] .'?success=' . $msg);
                    } else{
                        $msg = 'Pokusajte ponovo, nesto je pogresno!';
                        header('Location: '. $_SERVER['HTTP_REFERER'] .'?error=' . $msg);
                     }
                } else{
                    $msg = 'Email adresa vec postoji, pokusajte sa drugom';
                    header('Location: '. $_SERVER['HTTP_REFERER'] .'?error=' . $msg);
                }
            }
        }
    }
    /*
    *   Function for finding last key in an array.
    */ 
    private function _array_key_last(array $array){
        return (!empty($array)) ? array_keys($array)[count($array)-1] : null;
    }
    /*
     * Method for validating  data from USER registration form and sending to administrator Model!
     */
    public function userRegistration()
    {
        var_dump($_POST);
        if (isset($_POST)) {
            $this->first_name = $_POST['first_name'];
            $this->last_name = $_POST['last_name'];
            $this->id_class = $_POST['id_class'];
            $this->id_parent = $_POST['id_parent'];
            $this->id_grade = $_POST['id_grade'];

            //Remove any excess whitespace
            $this->first_name = trim($this->first_name);
            $this->last_name = trim($this->last_name);
            $this->id_class = trim($this->id_class);
            $this->id_parent = trim($this->id_parent);
            $this->id_grade = trim($this->id_grade);

            //Check that the input values are of the proper format
            if (!preg_match('/^[a-zA-Z]+$/', $this->first_name)) {
                $this->error['first_name'] = 'Uneti ponovo ime!';
                var_dump($this->id_parent);
            }
            if (!preg_match('/^[a-zA-Z]+$/', $this->last_name)) {
                $this->error['last_name'] = 'Uneti ponovo prezime!';
            }
            if (!preg_match('/^[1-9][0-9]*$/', $this->id_class) && filter_var($this->id_class, FILTER_VALIDATE_INT)) {
                $this->error['id_class'] = 'Uneti ponovo prezime!';
            }
            if (!preg_match('/^[1-9][0-9]*$/', $this->id_parent) && filter_var($this->id_parent, FILTER_VALIDATE_INT)) {
                $this->error['id_parent'] = 'Uneti ponovo prezime!';
            }
            if (!preg_match('/^[1-9][0-9]*$/', $this->id_grade) && filter_var($this->id_grade, FILTER_VALIDATE_INT)) {
                $this->error['id_grade'] = 'Uneti ponovo prezime!';
            }
            if (empty($this->first_name)) {
                $this->error['first_name'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->last_name)) {
                $this->error['last_name'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->id_class)) {
                $this->error['id_class'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->id_parent)) {
                $this->error['id_parent'] = 'Polje ne sme biti prazno!';
            }
            if (empty($this->id_grade)) {
                $this->error['id_grade'] = 'Polje ne sme biti prazno!';
            }
            // //if have errors adds ?, if there only one err add =error + msg, if have more errs adding & after each err msg.
            if (!empty($this->error)) {
                $errors = '?';
                $lastKey = $this->_array_key_last($this->error);
                foreach ($this->error as $error => $msg) {
                    if ($error == $lastKey) {
                        $errors .= $error . '=' . $msg;
                    } else {
                        $errors .= $error . '=' . $msg . '&';
                    }
                }
                header('Location: '. $_SERVER['HTTP_REFERER'] .'?error=' . $msg);
            } else {
                // creates a new password hash, Use the md5 algorithm
//                $enc_pass = md5($this->password);
                global $conn;
                $student = new Administrator($conn);
                // checking if email exists in db.
//                if ($student->userRegister($this->email)) {
                $class_id = intval($this->id_class);
                $grade_id = intval($this->id_grade);
                $parent_id= intval($this->id_parent);
                $is_created = $student->userRegister($this->first_name,$this->last_name,$class_id ,$parent_id, $grade_id);
                    if($is_created){
                        $msg = 'Uspesno ste registrovali studenta!';
                        header('Location: '. $_SERVER['HTTP_REFERER'] .'?success=' . $msg);
                    } else{
                        $msg = 'Pokusajte ponovo, nesto je pogresno!';
                        header('Location: '. $_SERVER['HTTP_REFERER'] .'?error=' . $msg);
                    }
//                }else{
//                    $msg = 'Email adresa vec postoji, pokusajte sa drugom';
//                    header('Location: '. $_SERVER['HTTP_REFERER'] .'?error=' . $msg);
////                }
            var_dump($POST);
            }
        }
    }
}