<?php
    class news
    {
        private $id;
        private $title;
        private $description;
        private $image;
        private $status;
        private $create_at;
        private $update_at;

        public function __construct($title='', $description='', $image='', $status='', $create_at='', $update_at='')
        {
            $this->title = $title;
            $this->description = $description;
            $this->image = $image;
            $this->status = $status;
            $this->create_at = $create_at;
            $this->update_at = $update_at;
            
        }
        // public function __construct()
        // {
        // }
        // public function __construct($id = '', $title='', $description='', $image='', $status='', $create_at='', $update_at='')
        // {
        //     $this->id = $id;
        //     $this->title = $title;
        //     $this->description = $description;
        //     $this->image = $image;
        //     $this->status = $status;
        //     $this->create_at = $create_at;
        //     $this->update_at = $update_at;
            
        // }
        public function setId($id)
        {
            $this->id = $id;
        }
        public function setTitle($title)
        {
            $this->title = $title;
        }
        public function setDescription($description)
        {
            $this->description = $description;
        }
        public function setImage($image)
        {
            $this->image = $image;
        }
        public function setStatus($status)
        {
            $this->status = $status;
        }
        public function setCreate_at($create_at)
        {
            $this->create_at = $create_at;
        }
        public function setUpdate_at($update_at)
        {
            $this->update_at = $update_at;
        }
        public function getId()
        {
            return $this->id;
        }
        public function getTitle()
        {
            return $this->title;
        }
        public function getDescription()
        {
            return $this->description;
        }
        public function getImage()
        {
            return $this->image;
        }
        public function getStatus()
        {
            return $this->status;
        }
        public function getCreate_at()
        {
            return $this->create_at;
        }
        public function getUpdate_at()
        {
            return $this->update_at;
        }
        public function get_all()
        {
            $list = array($this->title, $this->description, $this->image, $this->status, $this->create_at, $this->update_at);
            return $list;
        }
    }
    // $a = new news($id='id',$title='title',$description='description',$image='image',$status='status',$create_at='create',$update_at='update');
    // $list = $a->get_all();
    // var_dump($list);
?>