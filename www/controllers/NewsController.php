<?php


class NewsController
{
    protected $view_all = '/news/all.php';
    protected $view_one = '/news/one.php';

    public function actionAll()
    {
        $view = new View();
        $view->items = News::getAll();
        $view->display($this->view_all);
    }

    public function actionOne()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;

        $view = new View();
        $view->item = News::getOne($id);
        $view->display($this->view_one);
    }

}