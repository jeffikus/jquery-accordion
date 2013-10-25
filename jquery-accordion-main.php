<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * jQuery Accordion Main Class
 *
 * All functionality pertaining to the jQuery Accordion.
 *
 * @package WordPress
 * @subpackage jQuery Accordion
 * @category Frontend
 * @author Jeffikus
 * @since 1.0.0
 *
 * TABLE OF CONTENTS
 *
 * - __construct()
 * - init()
 * - enqueue_scripts()
 * - enqueue_styles()
 * - accordion_shortcode
 */
class jQuery_Accordion_Main {
	public $token;
	public $plugin_url;
	public $version;

	/**
	 * Constructor.
	 * @since  1.0.0
	 * @return  void
	 */
	public function __construct ( $file ) {

		// Class variables
        $this->token = 'jquery-accordion';
		$this->plugin_url = trailingslashit( plugins_url( '', $file ) );

        // Actions & filters
		add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_styles' ) );
    	add_action( 'wp_enqueue_scripts', array( &$this, 'enqueue_scripts' ) );

	} // End __construct()

	/**
	 * Initialise the code.
	 * @since  1.0.0
	 * @return void
	 */
	public function init () {

        // Filters
        add_shortcode( 'accordion', array( &$this, 'accordion_shortcode' ) );

	} // End init()

	/**
     * Enqueue frontend JavaScripts.
     * @since  1.0.0
     * @return void
     */
    public function enqueue_scripts () {

        // Load the jQuery Accordion javascript
        wp_enqueue_script( $this->token . '-general' , $this->plugin_url . 'assets/js/general.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-accordion' ), '1.0.0', true );

    } // End enqueue_scripts()

    /**
     * Enqueue frontend CSS files.
     * @since  1.0.0
     * @return void
     */
    public function enqueue_styles () {

        // Load the jQuery Accordion frontend CSS
        wp_register_style( $this->token . '-frontend', $this->plugin_url . 'assets/css/frontend.css', '', '1.0.0', 'screen' );
        wp_enqueue_style( $this->token . '-frontend' );

        // Load the jQuery UI theme
        wp_register_style( $this->token . '-smoothness', $this->plugin_url . 'assets/themes/smoothness/jquery-ui-1.10.3.custom.min.css', '', '1.10.3', 'screen' );
        wp_enqueue_style( $this->token . '-smoothness' );

    } // End enqueue_styles()

    /**
     * Shortcode output function for use in the editor.
     * @since  1.0.0
     * @return output
     */
    public function accordion_shortcode() {
        extract( shortcode_atts( array(
          'amount' => '3',
          'category' => array()
        ), $atts ) );

        // The Query
        $query_args['posts_per_page'] = $atts['amount'];
        $the_query = new WP_Query($query_args);

        // Build Output
        if ($the_query->have_posts()) {

            $count = 0;

            $result = '<div id="jquery-accordion-container">';

            while ($the_query->have_posts()) {

                $the_query->the_post();

                $result .= '<h3>' . get_the_title() . '</h3>';

                $result .= '<div>' . get_the_excerpt() . '</div>';

            } // End While Loop

            $result .= '</div>';

        } // End If Statement

        wp_reset_postdata();

        return $result;

    } // End accordion_shortcode()

} // End jQuery_Accordion_Main

