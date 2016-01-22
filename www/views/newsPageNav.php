<?php

class newsPageNav extends AbstractPageNav
{
    protected $ctrl = 'News';

    public function showNav( $ctrl )
    {
        if( $this->limit == 'all' ) {
            return '';
        }

        $links = 7;

        $start  = ( ( $this->page - $links ) > 0 ) ? $this->page - $links : 1;
        $end    = ( ( $this->page + $links ) < $this->num_pages ) ? $this->page + $links : $this->num_pages;

        $html = '<ul class="pagination pagination-sm">';

        if( $this->page == 1 ) {
            $class = 'disabled';
            $noClick = '" onclick="return false';
        } else {
            $class = '';
            $noClick = '';
        }

        $html .= '<li class="'.$class.'"><a href="' . Variables::urlAllNews( $ctrl ) . '&limit=' . $this->limit
                  . '&page=' . ( $this->page - 1 ) . $noClick . '">&laquo;</a></li>';

        if( $start > 1 ) {
            $html   .= '<li><a href="' . Variables::urlAllNews( $ctrl ) . '&page=1">1</a></li>';
            $html   .= '<li class="disabled"><span>...</span></li>';
        }

        for( $i = $start ; $i <= $end; $i++ ) {
            $class  = ( $this->page == $i ) ? "active" : "";
            $html  .= '<li class="' . $class . '"><a href="' . Variables::urlAllNews( $ctrl ) . '&page=' . $i . '">' . $i . '</a></li>';
        }

        if( $end < $this->num_pages ) {
            $html  .= '<li class="disabled"><span>...</span></li>';
            $html  .= '<li><a href="' . Variables::urlAllNews( $ctrl ) . '&page=' . $this->num_pages . '">' . $this->num_pages . '</a></li>';
        }

        if( $this->page == $this->num_pages ) {
            $class = 'disabled';
            $noClick = '" onclick="return false';
        } else {
            $class = '';
            $noClick = '';
        }
        $html .= '<li class="'.$class.'"><a href="' . Variables::urlAllNews( $ctrl ) . '&limit=' . $this->limit
                  . '&page=' . ( $this->page + 1 ) . $noClick . '">&raquo;</a></li>';

        $html .= '</ul>';

        return $html;
    }

}