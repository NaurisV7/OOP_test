<?php
use ClassLib\Helper;

class AppController {

    /**
     * @var array of exploded url
     */
    public $args;

    /*
     * @var plugin title
     */
    public $title;

    /*
     * @var plugin content mixed
     */
    public $content;

    /**
     * @var .css includes
     */
    public $styles;

    /**
     * @var .js includes
     */
    public $scripts;

    /**
     * @var breadcrumb mixed
     */
    public $breadcrumb;


    function __construct($class=false)
    {
        if(empty($class)) {
            return false;
        }
            $this->args = arg();

            include_once APP . 'plugins/' . $class . '/controllers/' . $class . '_controller.php';

            // include routes if exist (I don't know how we'll use them right now)
            if (file_exists(APP . 'application/plugins/' . $class . '/routes.php')) {
                include_once APP . 'application/plugins/' . $class . '/routes.php';
            }

            $plugin_name = ucfirst($class) . 'Controller';

            $plugin = new $plugin_name;

            if (empty($this->args[1]) || !method_exists($plugin, $this->args[1])) {
                $this->args[1] = 'index';
            }

            if (method_exists($plugin, $this->args[1])) {

                if (isset($plugin->attached)) {
                    foreach ($plugin->attached AS $type => $files) {
                        foreach ($files AS $file) {
                            if ($type == 'js') {
                                $this->scripts[] = add_js($file);
                            } else {
                                $this->styles[] = add_css($file);
                            }
                        }
                    }
                }

                // Set variables
                $plugin->args = $this->args;

                $this->content = $plugin->{$this->args[1]}();
                $this->title = (isset($plugin->title)) ? $plugin->title : '';


                if (isset($plugin->breadcrumb)) {
                    $breadcrumb_array = [];
                    foreach ($plugin->breadcrumb AS $bread) {
                        foreach ($bread AS $bc_link => $bc) {
                            $breadcrumb_array[] = '<a href="/' . $bc_link . '">' . $bc . '</a>';
                        }
                    }
                    $this->breadcrumb = $breadcrumb_array;
                }
            }
    }

    function uploadImage($file,$name,$destination,$width,$height) {
        include ROOT.'/application/controllers/IMGupload.php';
        $extension = strtolower(getExtension(stripslashes($file['name'])));
        $image = new SimpleImage();
        $image->load($file['tmp_name']);
        $image->resize($width,$height);
        $image->save($destination.'/'.$name.'.'.$extension);
    }

    function sendMessage($uid,$subject,$message) {
        db_query("INSERT INTO `messages` (`from`, `to`,`title`,`date`,`message`) VALUES ('0000','".$uid."','".$subject."','".time()."','".$message."')");
    }

    function sendMail($to,$subject,$message,$from=false) {
        Helper::sendMail($to, $subject, $message, $from);
    }

    function page_link($page,$title=false) {
        $query = get_query_parameters();
        $class = (isset($query->page) && $page == $query->page || empty($query->page) && $page == 1) ? ' active' : '';
        $query->page = $page;

        if(!$title) {
            $title = $page;
        }

        $link = array();
        foreach($query AS $key=>$val) {
            $link[] = $key.'='.$val;
        }
        $link = implode('&',$link);
        return '<li><a href="?'.$link.'" class="pager-link'.$class.'">'.$title.'</a></li>';
    }

    function pager($total,$perPage=30) {
        $output = '';
        $query = get_query_parameters();
        $totalPages = ceil($total/$perPage);
        $currentPage = (!empty($query->page)) ? $query->page : 1;
        $next_page = $currentPage+1;
        $prev_page = $currentPage-1;
        $adjacents = 5;
        $last_page = ceil($total/$perPage);
        $lpm1 = $last_page-1;

        if($totalPages > 1) {
            $output .= '<nav class="pagination"><ul>';
            if ($last_page < 7 + ($adjacents * 2)) {
                for ($page = 1; $page <= $last_page; $page++) {
                    $output .= $this->page_link($page);
                }
            }
            elseif($last_page > 5 + ($adjacents * 2)) {
                if($currentPage < 1 + ($adjacents * 2)) {
                    for ($page = 1; $page < 4 + ($adjacents * 2); $page++) {
                        $output .= $this->page_link($page);
                    }
                    $output .= "<li class='dot'>...</li>";
                    $output .= $this->page_link($lpm1);
                    $output .= $this->page_link($last_page);
                }
                elseif($last_page - ($adjacents * 2) > $currentPage && $currentPage > ($adjacents * 2)) {
                    $output .= $this->page_link(1);
                    $output .= $this->page_link(2);
                    $output .= "<li class='dot'>...</li>";
                    for ($page = $currentPage - $adjacents; $page <= $currentPage + $adjacents; $page++) {
                        $output .= $this->page_link($page);
                    }
                    $output .= "<li class='dot'>..</li>";
                    $output .= $this->page_link($lpm1);
                    $output .= $this->page_link($last_page);
                }
                else {
                    $output .= $this->page_link(1);
                    $output .= $this->page_link(2);
                    $output .= "<li class='dot'>..</li>";
                    for ($page = $last_page - (2 + ($adjacents * 2)); $page <= $last_page; $page++) {
                        $output .= $this->page_link($page);
                    }
                }
            }
            $output .= '</ul></nav>';
        }
        $this->pager = new stdClass;
        $this->pager->from = (($currentPage * $perPage) - $perPage);
        $this->pager->perPage = $perPage;
        return $output;
    }



    function security($data) {
        $element = new element;
        $this->data = $element->security($data);
        return $this->data;
    }
    function redirect($link=false) {
        if(!$link) {
            header('Location: ?');
            die;
        }
        else {
            header('Location: /'.$link);
            die;
        }
    }

    public function view($path, $variables = []) {
        $trace = debug_backtrace();
        $trace = str_replace(ROOT.'/',"",$trace[0]['file']);
        $trace = explode('/',$trace);

        // Check if subfolder
        $contrl = str_replace('_controller.php',"",end($trace));
        if($contrl != $trace[9]) {
            $template = ROOT.'/'.$trace[7].'/'.$trace[8].'/'.$trace[9].'/views/'.$contrl.'/'.$path.'.tpl.php';
        }
        else {
            $template = ROOT.'/'.$trace[7].'/'.$trace[8].'/'.$trace[9].'/views/'.$path.'.tpl.php';
        }


        if(file_exists($template)) {
            ob_start();

            if(is_array($variables)) {
                extract($variables,EXTR_PREFIX_SAME, "wddx");
            }

            include $template;

            $renderedView = ob_get_clean();
            return $renderedView;
        }
        else {
            return error('Template file doesn\'t exist in "'.$template.'"');
        }
    }

    function setMessage($message,$status='info') {
        $_SESSION['messages'][$status][] = $message;
    }
    function setError($message) {
        $_SESSION['messages']['error'][] = $message;
    }

    function admin_links() {
        $output = '';
        if(!empty($this->links)) {
            $trace = debug_backtrace();
            $trace = str_replace(ROOT.'/',"",$trace[0]['file']);
            $trace = explode('/',$trace);
            $output .= '<ul id="admin-tabs">';
            foreach($this->links AS $link_src=>$link_title) {
                $active = ($link_src == arg(2) || arg(2) == '' && $this->homepath == $link_src) ? 'class="active"' : '';
                $output .= '<li '.$active.'><a '.$active.' href="/admin/'.$trace[9].'/'.$link_src.'/">'.$link_title.'</a></li>';
            }
            $output .= '</ul>';
        }
        return $output;
    }

    function links() {
        $trace = debug_backtrace();
        $trace = str_replace(ROOT.'/',"",$trace[0]['file']);
        $trace = explode('/',$trace);
        $output = '<ul class="tabs">';
        foreach($this->links AS $link_src=>$link_title) {
            $active = ($link_src == arg(1) || arg(1) == '' && $this->homepath == $link_src) ? 'class="active"' : '';
            $output .= '<li '.$active.'><a '.$active.' href="/'.$trace[9].'/'.$link_src.'/">'.$link_title.'</a></li>';
        }
        $output .= '</ul>';
        return $output;
    }
}