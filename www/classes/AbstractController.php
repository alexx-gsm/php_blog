<?php


class AbstractController
{
    protected $view_all;
    protected $view_one;
    protected $ctrl;

    public function actionAll()
    {
        $view = new View();
        $page = new PageController();

        $view->assign( 'data', $page->getPage() );
        $view->assign( 'pageNav', $page->createNav( $this->ctrl ) );
        $view->assign( 'links', $page->createLink( $this->ctrl ) );
        $view->display( $this->view_all );
    }

    public function actionOne()
    {
        $id = isset( $_GET['id'] ) ? $_GET['id'] : 1;

        $view = new View();
        $page = new PageController();

        $view->assign( 'item', News::getOne( $id ) );
        $view->assign( 'links', $page->createLink( $this->ctrl ) );
        $view->display( $this->view_one );
    }
}