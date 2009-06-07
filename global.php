<?php
    require_once("texy/texy.php");
    
    $main_pages = array("home" => "Home", "aboutme" => "About Me", "satisfied_clients" => "Satisfied Clients", "calender" => "Calender", "rates" => "Rates", "contact_info" => "Contact Info", "not_found" => "Not Found");
    $style = "default";
    $site_path = "/vanessasdogsitting.com";
    $index_path = $site_path . "/ds.php";

    $texy = new Texy();

    if ($_GET["cssdebug"] == "true")
    {
        $css = "C:/Users/Michael/Development/vanessa_dogsitting/style/default/default.css";
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
    echo "<!--" . $path_info . "-->";
    array_shift($path);

    
    if (array_key_exists($path[0], $main_pages))
    {
        $page_id = array_pop($path);
        $page_title = $main_pages[$page_id];
        $page_path = implode("/", $path);
    }
    else if ($path_info == "")
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
    
    echo "<!--" . $page_id . "-->";
    echo "<!--SERVER: ";
    print_r($_SERVER);
    echo "-->";
    function get_content()
    {
        
        global $texy, $main_pages, $path, $page_id, $page_title, $page_path;
        echo "<!--" . $page_id . "-->";
        $texy_file = "pages/" . $page_path . "/" . $page_id . ".texy";
        if (file_exists($texy_file))
        {
            $text = file_get_contents($texy_file);
            echo $texy->process($text);
        }
    }

    function generate_menu()
    {
        global $texy, $main_pages, $index_path, $image_dir
        $text = "/---div";
        foreach($main_pages as $page_id => $page_title)
        {
            $text .= "/---div
            - [* " . $image_dir . "/" . $page_id . ".png *]:[" . $index_path . "/" . $page_id . "]
            \---"
        }
        $text .= "\\---div";
        echo $text->process($text);
    }
?>