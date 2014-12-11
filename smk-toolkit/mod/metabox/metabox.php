<?php 
if( ! class_exists('Smk_Metabox') ) {
	class Smk_Metabox {

		protected $id;
		protected $settings;

		public function __construct( $id, $settings = false ){
			$this->id = $id;
			$this->settings = $settings;
			if( ! $this->metaboxExists( $this->id ) && is_array( $this->settings ) ){
				add_filter( 'stk_register_mod_settings', array( $this, 'registerMetaboxSettings') );
				add_action( 'add_meta_boxes', array( $this, 'addMetabox' ) );
			}
		}

		public function getRegisteredMetaboxes(){
			$all_mods_settings = stk_get_registered_mods_settings();
			return ( !empty( $all_mods_settings['metabox'] ) ) ? $all_mods_settings['metabox'] : array();
		}

		public function metaboxExists( $id ){
			$all = $this->getRegisteredMetaboxes();
			return array_key_exists($id, $all);
		}

		public function registerMetaboxSettings( $mods ){	
			// If there are no metaboxes at all, add 'metabox' key
			if( empty($mods['metabox']) ){
				$mods['metabox'] = array();
			}

			// Add this metabox to the list
			$mods['metabox'][$this->id] = $this->settings;

			// Return all mods with their settings
			return $mods;
		}

		public function addMetabox(){
			$pages = $this->settings['page'];
			foreach ( $pages as $page ) {
				add_meta_box( 
					$this->id, 
					$this->settings['title'], 
					array( $this, 'metaboxCallback' ), 
					$page, 
					$this->settings['context'], 
					$this->settings['priority']
				);
			}
		}

		public function metaboxCallback( $post ){
			stk_print( $this->settings );
			do_action( $this->id . '_metabox_fields' );
		}

		public function addField( $id ){
			new Smk_Add_Metabox_Fields( $this->id, $id );
		}

	}
}

class Smk_Add_Metabox_Fields{
	protected $id;
	public function __construct( $metabox_id, $id ){
		$this->id = $id;
		add_action( $metabox_id . '_metabox_fields', array( $this, 'show' ) );
	}
	public function show(){
		echo $this->id . '<br />';
	}
}