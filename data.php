<?php
	// Custom post-types
 	$CPT = array(
		"package" => array("installment", "product", "plan"),
		"enrolment and attendance" => array()
	);


 	// Metaboxes
	$metaboxes = array(
		array(
			'title' => esc_html__('Sessions Settings', 'text domain'),
			'id' => 'session_settings',
			'post_types' => array('post', 'plan'),
			'fields' => array(
				array(
					'id' => 'plan_name',
					'name' => 'Plan Name',
					'type' => 'text'
				),
				array(
					'id' => 'plan_author',
					'name' => 'Plan Author',
					'type' => 'text'
				),
				array(
					'id' => 'another_field',
					'name' => 'Another Field',
					'type' => 'radio',
					'options' => array('yes', 'no')
				),
				array(
					'id' => 'background',
					'name' => 'Background',
					'type' => 'color'
				),
				array(
					'id' => 'skilli_date_time',
					'name' => 'Skilli Date Time',
					'type' => 'datetime'
				),
				array(
					'id' => 'skilli_date',
					'name' => 'Skilli Date',
					'type' => 'date'
				),
				array(
					'id' => 'skilli_time',
					'name' => 'Skilli Time',
					'type' => 'time'
				),
				array (
					'id' => 'post_select',
					'name' => esc_html__( 'Post Select', 'text-domain' ),
					'type' => 'post',
					'post_type' => 'plan',
					'field_type' => 'select_advanced',
				),
				array(
					'id' => 'another_upload',
					'name' => 'Another Upload',
					'type' => 'image'
				),
				array(
					'id' => 'first_group',
					'name' => 'First Group',
					'type' => 'group',
					'clone' => 2,
					'fields' => array(
						array(
				 			'id' => 'greeting',
				 			'name' => 'Greeting',
							'type' => 'text'
						),
						array(
				 			'id' => 'meme_group',
				 			'name' => 'Meme Group',
							'type' => 'group',
							'clone' => 2,
							'fields' => array(
								array(
						 			'id' => 'message',
						 			'name' => 'message',
									'type' => 'text'
								)
							)
						)
					)
				)
			) 
		),
		array(
			'title' => esc_html__('Allow External Access', 'text domain'),
			'id' => 'allow_external_access',
			'post_types' => array('plan'),
			'fields' => array(
				array(
					'id' => 'registered',
					'name' => 'Registered',
					'type' => 'checkbox'
				),
				array(
					'id' => 'greeting',
					'name' => 'Greeting',
					'type' => 'text'
				),
				array(
					'id' => 'description',
					'name' => 'Description',
					'type' => 'textarea'
				),
				array(
					'id' => 'education',
					'name' => 'Education',
					'type' => 'select',
					'options' => array('degree', 'msc', 'others')
				),
				array(
					'id' => 'skilli2_wysiwyg',
					'name' => 'Skilli wysiwyg',
					'type' => 'wysiwyg'
				),
				array(
					'id' => 'image_upload',
					'name' => 'Image Upload',
					'type' => 'image'
				)
			) 
		)
	);