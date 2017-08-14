<?php
/**
 * Layouts class
 */
class Layouts {
	/**
	 * Layouts constructor.
	 */
	function __construct() {

	}

	/**
	 * @return null
	 */
	public function createPostType( ) {
		$page = new Custom_Post_Type('Page' );

		$page->add_meta_box(
			'Page Information',
			array(
				'Headline' 			=> 'text',
				'Subhead'           => 'text'
			)
		);

		$page->add_taxonomy( 'Layout', array(
			'hierarchical'      => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'format' ),
			'capabilities' => array(
				'manage_terms' => '',
				'edit_terms' => '',
				'delete_terms' => '',
				'assign_terms' => 'edit_posts'
			),
			'public' => true,
			'show_in_nav_menus' => false,
			'show_tagcloud' => false,
		) );

        $page->add_meta_box(
            'Sidebar content',
            array(
                'HTML' => 'wysiwyg',
            )
        );


	}

	/**
	 * @return null
	 */
	public function createDefaultFormats() {

        add_action( 'admin_menu', 'remove_taxonomy_meta_box');
        function remove_taxonomy_meta_box(){
            remove_meta_box('layoutdiv', 'page', 'side');
        }

        // Add new taxonomy meta box
        add_action( 'add_meta_boxes', 'layout_add_meta_box');
        function layout_add_meta_box() {
            add_meta_box( 'layout_id', 'Page Layout','prefix_layout_metabox','page' ,'side','core');
        }

        function prefix_layout_metabox( $post ) {
            //Get taxonomy and terms
            $taxonomy = 'layout';

            //Set up the taxonomy object and get terms
            $tax = get_taxonomy($taxonomy);
            $terms = get_terms($taxonomy,array('hide_empty' => 0));

            //Name of the form
            $name = 'tax_input[' . $taxonomy . ']';

            //Get current and popular terms
            $postterms = get_the_terms( $post->ID,$taxonomy );
            $current = ($postterms ? array_pop($postterms) : false);
            $current = ($current ? $current->term_id : 0);

            ?>

            <div id="taxonomy-<?php echo $taxonomy; ?>" class="categorydiv">

                <!-- Display taxonomy terms -->
                <div id="<?php echo $taxonomy; ?>-all" >
                    <ul id="<?php echo $taxonomy; ?>checklist" class="list:<?php echo $taxonomy?> categorychecklist form-no-clear">
                        <?php foreach($terms as $term){
                            $id = $taxonomy.'-'.$term->term_id;
                            echo '<li id="'.$id.'"><label class="selectit">';
                            echo '<input type="radio" id="in-'.$id.'" name="'.$name.'" '.checked($current,$term->term_id,false).' value="'.$term->term_id.'" />'.$term->name.'<br />';
                            echo '</label></li>';
                        }

                        ?>
                    </ul>
                </div>

            </div>
            <?php
        }

		// programmatically create a few format terms
		function layout_insert_default_format( $post ) { // later we'll define this as our default, so all posts have to have at least one format

            //Get taxonomy and terms
            $taxonomy = 'layout';

			wp_insert_term(
				'Full width',
                $taxonomy,
				array(
					'description'	=> '',
					'slug' 		    => 'default'
				)
			);

            wp_insert_term(
                'Sidebar',
                $taxonomy,
                array(
                    'description'	=> '',
                    'slug' 		    => 'sidebar'
                )
            );

		}
		add_action( 'init', 'layout_insert_default_format' );

	}

	/**
	 * @param term
	 * @param slug
	 * @param description
     * @return null
	 */
	public function createLayout( $term = '', $description = '', $slug = '' ){

        wp_insert_term(
            $term,
            'layout',
            array(
                'description' => $description,
                'slug' => $slug
            )
        );

	}

}