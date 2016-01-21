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
        $id = isset( $_POST['id_news'] ) ? $_POST['id_news'] : null;

        if( isset( $_POST['news_save'] ) ) {
            News::$id = $id;
            News::$title = isset( $_POST['title'] ) ? $_POST['title'] : null;
            News::$intro = isset( $_POST['intro'] ) ? $_POST['intro'] : null;
            News::$text = isset( $_POST['text'] ) ? $_POST['text'] : null;
            if( $id ) {
                News::update();
            } else {
                $id = News::save();
            }
        }

        if( $id ) {
            $view->id = $id;
            $view->item = News::getOne($id);
        }

        $view->display($this->view_new);
    }

    public function actionDel()
    {
        News::$id = isset( $_POST['radio_id'] ) ? $_POST['radio_id'] : null;

        if( News::$id ) {
            News::del();
        }

        $view = new View();
        $view->items = News::getAll();
        $view->display($this->view_all);
    }
}