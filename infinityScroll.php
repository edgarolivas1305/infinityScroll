<?php
/**
 * infinityScroll.php
 *
 * wordpress and jquery add-on - Ininify Scroll
 *
 * @category   Infinity Scroll - Add Wordpress
 * @package    InfinityScroll
 * @author     Edgar Olivas Guzman (TankDesing)
 * @copyright  2019 Edgar Olivas Guzman
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 * @version    1.0.0
 * @link       https://github.com/edgarolivas1305/infinityScroll
 * @since      File available since Release 1.0.0
 * @deprecated File deprecated in Release 1.0.0
 */

function get_post_infinite(){
    // GET THE CURRENT POST ID
    $post_id = $_POST['data_id'];
    
    // SET GLOBAL THE CURRENT POST
    global $post;
    $post = get_post($post_id);
    
    // GET PREVIOUS POST - BY THE CURRENT ID
    $previous_post = get_previous_post();
    
    // SET RETURN VARIABLE
    $data = array();

    // SET THE RETURN TEMPLATE
    $templateHTML = 

    // SET THE DATA OF THE RETURN DATA
    $data['template'] = $templateHTML;
    $data['url'] = get_the_permalink($previous_post->ID);
    $data['title'] = get_the_title($previous_post->ID);

    // PARSE TO JSON
    header("Content-type: application/json");
    print_r(json_encode($data));
    
    // KILL THE FUNCTION, THIS PREVENT THE 0 ON THE RETURN
    die();
}



?>