<?php

namespace App\Entity;

trait Page
{
    private $page = 1;
    private $offset = 10;

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        if (!empty($page))
            $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param mixed $offset
     */
    public function setOffset($offset)
    {
        if (!empty($offset))
            $this->offset = $offset;
    }

}