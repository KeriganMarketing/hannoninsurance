<?php
/**
 * Team class
 */

class Team {

    public $postObject;

    /**
     * Team constructor.
     */
    function __construct() {

    }

    function set_var($var ,$new_val) {

        $this->{$var} = $new_val;

    }

    function get_var($var) {

        return $this->{$var};

    }

    /**
     * @return null
     */
    public function createPostType() {

        $this->postObject = new Custom_Post_Type(
            'Team Member',
            array(
                'supports'           => array( 'title', 'editor', 'revisions' ),
                'menu_icon'          => 'dashicons-groups',
                'hierarchical'       => true,
                'has_archive'        => false,
                'menu_position'      => null,
                'public'             => true,
                'publicly_queryable' => true,
                'rewrite'            => array( 'slug' => 'team', 'with_front' => false ),
                'labels'             => array(
                    'menu_name' => _x( 'Team', 'admin menu' ),
                )
            )
        );

        $this->postObject->add_meta_box(
            'Member Info',
            array(
                'AKA'     => 'text',
                'Title'   => 'text',
                'Photo'   => 'image',
                'Email'   => 'text',
                'Website' => 'text',
                'Phone'   => 'text',
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

        $this->postObject->add_taxonomy( 'Department' );

    }

    /**
     * @return null
     */
    public function createAdminColumns() {

        function team_edit_columns( $columns ) {
            $columns = array(
                "cb"                => '<input type="checkbox" />',
                "member_info_photo" => "Photo",
                "title"             => "Name",
                "member_info_title" => "Title",
                "member_info_email" => "Email",
                "member_department" => "Department",
                "id"                => "ID",
            );

            return $columns;
        }

        function team_custom_columns( $column ) {

            global $post;

            switch ( $column ) {

                case "member_department":
                    $teamcats      = get_the_terms( $post->ID, "department" );
                    $teamcats_html = array();
                    if ( $teamcats ) {
                        foreach ( $teamcats as $teamcat ) {
                            array_push( $teamcats_html, $teamcat->name );
                        }
                        echo implode( $teamcats_html, ", " );
                    }
                    break;

                case "member_info_title":
                    echo ( isset( $post->member_info_title ) ? $post->member_info_title : null );
                    break;

                case "member_info_email":
                    echo ( isset( $post->member_info_email ) ? $post->member_info_email : null );
                    break;

                case "member_info_photo":
                    $teamphoto = ( isset( $post->member_info_photo ) ? $post->member_info_photo : null );
                    if ( $teamphoto != '' ) {
                        echo '<div><img src="' . $teamphoto . '" alt="" width="150" /></div>';
                    }
                    break;

                case "id":
                    echo $post->ID;
                    break;

            }
        }

        add_filter( 'manage_edit-team_member_columns', 'team_edit_columns' );
        add_action( 'manage_team_member_posts_custom_column', 'team_custom_columns' );

    }

    /**
     * @param $category
     * @return $teamArray
     */
    public function getTeam( $category = '' ) {

        $request = array(
            'posts_per_page' => - 1,
            'offset'         => 0,
            'order'          => 'ASC',
            'orderby'        => 'menu_order',
            'post_type'      => 'team_member',
            'post_status'    => 'publish',
        );

        if ( $category != '' ) {
            $categoryarray        = array(
                array(
                    'taxonomy'         => 'department',
                    'field'            => 'slug',
                    'terms'            => $category,
                    'include_children' => false,
                ),
            );
            $request['tax_query'] = $categoryarray;
        }

        $team      = get_posts( $request );
        $teamArray = array();

        foreach ( $team as $member ) {

            $memberTerms      = wp_get_object_terms( $member->ID, 'office' );
            $memberCategories = array();
            foreach ( $memberTerms as $term ) {
                array_push( $memberCategories, array(
                        'category-id'   => ( isset( $term->term_id ) ? $term->term_id : null ),
                        'category-name' => ( isset( $term->name ) ? $term->name : null ),
                        'category-slug' => ( isset( $term->slug ) ? $term->slug : null ),
                    )
                );
            }

            array_push( $teamArray, array(
                'id'         => ( isset( $member->ID ) ? $member->ID : null ),
                'name'       => ( isset( $member->post_title ) ? $member->post_title : null ),
                'aka'        => ( isset( $member->member_info_aka ) ? $member->member_info_aka : null ),
                'title'      => ( isset( $member->member_info_title ) ? $member->member_info_title : null ),
                'email'      => ( isset( $member->member_info_email ) ? $member->member_info_email : null ),
                'website'    => ( isset( $member->member_info_website ) ? $member->member_info_website : null ),
                'phone'      => ( isset( $member->member_info_phone ) ? $member->member_info_phone : null ),
                'slug'       => ( isset( $member->post_name ) ? $member->post_name : null ),
                'thumbnail'  => ( isset( $member->member_info_photo ) ? $member->member_info_photo : null ),
                'link'       => get_permalink( $member->ID ),
                'bio'        => apply_filters( 'the_content', $member->post_content ),
                'social'     => array(
                    'facebook'    => ( isset( $member->social_media_info_facebook ) ? $member->social_media_info_facebook : null ),
                    'twitter'     => ( isset( $member->social_media_info_twitter ) ? $member->social_media_info_twitter : null ),
                    'linkedin'    => ( isset( $member->social_media_info_linkedin ) ? $member->social_media_info_linkedin : null ),
                    'instagram'   => ( isset( $member->social_media_info_instagram ) ? $member->social_media_info_instagram : null ),
                    'youtube'     => ( isset( $member->social_media_info_youtube ) ? $member->social_media_info_youtube : null ),
                    'google_plus' => ( isset( $member->social_media_info_google ) ? $member->social_media_info_google : null ),
                ),
                'categories' => $memberCategories
            ) );

        }

        return $teamArray;

    }

    /**
     * @return null
     */
    public function createShortcode(){

        function getteam_func( $atts, $content = null ) {

            $a = shortcode_atts( array(
                'category' => '',
                'truncate' => 0,
                'format'   => 'list' //TODO: Add other formats
            ), $atts );

            $team = Team::getTeam( $a['category'] );

            $output = '<div class="team ' . $a['format'] . '" >';

            foreach($team as $member){

                $output .= '<div class="team-member" >';
                $output .= '<div class="row" >';
                if($member['thumbnail']){
                    $output .= '<div class="team-member-image col-md-3"><img src="'.$member['thumbnail'].'" alt="'.$member['name'].'" class="img-fluid" /></div>';
                }
                $output .= '<div class="team-member-content col-md-9"><h2 class="team-headline">'.$member['name']. ( $member['aka']!='' ? '<span class="aka">'.$member['aka'].'</span>' : '' ) .'</h2>';
                if($member['title']){ $output .= '<p class="team-title">'.$member['title'].'</p>'; }
                if($member['email']){ $output .= '<p class="team-email"><a href="mailto:'.$member['email'].'" >'.$member['email'].'</a></p>'; }

                if($member['bio']){
                    if(mb_strlen(strip_tags($member['bio'])) > intval($a['truncate']) && intval($a['truncate']) > 0){
                        $member['bio'] = shortenbio($member['bio'], intval($a['truncate']), '&hellip; <a href="'.$member['link'].'" >Read more.</a>');
                    }
                    $output .= '<p class="team-description">'.$member['bio'].'</p>';
                }
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';

            }

            $output .= '</div>';

            return $output;

        }
        add_shortcode( 'team', 'getteam_func' );

    }

}