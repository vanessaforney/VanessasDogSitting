<?php
    require_once("texy/texy.php");

    $main_pages = array("home" => "Home", "aboutme" => "About Me", "satisfied_clients" => "Satisfied Clients", "photography" => "Photography", "rates" => "Rates", "contact_info" => "Contact Info", "not_found" => "Not Found");
    $style = "default";
    $site_path = "";
    $index_path = $site_path . "";

    $texy = new Texy();

    if (isset($_GET["cssdebug"]) && $_GET["cssdebug"] == "true")
    {
        $css = "file:///home/michael/scm/vanessa_dogsitting/style/default/default.css";
    }
    else
    {
        $css = $site_path . "/style/" . $style . "/" . $style . ".css";
    }
    $image_dir = $site_path . "/style/" . $style . "/images";


    if (isset($_SERVER['ORIG_PATH_INFO']))
    {
        $path_info = $_SERVER['ORIG_PATH_INFO'];
    }
    else
    {
        $path_info = $_SERVER['PATH_INFO'];
    }
    $path = explode("/", $path_info);
    array_shift($path);


    if (array_key_exists($path[0], $main_pages))
    {
        $page_id = array_pop($path);
        $page_title = $main_pages[$page_id];
        $page_path = implode("/", $path);
    }
    else if ($path_info == "" || $path_info == "/")
    {
        $page_id = "home";
        $page_title = $main_pages[$page_id];
        $page_path = "";
    }
    else
    {
        $page_id = "not_found";
        $page_title = $main_pages[$page_id];
        $page_path = "";
    }

    function image($image_name)
    {
        return $site_path . "/images/" . $image_name;
    }

    function get_include_contents($filename)
    {
        if (is_file($filename))
        {
            ob_start();
            include_once $site_path . "/global.php";
            include $filename;
            $contents = ob_get_contents();
            ob_end_clean();
            return $contents;
        }
        return false;
    }

    function get_content()
    {

        global $texy, $main_pages, $path, $page_id, $page_title, $page_path, $image_dir;
        $texy_file = "pages/" . $page_path . "/" . $page_id . ".texy";
        if (file_exists($texy_file))
        {
            $text = get_include_contents($texy_file);
            echo $texy->process($text);
        }
    }
?>