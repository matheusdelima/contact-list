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
 * Defines and register the Taxonomy
 *
 * @package    Contact_List
 * @subpackage Contact_List/admin
 * @author     Matheus de Lima <matheusdelimagomes@gmail.com>
 */
class Contact_List_Taxonomy
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
     * The Args for creating of Taxonomy
     *
     * @since    1.0.0
     * @access   protected
     * @var      array    $args    The Args for creating of Taxonomy
     */
    protected $args = array();


    /**
     * The Labels for fill of Taxonomy
     *
     * @since    1.0.0
     * @access   protected
     * @var      array    $labels    The Labels for Taxonomy
     */
    protected $labels = array();

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

    }

    public function init(){

        $this->setLabels(array(
            'name'              => _x( 'Contact Groups', 'Contact Groups', 'textdomain' ),
            'singular_name'     => _x( 'Contact Group', 'Contact Group', 'textdomain' ),
            'search_items'      => __( 'Search Groups', 'textdomain' ),
            'all_items'         => __( 'All Groups', 'textdomain' ),
            'parent_item'       => __( 'Parent Groups', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Groups:', 'textdomain' ),
            'edit_item'         => __( 'Edit Group', 'textdomain' ),
            'update_item'       => __( 'Update Group', 'textdomain' ),
            'add_new_item'      => __( 'Add New Group', 'textdomain' ),
            'new_item_name'     => __( 'New Group Name', 'textdomain' ),
            'menu_name'         => __( 'Contact Groups', 'textdomain' ),
        ));

        $this->setArgs(array(
            'hierarchical'      => true,
            'labels'            => $this->getLabels(),
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
        ));

        register_taxonomy( $this->plugin_name . '-groups', array( $this->plugin_name ), $this->getArgs() );

    }

    /**
     * @return array
     */
    public function getArgs()
    {
        return $this->args;
    }

    /**
     * @param array $args
     */
    public function setArgs($args)
    {
        $this->args = $args;
    }

    /**
     * @return array
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param array $labels
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;
    }


}