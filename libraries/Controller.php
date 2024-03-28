<?php
class Controller
{
    protected function viewRender ($view, $data = null){
        require ('views/layouts/header.php');
        require ('views/'.$view.'.php');
        require ('views/layouts/footer.php');
    }
    protected function modelRender($modelName) {
        require_once ('models/'.ucfirst($modelName).'.php');
        return $model = new $modelName;
    }
}
