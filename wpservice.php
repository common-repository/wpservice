<?php
/**
* Plugin Name: WPService
* Plugin URI: http://service.com/
* Description: WPService is a Service.com Wordpress plugin that allows service professionals to add a simple button for customers to chat, hire and pay from their website.
* Version: 1.2.0
* Author: Service.com
* Author URI: http://service.com/
* License: http://www.gnu.org/licenses/gpl-2.0.html
*/

if( !defined("ABSPATH") ) exit;

if( !class_exists("WPServiceCom") ) :

	define("WPSERVICE_DIR",dirname(__FILE__) );
	define("WPSERVICE_URL",plugins_url("",__FILE__) );

	class WPServiceCom {

		public function __construct(){

			add_action('admin_menu', array( $this, 'admin_menu' ) );
			add_action('admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
			add_shortcode('wpservice', array( $this , "shortcode" ) );
			add_action("init", array($this,"init"));

		}

		public function init(){

			if( isset($_POST["action"]) && $_POST["action"] == "wpservicecom_save"  && isset( $_POST['wpservicecom_nonce'] ) && wp_verify_nonce( $_POST['wpservicecom_nonce'], 'wpservicecom_save' ) ) :

				$this->save_options();

			endif;
		}

		public function admin_menu(){

			add_options_page("Service.com Settings", "Service.com Settings", 1, "wpservicecom-settings", array( $this , "settings_page" ) );

		}

		public function settings_page(){

			$opts = $this->get_options();

			include WPSERVICE_DIR . "/inc/settings_page.php";
		}

		private function sanitize_text( $text ){

			return sanitize_text_field( stripslashes( $text ) );
		}

		private function validate_options(){

			$opts = $this->get_options();

			return $opts["button"] && $opts["slug"] && $opts["terms"];
		}

		public function save_options(){

			$options = array();

			$options["button"] = isset( $_POST["wpservicecom_button"] ) ? $this->sanitize_text( $_POST["wpservicecom_button"] ) : "";
			$options["optional_text"] = isset( $_POST["wpservicecom_optional_text"] ) ? $this->sanitize_text( $_POST["wpservicecom_optional_text"] ) : "";
			$options["slug"] = isset( $_POST["wpservicecom_slug"] ) ? $this->sanitize_text( $_POST["wpservicecom_slug"] ) : "";
			$options["terms"] = isset( $_POST["wpservicecom_terms"] ) ? 1 : 0;

			update_option( "wpservicecom_options", serialize( $options ) );

			wp_redirect(admin_url("options-general.php?page=wpservicecom-settings&updated"));
			exit;
		}

		public function get_options(){

			$options = get_option("wpservicecom_options","");

			if( $options === "" ):
				$options = array(
					"button" => "chat-white",
					"optional_text" => "",
					"slug" => "",
					"terms" => 0
				);
			endif;

			if( !is_array( $options ) ) :

				 $options = unserialize( $options );

			endif;

			return $options;
		}

		public function admin_enqueue_scripts(){

			$screen = get_current_screen();

			if( $screen->base == "settings_page_wpservicecom-settings" ) : 

				wp_enqueue_style( 'wpservicescom_admin', WPSERVICE_URL . '/css/wpservicecom.css' );
				wp_enqueue_script( 'wpservicescom_admin', WPSERVICE_URL . '/js/wpservicecom.js', array( 'jquery' ) );

			endif;
		}

		public function shortcode(){

			$opts = $this->get_options();

			$images = array(
				"chat-white" => "chat_now_w.png",
				"book-white" => "book_now_w.png",
				"pay-white" => "pay_now_w.png",
				"chat-black" => "chat_now_b.png",
				"book-black" => "book_now_b.png",
				"pay-black" => "pay_now_b.png"
			);

			if( !$this->validate_options() || !$images[$opts["button"]] ) return "";

			$image = $images[$opts["button"]];
			$black_bg = strpos( $opts["button"] , "-black" ) !== false;

			ob_start();

			include WPSERVICE_DIR . "/inc/shortcode.php";

			return ob_get_clean();
		}

	};

	new WPServiceCom();

endif;