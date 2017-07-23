<!DOCTYPE>

<html>
    <head>
        <?php $this->load->view('common/css_files'); ?>
    </head>
    <body>

        <?php
            switch ($curpage) {
                case 'Home':
                    echo $content;
                    break;
            }
        ?>

        <?php $this->load->view('common/js_files'); ?>
    </body>
</html>