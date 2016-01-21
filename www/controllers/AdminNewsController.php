<?php


class AdminNewsController extends NewsController
{
    protected $view_one = '/news/adminOne.php';
    protected $view_all = '/news/adminAll.php';
    protected $view_new = '/news/adminNew.php';

    public function actionSave() {
        echo $this->view_one;
        return true;
    }

    public function actionNew()
    {
        $view = new View();
        $view->display($this->view_new);
    }
}