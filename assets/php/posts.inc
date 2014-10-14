<?php
    class Posts {
        private $title;
        private $date;
        private $content;
        private $postID;
        private $year;
        private $month;
        private $dateNumber;
        private $monthName = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September","Oktober", "November","Desember");
        
        function __construct($_title,$_date,$_content) {
            $this->title = $_title;
            $this->date = $_date;
            $this->content = $_content;
            $arrDate = explode("-",$_date);
            $this->year = $arrDate[0];
            $this->month = $arrDate[1];
            $this->dateNumber = $arrDate[2];
        }
        
        public function getTitle(){
            return $this->title;
        }
        
        public function getDate(){
            return $this->date;
        }
        
        public function getContent(){
            return $this->content;
        }
        
        public function setPostID($_postID){
            $this->postID = $_postID;
        }
        
        public function getPostID(){
            return $this->postID;
        }
        
        public function getMonthName(){
            if (intval($this->month)>0){
                 $m = $this->monthName[intval($this->month)-1];
            }
            return $m;
        }
        
        public function getYear() {
            return $this->year;
        }
        
        public function getDateNumber() {
            return $this->dateNumber;
        }
        
        public function getMonth(){
            return intval($this->month);
        }
    }
?>