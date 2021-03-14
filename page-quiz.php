<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>



    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/quiz.css" rel="stylesheet">
    <script>
        const PATH = "<?php echo get_template_directory_uri(); ?>";
    </script>


    <main class="l-main">
        <div id="canvas_wrapper">
            <canvas id="canvas"></canvas>
        </div>
    </main>



    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/quiz.js"></script>
    <?php wp_footer(); ?>
</body>

</html>
