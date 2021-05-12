<?php
/**
* @package SkilliPlugin
*/

/**
* Plugin Name: Skilli Plugin
* Plugin URI: myskilli.com
* Description: Create a custom LMS
* Version: 1.0
* Author: myskilli.com
* Author URI: myskilli.com
* License: GPL2
*/

defined('ABSPATH') or die("Invalid access! Follow due process bro.");

include 'data.php';

class SkilliPlugin {
	function __construct(){
		add_action('init', array($this, 'register_post_types'));	
	}

	function activate(){
		// generate CPT
		$this->register_post_types();

		// flush rewrite rules
		flush_rewrite_rules();
	}

	function deactivate(){
		// flush rewrite rules
		flush_rewrite_rules();
	}



	// handle slug for custom post
	function get_post_slug($name) {
		$slug = str_replace(" ", "-", $name);

		if(strlen($slug) > 20){
			$slug = substr($slug, 0, 20);
		}

		return $slug;
	}

	// handle the label for each custom post type
	function get_post_labels($name){
		// sanitize name
		$name = strtolower($name);

		$slug = $this->get_post_slug($name); 	

		$label = ucwords($name);

		$labels = array(
					'menu_name' => esc_html__( $label.'s', 'text-domain' ),
					'name_admin_bar' => esc_html__( $label, 'text-domain' ),
					'add_new' => esc_html__( 'Add new', 'text-domain' ),
					'add_new_item' => esc_html__( 'Add new '.$label, 'text-domain' ),
					'new_item' => esc_html__( 'New '.$label, 'text-domain' ),
					'edit_item' => esc_html__( 'Edit '.$label, 'text-domain' ),
					'view_item' => esc_html__( 'View '.$label, 'text-domain' ),
					'update_item' => esc_html__( 'Update '.$label, 'text-domain' ),
					'all_items' => esc_html__( 'All '.$label.'s', 'text-domain' ),
					'search_items' => esc_html__( 'Search '.$label.'s', 'text-domain' ),
					'parent_item_colon' => esc_html__( 'Parent '.$label, 'text-domain' ),
					'not_found' => esc_html__( 'No '.$label.'s found', 'text-domain' ),
					'not_found_in_trash' => esc_html__( 'No '.$label.'s found in Trash', 'text-domain' ),
					'name' => esc_html__( $label.'s', 'text-domain' ),
					'singular_name' => esc_html__( $label, 'text-domain' ),
		);

		return $labels;
	}

	// get custom post type arguments
	function get_args(string $name, string $type, $parent=null){
		$args = array (
				'label' => esc_html__( ucwords($name), 'text-domain' ),
				'labels' => $this->get_post_labels($name),
				'public' => true,
				'exclude_from_search' => false,
				'publicly_queryable' => true,
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'show_in_admin_bar' => true,
				'show_in_rest' => true,
				'capability_type' => 'page',
				'hierarchical' => false,
				'has_archive' => true,
				'query_var' => true,
				'can_export' => true,
				'rewrite_no_front' => false,
				'supports' => array(
					'title',
				),
				'rewrite' => true,
		);

		if($type == 'post'){
			$args['capability_type'] = 'post';
			$args['show_in_menu'] = 'edit.php?post_type='.$this->get_post_slug($parent);
		}

		return $args;
	}
	
	// generate the required post types
	function register_post_types(){
		global $CPT;

		// create custom post types
		foreach($CPT as $parent => $children){
			// register the parent page
			$args = $this->get_args($parent, 'page');
			register_post_type($this->get_post_slug($parent), $args);

			// loop thru the children and register each
			foreach($children as $child){
				$args = $this->get_args($child, 'post', $parent);
				register_post_type($this->get_post_slug($child), $args);
			}
		}
	}
}

if(class_exists('SkilliPlugin')){
	$skilliPlugin = new SkilliPlugin();
}


/*
	CREATING METABOXES & ITS FIELDS
*/
function skilli_generate_mb($mb){
	$locs = $mb['post_types'];

	foreach($locs as $loc){
		add_meta_box(
			$mb["id"],
			$mb["title"],
			'skilli_generate_fields',
			$loc,
			'normal',
			'default',
			$mb["fields"]
		);
	}
}

// set meta_keys for groups
$metaKey = "";


// create & display mb fields
function skilli_generate_fields($post, $mb_data){
	global $metaKey;

	$fields = $mb_data['args'];

	foreach($fields as $field){
		// set meta_key for group
		if($field['type'] === 'group'){
			$metaKey = $field['id'];
		}

		// generate the field html and setup
		skilli_generate_html($post, $field);

		// reset the keys
		$metaKey = "";

	}
}


// generate html
function skilli_generate_html($post, $field, $clone=null, $parent=null, $index=null){
	global $metaKey;

	// get the post_meta for all the field
	if($metaKey){
		$value = get_post_meta($post->ID, $metaKey, true);
	}else {
		$value = get_post_meta($post->ID, $field['id'], true);
	}

	if($field['type'] === 'text'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="text" name="<?php echo $field['id']; ?>" value="<?php if(isset($value)) echo $value; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'number'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="number" name="<?php echo $field['id']; ?>" value="<?php if(isset($value)) echo $value; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'password'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="password" name="<?php echo $field['id']; ?>" value="<?php if(isset($value)) echo $value; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'email'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="email" name="<?php echo $field['id']; ?>" value="<?php if(isset($value)) echo $value; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'url'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="url" name="<?php echo $field['id']; ?>" value="<?php if(isset($value)) echo $value; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'color'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="color" name="<?php echo $field['id']; ?>" value="<?php if(isset($value)) echo $value; ?>" /></label>
				</div>
			</div>
	<?php }
	if($field['type'] === 'date'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
			    	<input type="date" name="<?php echo $field['id']; ?>" value="<?php if(isset($value)) echo $value; ?>" /></label>
				</div>
			</div>
	<?php }
	if($field['type'] === 'datetime'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
			    <div>
			    	<input type="datetime-local" name="<?php echo $field['id']; ?>" value="<?php if(isset($value)) echo $value; ?>" /></label>
			    </div>
			</div>
	<?php }
	if($field['type'] === 'time'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
			    <div>
			    	<input type="time" name="<?php echo $field['id']; ?>" value="<?php if(isset($value)) echo $value; ?>" /></label>
			    </div>
			</div>
	<?php }
	if($field['type'] === 'textarea'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<textarea name="<?php echo $field['id']; ?>"><?php if(isset($value)) echo $value; ?></textarea>
				</div>
			</div>
	<?php }
	if($field['type'] === 'radio'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
		    	<div class="fields">
		    		<?php foreach($field['options'] as $op){ ?>
			    		<label><?php echo $op; ?>
			    			<input type="radio" name="<?php echo $field['id']; ?>" value="<?php echo $op; ?>" <?php if($value == $op) echo 'checked'; ?>/></label>
		    		<?php } ?>
		    	</div>			    	
			</div>
	<?php }
	if($field['type'] === 'checkbox'){ ?>
		<div class="field">
			<div><label for=""><?php echo $field['name']; ?></label></div>
			<div>
				<input type="checkbox" name="<?php echo $field['id']; ?>" value="<?php echo $field['id']; ?>" <?php  if ( isset ( $value ) ) checked( $value, $field['id'] ); ?> />
			</div>
		</div>
	<?php }
	if($field['type'] === 'select'){ ?>
			<div class="field">
			    <div><label for=""><?php echo $field['name']; ?></label></div>
			    <div>
			    	<select class="fields" name="<?php echo $field['id']; ?>">
			    		<option value="">Select an Item</option>
			    		<?php foreach($field['options'] as $op){ ?>
			    			<option value="<?php echo $op; ?>" <?php if($value == $op) echo 'selected'; ?> ><?php echo $op; ?></option>
			    		<?php } ?>
			    	</select>
			    </div>			    	
			</div>
	<?php }
	if($field['type'] === 'wysiwyg'){ ?>
		<div class="field">
			<div><label for=""><?php echo $field['name']; ?></label></div>
			<div>
				<?php wp_editor($value, $field['id']); ?>
			</div>	
		</div>
	<?php }
	if($field['type'] === 'post'){ ?>
		<div class="field">
			<div><label for=""><?php echo $field['name']; ?></label></div>
		    <div>
		    	<select class="fields" name="<?php echo $field['id']; ?>">
		    		<option value="">Select an Item</option>
		    		<?php foreach(get_posts(array('post_type' => $field['post_type'])) as $op){ ?>
		    			<option value="<?php echo $op->post_title; ?>" <?php if($value == $op->post_title) echo 'selected'; ?>><?php echo $op->post_title; ?></option>
		    		<?php } ?>
		    	</select>			    	
		    </div>
		</div>	
	<?php }
	if($field['type'] === 'image'){ ?>
		<div class="field">
			<div><label for="meta-image" class="prfx-row-title"><?php _e( $field['name'], 'prfx-textdomain' )?></label></div>
			<div>
				<input type="text" name="<?php echo $field['id']; ?>" id="meta-image" value="<?php if ( isset ( $value ) ) echo $value; ?>" />
				<input type="button" id="meta-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			</div>
		</div>	
	<?php }
	if($field['type'] === 'group'){ ?>
		<div class="field">
			<div><label for=""><?php echo $field['name']; ?></label></div>
			<div class="group">
				<?php
					$groupfields = $field['fields'];

					if(!$field['clone']){ ?>
						<div class="grp-cards">
							<div class="grp-fields">
								<?php
									foreach($groupfields as $fld){
										skilli_generate_group_html($post, $fld, $field['id'], $i);
									}
								?>
							</div>
						</div>
					<?php }else{
						$cloneCount = 1;
						if($value){
							$cloneCount= count($value);
						}					
						for($i=0; $i<$cloneCount; $i++){ ?>
							<div class="grp-cards">
								<label class="entry">Entry <?php echo $i+1; ?></label>
								<div class="grp-fields">
									<?php
										foreach($groupfields as $fld){
											skilli_generate_group_html($post, $fld, $field['id'], $i);
										}
									?>
								</div>
							</div>
						<?php 
					} ?>
					<button class="add-more" data-id="<?php echo $field['id']; ?>">+ Add More</button>
					<?php }
				?>
			</div>
		</div>
	<?php }
}

function skilli_generate_group_html($post, $field, $parent, $index) {
	global $metaKey;

	$value = get_post_meta($post->ID, $metaKey, true);
	$exactValue = $value[$index][$field['id']];
	
	$prevFieldId = $field['id'];
	$fld_name = $parent."[".$index."]"."[".$field['id']."]";
	
	if($field['type'] === 'text'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="text" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'number'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="number" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'password'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="passsword" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'email'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="email" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'url'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="url" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'color'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="color" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php }
	if($field['type'] === 'date'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
			    	<input type="date" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php }
	if($field['type'] === 'datetime'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
			    <div>
			    	<input type="datetime-local" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
			    </div>
			</div>
	<?php }
	if($field['type'] === 'time'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
			    <div>
			    	<input type="time" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
			    </div>
			</div>
	<?php }
	if($field['type'] === 'textarea'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<textarea name="<?php echo $fld_name; ?>"><?php if(isset($exactValue)) echo $exactValue; ?></textarea>
				</div>
			</div>
	<?php }
	if($field['type'] === 'radio'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
		    	<div class="fields">
		    		<?php foreach($field['options'] as $op){ ?>
			    		<label><?php echo $op; ?>
			    			<input type="radio" name="<?php echo $fld_name; ?>" value="<?php echo $op; ?>" <?php if($exactValue == $op) echo 'checked'; ?>/></label>
		    		<?php } ?>
		    	</div>			    	
			</div>
	<?php }
	if($field['type'] === 'checkbox'){ ?>
		<div class="field">
			<div><label for=""><?php echo $field['name']; ?></label></div>
			<div>
				<input type="checkbox" name="<?php echo $fld_name; ?>" value="<?php echo $field['id']; ?>" <?php  if ( isset ( $exactValue ) ) checked( $exactValue, $field['id'] ); ?> />
			</div>
		</div>
	<?php }
	if($field['type'] === 'select'){ ?>
			<div class="field">
			    <div><label for=""><?php echo $field['name']; ?></label></div>
			    <div>
			    	<select class="fields" name="<?php echo $fld_name; ?>">
			    		<option value="">Select an Item</option>
			    		<?php foreach($field['options'] as $op){ ?>
			    			<option value="<?php echo $op; ?>" <?php if($exactValue == $op) echo 'selected'; ?>><?php echo $op; ?></option>
			    		<?php } ?>
			    	</select>
			    </div>			    	
			</div>
	<?php }
	if($field['type'] === 'wysiwyg'){ ?>
		<div class="field">
			<div><label for=""><?php echo $field['name']; ?></label></div>
			<div>
				<?php wp_editor($exactValue, $field['id']); ?>
			</div>	
		</div>
	<?php }
	if($field['type'] === 'post'){ ?>
		<div class="field">
			<div><label for=""><?php echo $field['name']; ?></label></div>
		    <div>
		    	<select class="fields" name="<?php echo $fld_name; ?>">
		    		<option value="">Select an Item</option>
		    		<?php foreach(get_posts(array('post_type' => $field['post_type'])) as $op){ ?>
		    			<option value="<?php echo $op->post_title; ?>" <?php if($exactValue == $op->post_title) echo 'selected'; ?>><?php echo $op->post_title; ?></option>
		    		<?php } ?>
		    	</select>			    	
		    </div>
		</div>	
	<?php }
	if($field['type'] === 'image'){ ?>
		<div class="field">
			<div><label for="meta-image" class="prfx-row-title"><?php _e( $field['name'], 'prfx-textdomain' )?></label></div>
			<div>
				<input type="text" name="<?php echo $field['id']; ?>" id="meta-image" value="<?php if ( isset ( $exactValue ) ) echo $exactValue; ?>" />
				<input type="button" id="meta-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			</div>
		</div>	
	<?php }
	if($field['type'] == 'group') { ?>
		<div class="field">
			<div><label for=""><?php echo $field['name']; ?></label></div>
			<div class="group">
				<?php
					$groupfields = $field['fields'];

					// set the parameters
					$args = array();
					$args[0] = $parent; 
					$args[1] = $index;
					$args[2] = $prevFieldId;
					// $args[] = $i;
					$parentName = $fld_name;

					if(!$field['clone']){ ?>
						<div class="grp-cards">
							<div class="grp-fields">
								<?php 
									foreach($groupfields as $fld){
										// skilli_generate_group2_html($post, $fld, $parentName, $args, $i);
										skilli_generate_group2_html($post, $fld, $parentName, $args, $i);
									}
								?>
							</div>
						</div>
					<?php }else{
						$cloneCount = 1;
						if($exactValue){
							$cloneCount= count($exactValue);
						}					
						for($i=0; $i<$cloneCount;  $i++){ ?>
							<div class="grp-cards">
								<label class="entry">Entry <?php echo $i+1; ?></label>
								<div class="grp-fields">
									<?php
										// skilli_generate_group2_html($post, $fld, $parentName, $args, $i);
										foreach($groupfields as $fld){
											skilli_generate_group2_html($post, $fld, $parentName, $args, $i);
										}
									?>
								</div>
							</div>
							<?php 
						} ?>
						<button class="add-more one" data-id="<?php echo $field['id']; ?>">+ Add More</button>
					<?php }
				?>
			</div>
		</div>
	<?php }
}

function skilli_generate_group2_html($post, $field, $parentName, $args, $index) {
	global $metaKey;

	$value = get_post_meta($post->ID, $metaKey, true);
	$exactValue = $value[$args[1]][$args[2]][$index][$field['id']];

	$fld_name = $parentName."[".$index."]"."[".$field['id']."]";

	if($field['type'] === 'text'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="text" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'number'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="number" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'password'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="passsword" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'email'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="email" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'url'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="url" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php  }
	if($field['type'] === 'color'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<input type="color" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php }
	if($field['type'] === 'date'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
			    	<input type="date" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
				</div>
			</div>
	<?php }
	if($field['type'] === 'datetime'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
			    <div>
			    	<input type="datetime-local" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
			    </div>
			</div>
	<?php }
	if($field['type'] === 'time'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
			    <div>
			    	<input type="time" name="<?php echo $fld_name; ?>" value="<?php if(isset($exactValue)) echo $exactValue; ?>" />
			    </div>
			</div>
	<?php }
	if($field['type'] === 'textarea'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
				<div>
					<textarea name="<?php echo $fld_name; ?>"><?php if(isset($exactValue)) echo $exactValue; ?></textarea>
				</div>
			</div>
	<?php }
	if($field['type'] === 'radio'){ ?>
			<div class="field">
				<div><label for=""><?php echo $field['name']; ?></label></div>
		    	<div class="fields">
		    		<?php foreach($field['options'] as $op){ ?>
			    		<label><?php echo $op; ?>
			    			<input type="radio" name="<?php echo $fld_name; ?>" value="<?php echo $op; ?>" <?php if($exactValue == $op) echo 'checked'; ?>/></label>
		    		<?php } ?>
		    	</div>			    	
			</div>
	<?php }
	if($field['type'] === 'checkbox'){ ?>
		<div class="field">
			<div><label for=""><?php echo $field['name']; ?></label></div>
			<div>
				<input type="checkbox" name="<?php echo $fld_name; ?>" value="<?php echo $field['id']; ?>" <?php  if ( isset ( $exactValue ) ) checked( $exactValue, $field['id'] ); ?> />
			</div>
		</div>
	<?php }
	if($field['type'] === 'select'){ ?>
			<div class="field">
			    <div><label for=""><?php echo $field['name']; ?></label></div>
			    <div>
			    	<select class="fields" name="<?php echo $fld_name; ?>">
			    		<option value="">Select an Item</option>
			    		<?php foreach($field['options'] as $op){ ?>
			    			<option value="<?php echo $op; ?>" <?php if($exactValue == $op) echo 'selected'; ?> ><?php echo $op; ?></option>
			    		<?php } ?>
			    	</select>
			    </div>			    	
			</div>
	<?php }
	if($field['type'] === 'wysiwyg'){ ?>
		<div class="field">
			<div><label for=""><?php echo $field['name']; ?></label></div>
			<div>
				<?php wp_editor($exactValue, $field['id']); ?>
			</div>	
		</div>
	<?php }
	if($field['type'] === 'post'){ ?>
		<div class="field">
			<div><label for=""><?php echo $field['name']; ?></label></div>
		    <div>
		    	<select class="fields" name="<?php echo $fld_name; ?>">
		    		<option value="">Select an Item</option>
		    		<?php foreach(get_posts(array('post_type' => $field['post_type'])) as $op){ ?>
		    			<option value="<?php echo $op->post_title; ?>" <?php if($exactValue == $op->post_title) echo 'selected'; ?>><?php echo $op->post_title; ?></option>
		    		<?php } ?>
		    	</select>			    	
		    </div>
		</div>	
	<?php }
	if($field['type'] === 'image'){ ?>
		<div class="field">
			<div><label for="meta-image" class="prfx-row-title"><?php _e( $field['name'], 'prfx-textdomain' )?></label></div>
			<div>
				<input type="text" name="<?php echo $fld_name; ?>" id="meta-image" value="<?php if ( isset ( $exactValue ) ) echo $exactValue; ?>" />
				<input type="button" id="meta-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'prfx-textdomain' )?>" />
			</div>
		</div>	
	<?php }
	if($field['type'] == 'group') { ?>
		<div class="field">
			<div><label for=""><?php echo $field['name']; ?></label></div>
			<div class="group">
				<?php for($i=0; $i<count($value); $i++){
					$groupfields = $field['fields']; ?>
					<div class="grp-cards">
						<label class="entry">Entry <?php echo $i+1; ?>  <span>Remove</span></label>
						<div class="grp-fields">
							<?php 
								foreach($groupfields as $fld){
									$parent = $field."[".$i."]";
									skilli_generate_group2_html($post, $fld, $parent);
								}
							?>
						</div>
					</div>
				<?php } ?>
				<button>+ Add More</button>
			</div>
		</div>
	<?php }
}

/*
	SAVING META BOXES FIELDS VALUE
*/
function skilli_save_mb_values($post_id, $post, $update) {
	global $metaboxes;

	foreach($metaboxes as $mb){
		// check if mb appears in the current post-type
		if(in_array($post->post_type, $mb['post_types'])){
			// get the fields for the mb where current post-type is found
			$mb_flds = $mb['fields'];
			foreach($mb_flds as $mb_fld){
				// check for group fieldType
				// save those fields
				if(array_key_exists($mb_fld['id'], $_POST)){
					update_post_meta(
						$post_id,
						$mb_fld['id'],
						$_POST[$mb_fld['id']]
					);
				}
			}
		}
	}

	// die(print_r($_POST));
}


// create the metaboxes
foreach($metaboxes as $mb){
	// create metabox
	add_action('add_meta_boxes', 
				function() use ($mb) {
					return skilli_generate_mb($mb); });
}

// save metabox fields value
add_action('save_post', 'skilli_save_mb_values', 10, 3);


function skilli_scripts_enqueue() {
	wp_enqueue_media();

	// Registers and enqueues the required javascript.
	wp_register_script( 'meta-box-image', plugin_dir_url( __FILE__ ) . 'js/media-uploader.js', array( 'jquery' ) );
	wp_localize_script( 'meta-box-image', 'meta_image',
		array(
			'title' => __( 'Choose or Upload an Image', 'prfx-textdomain' ),
			'button' => __( 'Use this image', 'prfx-textdomain' ),
		)
	);
	wp_enqueue_script( 'meta-box-image' );
	//
	wp_enqueue_script( 'add-metabox', plugin_dir_url( __FILE__ ) . 'js/add-metabox.js', array( 'jquery' ) );

	// link css styles
	 wp_enqueue_style( 'skilli-styles', plugin_dir_url( __FILE__ ) . 'styles/style.css' );
}
add_action( 'admin_enqueue_scripts', 'skilli_scripts_enqueue' );



// activation
register_activation_hook( __FILE__, array($skilliPlugin, 'activate') );

// deactivation
register_deactivation_hook( __FILE__, array($skilliPlugin, 'deactivate') );

?>
<!-- <script>
	function 
</script> -->