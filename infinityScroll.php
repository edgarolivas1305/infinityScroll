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
    $bloque_newsLetter = get_field('news_letter','option');
    
    // SET GLOBAL THE CURRENT POST
    global $post;
    $post = get_post($post_id);
    
    // GET PREVIOUS POST - BY THE CURRENT ID
    $previous_post = get_previous_post();
    
    // SET RETURN VARIABLE
    $data = array();

    $mypost = get_post($previous_post->ID);

    // SET THE RETURN TEMPLATE
    $templateHTML = '
            <div class="post_add_infinity">
                <div class="grid-container contenedor_master generic_data single-data" >
                    <div class="grid-x grid-padding-x">
                        <div class="small-12 medium-8 cell content_post">
                            <img class="top_image small show-for-small-only" src="'.get_the_post_thumbnail_url($previous_post->ID).'" alt="">
                            <p class="category-style"><?php //the_category();?></p>
                            <h1 class="entry-title">'.get_the_title($previous_post->ID).'</h1>
                            <div class="ad">
                                <div class="autor-style autor">Por: <span>'.the_author_firstname(  )." ".the_author_lastname(  ).'</span></div>
                                <div class="fecha-pub-container">
                                    <i class="far fa-clock"></i>
                                    <span class="fecha-pub">'.get_the_date('M. d', $previous_post->ID).'</span>
                                </div>
                            </div>             
                        </div>
                        <div class="small-12 medium-8 cell contenido_left">
                            <div class="content-single">
                            
                                <img class="top_image hide-for-small-only" src="'.get_the_post_thumbnail_url($previous_post->ID).'" alt="">

                                <div class="socials_share show-for-small-only">
                                    <p>Compartir:</p>
                                    <ul class="menu">
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>
                                </div>

                                '.apply_filters('the_content',$mypost->post_content).'

                                <?php 
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) {
                                    //comments_template();
                                }                
                                ?>

                            </div>

                            <div class="category-style">ARTÍCULOS RELACIONADOS</div>

                        </div>
                        <div class="small-12 medium-4 cell contenido_right">
                            <!-- COMPONENTE LATERAL QUE SE REPITE EN TODO EL SITIO -->
                        </div>
                    </div>
                </div>

                <div class="grid-container componente-newsletter">
                    <div class="grid-x grid-padding-x">
                        <div class="small-12 large-5 medium-8 cell">
                            <div class="contenedor">
                                <h2>'.$bloque_newsLetter['field_newsletter_titulo'].'</h2>
                                <p>'.$bloque_newsLetter['field_newsletter_descripcion'].'</p>
                                <form action="" method="post">
                                    <div class="contenido-mail grid-x">
                                        <input  class="cell small-12 medium-6 large-6" type="email"  value="" placeholder="Email">
                                        <input  class="cell small-12 medium-6 large-6" type="submit" value="Enviar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
    
    ';

    // SET THE DATA OF THE RETURN DATA
    $data['template'] = $templateHTML;
    $data['url'] = get_the_permalink($previous_post->ID);
    $data['title'] = get_the_title($previous_post->ID);
    $data['id_pt'] = $previous_post->ID;

    // PARSE TO JSON
    header("Content-type: application/json");
    print_r(json_encode($data));
    
    // KILL THE FUNCTION, THIS PREVENT THE 0 ON THE RETURN
    die();
}



?>