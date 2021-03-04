<?php get_header(); ?>


<body>
    <p>プログラミングスクールQlipです。</p>

    <div id="map" style="width:600px; height:400px"></div>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNNbWvrL46SW-8K-D0w6Haff4Vbcc4rRQ&callback=initMap">
    </script>

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/map_create.js"></script>
    <?php get_footer(); ?>
