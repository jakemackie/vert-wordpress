<?php

// Enqueue styles and scripts
require_once get_template_directory() . '/includes/enqueue-styles.php';

// Custom post types
require_once get_template_directory() . '/includes/custom-post-types.php';

// Filters
require_once get_template_directory() . '/includes/classes/class-block-classes.php';

// Actions
require_once get_template_directory() . '/includes/actions/actions-acf.php';

// Theme Functions
require_once get_template_directory() . '/includes/functions/theme-functions.php';
require_once get_template_directory() . '/includes/functions/theme-functions-blocks.php';

// Block Classes
require_once get_template_directory() . '/includes/classes/class-block-classes.php';
