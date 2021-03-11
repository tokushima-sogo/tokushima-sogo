<?php get_header(); ?>

<link href="<?php echo get_template_directory_uri(); ?>/assets/css/quiz.css" rel="stylesheet">
<script>
    const PATH = "<?php echo get_template_directory_uri(); ?>";
</script>
<main>
    <div id="start"></div>
    <canvas id="canvas"></canvas>

</main>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/quiz.js"></script>
<?php get_footer(); ?>
