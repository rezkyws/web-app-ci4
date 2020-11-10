<?php

//to change directory of a controller
namespace App\Controllers\Task;

//to make base controller can be used in this directory
use App\Controllers\BaseController;
use App\Models\UserModel;


class LoginController extends BaseController
{
    /**
     * Going to login form
     * @return string
     */
    public function index()
    {
        helper(['form']);

        $data = [
            'title' => 'Login'
        ];

        return view('task/v_login_form', $data);
    }

    /**
     * Authenticate the user who trying to access the web
     * If both username and password are true then make
     * session to that user and redirect to dashboard page
     * if not then go back to the login form
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            if ($password == $pass)
                $verify_pass = true;
            else
                $verify_pass = false;

            if ($verify_pass) {
                $ses_data = [
                    'username' => $data['username'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username not Found');
            return redirect()->to('/login');
        }
    }

    /**
     * Destroy session then go to login form
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    //--------------------------------------------------------------------

}