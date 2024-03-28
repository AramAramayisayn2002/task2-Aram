<?php

class AdminController extends Controller
{
    public function index()
    {
        if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
            $login = $_COOKIE['login'];
            $password = $_COOKIE['password'];
            $result = $this->modelRender('Admin')->select()->where('login', '=', $login)->and()->where('password', '=', $password)->execute();
            if ($result->numRows() == 1) {
                $select = $result->fetchAssoc();
                $_SESSION['admin'] = $select;
            }
        } elseif (!isset($_SESSION['admin'])) {
            $this->viewRender('admin/index');
            exit;
        }

        $id = $_SESSION['admin']['id'];
        $select = $this->modelRender('Posts')->select()->where('id_admin', '=', $id)->order('id')->desc()->execute()->fetchAssocs();
        $this->viewRender('admin/dashboard', $select);
    }

    public function login()
    {
        if (isset($_POST['log_button'])) {
            unset($_SESSION['msg_admin_login']);
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                unset($_POST['log_button']);
                $login = $_POST['login'];
                $password = $_POST['password'];
                $result = $this->modelRender('Admin')->select()->where('login', '=', $login)->and()->where('password', '=', $password)->execute();
                if ($result->numRows() == 1) {
                    $select = $result->fetchAssoc();
                    $_SESSION['admin'] = $select;
                    if (isset($_POST['remember_me'])) {
                        setcookie('login', $_POST['login'], time() + (24 * 3600));
                        setcookie('password', $_POST['password'], time() + (24 * 3600));
                    }
                    redirect('admin/dashboard');
                } else {
                    $_SESSION['msg_admin_login'] = 'False login and password';
                    redirect('admin/admin');
                }
            } else {
                $_SESSION['msg_admin_login'] = 'Import all fields';
                redirect('admin/admin');
            }
            unset($_POST);
        } else {
            redirect('admin/admin');
        }
    }

    public function logout()
    {
        if (isset($_POST['logout'])) {
            if (isset($_COOKIE['login'])) {
                setcookie('login', null, time() - 24 * 3600);
            }
            if (isset($_COOKIE['password'])) {
                setcookie('password', null, time() - 24 * 3600);
            }
        }
        unset($_SESSION['admin']);
        unset($_SESSION['error_msg']);
        redirect('admin/admin');
    }
}
