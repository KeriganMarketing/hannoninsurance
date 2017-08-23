<?php
/**
 * Created by PhpStorm.
 * User: Bryan
 * Date: 8/10/2017
 * Time: 1:46 PM
 */

class BusinessListings {

    public $postObject;

    /**
     * Listings constructor.
     */
    function __construct() {

    }

    function set_var( $var, $new_val ) {

        $this->{$var} = $new_val;

    }

    function get_var( $var ) {

        return $this->{$var};

    }

    /**
     * @return null
     */
    public function createPostType() {

        $this->postObject = new Custom_Post_Type(
            'Listing',
            array(
                'supports'           => array( 'title', 'editor', 'revisions' ),
                'menu_icon'          => 'dashicons-id',
                'hierarchical'       => true,
                'has_archive'        => false,
                'menu_position'      => null,
                'public'             => true,
                'publicly_queryable' => true,
                'rewrite'            => array( 'slug' => 'team', 'with_front' => false ),
                'labels'             => array(
                    'menu_name' => _x( 'Companies', 'admin menu' ),
                )
            )
        );

        $this->postObject->add_meta_box(
            'Listing Info',
            array(
                'Photo'   => 'image',
                'Address' => 'longtext',
                'Phone'   => 'text',
                'Claims'  => 'text',
                'Email'   => 'text',
                'Website' => 'text'
            )
        );

        $this->postObject->add_meta_box(
            'Social Media Info',
            array(
                'Facebook'    => 'text',
                'Twitter'     => 'text',
                'LinkedIn'    => 'text',
                'Instagram'   => 'text',
                'YouTube'     => 'text',
                'Google Plus' => 'text'
            )
        );

        $this->postObject->add_taxonomy( 'Listing Type' );

    }

    /**
     * @return null
     */
    public function createAdminColumns() {

        function listings_edit_columns( $columns ) {
            $columns = array(
                "cb"                   => '<input type="checkbox" />',
                "title"                => "Name",
                "listing_info_address" => "Address",
                "listing_info_phone"   => "Service",
                "listing_info_claims"  => "Claims",
                "listing_info_email"   => "Email",
                "listing_info_website" => "Website",
                "company_type"         => "Type",
                "id"                   => "ID",
            );

            return $columns;
        }

        function listings_custom_columns( $column ) {

            global $post;

            switch ( $column ) {

                case "company_type":
                    $cats      = get_the_terms( $post->ID, "listing_type" );
                    $cats_html = array();
                    if ( $cats ) {
                        foreach ( $cats as $cat ) {
                            array_push( $cats_html, $cat->name );
                        }
                        echo implode( $cats_html, ", " );
                    }
                    break;

                case "listing_info_address":
                    echo( isset( $post->listing_info_address ) ? $post->listing_info_address : null );
                    break;

                case "listing_info_phone":
                    echo( isset( $post->listing_info_phone ) ? $post->listing_info_phone : null );
                    break;

                case "listing_info_claims":
                    echo( isset( $post->listing_info_claims ) ? $post->listing_info_claims : null );
                    break;

                case "listing_info_email":
                    echo( isset( $post->listing_info_email ) ? $post->listing_info_email : null );
                    break;

                case "listing_info_website":
                    echo( isset( $post->listing_info_website ) ? $post->listing_info_website : null );
                    break;

                case "id":
                    echo $post->ID;
                    break;

            }
        }

        add_filter( 'manage_edit-listing_columns', 'listings_edit_columns' );
        add_action( 'manage_listing_posts_custom_column', 'listings_custom_columns' );

    }

    /**
     * @param $category
     *
     * @return $listingArray
     */
    public function getListings( $category = '' ) {

        $request = array(
            'posts_per_page' => - 1,
            'offset'         => 0,
            'order'          => 'ASC',
            'orderby'        => 'menu_order',
            'post_type'      => 'listing',
            'post_status'    => 'publish',
        );

        if ( $category != '' ) {
            $categoryarray        = array(
                array(
                    'taxonomy'         => 'listing_type',
                    'field'            => 'slug',
                    'terms'            => $category,
                    'include_children' => false,
                ),
            );
            $request['tax_query'] = $categoryarray;
        }

        $listings      = get_posts( $request );
        $listingsArray = array();

        foreach ( $listings as $listing ) {

            $terms      = wp_get_object_terms( $listing->ID, 'listing_type' );
            $categories = array();
            foreach ( $terms as $term ) {
                array_push( $categories, array(
                        'category-id'   => ( isset( $term->term_id ) ? $term->term_id : null ),
                        'category-name' => ( isset( $term->name ) ? $term->name : null ),
                        'category-slug' => ( isset( $term->slug ) ? $term->slug : null ),
                    )
                );
            }

            array_push( $listingsArray, array(
                'id'         => ( isset( $listing->ID ) ? $listing->ID : null ),
                'name'       => ( isset( $listing->post_title ) ? $listing->post_title : null ),
                'address'    => ( isset( $listing->listing_info_address ) ? $listing->listing_info_address : null ),
                'email'      => ( isset( $listing->listing_info_email ) ? $listing->listing_info_email : null ),
                'website'    => ( isset( $listing->listing_info_website ) ? $listing->listing_info_website : null ),
                'phone'      => ( isset( $listing->listing_info_phone ) ? $listing->listing_info_phone : null ),
                'claims'     => ( isset( $listing->listing_info_claims ) ? $listing->listing_info_claims : null ),
                'slug'       => ( isset( $listing->post_name ) ? $listing->post_name : null ),
                'thumbnail'  => ( isset( $listing->listing_info_photo ) ? $listing->listing_info_photo : null ),
                'link'       => get_permalink( $listing->ID ),
                'description'=> apply_filters( 'the_content', $listing->post_content ),
                'social'     => array(
                    'facebook'    => ( isset( $listing->social_media_info_facebook ) ? $listing->social_media_info_facebook : null ),
                    'twitter'     => ( isset( $listing->social_media_info_twitter ) ? $listing->social_media_info_twitter : null ),
                    'linkedin'    => ( isset( $listing->social_media_info_linkedin ) ? $listing->social_media_info_linkedin : null ),
                    'instagram'   => ( isset( $listing->social_media_info_instagram ) ? $listing->social_media_info_instagram : null ),
                    'youtube'     => ( isset( $listing->social_media_info_youtube ) ? $listing->social_media_info_youtube : null ),
                    'google_plus' => ( isset( $listing->social_media_info_google ) ? $listing->social_media_info_google : null ),
                ),
                'categories' => $categories
            ) );

        }

        return $listingsArray;

    }

    /**
     * @return null
     */
    public function createShortcode(){

        function companies_func( $atts, $content = null ) {

            $a = shortcode_atts( array(
                'category' => '',
                'truncate' => 0,
                'format'   => 'list' //TODO: Add other formats
            ), $atts );

            $listings = BusinessListings::getListings( $a['category'] );

            $output = '<div class="business-listings ' . $a['format'] . '" >';

            foreach($listings as $listing){

                $output .= '<div class="business-listing" >';
                $output .= '<div class="row justify-content-center align-items-center" >';
                if($listing['thumbnail']){
                    $output .= '<div class="business-listing-image col-md-4 text-center"><img src="'.$listing['thumbnail'].'" alt="'.$listing['name'].'" class="img-fluid" /></div>';
                }
                $output .= '<div class="col-md-3 text-center">';
                if($listing['phone']){ $output .= '<p class="business-listing-phone"><span class="listing-label">service:</span><a href="tel:'.$listing['phone'].'" >'.$listing['phone'].'</a></p>'; }
                $output .= '</div>';
                $output .= '<div class="col-md-3 text-center">';
                if($listing['claims']){ $output .= '<p class="business-listing-claims"><span class="listing-label">claims:</span><a href="tel:'.$listing['claims'].'" >'.$listing['claims'].'</a></p>'; }
                $output .= '</div>';
                $output .= '<div class="col-md-2 text-center">';
                if($listing['website']){ $output .= '<p class="visit-website"><a class="btn btn-sm btn-info" href="'.$listing['website'].'" target="_blank">visit website</a></p>'; }
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';

            }

            $output .= '</div>';

            return $output;

        }
        add_shortcode( 'companies', 'companies_func' );

    }

}