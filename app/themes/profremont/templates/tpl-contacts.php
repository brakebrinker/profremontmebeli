<?php 
/*
Template Name: Шаблон Контакты
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
<div class="content contacts">

      <div class="breadcrumbs"><a href="#">Главная страница</a> / <a href="#">Подбор материала</a></div>
    <?php while ( have_posts() ) : the_post(); ?>
           <h2><?php the_title(); ?></h2>
           <div class="content-subtitle">
                <?php echo get_field('contacts_subtitle', get_the_ID()); ?>
           </div>

           <div class="contact-page_tab container">
               <!-- Nav tabs -->
               <ul class="nav nav-tabs" role="tablist">
                 <li class="nav-item active">
                   <a class="nav-link" data-toggle="tab" href="#Moscow" role="tab">Москва</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" data-toggle="tab" href="#Petersburg" role="tab">Санкт-Петербург</a>
                 </li> 
               </ul>
               <!-- Tab panes -->
               <div class="tab-content">
                   <div class="tab-pane active" id="Moscow" role="tabpanel">
                       <div class="contact-page-phone left">
                         <div class="address">
                           <p>
                             <span><?php echo get_field('contacts_msk_phone', get_the_id()); ?></span>
                             <?php echo get_field('contacts_msk_address', get_the_ID()); ?>
                           </p>
                           <a href="mailto:<?php echo get_field('contacts_spb_email', get_the_ID()); ?>" class="mail-link"><?php echo get_field('contacts_msk_email', get_the_ID()); ?></a>
                           <p>
                             Также вы можете написать и скинуть нам  фотографии для оценки ремонта в Whatsapp и Viber:
                             <span><?php echo get_field('contacts_msk_phone', get_the_id()); ?></span> 
                           </p>
                         </div>

                         <?php the_content(); ?>
                       </div>
                       <div class="contact-page-map right">
                            <?php 

                            $location_msk = get_field('contacts_msk_map', get_the_id());

                            if( !empty($location_msk) ):
                            ?>
                            <div class="contact_page_tab_maps">
                                <div class="acf-map">
                                    <div class="marker" data-lat="<?php echo $location_msk['lat']; ?>" data-lng="<?php echo $location_msk['lng']; ?>"></div>
                                </div>
                            </div>
                            <?php endif; ?>

                           <div class="contact_page_tab_write">
                             <h3>Напишите нам</h3>
                             <?php
                               echo do_shortcode('[contact-form-7 id="86" title="Контактная форма Напишите нам"]'); 
                             ?>
                           </div>

                       </div>
                       
                   </div>

                 <div class="tab-pane" id="Petersburg" role="tabpanel">
                   <div class="contact-page-phone left">
                     <div class="address">
                       <p>
                         <span><?php echo get_field('contacts_spb_phone', get_the_id()); ?></span>
                         <?php echo get_field('contacts_spb_address', get_the_ID()); ?>
                       </p>
                       <a href="mailto:<?php echo get_field('contacts_spb_email', get_the_ID()); ?>" class="mail-link"><?php echo get_field('contacts_spb_email', get_the_ID()); ?></a>
                       <p>
                         Также вы можете написать и скинуть нам  фотографии для оценки ремонта в Whatsapp и Viber:
                         <span><?php echo get_field('contacts_spb_phone', get_the_id()); ?></span> 
                       </p>
                     </div>

                     <?php the_content(); ?>
                   </div>
                   <div class="contact-page-map right">
                        <?php 

                        $location_spb = get_field('contacts_spb_map', get_the_id());

                        if( !empty($location_spb) ):
                        ?>
                        <div class="contact_page_tab_maps">
                            <div class="acf-map">
                                <div class="marker" data-lat="<?php echo $location_spb['lat']; ?>" data-lng="<?php echo $location_spb['lng']; ?>"></div>
                            </div>
                        </div>
                        <?php endif; ?>

                       <div class="contact_page_tab_write">
                         <h3>Напишите нам</h3>
                         <?php
                           echo do_shortcode('[contact-form-7 id="86" title="Контактная форма Напишите нам"]'); 
                         ?>
                       </div>

                   </div>
                 </div>
                 <script>
                   jQuery(document).ready(function($) {
                      $('.group').on('focus', 'input', function() {
                        $('.group').removeClass('active');
                        $(this).closest('.group').addClass('active');
                      });
                   });
                 </script>
                 <style>
                     .acf-map {
                        width: 100%;
                        height: 470px;
                        border: #ccc solid 1px;
                        margin: 20px 0;
                     }

                     /* fixes potential theme css conflict */
                     .acf-map img {
                        max-width: inherit !important;
                     }
                 </style>
                 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzbQxSvs_cxRpIhr9jq7iMSL5xQp6W3xQ"></script>
                 <script>
                     (function($) {

                     /*
                     *  new_map
                     *
                     *  This function will render a Google Map onto the selected jQuery element
                     *
                     *  @type   function
                     *  @date   8/11/2013
                     *  @since  4.3.0
                     *
                     *  @param  $el (jQuery element)
                     *  @return n/a
                     */

                     function new_map( $el ) {
                        
                        // var
                        var $markers = $el.find('.marker');
                        
                        
                        // vars
                        var args = {
                            zoom        : 16,
                            center      : new google.maps.LatLng(0, 0),
                            mapTypeId   : google.maps.MapTypeId.ROADMAP
                        };
                        
                        
                        // create map               
                        var map = new google.maps.Map( $el[0], args);
                        
                        
                        // add a markers reference
                        map.markers = [];
                        
                        
                        // add markers
                        $markers.each(function(){
                            
                            add_marker( $(this), map );
                            
                        });
                        
                        
                        // center map
                        center_map( map );
                        
                        
                        // return
                        return map;
                        
                     }

                     /*
                     *  add_marker
                     *
                     *  This function will add a marker to the selected Google Map
                     *
                     *  @type   function
                     *  @date   8/11/2013
                     *  @since  4.3.0
                     *
                     *  @param  $marker (jQuery element)
                     *  @param  map (Google Map object)
                     *  @return n/a
                     */

                     function add_marker( $marker, map ) {

                        // var
                        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

                        // create marker
                        var marker = new google.maps.Marker({
                            position    : latlng,
                            map         : map
                        });

                        // add to array
                        map.markers.push( marker );

                        // if marker contains HTML, add it to an infoWindow
                        if( $marker.html() )
                        {
                            // create info window
                            var infowindow = new google.maps.InfoWindow({
                                content     : $marker.html()
                            });

                            // show info window when marker is clicked
                            google.maps.event.addListener(marker, 'click', function() {

                                infowindow.open( map, marker );

                            });
                        }

                     }

                     /*
                     *  center_map
                     *
                     *  This function will center the map, showing all markers attached to this map
                     *
                     *  @type   function
                     *  @date   8/11/2013
                     *  @since  4.3.0
                     *
                     *  @param  map (Google Map object)
                     *  @return n/a
                     */

                     function center_map( map ) {

                        // vars
                        var bounds = new google.maps.LatLngBounds();

                        // loop through all markers and create bounds
                        $.each( map.markers, function( i, marker ){

                            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

                            bounds.extend( latlng );

                        });

                        // only 1 marker?
                        if( map.markers.length == 1 )
                        {
                            // set center of map
                            map.setCenter( bounds.getCenter() );
                            map.setZoom( 16 );
                        }
                        else
                        {
                            // fit to bounds
                            map.fitBounds( bounds );
                        }

                     }

                     /*
                     *  document ready
                     *
                     *  This function will render each map when the document is ready (page has loaded)
                     *
                     *  @type   function
                     *  @date   8/11/2013
                     *  @since  5.0.0
                     *
                     *  @param  n/a
                     *  @return n/a
                     */
                     // global var
                     var map = null;

                     $(document).ready(function(){

                        $('.acf-map').each(function(){

                            // create map
                            map = new_map( $(this) );

                        });

                     });

                     })(jQuery);

                 </script>

               </div> 
           </div>    
    <?php endwhile; // End of the loop. ?>
</div>
<?php endif; ?>
<?php get_footer(); ?>
