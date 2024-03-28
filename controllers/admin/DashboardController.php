<?php

class DashboardController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['admin'])) {
            $id = $_SESSION['admin']['id'];
            $select = $this->modelRender('Posts')
                ->select()
                ->where('id_admin', '=', $id)
                ->order('id')
                ->desc()
                ->execute()
                ->fetchAssocs();
            $this->viewRender('admin/Dashboard', $select);
        } else {
            redirect('error');
        }
    }

    public function createPost()
    {
        if (isset($_POST['createPost'])) {
            if (!empty($_POST['title']) && !empty($_POST['text'])) {
                $array = [];
                $array['id_admin'] = $_SESSION['admin']['id'];
                $array['title'] = htmlspecialchars($_POST['title']);
                $array['text'] = htmlspecialchars($_POST['text']);
                $insert = $this->modelRender('Posts')->insert($array)->execute();
                if ($insert->queryResult) {
                    redirect('admin/Dashboard');
                } else {
                    $_SESSION['error_msg'] = 'Failed!';
                    redirect('admin/Dashboard/create');
                }
                unset($_POST);
            } else {
                $_SESSION['error_msg'] = 'Import all fields';
                redirect('admin/Dashboard/create');
            }
        } else {
            redirect('error');
        }
    }

    public function create()
    {
        $this->viewRender('admin/CreatePost');
    }

    public function view($id)
    {
        $select = $this->modelRender('Posts')->select()->where('id', '=', $id)->execute()->fetchAssocs();
        $this->viewRender('admin/view', $select);
    }

    public function deletePage($id)
    {
        $select = $this->modelRender('Posts')->select()->where('id', '=', $id)->execute()->fetchAssocs();
        $this->viewRender('admin/deletePost', $select);
    }

    public function delete($id)
    {
        if ($this->modelRender('Posts')->delete()->where('id', '=', $id)->execute()) {
            redirect('admin/dashboard');
        }
    }

    public function updatePage($id)
    {
        $select = $this->modelRender('Posts')->select()->where('id', '=', $id)->execute()->fetchAssocs();
        $this->viewRender('admin/updatePost', $select);
    }

    public function updatePost()
    {
        if (isset($_POST['updatePost'])) {
            $id = $_POST['id'];
            if (!empty($_POST['title']) && !empty($_POST['text'])) {
                $array = [];
                $array['title'] = htmlspecialchars($_POST['title']);
                $array['text'] = htmlspecialchars($_POST['text']);
                $update = $this->modelRender('Posts')->update($array)->where('id', '=', $id)->execute();
                if ($update->queryResult) {
                    redirect('admin/Dashboard');
                } else {
                    $_SESSION['error_update_msg'] = 'Failed!';
                    $url = 'admin/Dashboard/updatePage?' . $id;
                    var_dump($url);
                    exit;
                }
            } else {
                $_SESSION['error_update_msg'] = 'Import all fields';
                $url = 'admin/Dashboard/updatePage?' . $id;
                redirect($url);
            }
            unset($_POST);
        } else {
            redirect('error');
        }
    }
}
