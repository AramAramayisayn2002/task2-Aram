<?php
class IndexController extends Controller
{
    public function index()
    {
        $select = $this->modelRender('Posts')->select()->order('id')->desc()->execute();
        $paff = 'index';
        $this->view($select, $paff);
    }
    public function show($id)
    {
        $select = $this->modelRender('Posts')->select()->where('id', '=', $id)->execute();
        $paff = 'show';
        $this->view($select, $paff);
    }
    public function view($select, $paff)
    {
        if ($select->numRows() != 0) {
            $select = $select->fetchAssocs();
            $this->viewRender($paff, $select);
        } else {
            $this->viewRender('error');
        }
    }
}