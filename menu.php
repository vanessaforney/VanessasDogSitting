<div id="menu">
	<ul>
        <?php
            function generate_menu()
            {
                global $main_pages, $index_path, $image_dir;
                foreach($main_pages as $page_id => $page_title)
                {
                    if ($page_id == "not_found")
                    {
                        continue;
                    }
                    $image = $image_dir . "/" . $page_id . ".png";
                    $image_hover = $image_dir . "/" . $page_id . "_hover.png";
                    echo "<div class=\"li-outside\"><li><a href=\"" . $index_path . "/" . $page_id . "\"><img src=\"" . $image . "\" onmouseover=\"this.src='" . $image_hover . "'\" onmouseout=\"this.src='" . $image . "'\"
                    onload=\"var i=new Image();i.src='" . $image_hover . "';if(typeof preload=='undefined')preload=new Array();preload[preload.length]=i;this.onload=''\" /></a></li></div>";
                }
            }
            generate_menu();
        ?>
	</ul>
</div>