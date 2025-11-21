<!DOCTYPE html>
<html lang="en" dir="ltr" class="antialiased scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class("min-h-screen flex flex-col bg-zinc-950 text-white"); ?>>
    <?php 
        get_template_part(
            slug: 'components/header/template-part',
            name: 'navbar'
        ); 
    ?>
    <main id="main" class="flex-1" role="main">