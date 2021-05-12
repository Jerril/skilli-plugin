<?php
	// Custom post-types
 	$CPT = array(
		"package" => array("installment", "product", "plan"),
		"asset" => array("course", "lesson", "people"),
		"enrolment and attendance" => array()
	);


 	// Metaboxes
	$metaboxes = array(
		// people custom fields
		array (
			'title' => esc_html__( 'People Custom Fields', 'text-domain' ),
			'id' => 'people-custom-fields',
			'post_types' => array('people'),
			'fields' => array(
				array (
					'id' => 'person_name',
					'type' => 'text',
					'name' => esc_html__( 'Name', 'text-domain' ),
				),
				array (
					'id' => 'person_picture',
					'type' => 'image',
					'name' => esc_html__( 'Picture', 'text-domain' ),
					// 'max_file_uploads' => 1,
					// 'image_size' => 'thumbnail',
					// 'max_status' => false,
				),
				array (
					'id' => 'person_description',
					'type' => 'text',
					'name' => esc_html__( 'Title', 'text-domain' ),
					// 'desc' => esc_html__( 'Work Title of this person, e.g Senior Director, Power & Energy, ABC Power', 'text-domain' ),
				),
				array (
					'id' => 'person_bio',
					'type' => 'textarea',
					'name' => esc_html__( 'Short Bio', 'text-domain' ),
					// 'desc' => esc_html__( 'A Short Bio of this person', 'text-domain' ),
				),
				array (
					'id' => 'person_category',
					'name' => esc_html__( 'Category', 'text-domain' ),
					'type' => 'select',
					// 'placeholder' => esc_html__( 'Select an Item', 'text-domain' ),
					'options' => array('Mentor','Facilitator','Testimonial', 'Moderator')
				),
				array (
					'id' => 'contact_details_group',
					'type' => 'group',
					'name' => esc_html__( 'Contact Details', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'contact_email',
							'type' => 'text',
							'name' => esc_html__( 'Contact Email', 'text-domain' ),
						),
						array (
							'id' => 'contact_whatsapp_number',
							'type' => 'text',
							'name' => esc_html__( 'Contact Whatsapp Number', 'text-domain' ),
						),
						array (
							'id' => 'instagram_handle',
							'type' => 'text',
							'name' => esc_html__( 'Instagram Handle', 'text-domain' ),
						),
						array (
							'id' => 'twitter_handle',
							'type' => 'text',
							'name' => esc_html__( 'Twitter Handle', 'text-domain' ),
						),
						array (
							'id' => 'youtube_link',
							'type' => 'text',
							'name' => esc_html__( 'Youtube Link', 'text-domain' ),
						),
						array (
							'id' => 'linkedin_profile',
							'type' => 'text',
							'name' => esc_html__( 'Linked in Profile', 'text-domain' ),
						),
					),
					'clone' => 1
					// 'default_state' => 'expanded',
				),
				array (
					'id' => 'add_faq_group',
					'type' => 'group',
					'name' => esc_html__( 'Add FAQ', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'faq_question',
							'type' => 'text',
							'name' => esc_html__( 'Question', 'text-domain' ),
						),
						array (
							'id' => 'faq_answer',
							'type' => 'textarea',
							'name' => esc_html__( 'Answer', 'text-domain' ),
						),
					),
					'clone' => 1,
					// 'sort_clone' => 1,
					// 'default_state' => 'collapsed',
					// 'collapsible' => true,
					// 'group_title' => '{#}',
				),
			),
		),
		// add host metabox
		array (
			'title' => esc_html__( 'Add Host Metabox', 'text-domain' ),
			'id' => 'add-host-metabox',
			'post_types' => array('lesson'),
			'context' => 'normal',
			'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'add_host_group',
					'type' => 'group',
					'name' => esc_html__( 'Add Host', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'host',
							'type' => 'post',
							'name' => esc_html__( 'Add Host', 'text-domain' ),
							'post_type' => array('people')
						),
						array (
							'id' => 'host_details',
							'type' => 'text',
							'name' => esc_html__( 'Host Details', 'text-domain' ),
						),
					),
					'clone' => 1
					// 'sort_clone' => 1,
					// 'default_state' => 'expanded',
					// 'collapsible' => true,
				),
			),
		),
		//lesson custom fields
		array (
			'title' => esc_html__( 'Lessons Custom Fields', 'text-domain' ),
			'id' => 'lessons-custom-fields',
			'post_types' => array('lesson'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'lesson_title',
					'type' => 'text',
					'name' => esc_html__( 'Lesson Title', 'text-domain' ),
				),
				array (
					'id' => 'lesson_description',
					'type' => 'textarea',
					'name' => esc_html__( 'Short Description', 'text-domain' ),
				),
				array (
					'id' => 'lesson_topic',
					'type' => 'group',
					'name' => esc_html__( 'Add Topic', 'text-domain' ),
					'clone' => 1,
					'fields' => array(
						array (
							'id' => 'topic_id',
							'type' => 'text',
							'name' => esc_html__( 'Topic ID', 'text-domain' ),
						),
						array (
							'id' => 'topic_title',
							'type' => 'text',
							'name' => esc_html__( 'Title', 'text-domain' ),
						),
						array (
							'id' => 'topic_content',
							'name' => esc_html__( 'Content', 'text-domain' ),
							'type' => 'wysiwyg',
						),
						array (
							'id' => 'topic_image',
							'type' => 'image',
							'name' => esc_html__( 'Upload image', 'text-domain' ),
							// 'max_file_uploads' => 5,
							// 'max_status' => false,
						),
						array (
							'id' => 'topic_audio_link',
							'type' => 'url',
							'name' => esc_html__( 'Audio Link', 'text-domain' ),
						),
						array (
							'id' => 'is_youtube',
							'name' => esc_html__( 'Is a Youtube video?', 'text-domain' ),
							'type' => 'radio',
							'options' => array('Yes', 'No'),
							// 'inline' => 1,
						),
						array (
							'id' => 'topic_video_link',
							'type' => 'url',
							'name' => esc_html__( 'Video Link', 'text-domain' ),
						),
						array (
							'id' => 'action_button_label',
							'type' => 'text',
							'name' => esc_html__( 'Action Button Label', 'text-domain' ),
						),
						array (
							'id' => 'action_button_url',
							'type' => 'text',
							'name' => esc_html__( 'Action Button URL', 'text-domain' ),
						),
						array (
							'id' => 'ask_question_url',
							'type' => 'text',
							'name' => esc_html__( 'Ask Question URL', 'text-domain' ),
						),
						array (
							'id' => 'ask_question_label',
							'type' => 'text',
							'name' => esc_html__( 'Ask Question label', 'text-domain' ),
						),
						array (
							'id' => 'topic_resource',
							'type' => 'group',
							'name' => esc_html__( 'Add Resource', 'text-domain' ),
							'clone' => 1,
							'fields' => array(
								array (
									'id' => 'title',
									'type' => 'text',
									'name' => esc_html__( 'Title', 'text-domain' ),
								),
								array (
									'id' => 'resource_file',
									'type' => 'file',
									'name' => esc_html__( 'File', 'text-domain' ),
									// 'max_file_uploads' => 4,
									// 'max_status' => false,
								),
								array (
									'id' => 'file_type',
									'type' => 'taxonomy_advanced',
									'name' => esc_html__( 'File Type', 'text-domain' ),
									'taxonomy' => 'file-type',
									// 'field_type' => 'select_advanced',
								),
								array (
									'id' => 'file_url',
									'type' => 'text',
									'name' => esc_html__( 'File URL', 'text-domain' ),
								),
							),
							// 'clone' => 1,
							// 'sort_clone' => 1,
							// 'default_state' => 'collapsed',
							// 'collapsible' => true,
						),
						array (
							'id' => 'highlights_group',
							'type' => 'group',
							'clone' =>  1,
							'name' => esc_html__( 'Add Highlights', 'text-domain' ),
							'fields' => array(
								array (
									'id' => 'content',
									'type' => 'textarea',
									'name' => esc_html__( 'Content', 'text-domain' ),
								),
							),
							// 'default_state' => 'collapsed',
							// 'collapsible' => true,
						),
					),
					// 'clone' => 1,
					// 'sort_clone' => 1,
					// 'default_state' => 'expanded',
					// 'collapsible' => true,
				),
				array (
					'id' => 'questions_id',
					'type' => 'text',
					'name' => esc_html__( 'Questions ID', 'text-domain' ),
				),
				array (
					'id' => 'comments_id',
					'type' => 'text',
					'name' => esc_html__( 'Comments ID', 'text-domain' ),
				),
			),
		),
		// show announcement metabox
		array(
			'title' => esc_html__('Show Announcement Metabox', 'text domain'),
			'id' => 'show_announcement_metabox',
			'post_types' => array('course'),
			'fields' => array(
				array(
					'id' => 'show_announcement',
					'name' => esc_html__('Show Announcement', 'text-domain'),
					'type' => 'radio',
					'options' => array('yes', 'no')
				)
			)
		),
		// courses custom fields
		array (
			'title' => esc_html__( 'Courses Custom Fields', 'text-domain' ),
			'id' => 'courses-custom-fields',
			'post_types' => array('course'),
			'fields' => array(
				array (
					'id' => 'course_logo',
					'type' => 'image',
					'name' => esc_html__( 'Course Logo', 'text-domain' )
				),
				array (
					'id' => 'course_title',
					'type' => 'text',
					'name' => esc_html__( 'Course Title', 'text-domain' ),
				),
				array (
					'id' => 'course_type',
					'name' => esc_html__( 'Type', 'text-domain' ),
					'type' => 'select',
					'options' => array('Full Course', 'Micro Course', 'Webinar' ),
				),
				array (
					'id' => 'broadcast_link',
					'type' => 'textarea',
					'name' => esc_html__('Broadcast/Video Link', 'text-domain')
					// 'visible' => array(
					// 	'when' => array(
					// 		array (
					// 			0 => 'course_type',
					// 			1 => '=',
					// 			2 => 'Webinar',
					// 		),
					// 	),
					// 	'relation' => 'and',
					// ),
				),
				array (
					'id' => esc_html__('course_description', 'text-domain'),
					'type' => 'textarea',
					'name' => 'Course Description',
				),
				array (
					'id' => 'course_image',
					'type' => 'image',
					'name' => esc_html__('Course Image', 'text-domain'),
				),
				array (
					'id' => 'status',
					'name' => esc_html__('Open Status', 'text-domain'),
					'type' => 'select',
					'options' => array('Open', 'Coming Soon')
				),
				array (
					'id' => 'questions_id',
					'type' => 'text',
					'name' => esc_html__( 'Questions ID', 'text-domain' ),
				),
				array (
					'id' => 'comments_id',
					'type' => 'text',
					'name' => esc_html__( 'Comments ID', 'text-domain' ),
				),
			),
		),
		// add course modules & lessons
		array (
			'title' => esc_html__( 'Add Course Modules & Lessons', 'text-domain' ),
			'id' => 'add-course-modules-lessons',
			'post_types' => array('course'),
			'fields' => array(
				array (
					'id' => 'add_item_group',
					'type' => 'group',
					'name' => esc_html__( 'Add Item', 'text-domain' ),
					'clone' => 1,
					'fields' => array(
						array (
							'id' => 'item_type',
							'name' => esc_html__( 'Item Type', 'text-domain' ),
							'type' => 'select',
							'options' => array('Module', 'Lesson', 'Quiz')
							// 'visible' => array(
							// 	'when' => array(
							// 		array (
							// 			0 => 'course_type',
							// 			1 => '=',
							// 			2 => 'Full Course',
							// 		),
							// 	),
							// 	'relation' => 'and',
							// ),
						),
						array (
							'id' => 'item_title',
							'type' => 'text',
							'name' => esc_html__( 'Item Title', 'text-domain' ),
							// 'visible' => array(
							// 	'when' => array(
							// 		array (
							// 			0 => 'course_type',
							// 			1 => '=',
							// 			2 => 'Full Course',
							// 		),
							// 	),
							// 	'relation' => 'and',
							// ),
						),
						array (
							'id' => 'item_label',
							'type' => 'text',
							'name' => esc_html__( 'Item Label', 'text-domain' ),
							// 'visible' => array(
							// 	'when' => array(
							// 		array (
							// 			0 => 'course_type',
							// 			1 => '=',
							// 			2 => 'Full Course',
							// 		),
							// 	),
							// 	'relation' => 'and',
							// ),
						),
						array (
							'id' => 'item_description',
							'type' => 'textarea',
							'name' => esc_html__( 'Item Description', 'text-domain' ),
							// 'visible' => array(
							// 	'when' => array(
							// 		array (
							// 			0 => 'course_type',
							// 			1 => '=',
							// 			2 => 'Full Course',
							// 		),
							// 	),
							// 	'relation' => 'and',
							// ),
						),
						array (
							'id' => 'add_lesson_group',
							'type' => 'group',
							'name' => esc_html__( 'Add Lesson', 'text-domain' ),
							'clone' => 1,
							'fields' => array(
								array (
									'id' => 'lesson_label',
									'type' => 'text',
									'name' => esc_html__( 'Lesson Label', 'text-domain' ),
								),
								array (
									'id' => 'lesson_title',
									'type' => 'text',
									'name' => esc_html__( 'Lesson Title', 'text-domain' ),
								),
								array (
									'id' => 'lesson',
									'type' => 'post',
									'name' => esc_html__( 'Select Lesson', 'text-domain' ),
									'post_type' => 'lesson'
									// 'field_type' => 'select_advanced',
								),
								array (
									'id' => 'lesson_duration',
									'type' => 'text',
									'name' => esc_html__( 'Show after how long?', 'text-domain' ),
								),
								array (
									'id' => 'restrict_access',
									'name' => esc_html__( 'Restrict Access', 'text-domain' ),
									'type' => 'radio',
									'options' => array('Lock', 'Open')
								),
								array (
									'id' => 'have_prerequisite_lesson',
									'name' => esc_html__( 'Have Prerequisite Lesson?', 'text-domain' ),
									'type' => 'radio',
									'options' => array('Yes', 'No')
								),
								array (
									'id' => 'prerequisite_lesson',
									'type' => 'post',
									'name' => esc_html__( 'Prerequisite Lesson', 'text-domain' ),
									'post_type' => 'lesson',
									// 'field_type' => 'select_advanced',
								),
								array (
									'id' => 'next_lesson',
									'type' => 'post',
									'name' => esc_html__( 'Next Lesson', 'text-domain' ),
									'post_type' => 'lesson',
									// 'field_type' => 'select_advanced',
								)
							)
						)
					)
				)
			)
		),

		// session settings metabox
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
				array(
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
					'clone' => 1,
					'fields' => array(
						array(
				 			'id' => 'greeting',
				 			'name' => 'Greeting',
							'type' => 'text'
						),
						array(
				 			'id' => 'guest_email',
				 			'name' => 'Guest Email',
							'type' => 'email'
						),
						array(
							'id' => 'education_higher',
							'name' => 'Education (primary)',
							'type' => 'select',
							'options' => array('bsc', 'ond', 'hnd')
						),
						array(
				 			'id' => 'meme_group',
				 			'name' => 'Meme Group',
							'type' => 'group',
							'clone' => 1,
							'fields' => array(
								array(
						 			'id' => 'message',
						 			'name' => 'message',
									'type' => 'text'
								),
								array(
									'id' => 'meme_radio',
									'name' => 'Meme radio',
									'type' => 'radio',
									'options' => array('yes', 'no')
								),
								array(
									'id' => 'education',
									'name' => 'Education',
									'type' => 'select',
									'options' => array('degree', 'msc', 'others')
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