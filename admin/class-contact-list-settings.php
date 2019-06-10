<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.matheusdelima.com/
 * @since      1.0.0
 *
 * @package    Contact_List
 * @subpackage Contact_List/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines and create page for Settings of Plugin
 *
 * @package    Contact_List
 * @subpackage Contact_List/admin
 * @author     Matheus de Lima <matheusdelimagomes@gmail.com>
 */

class Contact_List_Settings
{
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->options = get_option( 'my_option_name' );
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }


    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        add_options_page(
            'Contact List Settings',
            'Contact List Settings',
            'manage_options',
            $this->plugin_name,
            array( $this, 'create_admin_page' )
        );
    }


    /**
     * Options page callback
     */
    public function create_admin_page()
    {
    ?>

        <div class="wrap">
            <h1><?php echo ucfirst(str_replace('-',' ', $this->plugin_name)); ?> - Settings</h1>
            <form method="post" action="options.php">
                <?php
                    // This prints out all hidden setting fields
                    settings_fields( 'my_option_group' );
                    do_settings_sections( $this->plugin_name );
                    submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {

        register_setting(
            'my_option_group', // Option group
            'my_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'googleMapsApiKey', // ID
            'Your Google Maps Key', // Title
            array( $this, 'googleMapsApiKey_callback' ), // Callback
            $this->plugin_name // Page
        );


    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        return filter_var ( $input['googleMapsApiKey'], FILTER_SANITIZE_STRING);
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function googleMapsApiKey_callback()
    {
        printf(
            '<input type="text" id="googleMapsApiKey" name="my_option_name[googleMapsApiKey]" value="%s" />',
            isset( $this->options ) ? esc_attr( $this->options) : ''
        );
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }



}