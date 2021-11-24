<?php
/*------------------------------------------------------------------------------------------------------------------*/
/* Action links for plugin header on the plugins.php page
/*------------------------------------------------------------------------------------------------------------------*/
function dustrial_plugin_action_links( $links ) {
    $links = array_merge( array(
        '<a href="' . esc_url( admin_url( '/admin.php?page=dustrial' ) ) . '">' . __( 'Settings', 'dustrial' ) . '</a>'
    ), $links );
    return $links;
}


/*------------------------------------------------------------------------------------------------------------------*/
/* Action links for plugin footer on the plugins.php page
/*------------------------------------------------------------------------------------------------------------------*/
function custom_plugin_row_meta( $links, $file ) {

    if ( strpos( $file, 'dustrial-master.php' ) !== false ) {
        $new_links = array(
            'sup' => '<a href="' . esc_url( 'https://ifingerstudio.com/contact-us') .'" target="_blank">' . __( 'Support', 'dustrial' ) . '</a>',
            'doc' => '<a href="' . esc_url( 'https://ifingerstudio.com/documentation' ) . '" target="_blank">' . __( 'Documentation', 'dustrial' ) . '</a>'
        );
        
        $links = array_merge( $links, $new_links );
    }
    return $links;
}