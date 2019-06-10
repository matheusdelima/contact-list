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
 * Defines and register the Custom Post Type
 *
 * @package    Contact_List
 * @subpackage Contact_List/admin
 * @author     Matheus de Lima <matheusdelimagomes@gmail.com>
 */
class Contact_List_Generate_CPT
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
     * The Args for creating of Custom Post Type.
     *
     * @since    1.0.0
     * @access   protected
     * @var      array    $args    The Args for creating of Custom Post Type.
     */
    protected $args = array();


    /**
     * The Labels for fill of Custom Post Type.
     *
     * @since    1.0.0
     * @access   protected
     * @var      array    $labels    The Labels for Custom Post Type.
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

    /**
     * Register the Custom Post Type Contact List
     *
     * @since 1.0.1
     * @return void
     * @author Matheus de Lima Gomes
     *
     */
    public function init(){

        $this->labels = array(
            'name'                => _x( 'Contact List', 'Contact List'),
            'singular_name'       => _x( 'Contact', 'Contact List'),
            'menu_name'           => __( 'Contact List'),
            'parent_item_colon'   => __( 'Parent Contact List'),
            'all_items'           => __( 'All Contact List'),
            'view_item'           => __( 'View Contact'),
            'add_new_item'        => __( 'Add New Contact'),
            'add_new'             => __( 'Add Contact'),
            'edit_item'           => __( 'Edit Contact'),
            'update_item'         => __( 'Update Contact'),
            'search_items'        => __( 'Search Contact'),
            'not_found'           => __( 'Contact Not Found'),
            'not_found_in_trash'  => __( 'Not Found in the Recycle Bin'),
        );

        $this->args = array(
            'label'               => __( 'Contact List'),
            'labels'              => $this->labels,
            'supports'            => array('title','thumbnail'),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_icon'           => 'dashicons-groups',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
        );

        register_post_type( $this->plugin_name, $this->args );

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