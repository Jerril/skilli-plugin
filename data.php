<?php
	// Custom post-types
 	$CPT = array(
		"package" => array("installment", "product", "plan"),
		"asset" => array("webinar", "opportunity", "session", "FAQ", "blog", "library", "micro course", "course", "lesson", "people"),
		"question management" => array("qm course profile", "question manager", "answer", "session questions", "lesson question", "question"),
		"enrolment and attendance" => array("lesson attendance", "paid transactions", "status", "attendance", "enrolment", "transaction"),
		"comment" => array(),
		"add section" => array(),
		"theme" => array()
	);


 	// Metaboxes
	$metaboxes = array(
		// testing metabox
		array (
			'title' => esc_html__( 'Testing Metabox', 'text-domain' ),
			'id' => 'testing-metabox',
			'post_types' => array('comment'),
			'fields' => array(
				array (
					'id' => 'smth',
					'name' => esc_html__( 'Something', 'text-domain' ),
					'type' => 'checkbox'
				)
			)
		),
		// session setting metabox
		array (
			'title' => esc_html__( 'Sessions Settings', 'text-domain' ),
			'id' => 'sessions-settings',
			'post_types' => array('post','session'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'allow_external_access',
					'name' => esc_html__( 'Allow External Access', 'text-domain' ),
					'type' => 'radio',
					'options' => array('yes', 'no'),
				),
				array (
					'id' => 'stand_alone',
					'name' => esc_html__( 'Stand Alone Session?', 'text-domain' ),
					'type' => 'radio',
					'options' => array('yes', 'no'),
				),
				array (
					'id' => 'action_button_one',
					'type' => 'group',
					'name' => esc_html__( 'Action Button One', 'text-domain' ),
					'clone' => 0,
					'fields' => array(
						array (
							'id' => 'action_button1_label',
							'type' => 'text',
							'name' => esc_html__( 'Label', 'text-domain' ),
						),
						array (
							'id' => 'action_button1_url',
							'type' => 'text',
							'name' => esc_html__( 'URL', 'text-domain' ),
						),
					),
					// 'default_state' => 'expanded',
					// 'collapsible' => true,
				),
				array (
					'id' => 'action_button_two',
					'type' => 'group',
					'name' => esc_html__( 'Action Button Two', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'action_button2_label',
							'type' => 'text',
							'name' => esc_html__( 'Label', 'text-domain' ),
						),
						array (
							'id' => 'action_button2_url',
							'type' => 'text',
							'name' => esc_html__( 'URL', 'text-domain' ),
						),
					),
					// 'default_state' => 'expanded',
					// 'collapsible' => true,
				),
				array (
					'id' => 'session_logo',
					'type' => 'image',
					'name' => esc_html__( 'Logo', 'text-domain' ),
					// 'max_file_uploads' => 1,
					// 'max_status' => false,
				),
				array (
					'id' => 'theme_color',
					'name' => esc_html__( 'Theme Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
			),
		),
		//enrollment welcome page
		array (
			'title' => esc_html__( 'Enrollment Welcome Page', 'text-domain' ),
			'id' => 'enrollment-welcome-page',
			'post_types' => array('plan'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'welcome_page_header',
					'type' => 'text',
					'name' => esc_html__( 'Welcome Page Header', 'text-domain' ),
				),
				array (
					'id' => 'welcome_page_snippet',
					'type' => 'textarea',
					'name' => esc_html__( 'Welcome Page Snippet', 'text-domain' ),
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
		// allow self signup
		array (
			'title' => esc_html__( 'Allow Self Sign Up', 'text-domain' ),
			'id' => 'allow-self-sign-up',
			'post_types' => array('product','plan',),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'allow_self_sign_up',
					'name' => esc_html__( 'Allow Self Signup?', 'text-domain' ),
					'type' => 'radio',
					'options' => array('yes', 'no'),
				),
				array (
					'id' => 'error_page_info',
					'type' => 'text',
					'name' => esc_html__( 'Error Information', 'text-domain' ),
					'visible' => array(
						'when' => array(
							array (
								0 => 'allow_self_sign_up',
								1 => '=',
								2 => 'no',
							),
						),
						'relation' => 'and',
					),
				),
			),
		),
		// Session Expired Redirect URL
		array (
			'title' => esc_html__( 'Session Expired Redirect URL', 'text-domain' ),
			'id' => 'session-expired-redirect-url',
			'post_types' => array('product','plan'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'redirect_url',
					'type' => 'text',
					'name' => esc_html__( 'Enter Redirect URL', 'text-domain' ),
				),
			),
		),
		// 	Webinar Metabox
		array (
			'title' => esc_html__( 'Webinar Metabox', 'text-domain' ),
			'id' => 'webinar-metabox',
			'post_types' => array('webinar'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'webinar_title',
					'type' => 'text',
					'name' => esc_html__( 'Webinar Title', 'text-domain' ),
				),
				array (
					'id' => 'webinar_description',
					'type' => 'text',
					'name' => esc_html__( 'Webinar Snippet', 'text-domain' ),
				),
				array (
					'id' => 'webinar_snippet',
					'name' => esc_html__( 'Webinar Description', 'text-domain' ),
					'type' => 'wysiwyg',
				),
				array (
					'id' => 'broadcast_link',
					'type' => 'textarea',
					'name' => esc_html__( 'Broadcast/Video Link', 'text-domain' ),
				),
			),
		),
		// Enrollment Email Template Custom Fields
		array (
			'title' => esc_html__( 'Webinar Metabox', 'text-domain' ),
			'id' => 'webinar-metabox',
			'post_types' => array('webinar'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'webinar_title',
					'type' => 'text',
					'name' => esc_html__( 'Webinar Title', 'text-domain' ),
				),
				array (
					'id' => 'webinar_description',
					'type' => 'text',
					'name' => esc_html__( 'Webinar Snippet', 'text-domain' ),
				),
				array (
					'id' => 'webinar_snippet',
					'name' => esc_html__( 'Webinar Description', 'text-domain' ),
					'type' => 'wysiwyg',
				),
				array (
					'id' => 'broadcast_link',
					'type' => 'textarea',
					'name' => esc_html__( 'Broadcast/Video Link', 'text-domain' ),
				),
			),
		),
		// QM Course Profile
		array (
			'title' => esc_html__( 'QM Course Profile', 'text-domain' ),
			'id' => 'qm-course-profile',
			'post_types' => array('qm-course-profile'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'qm_email',
					'type' => 'text',
					'name' => esc_html__( 'Question Manager Email', 'text-domain' ),
				),
				array (
					'id' => 'course_id',
					'type' => 'text',
					'name' => esc_html__( 'Course ID', 'text-domain' ),
				),
				array (
					'id' => 'comments_id',
					'type' => 'text',
					'name' => esc_html__( 'Comments ID', 'text-domain' ),
				),
			),
		),
		// Question Managers Custom Fields
		array (
			'title' => esc_html__( 'Question Managers Custom Fields', 'text-domain' ),
			'id' => 'question-managers-custom-fields',
			'post_types' => array('question-manager'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'name',
					'type' => 'text',
					'name' => esc_html__( 'Name', 'text-domain' ),
				),
				array (
					'id' => 'email',
					'type' => 'text',
					'name' => esc_html__( 'Email', 'text-domain' ),
				),
				array (
					'id' => 'phone_number',
					'type' => 'text',
					'name' => esc_html__( 'Phone Number', 'text-domain' ),
				),
				array (
					'id' => 'password',
					'type' => 'text',
					'name' => esc_html__( 'Password', 'text-domain' ),
				),
				array (
					'id' => 'comments_id',
					'type' => 'text',
					'name' => esc_html__( 'Comments ID', 'text-domain' ),
				),
				array (
					'id' => 'course_id',
					'type' => 'post',
					'name' => esc_html__( 'Select Course', 'text-domain' ),
					'post_type' => array('course'),
					'field_type' => 'select',
					// 'clone' => 1,
					// 'sort_clone' => 1,
				),
				array (
					'id' => 'course_profile_id',
					'type' => 'text',
					'name' => esc_html__( 'Course Profile IDs', 'text-domain' ),
				),
			),
		),
		// Answers Custom Fields
		array (
			'title' => esc_html__( 'Question Managers Custom Fields', 'text-domain' ),
			'id' => 'question-managers-custom-fields',
			'post_types' => array('question-manager'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'name',
					'type' => 'text',
					'name' => esc_html__( 'Name', 'text-domain' ),
				),
				array (
					'id' => 'email',
					'type' => 'text',
					'name' => esc_html__( 'Email', 'text-domain' ),
				),
				array (
					'id' => 'phone_number',
					'type' => 'text',
					'name' => esc_html__( 'Phone Number', 'text-domain' ),
				),
				array (
					'id' => 'password',
					'type' => 'text',
					'name' => esc_html__( 'Password', 'text-domain' ),
				),
				array (
					'id' => 'comments_id',
					'type' => 'text',
					'name' => esc_html__( 'Comments ID', 'text-domain' ),
				),
				array (
					'id' => 'course_id',
					'type' => 'post',
					'name' => esc_html__( 'Select Course', 'text-domain' ),
					'post_type' => array('course'),
					'field_type' => 'select',
					// 'clone' => 1,
					// 'sort_clone' => 1,
				),
				array (
					'id' => 'course_profile_id',
					'type' => 'text',
					'name' => esc_html__( 'Course Profile IDs', 'text-domain' ),
				),
			),
		),
		// 	Paid Transactions
		array (
			'title' => esc_html__( 'Paid Transactions', 'text-domain' ),
			'id' => 'paid-transactions',
			'post_types' => array('paid-transaction'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'payment_date',
					'type' => 'text',
					'name' => esc_html__( 'Payment Date', 'text-domain' ),
				),
				array (
					'id' => 'expiry_date',
					'type' => 'text',
					'name' => esc_html__( 'Expiry Date', 'text-domain' ),
				),
				array (
					'id' => 'user_email',
					'type' => 'text',
					'name' => esc_html__( 'User Email', 'text-domain' ),
				),
				array (
					'id' => 'user_password',
					'type' => 'text',
					'name' => esc_html__( 'User Password', 'text-domain' ),
				),
				array (
					'id' => 'plan_id',
					'type' => 'text',
					'name' => esc_html__( 'Plan ID', 'text-domain' ),
				),
				array (
					'id' => 'installment_plan',
					'type' => 'text',
					'name' => esc_html__( 'Installment Plan', 'text-domain' ),
				),
				array (
					'id' => 'attendance_id',
					'type' => 'text',
					'name' => esc_html__( 'Attendance ID', 'text-domain' ),
				),
			),
		),
		// Lesson Attendance Custom Fields
		array (
			'title' => esc_html__( 'Lesson Attendance Custom Fields', 'text-domain' ),
			'id' => 'lesson-attendance-custom-fields',
			'post_types' => array( 'lesson-attendance'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'user_email',
					'type' => 'text',
					'name' => esc_html__( 'User Email', 'text-domain' ),
				),
				array (
					'id' => 'lesson_id',
					'type' => 'text',
					'name' => esc_html__( 'Lesson ID', 'text-domain' ),
				),
				array (
					'id' => 'course_id',
					'type' => 'text',
					'name' => esc_html__( 'Course ID', 'text-domain' ),
				),
				array (
					'id' => 'completion_date',
					'type' => 'text',
					'name' => esc_html__( 'Completion date', 'text-domain' ),
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
		// Status Custom Field
		array (
			'title' => esc_html__( 'Lesson Attendance Custom Fields', 'text-domain' ),
			'id' => 'lesson-attendance-custom-fields',
			'post_types' => array('lesson-attendance'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'user_email',
					'type' => 'text',
					'name' => esc_html__( 'User Email', 'text-domain' ),
				),
				array (
					'id' => 'lesson_id',
					'type' => 'text',
					'name' => esc_html__( 'Lesson ID', 'text-domain' ),
				),
				array (
					'id' => 'course_id',
					'type' => 'text',
					'name' => esc_html__( 'Course ID', 'text-domain' ),
				),
				array (
					'id' => 'completion_date',
					'type' => 'text',
					'name' => esc_html__( 'Completion date', 'text-domain' ),
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
		// Installment Custom fields
		array (
			'title' => esc_html__( 'Installment Custom fields', 'text-domain' ),
			'id' => 'installment-custom-fields',
			'post_types' => array('installment'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'Installment_id',
					'type' => 'text',
					'name' => esc_html__( 'Plan Sequence ID', 'text-domain' ),
				),
				array (
					'id' => 'lesson_duration',
					'type' => 'text',
					'name' => esc_html__( 'Lesson Duration', 'text-domain' ),
				),
				array (
					'id' => 'access_duration',
					'type' => 'text',
					'name' => esc_html__( 'Access Duration', 'text-domain' ),
				),
				array (
					'id' => 'installment_price',
					'type' => 'text',
					'name' => esc_html__( 'Amount', 'text-domain' ),
				),
				array (
					'id' => 'installment_plan_list',
					'type' => 'text',
					'name' => esc_html__( 'Installment Plan List', 'text-domain' ),
				),
				array (
					'id' => 'button_catchphrase',
					'type' => 'text',
					'name' => esc_html__( 'Action Button Catchphrase', 'text-domain' ),
				),
				array (
					'id' => 'installment_title',
					'type' => 'text',
					'name' => esc_html__( 'Installment Title', 'text-domain' ),
				),
				array (
					'id' => 'installment_snippet',
					'type' => 'text',
					'name' => esc_html__( 'Installment Snippet', 'text-domain' ),
				),
				array (
					'id' => 'next_installment',
					'type' => 'post',
					'name' => esc_html__( 'Next Installment', 'text-domain' ),
					'post_type' => array(
						0 => 'installment',
					),
					// 'field_type' => 'select_advanced',
					// 'clone' => 1,
					// 'sort_clone' => 1,
				),
			),
		),
		// Image Overlay 
		array (
			'title' => esc_html__( 'Image Overlay Section', 'text-domain' ),
			'id' => 'image-overlay-section',
			'post_types' => array('product'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'overlay_image',
					'type' => 'image_advanced',
					'name' => esc_html__( 'Background Image', 'text-domain' ),
					// 'max_file_uploads' => 1,
					// 'max_status' => false,
				),
				array (
					'id' => 'overlay_color',
					'name' => esc_html__( 'Overlay Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
			),
		),
		// Attendance Custom Fields
		array (
			'title' => esc_html__( 'Attendance Custom Fields', 'text-domain' ),
			'id' => 'attendance-custom-fields',
			'post_types' => array('attendance'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'user_email',
					'type' => 'text',
					'name' => esc_html__( 'User Email', 'text-domain' ),
				),
				array (
					'id' => 'lesson_id',
					'type' => 'text',
					'name' => esc_html__( 'Lesson ID', 'text-domain' ),
				),
				array (
					'id' => 'completion_date',
					'type' => 'text',
					'name' => esc_html__( 'Completion date', 'text-domain' ),
				),
			),
		),
		// Enrolment Custom Fields
		array (
			'title' => esc_html__( 'Enrolment Custom Fields', 'text-domain' ),
			'id' => 'enrolment-custom-fields',
			'post_types' => array('enrolment'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'first_name',
					'type' => 'text',
					'name' => esc_html__( 'First Name', 'text-domain' ),
				),
				array (
					'id' => 'last_name',
					'type' => 'text',
					'name' => esc_html__( 'Last Name', 'text-domain' ),
				),
				array (
					'id' => 'email_address',
					'type' => 'text',
					'name' => esc_html__( 'Email Address', 'text-domain' ),
				),
				array (
					'id' => 'phone_number',
					'type' => 'text',
					'name' => esc_html__( 'Phone number', 'text-domain' ),
				),
				array (
					'id' => 'country',
					'type' => 'text',
					'name' => esc_html__( 'Country', 'text-domain' ),
				),
				array (
					'id' => 'state',
					'type' => 'text',
					'name' => esc_html__( 'State', 'text-domain' ),
				),
				array (
					'id' => 'product_id',
					'type' => 'text',
					'name' => esc_html__( 'Product ID', 'text-domain' ),
				),
				array (
					'id' => 'plan_id',
					'type' => 'text',
					'name' => esc_html__( 'Plan ID', 'text-domain' ),
				),
				array (
					'id' => 'password',
					'type' => 'text',
					'name' => esc_html__( 'Password', 'text-domain' ),
				),
				array (
					'id' => 'enrollment_date',
					'type' => 'text',
					'name' => esc_html__( 'Enrolment Date', 'text-domain' ),
				),
				array (
					'id' => 'email_confirmation',
					'type' => 'text',
					'name' => esc_html__( 'Email Confirmed', 'text-domain' ),
				),
				array (
					'id' => 'enrolment_status',
					'type' => 'text',
					'name' => esc_html__( 'Enrolment Status', 'text-domain' ),
				),
			),
		),
		// 	Session Questions Field Group
		array (
			'title' => esc_html__( 'Session Questions Field Group', 'text-domain' ),
			'id' => 'session-questions-field-group',
			'post_types' => array('session-question'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'session_question',
					'type' => 'text',
					'name' => esc_html__( 'Question', 'text-domain' ),
				),
				array (
					'id' => 'answer_group',
					'type' => 'group',
					'name' => esc_html__( 'Answer group', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'title',
							'type' => 'text',
							'name' => esc_html__( 'Title', 'text-domain' ),
						),
						array (
							'id' => 'content',
							'name' => esc_html__( 'Content', 'text-domain' ),
							'type' => 'wysiwyg',
						),
						array (
							'id' => 'upload_image',
							'type' => 'image',
							'name' => esc_html__( 'Upload Image', 'text-domain' ),
							// 'max_file_uploads' => 5,
							// 'max_status' => false,
						),
						array (
							'id' => 'audio_url',
							'type' => 'url',
							'name' => esc_html__( 'Audio URL', 'text-domain' ),
						),
						array (
							'id' => 'video_url',
							'type' => 'url',
							'name' => esc_html__( 'Video URL', 'text-domain' ),
						),
						array (
							'id' => 'add_resource_group',
							'type' => 'group',
							'name' => esc_html__( 'Add Resource', 'text-domain' ),
							'fields' => array(
								array (
									'id' => 'resource_title',
									'type' => 'text',
									'name' => esc_html__( 'Title', 'text-domain' ),
								),
								array (
									'id' => 'resource_file_type',
									'type' => 'taxonomy_advanced',
									'name' => esc_html__( 'File Type', 'text-domain' ),
									'taxonomy' => 'category',
									'field_type' => 'select_advanced',
								),
							),
							'clone' => 1,
							// 'sort_clone' => 1,
							// 'default_state' => 'collapsed',
							// 'collapsible' => true,
						),
					),
					'clone' => 1,
					// 'sort_clone' => 1,
					// 'default_state' => 'collapsed',
					// 'collapsible' => true,
					// 'group_title' => '{#}',
				),
				array (
					'id' => 'session_id',
					'type' => 'text',
					'name' => esc_html__( 'Session', 'text-domain' ),
				),
				array (
					'id' => 'related_topic',
					'type' => 'text',
					'name' => esc_html__( 'Related Topic', 'text-domain' ),
				),
			),
		),
		// Lesson Questions Fields Group
		array (
			'title' => esc_html__( 'Lesson Questions Fields Group', 'text-domain' ),
			'id' => 'lesson-questions-fields-group',
			'post_types' => array('lesson-question'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'question',
					'type' => 'text',
					'name' => esc_html__( 'Question', 'text-domain' ),
				),
				array (
					'id' => 'comments_id',
					'type' => 'text',
					'name' => esc_html__( 'Comments ID', 'text-domain' ),
				),
				array (
					'id' => 'related_lesson_id',
					'type' => 'text',
					'name' => esc_html__( 'Related Lesson', 'text-domain' ),
				),
				array (
					'id' => 'related_topic_id',
					'type' => 'text',
					'name' => esc_html__( 'Related Topic', 'text-domain' ),
				),
				array (
					'id' => 'user_email',
					'type' => 'text',
					'name' => esc_html__( 'User Email', 'text-domain' ),
				),
				array (
					'id' => 'mark_as',
					'type' => 'text',
					'name' => esc_html__( 'Mark As', 'text-domain' ),
					// 'std' => 'Unanswered',
				),
			),
		),
		// Attach Plan
		 array (
			'title' => esc_html__( 'Attach Plan', 'text-domain' ),
			'id' => 'attach-plan',
			'post_types' => array('product'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'plan',
					'type' => 'post',
					'name' => esc_html__( 'Add Plan', 'text-domain' ),
					'post_type' => array('plan'),
					// 'field_type' => 'select_advanced',
					// 'clone' => 1,
					// 'sort_clone' => 1,
				),
			),
		),
		// Add Testimonial
		array (
			'title' => esc_html__( 'Add Testimonial', 'text-domain' ),
			'id' => 'add-testimonial',
			'post_types' => array('product'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array (
				array (
					'id' => 'testimonial_group',
					'type' => 'group',
					'name' => esc_html__( 'Add Testimonial', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'testimonial_content',
							'type' => 'textarea',
							'name' => esc_html__( 'Content', 'text-domain' ),
						),
						array (
							'id' => 'add_person',
							'type' => 'post',
							'name' => esc_html__( 'Add Person', 'text-domain' ),
							'post_type' => array( 'people'),
							// 'field_type' => 'select_advanced',
						),
					),
					'clone' => 1,
					// 'sort_clone' => 1,
					// 'default_state' => 'collapsed',
					// 'collapsible' => true,
					// 'group_title' => '{#}',
				),
				array (
					'id' => 'show_testimonial',
					'name' => esc_html__( 'Show/Hide', 'text-domain' ),
					'type' => 'radio',
					'options' => array('show', 'hide'),
					// 'inline' => 1,
				),
				array (
					'id' => 'testimonial_button_bg',
					'name' => esc_html__( 'Button Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
			),
		),
		// FAQ Section
		array (
			'title' => esc_html__( 'FAQ Section', 'text-domain' ),
			'id' => 'faq-section',
			'post_types' => array('product'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'faq_bgcolor',
					'name' => esc_html__( 'Background Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
				array (
					'id' => 'faq_section_title',
					'type' => 'text',
					'name' => esc_html__( 'Section Title', 'text-domain' ),
				),
				array (
					'id' => 'faq_section_snippet',
					'type' => 'textarea',
					'name' => esc_html__( 'Section Snippet', 'text-domain' ),
				),
				array (
					'id' => 'add_faq_group',
					'type' => 'group',
					'name' => esc_html__( 'Add FAQ', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'question',
							'type' => 'text',
							'name' => esc_html__( 'Question', 'text-domain' ),
						),
						array (
							'id' => 'answer',
							'type' => 'textarea',
							'name' => esc_html__( 'Answer', 'text-domain' ),
						),
					),
					'clone' => 1,
					// 'sort_clone' => 1,
					// 'default_state' => 'collapsed',
					// 'collapsible' => true,
				),
				array (
					'id' => 'show_faq',
					'name' => esc_html__( 'Show/Hide', 'text-domain' ),
					'type' => 'radio',
					'options' => array('show', 'hide'),
					// 'inline' => 1,
				),
				array (
					'id' => 'faq_button_bg',
					'name' => esc_html__( 'Button Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
			),
		),
		// Facilitator Section
		array (
			'title' => esc_html__( 'Facilitator Section', 'text-domain' ),
			'id' => 'facilitator-section',
			'post_types' => array('product'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'facilitator_bgcolor',
					'name' => esc_html__( 'Background Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
				array (
					'id' => 'facilitator_section_title',
					'type' => 'text',
					'name' => esc_html__( 'Section Title', 'text-domain' ),
				),
				array (
					'id' => 'facilitator_snippet',
					'type' => 'textarea',
					'name' => esc_html__( 'Section Snippet', 'text-domain' ),
				),
				array (
					'id' => 'add_facilitator_group',
					'type' => 'group',
					'name' => esc_html__( 'Add Facilitator', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'add_person',
							'type' => 'post',
							'name' => esc_html__( 'Add Person', 'text-domain' ),
							'post_type' => array( 'people' ),
							'field_type' => 'select_advanced',
						),
						array (
							'id' => 'add_person_title',
							'type' => 'text',
							'name' => esc_html__( 'Add Title', 'text-domain' ),
						),
					),
					'clone' => 1,
					// 'sort_clone' => 1,
					// 'default_state' => 'collapsed',
					// 'collapsible' => true,
				),
				array (
					'id' => 'show_facilitator',
					'name' => esc_html__( 'Show/Hide', 'text-domain' ),
					'type' => 'radio',
					'options' => array('show', 'hide'),
					// 'inline' => 1,
				),
				array (
					'id' => 'facilitator_button_bg',
					'name' => esc_html__( 'Button Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
			),
		),
		// 	How it works Section
		array (
			'title' => esc_html__( 'Facilitator Section', 'text-domain' ),
			'id' => 'facilitator-section',
			'post_types' => array( 'product'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'facilitator_bgcolor',
					'name' => esc_html__( 'Background Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
				array (
					'id' => 'facilitator_section_title',
					'type' => 'text',
					'name' => esc_html__( 'Section Title', 'text-domain' ),
				),
				array (
					'id' => 'facilitator_snippet',
					'type' => 'textarea',
					'name' => esc_html__( 'Section Snippet', 'text-domain' ),
				),
				array (
					'id' => 'add_facilitator_group',
					'type' => 'group',
					'name' => esc_html__( 'Add Facilitator', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'add_person',
							'type' => 'post',
							'name' => esc_html__( 'Add Person', 'text-domain' ),
							'post_type' => array('people'),
							// 'field_type' => 'select_advanced',
						),
						array (
							'id' => 'add_person_title',
							'type' => 'text',
							'name' => esc_html__( 'Add Title', 'text-domain' ),
						),
					),
					'clone' => 1,
					// 'sort_clone' => 1,
					// 'default_state' => 'collapsed',
					// 'collapsible' => true,
				),
				array (
					'id' => 'show_facilitator',
					'name' => esc_html__( 'Show/Hide', 'text-domain' ),
					'type' => 'radio',
					'options' => array('show', 'hide'),
					// 'inline' => 1,
				),
				array (
					'id' => 'facilitator_button_bg',
					'name' => esc_html__( 'Button Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
			),
		),
		// Curriculum section
		array (
			'title' => esc_html__( 'Curriculum section', 'text-domain' ),
			'id' => 'curriculum-section',
			'post_types' => array('product'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'curriculum_bgcolor',
					'name' => esc_html__( 'Background Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
				array (
					'id' => 'curriculum_headline',
					'type' => 'text',
					'name' => esc_html__( 'Headline', 'text-domain' ),
				),
				array (
					'id' => 'curriculum_snippet',
					'type' => 'textarea',
					'name' => esc_html__( 'Snippet', 'text-domain' ),
				),
				array (
					'id' => 'add_content_group',
					'type' => 'group',
					'name' => esc_html__( 'Add Content', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'content_label',
							'type' => 'text',
							'name' => esc_html__( 'Label', 'text-domain' ),
						),
						array (
							'id' => 'content_topic',
							'type' => 'text',
							'name' => esc_html__( 'Content Topic', 'text-domain' ),
						),
						array (
							'id' => 'topic_short_description',
							'type' => 'textarea',
							'name' => esc_html__( 'Short Description', 'text-domain' ),
						),
					),
					'clone' => 1,
					// 'sort_clone' => 1,
					// 'default_state' => 'collapsed',
					// 'collapsible' => true,
					// 'group_title' => '{#}',
				),
				array (
					'id' => 'show_curriculum',
					'name' => esc_html__( 'Show/Hide', 'text-domain' ),
					'type' => 'radio',
					'options' => array('show', 'hide'),
					// 'inline' => 1,
				),
				array (
					'id' => 'curriculum_button_bg',
					'name' => esc_html__( 'Button Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
			),
		),
		// Feature Section
		array (
			'title' => esc_html__( 'Curriculum section', 'text-domain' ),
			'id' => 'curriculum-section',
			'post_types' => array('product'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'curriculum_bgcolor',
					'name' => esc_html__( 'Background Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
				array (
					'id' => 'curriculum_headline',
					'type' => 'text',
					'name' => esc_html__( 'Headline', 'text-domain' ),
				),
				array (
					'id' => 'curriculum_snippet',
					'type' => 'textarea',
					'name' => esc_html__( 'Snippet', 'text-domain' ),
				),
				array (
					'id' => 'add_content_group',
					'type' => 'group',
					'name' => esc_html__( 'Add Content', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'content_label',
							'type' => 'text',
							'name' => esc_html__( 'Label', 'text-domain' ),
						),
						array (
							'id' => 'content_topic',
							'type' => 'text',
							'name' => esc_html__( 'Content Topic', 'text-domain' ),
						),
						array (
							'id' => 'topic_short_description',
							'type' => 'textarea',
							'name' => esc_html__( 'Short Description', 'text-domain' ),
						),
					),
					'clone' => 1,
					// 'sort_clone' => 1,
					// 'default_state' => 'collapsed',
					// 'collapsible' => true,
					// 'group_title' => '{#}',
				),
				array (
					'id' => 'show_curriculum',
					'name' => esc_html__( 'Show/Hide', 'text-domain' ),
					'type' => 'radio',
					'options' => array('show', 'hide'),
					// 'inline' => 1,
				),
				array (
					'id' => 'curriculum_button_bg',
					'name' => esc_html__( 'Button Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
			),
		),
		// Section 2
		array (
			'title' => esc_html__( 'Section 2', 'text-domain' ),
			'id' => 'section-2',
			'post_types' => array('product'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'section_two_bgcolor',
					'name' => esc_html__( 'Background Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
				array (
					'id' => 'course_short_description',
					'type' => 'text',
					'name' => esc_html__( 'Course Short Description', 'text-domain' ),
				),
				array (
					'id' => 'course_long_description',
					'type' => 'textarea',
					'name' => esc_html__( 'Course Long Description', 'text-domain' ),
				),
				array (
					'id' => 'show_section_two',
					'name' => esc_html__( 'Show/Hide', 'text-domain' ),
					'type' => 'radio',
					'options' => array('shiow', 'hide'),
					// 'inline' => 1,
				),
				array (
					'id' => 'section_two_button_bg',
					'name' => esc_html__( 'Button Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
			),
		),
		// Header Section
		 array (
			'title' => esc_html__( 'Header Section', 'text-domain' ),
			'id' => 'header-section',
			'post_types' => array('product'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'course_catchphrase',
					'type' => 'group',
					'name' => esc_html__( 'Course Catchphrase', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'line_one',
							'type' => 'text',
							'name' => esc_html__( 'Line 1', 'text-domain' ),
						),
						array (
							'id' => 'line_two',
							'type' => 'text',
							'name' => esc_html__( 'Line 2', 'text-domain' ),
						),
					),
					// 'default_state' => 'expanded',
				),
				array (
					'id' => 'course_image',
					'type' => 'image',
					'name' => esc_html__( 'Image', 'text-domain' ),
					// 'max_file_uploads' => 1,
					// 'max_status' => false,
				),
				array (
					'id' => 'background_color',
					'name' => esc_html__( 'Background Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
			),
		),
		// General Information
		 array (
			'title' => esc_html__( 'General Information', 'text-domain' ),
			'id' => 'general-information',
			'post_types' => array('product'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'product_logo',
					'type' => 'image',
					'name' => esc_html__( 'Product Logo', 'text-domain' ),
					// 'max_file_uploads' => 1,
					// 'image_size' => 'thumbnail',
					// 'max_status' => false,
				),
				array (
					'id' => 'product_list_id',
					'type' => 'text',
					'name' => esc_html__( 'Product List ID', 'text-domain' ),
				),
				array (
					'id' => 'product_type',
					'name' => esc_html__( 'Product Type', 'text-domain' ),
					'type' => 'select',
					// 'placeholder' => esc_html__( 'Select an Item', 'text-domain' ),
					'options' => array('Course', 'Session'),
				),
			),
		),
		 // Opportunity Metabox
		 array (
			'title' => esc_html__( 'Opportunity Metabox', 'text-domain' ),
			'id' => 'opportunity-metabox',
			'post_types' => array('opportunity'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'title',
					'type' => 'text',
					'name' => esc_html__( 'Title', 'text-domain' ),
				),
				array (
					'id' => 'short_description',
					'type' => 'textarea',
					'name' => esc_html__( 'Short description', 'text-domain' ),
				),
				array (
					'id' => 'image',
					'type' => 'image',
					'name' => esc_html__( 'Image', 'text-domain' ),
					// 'max_file_uploads' => 1,
					// 'image_size' => 'thumbnail',
					// 'max_status' => false,
				),
				array (
					'id' => 'industry',
					'type' => 'taxonomy_advanced',
					'name' => esc_html__( 'Industry', 'text-domain' ),
					'taxonomy' => 'category',
					// 'field_type' => 'select_advanced',
					// 'multiple' => true,
				),
				array (
					'id' => 'long_description',
					'type' => 'textarea',
					'name' => esc_html__( 'Long Description', 'text-domain' ),
				),
			),
		),
		 // Session Metabox
		 array (
			'title' => esc_html__( 'Session Metabox', 'text-domain' ),
			'id' => 'session-metabox',
			'post_types' => array('session'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'name',
					'type' => 'text',
					'name' => esc_html__( 'Name', 'text-domain' ),
				),
				array (
					'id' => 'short_description',
					'type' => 'textarea',
					'name' => esc_html__( 'Short description', 'text-domain' ),
				),
				array (
					'id' => 'full_description',
					'type' => 'textarea',
					'name' => esc_html__( 'Full description', 'text-domain' ),
				),
				array (
					'id' => 'hosts',
					'type' => 'group',
					'name' => esc_html__( 'Add Host', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'session_host',
							'type' => 'post',
							'name' => esc_html__( 'Select Host', 'text-domain' ),
							'post_type' => array(
								0 => 'people',
							),
							'field_type' => 'select_advanced',
						),
						array (
							'id' => 'host_details',
							'type' => 'text',
							'name' => esc_html__( 'Host details', 'text-domain' ),
						),
					),
					'clone' => 1,
					// 'sort_clone' => 1,
					// 'default_state' => 'collapsed',
					// 'collapsible' => true,
				),
				array (
					'id' => 'closing_date',
					'type' => 'text',
					'name' => esc_html__( 'Closing Date', 'text-domain' ),
				),
				array (
					'id' => 'status',
					'name' => esc_html__( 'Status', 'text-domain' ),
					'type' => 'select_advanced',
					'placeholder' => esc_html__( 'Select an Item', 'text-domain' ),
					'options' => array('Published', 'Unpublished')
				),
			),
		),
		 // Transaction Metabox
		 array (
			'title' => esc_html__( 'Transaction Metabox', 'text-domain' ),
			'id' => 'transaction-metabox',
			'post_types' => array('transaction'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'transaction_date',
					'type' => 'text',
					'name' => esc_html__( 'Transaction Date', 'text-domain' ),
				),
				array (
					'id' => 'payment_date',
					'type' => 'text',
					'name' => esc_html__( 'Payment Date', 'text-domain' ),
				),
				array (
					'id' => 'expiry_date',
					'type' => 'text',
					'name' => esc_html__( 'Expiry Date', 'text-domain' ),
				),
				array (
					'id' => 'payment_status',
					'type' => 'text',
					'name' => esc_html__( 'Payment Status', 'text-domain' ),
				),
				array (
					'id' => 'user_email',
					'type' => 'text',
					'name' => esc_html__( 'User Email', 'text-domain' ),
				),
				array (
					'id' => 'user_password',
					'type' => 'text',
					'name' => esc_html__( 'User Password', 'text-domain' ),
				),
				array (
					'id' => 'transaction_status',
					'type' => 'text',
					'name' => esc_html__( 'Transaction Status', 'text-domain' ),
				),
				array (
					'id' => 'transaction_type',
					'type' => 'text',
					'name' => esc_html__( 'Transaction Type', 'text-domain' ),
				),
				array (
					'id' => 'plan_id',
					'type' => 'text',
					'name' => esc_html__( 'Plan ID', 'text-domain' ),
				),
				array (
					'id' => 'installment_plan',
					'type' => 'text',
					'name' => esc_html__( 'Installment Plan', 'text-domain' ),
				),
				array (
					'id' => 'lesson_duration',
					'type' => 'text',
					'name' => esc_html__( 'Lesson Duration', 'text-domain' ),
				),
				array (
					'id' => 'access_duration',
					'type' => 'text',
					'name' => esc_html__( 'Access Duration', 'text-domain' ),
				),
			),
		),
		 // Add Installments
		array (
			'title' => esc_html__( 'Add Installments', 'text-domain' ),
			'id' => 'add-installments',
			'post_types' => array('plan'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'installment_group',
					'type' => 'group',
					'name' => esc_html__( 'Add Installments', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'plan_sequence_id',
							'type' => 'text',
							'name' => esc_html__( 'Plan Sequence ID', 'text-domain' ),
						),
						array (
							'id' => 'installment',
							'type' => 'post',
							'name' => esc_html__( 'Select Installment', 'text-domain' ),
							'post_type' => array('installment'),
							// 'field_type' => 'select_advanced',
							// 'clone' => 1,
							// 'sort_clone' => 1,
						),
					),
					'clone' => 1,
					// 'default_state' => 'expanded',
					// 'collapsible' => true,
				),
			),
		),
		 // Add Announcements & Reach Out Section
		array (
				'title' => esc_html__( 'Add Announcements & Reach Out Section', 'text-domain' ),
				'id' => 'add-announcements-reach-out-section',
				'post_types' => array('plan'),
				// 'context' => 'normal',
				// 'priority' => 'high',
				'fields' => array(
					array (
						'id' => 'announcement_group',
						'type' => 'group',
						'name' => esc_html__( 'Add Announcements', 'text-domain' ),
						'fields' => array(
							array (
								'id' => 'content',
								'type' => 'textarea',
								'name' => esc_html__( 'Content', 'text-domain' ),
							),
							array (
								'id' => 'button_label',
								'type' => 'text',
								'name' => esc_html__( 'Button Label', 'text-domain' ),
							),
							array (
								'id' => 'button_url',
								'type' => 'text',
								'name' => esc_html__( 'Button URL', 'text-domain' ),
							),
						),
						'clone' => 1,
						// 'sort_clone' => 1,
						// 'default_state' => 'expanded',
						// 'collapsible' => true,
					),
					array (
						'id' => 'reach_out_group',
						'type' => 'group',
						'name' => esc_html__( 'Reach Out', 'text-domain' ),
						'fields' => array(
							array (
								'id' => 'icon',
								'type' => 'image',
								'name' => esc_html__( 'Icon', 'text-domain' ),
								// 'max_file_uploads' => 1,
								// 'image_size' => 'thumbnail',
								// 'max_status' => false,
							),
							array (
								'id' => 'header',
								'type' => 'text',
								'name' => esc_html__( 'Header', 'text-domain' ),
							),
							array (
								'id' => 'snippet',
								'type' => 'textarea',
								'name' => esc_html__( 'Snippet', 'text-domain' ),
							),
							array (
								'id' => 'reach_out_url',
								'type' => 'text',
								'name' => esc_html__( 'Reach Redirect Link', 'text-domain' ),
							),
						),
						'clone' => 1,
						// 'sort_clone' => 1,
						// 'default_state' => 'expanded',
						// 'collapsible' => true,
					),
				),
			),
		 // Plan Metabox
		array (
			'title' => esc_html__( 'Plan Metabox', 'text-domain' ),
			'id' => 'plan-metabox',
			'post_types' => array('plan'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'plan_name',
					'type' => 'text',
					'name' => esc_html__( 'Plan Name', 'text-domain' ),
				),
				array (
					'id' => 'product_type',
					'name' => esc_html__( 'Product Type', 'text-domain' ),
					'type' => 'select_advanced',
					'placeholder' => esc_html__( 'Select a Product', 'text-domain' ),
					'options' => array('Session','Course', 'Micro Course'),
				),
				array (
					'id' => 'product_access',
					'name' => esc_html__( 'Product Access', 'text-domain' ),
					'type' => 'radio',
					'options' => array("Free", "Paid"),
				),
				array (
					'id' => 'first_plan_fee',
					'type' => 'text',
					'name' => esc_html__( 'Plan Fee (First Access)', 'text-domain' ),
				),
				array (
					'id' => 'is_renewable',
					'name' => esc_html__( 'Can Renew?', 'text-domain' ),
					'type' => 'radio',
					'options' => array("Yes", "No"),
				),
				array (
					'id' => 'plan_renewal_fee',
					'type' => 'text',
					'name' => esc_html__( 'Plan Renewal Fee', 'text-domain' ),
				),
				array (
					'id' => 'course_duration',
					'type' => 'text',
					'name' => esc_html__( 'Access Duration', 'text-domain' ),
				),
				array (
					'id' => 'plan_color',
					'name' => esc_html__( 'Plan Color', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
				array (
					'id' => 'plan_logo',
					'type' => 'image_advanced',
					'name' => esc_html__( 'Plan Logo', 'text-domain' ),
					// 'max_file_uploads' => 1,
					// 'image_size' => 'thumbnail',
					// 'max_status' => false,
				),
				array (
					'id' => 'plan_background_image',
					'type' => 'image',
					'name' => esc_html__( 'Background Image', 'text-domain' ),
					// 'max_file_uploads' => 1,
					// 'max_status' => false,
				),
				array (
					'id' => 'product_features',
					'type' => 'group',
					'name' => esc_html__( 'Product Features', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'feature',
							'type' => 'text',
							'name' => esc_html__( 'Feature', 'text-domain' ),
						),
					),
					'clone' => 1,
					// 'default_state' => 'expanded',
				),
				array (
					'id' => 'list_one_id',
					'type' => 'text',
					'name' => esc_html__( 'Plan List', 'text-domain' ),
				),
				array (
					'id' => 'renewal_plan',
					'type' => 'post',
					'name' => esc_html__( 'Renewal Plan', 'text-domain' ),
					'post_type' => array('installment'),
					// 'field_type' => 'select_advanced',
				),
				array (
					'id' => 'plan_snippet',
					'type' => 'text',
					'name' => esc_html__( 'Plan Snippet', 'text-domain' ),
				),
				array (
					'id' => 'plan_dashboard_header',
					'type' => 'text',
					'name' => esc_html__( 'Plan Dashboard Header', 'text-domain' ),
				),
				array (
					'id' => 'plan_dashboard_snippet',
					'type' => 'text',
					'name' => esc_html__( 'Plan Dashboard Snippet', 'text-domain' ),
				),
			),
		),
		 // Add Assets
		array (
			'title' => esc_html__( 'Add Assets', 'text-domain' ),
			'id' => 'add-assets',
			'post_types' => array('plan'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'asset_display_type',
					'name' => esc_html__( 'Asset Display Type', 'text-domain' ),
					'type' => 'radio',
					'options' => array('Single-Column Grid', 'Multi-Column Grid'),
					// 'inline' => 1,
					// 'required' => 1,
				),
				array (
					'id' => 'add_assets_group',
					'type' => 'group',
					'name' => esc_html__( 'Add Assets', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'asset_type',
							'name' => esc_html__( 'Asset Type', 'text-domain' ),
							'type' => 'radio',
							'options' => array('Course', 'Webinar', 'Session'),
							// 'inline' => 1,
						),
						array (
							'id' => 'course_name',
							'type' => 'post',
							'name' => esc_html__( 'Select Course', 'text-domain' ),
							'post_type' => array('course'),
							// 'field_type' => 'select',
							// 'placeholder' => esc_html__( 'Select Course', 'text-domain' ),
							// 'visible' => array(
							// 	'when' => array(
							// 		array (
							// 			0 => 'asset_type',
							// 			1 => '=',
							// 			2 => 'Course',
							// 		),
							// 	),
							// 	'relation' => 'and',
							// ),
						),
						array (
							'id' => 'select_session',
							'type' => 'post',
							'name' => esc_html__( 'Select Session', 'text-domain' ),
							'post_type' => array('session'),
							'field_type' => 'select',
							// 'placeholder' => esc_html__( 'Select Session', 'text-domain' ),
							// 'visible' => array(
							// 	'when' => array(
							// 		array (
							// 			0 => 'asset_type',
							// 			1 => '=',
							// 			2 => 'Session',
							// 		),
							// 	),
							// 	'relation' => 'and',
							// ),
						),
						array (
							'id' => 'select_webinar',
							'type' => 'post',
							'name' => esc_html__( 'Select Webinar', 'text-domain' ),
							'post_type' => array('webinar'),
							// 'field_type' => 'select',
							// 'placeholder' => esc_html__( 'Select Webinar', 'text-domain' ),
							// 'visible' => array(
							// 	'when' => array(
							// 		array (
							// 			0 => 'asset_type',
							// 			1 => '=',
							// 			2 => 'Webinar',
							// 		),
							// 	),
							// 	'relation' => 'and',
							// ),
						),
						array (
							'id' => 'asset_icon',
							'type' => 'image',
							'name' => esc_html__( 'Asset Icon', 'text-domain' ),
							// 'max_file_uploads' => 1,
							// 'image_size' => 'thumbnail',
							// 'max_status' => false,
						),
						array (
							'id' => 'highlight_title',
							'type' => 'text',
							'name' => esc_html__( 'Highlight Title', 'text-domain' ),
						),
						array (
							'id' => 'highlight_snippet',
							'type' => 'textarea',
							'name' => esc_html__( 'Highlight Snippet', 'text-domain' ),
						),
					),
					'clone' => 1,
					// 'sort_clone' => 1,
					// 'default_state' => 'expanded',
					// 'collapsible' => true,
				),
			),
		),
		 // Questions Metabox
		array (
			'title' => esc_html__( 'Questions Metabox', 'text-domain' ),
			'id' => 'questions-metabox',
			'post_types' => array('question'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'answer',
					'type' => 'textarea',
					'name' => esc_html__( 'Answer', 'text-domain' ),
				),
			),
		),
		 // FAQ Custom Fields
		array (
			'title' => esc_html__( 'FAQ Custom Fields', 'text-domain' ),
			'id' => 'faq-custom-fields',
			'post_types' => array('faq'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'question',
					'type' => 'text',
					'name' => esc_html__( 'Question', 'text-domain' ),
				),
				array (
					'id' => 'answer',
					'type' => 'textarea',
					'name' => esc_html__( 'Answer', 'text-domain' ),
				),
				array (
					'id' => 'category',
					'type' => 'taxonomy_advanced',
					'name' => esc_html__( 'Category', 'text-domain' ),
					'taxonomy' => 'category',
					// 'field_type' => 'select_advanced',
				),
			),
		),
		//	Blog Custom Fields
		array (
			'title' => esc_html__( 'Blog Custom Fields', 'text-domain' ),
			'id' => 'blog-custom-fields',
			'post_types' => array('blog'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'short_description',
					'type' => 'textarea',
					'name' => esc_html__( 'Short Description', 'text-domain' ),
				),
				array (
					'id' => 'content',
					'name' => esc_html__( 'Content', 'text-domain' ),
					'type' => 'wysiwyg',
				),
				array (
					'id' => 'image',
					'type' => 'image_advanced',
					'name' => esc_html__( 'Image', 'text-domain' ),
					// 'max_file_uploads' => 10,
					// 'max_status' => false,
				),
				array (
					'id' => 'topic',
					'type' => 'taxonomy_advanced',
					'name' => esc_html__( 'Topic', 'text-domain' ),
					'taxonomy' => 'topic',
					// 'field_type' => 'select_advanced',
				),
				array (
					'id' => 'category',
					'type' => 'taxonomy_advanced',
					'name' => esc_html__( 'Category', 'text-domain' ),
					'taxonomy' => 'category',
					// 'field_type' => 'select_advanced',
				),
				array (
					'id' => 'tag',
					'type' => 'taxonomy_advanced',
					'name' => esc_html__( 'Tags', 'text-domain' ),
					'taxonomy' => 'post_tag',
					// 'field_type' => 'select_advanced',
				),
			),
		),
		// Library Custom Fields
		array (
			'title' => esc_html__( 'Blog Custom Fields', 'text-domain' ),
			'id' => 'blog-custom-fields',
			'post_types' => array('blog'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'short_description',
					'type' => 'textarea',
					'name' => esc_html__( 'Short Description', 'text-domain' ),
				),
				array (
					'id' => 'content',
					'name' => esc_html__( 'Content', 'text-domain' ),
					'type' => 'wysiwyg',
				),
				array (
					'id' => 'image',
					'type' => 'image_advanced',
					'name' => esc_html__( 'Image', 'text-domain' ),
					// 'max_file_uploads' => 10,
					// 'max_status' => false,
				),
				array (
					'id' => 'topic',
					'type' => 'taxonomy_advanced',
					'name' => esc_html__( 'Topic', 'text-domain' ),
					'taxonomy' => 'topic',
					// 'field_type' => 'select_advanced',
				),
				array (
					'id' => 'category',
					'type' => 'taxonomy_advanced',
					'name' => esc_html__( 'Category', 'text-domain' ),
					'taxonomy' => 'category',
					// 'field_type' => 'select_advanced',
				),
				array (
					'id' => 'tag',
					'type' => 'taxonomy_advanced',
					'name' => esc_html__( 'Tags', 'text-domain' ),
					'taxonomy' => 'post_tag',
					// 'field_type' => 'select_advanced',
				),
			),
		),
		// Lessons Custom Fields
		array (
			'title' => esc_html__( 'Lessons Custom Fields', 'text-domain' ),
			'id' => 'lessons-custom-fields',
			'post_types' => array('session', 'lesson'),
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
							'type' => 'image_advanced',
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
							'options' => array('yes', 'no'),
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
							'clone' => 1,
							// 'sort_clone' => 1,
							// 'default_state' => 'collapsed',
							// 'collapsible' => true,
						),
						array (
							'id' => 'highlights_group',
							'type' => 'group',
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
					'clone' => 1,
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
		// Micro Course Custom Fields
		array (
				'title' => esc_html__( 'Micro Course Custom Fields', 'text-domain' ),
				'id' => 'micro-course-custom-fields',
				'post_types' => array('micro-course'),
				// 'context' => 'normal',
				// 'priority' => 'high',
				'fields' => array(
					array (
						'id' => 'course_description',
						'type' => 'textarea',
						'name' => esc_html__( 'Course Description', 'text-domain' ),
					),
					array (
						'id' => 'micro_course_lesson',
						'type' => 'post',
						'name' => esc_html__( 'Add Lesson', 'text-domain' ),
						'post_type' => array('add-lesson',),
						// 'field_type' => 'select_advanced',
						// 'clone' => 1,
						// 'sort_clone' => 1,
					),
					array (
						'id' => 'section_post',
						'type' => 'post',
						'name' => esc_html__( 'Select Section', 'text-domain' ),
						'post_type' => 'post',
						// 'field_type' => 'select_advanced',
					),
					array (
						'id' => 'section_category',
						'type' => 'taxonomy_advanced',
						'name' => esc_html__( 'Select Section', 'text-domain' ),
						'taxonomy' => 'category',
						// 'field_type' => 'select_advanced',
					),
					array (
						'id' => 'mini_cause_faq',
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
					),
					array (
						'id' => 'feature',
						'type' => 'group',
						'name' => esc_html__( 'Add Feature', 'text-domain' ),
						'fields' => array(
							array (
								'id' => 'feature_image',
								'type' => 'image',
								'name' => esc_html__( 'Image', 'text-domain' ),
								// 'max_file_uploads' => 1,
								// 'image_size' => 'thumbnail',
								// 'max_status' => false,
							),
							array (
								'id' => 'feature_title',
								'type' => 'text',
								'name' => esc_html__( 'Title', 'text-domain' ),
							),
							array (
								'id' => 'feature_description',
								'type' => 'textarea',
								'name' => esc_html__( 'Short description', 'text-domain' ),
							),
						),
						'clone' => 1,
						// 'default_state' => 'collapsed',
						// 'collapsible' => true,
					),
					array (
						'id' => 'facilitator',
						'type' => 'post',
						'name' => esc_html__( 'Add Facilitator', 'text-domain' ),
						'post_type' => array('add-facilitator'),
						// 'field_type' => 'select_advanced',
						// 'clone' => 1,
						// 'sort_clone' => 1,
					),
					array (
						'id' => 'open_status',
						'name' => esc_html__( 'Open Status', 'text-domain' ),
						'type' => 'select_advanced',
						'placeholder' => esc_html__( 'Select an Item', 'text-domain' ),
						'options' => array('Open', 'Coming Soon'),
					),
				),
			),
		// Courses Custom Fields
		array (
				'title' => esc_html__( 'Courses Custom Fields', 'text-domain' ),
				'id' => 'courses-custom-fields',
				'post_types' => array('course'),
				// 'context' => 'normal',
				// 'priority' => 'high',
				'fields' => array(
					array (
						'id' => 'course_logo',
						'type' => 'image',
						'name' => esc_html__( 'Course Logo', 'text-domain' ),
						// 'max_file_uploads' => 1,
						// 'image_size' => 'thumbnail',
						// 'max_status' => false,
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
						// 'placeholder' => esc_html__( 'Select an Item', 'text-domain' ),
						'options' => array('Full Course', 'Micro Course', 'Webinar'),
					),
					array (
						'id' => 'broadcast_link',
						'type' => 'textarea',
						'name' => esc_html__( 'Broadcast/Video Link', 'text-domain' ),
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
						'id' => 'course_description',
						'type' => 'textarea',
						'name' => esc_html__( 'Course Description', 'text-domain' ),
					),
					array (
						'id' => 'course_image',
						'type' => 'image_advanced',
						'name' => esc_html__( 'Course Image', 'text-domain' ),
						// 'max_file_uploads' => 1,
						// 'max_status' => false,
					),
					array (
						'id' => 'status',
						'name' => esc_html__( 'Open Status', 'text-domain' ),
						'type' => 'select_advanced',
						'placeholder' => esc_html__( 'Select an Item', 'text-domain' ),
						'options' => array('Open', 'Coming Soon'),
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
		// Add Course Modules & Lessons
		 array (
			'title' => esc_html__( 'Add Course Modules & Lessons', 'text-domain' ),
			'id' => 'add-course-modules-lessons',
			'post_types' => array( 'course'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'add_item_group',
					'type' => 'group',
					'name' => esc_html__( 'Add Item', 'text-domain' ),
					'fields' => array(
						array (
							'id' => 'item_type',
							'name' => esc_html__( 'Item Type', 'text-domain' ),
							'type' => 'select',
							// 'placeholder' => esc_html__( 'Select an Item', 'text-domain' ),
							'options' => array('Module', 'Lesson','Quiz'),
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
									'post_type' => array('lesson'),
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
									// 'inline' => 1,
								),
								array (
									'id' => 'prerequisite_lesson',
									'type' => 'post',
									'name' => esc_html__( 'Prerequisite Lesson', 'text-domain' ),
									'post_type' => array('lesson'),
									// 'field_type' => 'select_advanced',
								),
								array (
									'id' => 'next_lesson',
									'type' => 'post',
									'name' => esc_html__( 'Next Lesson', 'text-domain' ),
									'post_type' => array('lesson'),
									// 'field_type' => 'select_advanced',
								),
							),
							'clone' => 1,
							// 'sort_clone' => 1,
							// 'default_state' => 'collapsed',
							// 'collapsible' => true,
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
		// Facilitators Custom Fields
		array (
			'title' => esc_html__( 'Facilitators Custom Fields', 'text-domain' ),
			'id' => 'facilitators-custom-fields',
			'post_types' => array('add-facilitator'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'facilitators_image',
					'type' => 'image',
					'name' => esc_html__( 'Image', 'text-domain' ),
					// 'max_file_uploads' => 4,
					// 'max_status' => false,
				),
				array (
					'id' => 'linkedin_profile',
					'type' => 'url',
					'name' => esc_html__( 'Linkedin Profile', 'text-domain' ),
				),
				array (
					'id' => 'short_description',
					'type' => 'textarea',
					'name' => esc_html__( 'Short Description', 'text-domain' ),
				),
			),
		),
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
		// Section Custom Fields
		 array (
			'title' => esc_html__( 'Section Custom Fields', 'text-domain' ),
			'id' => 'section-custom-fields',
			'post_types' => array('section'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'section_description',
					'type' => 'textarea',
					'name' => esc_html__( 'Section Description', 'text-domain' ),
				),
				array (
					'id' => 'section_picture',
					'type' => 'image_advanced',
					'name' => esc_html__( 'Section Picture', 'text-domain' ),
					// 'max_file_uploads' => 4,
					// 'max_status' => false,
				),
			),
		),
		 // Theme custom Fields
		 array (
			'title' => esc_html__( 'Theme-custom-fields', 'text-domain' ),
			'id' => 'theme-custom-fields',
			'post_types' => array('theme'),
			// 'context' => 'normal',
			// 'priority' => 'high',
			'fields' => array(
				array (
					'id' => 'site_logo',
					'type' => 'image',
					'name' => esc_html__( 'Site Logo', 'text-domain' ),
					// 'max_file_uploads' => 1,
					// 'image_size' => 'thumbnail',
					// 'max_status' => false,
				),
				array (
					'id' => 'site_short_description',
					'type' => 'textarea',
					'name' => esc_html__( 'Site Short Description', 'text-domain' ),
				),
				array (
					'id' => 'color_1',
					'name' => esc_html__( 'Color One', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
				array (
					'id' => 'color_2',
					'name' => esc_html__( 'Color Two', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
				array (
					'id' => 'color_3',
					'name' => esc_html__( 'Color Three', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
				),
				array (
					'id' => 'color_4',
					'name' => esc_html__( 'Color Four', 'text-domain' ),
					'type' => 'color',
					// 'size' => 7,
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
	);