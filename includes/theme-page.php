<?php
function family_grows_theme_page_setup() {
    add_theme_page(esc_html__('Family Grows WordPress Theme', 'family-grows'), esc_html__('Family Grows', 'family-grows'), 'edit_theme_options', 'family-grows-theme-page', 'family_grows_theme_page_options_setup' );
}
add_action('admin_menu', 'family_grows_theme_page_setup');
 
function family_grows_theme_page_options_setup() { ?>
    <h1><?php esc_html_e('Family Grows', 'family-grows'); ?></h1>
    <h2><?php esc_html_e('Introduction', 'family-grows'); ?></h2>
    <p>
        <?php esc_html_e('Welcome and thanks for using the Family Grows WordPress theme. Here you will find some information about the theme and how to setup the theme properly.', 'family-grows'); ?>
    </p>
    <h2><?php esc_html_e('Plugin Recommendation'); ?></h2>
    <p>
        <?php esc_html_e('Here are some recommendations that I think it would be suited for when using this theme', 'family-grows'); ?>
    </p>
    <ul>
        <li>
            <a href="<?php esc_url('https://wordpress.org/plugins/regenerate-thumbnails/'); ?>" target="_blank"><?php esc_html_e('Regenerate Thumbnails', 'family-grows'); ?></a><br />
            <?php esc_html_e('This will resize the all thumbnails that is been used as part of this theme.', 'family-grows'); ?>
        </li>
        <li>
            <a href="<?php esc_url('https://wordpress.org/plugins/jetpack/'); ?>" target="_blank"><?php esc_html_e('Jetpack by WordPress.com', 'family-grows'); ?></a><br />
            <?php esc_html_e('It is definitely recomemended to use Jetpack because this theme supports responsive-videos by Jetpack.', 'family-grows'); ?>
        </li>
    </ul>
<?php } 