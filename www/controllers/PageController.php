<?php


class PageController
{
    private $_conn;
    private $_limit;
    private $_page;
    private $_query;
    private $_total;

    private $num_entries;
    private $limit;
    private $current_page;
    private $num_pages;

    public function getPage()
    {
        $this->current_page = isset( $_GET['page'] ) ? $_GET['page'] : 1;
        $this->limit = isset( $_GET['limit'] ) ? $_GET['limit'] : 5;

        $page_nav = new Paginator($this->current_page, $this->limit);
        $res = $page_nav->getPage();
        $this->num_entries = $res['num_entries'];
        return [
            'items' => $res['items'],
            'page' => $this->current_page,
        ];
    }

    public function createNav( $ctrl )
    {
        $nav = new newsPageNav($this->num_entries, $this->limit, $this->current_page);
        $html = $nav->showNav( $ctrl );

        return $html;
    }

    public function createLink( $ctrl )
    {
        return [
            'addNews' => Variables::urlAddNews( $ctrl ),
            'allNews' => Variables::urlAllNews( $ctrl ),
            'delNews' => Variables::urlDelNews( $ctrl ),
        ];
    }
    public function getData( $limit = 10, $page = 1 )
    {


        $this->_limit = $limit;
        $this->_page = $page;

        if( $this->_limit == 'all' ) {
            $query = $this->_query;
        } else {
            $query = $this->_query . 'LIMIT' .( ( $this->_page - 1 ) * $this->_limit ) . ", $this->_limit";
        }
        $res = $this->_conn->query( $query );
        $results = [];
        while( $row = $res->fetch_assoc() ) {
            $results[] = $row;
        }

        $result = new stdClass();
        $result->page = $this->_page;
        $result->limit = $this->_limit;
        $result->total = $this->_total;
        $result->data = $results;
    }

    public function createLinks( $links, $list_class )
    {
        if( $this->_limit == 'all' ) {
            return '';
        }

        $last   = ceil( $this->_total / $this->_limit );

        $start  = ( ( $this->_page - $links ) > 0 ) ? $this->_page - $links : 1;
        $end    = ( ( $this->_page + $links ) < $last ) ? $this->_page + $links : $last;

        $html   = '<ul class="' . $list_class . '">';

        $class  = ( $this->_page == 1 ) ? "disabled" : "";
        $html  .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_page - 1 ) . '">&laquo;</a></li>';

        if( $start > 1 ) {
            $html   .= '<li><a href="?limit=' . $this->_limit . '&page=1">1</a></li>';
            $html   .= '<li class="disabled"><span>...</span></li>';
        }

        for( $i = $start ; $i <= $end; $i++ ) {
            $class  = ( $this->_page == $i ) ? "active" : "";
            $html  .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
        }

        if( $end < $last ) {
            $html  .= '<li class="disabled"><span>...</span></li>';
            $html  .= '<li><a href="?limit=' . $this->_limit . '&page=' . $last . '">' . $last . '</a></li>';
        }

        $class     = ( $this->_page == $last ) ? "disabled" : "";
        $html      .= '<li class="' . $class . '"><a href="?limit=' . $this->_limit . '&page=' . ( $this->_page + 1 ) . '">&raquo;</a></li>';

        $html      .= '</ul>';

        return $html;
    }
}