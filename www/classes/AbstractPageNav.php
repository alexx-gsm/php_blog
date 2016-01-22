<?php


class AbstractPageNav
{
    protected $num_pages;         // all count of pages = all articles / $limit
    protected $limit;             // count articles on the page
    protected $page;              // current page to display

    public function __construct($all_pages, $limit, $page)
    {
        $this->num_pages = ceil( $all_pages / $limit);
        $this->limit     = $limit;
        $this->page      = $page;
    }
}