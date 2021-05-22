<div id="menu-overlay">
    <img src="<?= get_template_directory_uri() ?>/img/back.svg" alt="Back" id="closesesame">

    <div id="m-o-inner" class="lgcont">
        <?php
        wp_nav_menu( array(
            'menu'              => "main", // (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
            'menu_class'        => "nav-menu", // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
            'items_wrap'        => '<ul id="%1$s" class="nav-menu-item">%3$s</ul>', // (string) How the list items should be wrapped. Default is a ul with an id and class. Uses printf() format with numbered placeholders.
        ) );
        ?>
    </div>

</div>