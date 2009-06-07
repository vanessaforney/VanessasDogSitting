<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once("global.php"); ?>
        <title>Vanessa's Dog Sitting - <?php echo $page_title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo $css; ?>" />
        <link rel="shortcut icon" href="<?php echo $image_dir . "/pawprint.ico"; ?>" type="image/x-icon" />
        <link rel="icon" href="<?php echo $image_dir . "/pawprint.ico"; ?>" type="image/x-icon">
    </head>
    <body>
        <div id="page">
            <?php include_once("header.php"); ?>
            <?php include_once("menu.php"); ?>
            <div id="body">
                <div class="item">
                    <?php
                        get_content();
                    ?>
                </div>
                <div id="footnote">
                    Return to <a href="home"><?php echo $main_pages["home"]; ?></a>
                </div>
            </div>
            <?php include_once("footer.php"); ?>
        </div>
    </body>
</html>
