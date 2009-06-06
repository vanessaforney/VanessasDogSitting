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
                    echo "<li><a href=\"" . $index_path . "/" . $page_id . "\">" . $page_title . "</a></li>";
                }
            }
            generate_menu();
        ?>
	</ul>
</div>