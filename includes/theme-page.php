<?php
function family_grows_theme_page_setup() {
    add_theme_page(esc_html__('Family Grows WordPress Them', 'family-grows'), esc_html__('Family Grows', 'family-grows'), 'edit_theme_options', 'family-grows-theme-page', 'family_grows_theme_page_options_setup' );
}
add_action('admin_menu', 'family_grows_theme_page_setup');
 
function family_grows_theme_page_options_setup() { ?>
    <h1><?php esc_html_e('Family Grows', 'family-grows'); ?></h1>
    <h2><?php esc_html_e('Introduction', 'family-grows'); ?></h2>
    <p>
        <?php esc_html_e('Welcome and thanks for using the Family Grows WordPress theme. Here you will find some informationa about the theme and how to setup the theme properly.', 'family-grows'); ?>
    </p>
<?php } 