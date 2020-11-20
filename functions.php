<?php

// CLASSES
 
    class Member {
        public $id;
        public $name;
        public $phone;
        public $email;
        public $read_books = false;
        public $read_pages;
        public $defined = false;

        function get_data($id) {
            $all = load_data('members');
            $data = false;

            foreach ($all as $item){
                if ($item['id'] == $id){
                    $data = $item;
                    $this->defined = true;
                    break;
                }
            }

            $this->id = $id;
            $this->name = $data['name'];
            $this->phone = strval($data['phone']);
            $this->email = $data['email'];
            $this->read_books = $this->read_books();
            $this->read_pages = $this->read_pages();

            if ($this->phone[0] == "5") $this->phone = "0".$this->phone;
        }

        function read_books() {
            if (!$this->defined) return 0;

            $readings = load_data('readings');
            $count = 0;

            foreach ($readings as $r) if ($r['member_id'] == $this->id) $count++;
            return $count;
        }

        function read_pages() {
            
            if (!$this->defined) return 0;

            $readings = load_data('readings');
            $books = load_data('books');
            $books_array = array();
            $books_read = 0;
            $pages_read = 0;

            foreach ($readings as $r) if ($r['member_id'] == $this->id) { $books_array[] = $r['book_id'];  $books_read++; }
            
            foreach ($books_array as $c_book) {
                foreach ($books as $book) {
                    if ($book['id'] == $c_book) {
                        $pages_read += $book['pages'];
                    }
                }
            }

            return $pages_read;
        }

        function is_target_completed() {
            global $cfg;
            if (!$this->defined) return 0;
            if (!$this->read_books) { $this->read_books(); $this-> read_pages(); }

            if ($this->read_books >= $cfg['targets']['books'] && $this->read_pages >= $cfg['targets']['pages'])
                return true;
            else return false;

        }

    }

    class Group {
        public $id;
        public $name;

    }

    class Book {
        public $id;
        public $title;
        public $pages;
        public $category;
        public $defined = false;

        function get_data($id) {
            $all = load_data('books');
            $data = false;

            foreach ($all as $item){
                if ($item['id'] == $id){
                    $data = $item;
                    $this->defined = true;
                    break;
                }
            }

            $this->id = $id;
            $this->title = $data['title'];
            $this->pages = $data['pages'];
            $this->category = $data['category'];
            $this->readers = $this->readers();

        }

        function readers() {
            if (!$this->defined) return 0;

            $readings = load_data('readings');
            $count = 0;

            foreach ($readings as $r) if ($r['book_id'] == $this->id) $count++;
            return $count;
        }

    }

    class Category {
        public $id;
        public $name;
        public $readers;
        public $books;
        public $no_books;
        public $defined = false;

        function get_data($id) {
            $all = load_data('categories');
            $data = false;
            foreach ($all as $item){
                if ($item['id'] == $id){
                    $data = $item;
                    $this->defined = true;
                    break;
                }
            }

            $this->id = $id;
            $this->name = $data['name'];
            $this->readers_books();
            // var_dump(debug_print_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
        }

        function readers_books() {
            if (!$this->defined) return 0;

            $all_books = load_data('books');
            $cat_books = array();

            foreach ($all_books as $b) {
                if ($b['category'] == $this->name) $cat_books[] = $b['id'];
            }
            $this->books = $cat_books;
            $this->no_books = count($cat_books);

            $readings = load_data('readings');
            $this->readers = 0;

            foreach ($readings as $r) if (in_array($r['book_id'],$cat_books)) $this->readers++;
            return true;
        }

    }


// GET FUNCTIONS

    function get_file($type,$read=FALSE){
        $target_dir = "uploads/";

        $members_file = $target_dir . "membersData.csv";
        $books_file = $target_dir . "booksData.csv";
        $readings_file = $target_dir . "readingsData.csv";
        $categories_file = "assets/" . "categoriesData.csv";

        switch ($type){
            case "members":
                $file = $members_file;
            break;
            case "books":
                $file = $books_file;
            break;
            case "readings":
                $file = $readings_file;
            break;
            case "categories":
                $file = $categories_file;
            break;
            default:
                $file = 0;
        }

        if ($read) return 0;
        else return $file;
        }

    function get_member($id) {
        $member = new member;
        $member->get_data($id);
        return $member;
        }

    function get_book($id) {
        $book = new book;
        $book->get_data($id);
        return $book;
        }

    function get_category($id) {
        $category = new category;
        $category->get_data($id);
        return $category;
        }

    function get_heading($type) {
        global $cfg;
        if (in_array($type,$cfg['headings']['headings'])) return $cfg['headings'][$type];
        else return 0;
        }

    function get_all($type) {
        $ids = load_data($type,1);
        $list = array();
        foreach($ids as $id) {
            switch ($type){
                case 'members':
                    $m = new member;
                    $list[] = $m;
                break;
                case 'books':
                    $m = new book;
                    $list[] = $m;
                break;
                case 'categories':
                    $m = new category;
                    $list[] = $m;
                break;
                default:
                return false;
                // case 'members':
                //     $m = new member;
                //     $list[] = $m;
                
            }
        }
        return $list;
        }

    function get_readings($type) {
        switch ($type) {
            case "books":
                $readings = load_data('readings');
                return count($readings);
            break;
            case "pages":
                $readings = load_data('readings');
                $books = load_data('books');
                $pages_read = 0;
                foreach ($readings as $reading) {
                    foreach ($books as $book)
                        if ($book['id'] == $reading['book_id']) {
                            $pages_read += $book['pages'];
                        }
                }
                return $pages_read;
            break;
        }
        }
// LOAD FUNCTIONS

    function load_data($type,$only_ids = false) {
        if(!is_data_uploaded()) return false;
        if($type == "category") load_categories();
        $row = 1;
        $data = array();
        $headers=array();
        if (($handle = fopen(get_file($type), "r")) !== FALSE) {
            $h = fgetcsv($handle, 1000, ',');
            if (get_heading($type)) $headers = get_heading($type);
            else for($i=0;$i<count($h);$i++) $headers[] = $i;
            while (($fdata = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($fdata);
                if ($only_ids) $data[$row] = $fdata[0];
                else
                for ($c=0; $c < $num; $c++) {
                    $data[$row][$headers[$c]] = $fdata[$c];
                }
                $row++;
            }
            fclose($handle);
            return $data;
        } else return false;
        
        }

    function load_page($p = 'home', $id=FALSE, $tab=FALSE) {
        global $cfg;
        global $page_alerts;
        if (in_array($p,$cfg['pages'])) {
            
            if (in_array($p,$cfg['noid_pages'])) {
                $page['id'] = FALSE;
                $page['tab'] = $id;
            } else {
                $page['id'] = $id;
                $page['tab'] = $tab;
            }

            
            try {
                include "pages/".$p.".php";
            } catch (ErrorException $ex) {
                error('404');
            }

        } else {
            error('404');
        }

        }

    function load_subpage($p) {
        include "pages/sub/".$p.".php";
        }

    function load_categories() {
        if(dont_repeat('load_categories')) return;
        $categories = array(['id','name']);
        $catlist = array();
        $books = load_data('books');
        $id = 1;

        foreach ($books as $book){
            if (!in_array($book['category'],$catlist)){
                $categories[] = array($id++,$book['category']);
                $catlist[] = $book['category'];
            }
        }

        $cat_file = fopen("assets/categoriesData.csv", "w") or die("Unable to open file!");
        
        foreach ($categories as $category)
            fputcsv($cat_file, $category);
        fclose($cat_file);

        }

        

// PAGES FUNCTIONS

    function error($code) {
        global $cfg;
        switch ($code) {
            case '404':
                require "templates/404.php";
                exit(404);
        }
        }

    function add_alert($msg,$type="warning"){
        global $page_alerts;
        $page_alerts[] = array($type,$msg);
        }

    function is_data_uploaded($item="all") {
        if ($item == "all") {
            if (file_exists("uploads/membersData.csv") && file_exists("uploads/booksData.csv") && file_exists("uploads/readingsData.csv"))
                return 1;
        } else {
            if (file_exists("uploads/".$item."Data.csv"))
                return 1;
        }

        return 0;
        }

    function count_attr($file,$no_attr) {
        $row = 1;
        $lines = array();
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $lines[$row] = $num;
                $row++;
            }
            fclose($handle);
            foreach ($lines as $line) {
                if ($line != $no_attr) return 0;
            }
            return 1;
        }

        // $handler = fopen($file,"r");
        // while (!feof($handler)){
        // fgets($handler,10);
        // $cols = explode (chr(9), 10); //edit: using http://es.php.net/manual/en/function.fgetcsv.php you can get the same result as with fgets+explode
        // if (count($cols)>$no_attr){
        //     return "Error";
        // } else return count($cols);
        // }
        // fclose($handler);

        // $fp = file($file);
        // return count($fp);
        }

    function is_active($current,$place) {
        if ($current == $place)
            return 'active';
        else
            return '';
        }


// OTHER FUNCTIONS

    function fake($type,$number=FALSE) {
        
        
        if ($number) {
            $array = array();
            for ($i=1;$i<$number;$i++)
                $array[] = fake($type);
            return $array;
        }

        switch ($type) {
            case 'name':
                $names = array(
                    'Ahmed',
                    'Salman',
                    'Ali',
                    'Fahad',
                    'Noura',
                    'Nawaf',
                    'Reem',
                    'Sarah',
                    'Farah'
                );
                
                //PHP array containing surnames.
                $surnames = array(
                    'Almushaiqah',
                    'Alfayez',
                    'Alsalman',
                    'Albattah',
                    'Almutairi',
                    'Alhasan',
                    'Alomari',
                    'Alabed',
                    'Alqahtani',
                    'Alharbi',
                    'Arif'
                );
                
                //Generate a random forename.
                $random_name = $names[mt_rand(0, sizeof($names) - 1)];
                
                //Generate a random surname.
                $random_surname = $surnames[mt_rand(0, sizeof($surnames) - 1)];
                
                //Combine them together and print out the result.
                return $random_name . ' ' . $random_surname;  
            break;

            case 'phone':
                $random_number = "05".mt_rand(10000000,99999999);
                return $random_number;
            break;

            
            
        }

        }




    //$
    function dont_repeat($function_name) {
        global $executed_functions;
        if (in_array($function_name,$executed_functions)) return true;
        else {
            $executed_functions[] = $function_name;
            return false;
        }
        }