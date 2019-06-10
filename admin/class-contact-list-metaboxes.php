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
 * Defines and register the Metaboxes
 *
 * @package    Contact_List
 * @subpackage Contact_List/admin
 * @author     Matheus de Lima <matheusdelimagomes@gmail.com>
 */

class Contact_list_Metaboxes
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
     * Google API KEY FOR MAPS
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $googleAPIKEY    Google API KEY FOR MAPS
     */
    protected $googleAPIKEY = '';


    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     * @param      string    $googleMapsKey    The Google Maps KEY
     */
    public function __construct( $plugin_name, $version , $googleMapsKey) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->setGoogleAPIKEY($googleMapsKey);
    }

    /**
     * This is method create and organize all fields for metabox.
     * @return array
     */
    public function getFormFields(){
        return array(
                    array(
                        'id'            => 'phone-number',
                        'name'          => 'Phone Number',
                        'type'          => 'number',
                        'field_width'   => '100%',
                    ),
                    array(
                        'id'                          => 'field-gmap',
                        'name'                        => 'Location',
                        'type'                        => 'gmap',
                        'google_api_key'              => $this->getGoogleAPIKEY(),
                        'field_width'                 => '100%',
                        'field_height'                => '250px',
                        'default_lat'                 => '51.5073509',
                        'default_long'                => '-0.12775829999998223',
                        'default_zoom'                => '8',
                        'string-marker-title'         => esc_html__( 'Drag to set the exact location', 'cmb' ),
                        'string-gmaps-api-not-loaded' => esc_html__( 'Google Maps API not loaded.', 'cmb' ),
                    ),
            );

    }

    /**
     * This is method register the metabox.
     * @return array
     */
    public function formBoxes(array $meta_boxes ){

        $meta_boxes[] = array(
            'title'      => 'Contact Details',
            'pages'      => $this->plugin_name,
            'context'    => 'normal',
            'priority'   => 'high',
            'fields'     => $this->getFormFields(),
        );

        return $meta_boxes;

    }

    /**
     * @return string
     */
    public function getGoogleAPIKEY()
    {
        return $this->googleAPIKEY;
    }

    /**
     * @param string $googleAPIKEY
     */
    public function setGoogleAPIKEY($googleAPIKEY)
    {
        $this->googleAPIKEY = $googleAPIKEY;
    }
}