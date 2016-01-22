<?php


class AdminNewsController extends AbstractController
{
    protected $view_one = '/news/adminOne.php';
    protected $view_all = '/news/adminAll.php';
    protected $view_new = '/news/adminNew.php';

    protected $ctrl = 'AdminNews';

    public function actionSave() {
        echo $this->view_new;
        return true;
    }

    public function actionNew()
    {
        $view = new View();
        $page = new PageController();

        $id = isset( $_POST['id_news'] ) ? $_POST['id_news'] : null;

        if( isset( $_POST['news_save'] ) ) {
            AdminNews::$id = $id;
            AdminNews::$title = isset( $_POST['title'] ) ? $_POST['title'] : null;
            AdminNews::$intro = isset( $_POST['intro'] ) ? $_POST['intro'] : null;
            AdminNews::$text = isset( $_POST['text'] ) ? $_POST['text'] : null;
            if( $id ) {
                AdminNews::update();
            } else {
                $id = AdminNews::save();
            }
        }

        if( $id ) {
            $view->id = $id;
            $view->item = AdminNews::getOne($id);
        }
        $view->assign( 'links', $page->createLink( $this->ctrl ) );
        $view->display($this->view_new);
    }

    public function actionDel()
    {
        AdminNews::$id = isset( $_POST['radio_id'] ) ? $_POST['radio_id'] : null;

        if( AdminNews::$id ) {
            AdminNews::del();
        }

        $view = new View();
        $view->items = AdminNews::getAll();
        $view->display($this->view_all);
    }
}