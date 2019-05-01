<?php
/**
 * Plugin Name: Add Publici oEmbed Provider
 */

// Register oEmbed providers
function add_publici_oembed_provider() {
    // second argument is a dummy value
    wp_oembed_add_provider( 'https://apps.publicintegrity.org/*', 'https://apps.publicintegrity.org/oembed/' );
}

add_action( 'init', 'add_publici_oembed_provider' );

function fetch_publici_oembed_url($provider, $url, $args = '') {
    if (strpos($provider, 'publicintegrity.org') !== false) {
        $wp_oembed = new WP_oEmbed();
        return $wp_oembed->discover( $url );
    }

    return $provider;
}

add_filter( 'oembed_fetch_url', 'fetch_publici_oembed_url', 10, 3 );

?>
