<?php
class ErrorController extends Controller
{
    public function index()
    {
        $this->viewRender('Error');
    }
}