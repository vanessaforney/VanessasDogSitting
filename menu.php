<div id="menu">
	<ul>
        <?php
            function generate_menu()
            {
                global $main_pages, $index_path;
                foreach($main_pages as $page_id => $page_title)
                {
                    if ($page_id == "not_found")
                    {
                        continue;
                    }
                    echo "<div><li><a href=\"" . $index_path . "/" . $page_id . "\"><img src=\"" . $image_dir . "/" . $page_title . ".png\" /></a></li></div>";
                }
            }
            generate_menu();
        ?>
	</ul>
</div>