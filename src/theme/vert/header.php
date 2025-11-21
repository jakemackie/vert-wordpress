<!DOCTYPE html>
<html lang="en" dir="ltr" class="antialiased scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body class="min-h-screen">

    <?php 
        get_template_part(
            slug: "template-parts/header/template-part",
            name: "header"
        ); 
    ?>

    <main id="main" class="flex-1" role="main">