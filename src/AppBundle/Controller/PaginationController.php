<?php

    namespace AppBundle\Controller;


    class PaginationController
    {
        private $page;
        private $numberOfPages;
        private $recordsOnPage;

        public function __construct($page, $numberOfRecords, $recordsOnPage)
        {
            $this->page = $page;
            $this->recordsOnPage = $recordsOnPage;
            $this->numberOfPages = $this->setNumberOfPages($numberOfRecords, $recordsOnPage);
        }

        private function setNumberOfPages($numberOfRecords, $recordsOnPage)
        {
            if ($recordsOnPage === 0) {
                $recordsOnPage = 20;
            }

            $this->numberOfPages = ceil($numberOfRecords / $recordsOnPage);

            return $this->numberOfPages;
        }

        public function getNumberOfPages()
        {
            return $this->numberOfPages;
        }

        public function getPagesList()
        {
            $pageCount = 4;
            if ($this->numberOfPages <= $pageCount) {
                return array(1, 2, 3, 4);
            }

            $a = $pageCount;
            $b = array();
            $half = floor($pageCount / 2);
            if ($this->page + $half > $this->numberOfPages) {
                while ($a >= 1) {
                    $b[] = $this->numberOfPages - $a + 1;
                    $a--;
                }
                return $b;
            } else {
                while ($a >= 1) {
                    $b[] = $this->page - $a + $half + 1;
                    $a--;
                }
                return $b;
            }
        }
    }