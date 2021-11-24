<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Section Head
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_section_head',
	'name' => esc_html__('Section Head', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-header',
	'params' => array(

		array(
		  'param_name' => 'sec_head_style',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Select Section Head Style',  "dustrial" ),
		  "std" 			=> esc_html__("style1", "dustrial"),
		  'value' => array(
		    esc_html__( 'Style 1',  "dustrial"  ) => 'style1',
		    esc_html__( 'Style 2',  "dustrial"  ) => 'style2',
		    esc_html__( 'Style 3',  "dustrial"  ) => 'style3',
		    esc_html__( 'Style 4',  "dustrial"  ) => 'style4',
		  ),
		  "description" => esc_html__( "There are more section head style. check all one by one if you want.", "dustrial" ),
		),
		array(
			"param_name" => "section_icon_img",
			"type" => "attach_image",
    		"heading" => esc_html__("Section head icon image", "dustrial"),
			"dependency" => array(
				"element"=> "sec_head_style",
				"value"=> array("style1","style2"),
			)
		),
		array(
			"param_name" 	=> "section_title",
			"type" 			=> "textfield",
    		"heading" 		=> esc_html__("Section Head Title", "dustrial"),
		),
		array(
			"param_name" 	=> "section_sub_title",
			"type" 			=> "textfield",
    		"heading" 		=> esc_html__("Section Head Sub Title", "dustrial"),
		),
		array(
		    "param_name" 	=> "sec3_desc",
		    "type" 			=> "textarea",
		    "heading" 		=>  esc_html__("Section Head Style 3 Description", "dustrial"),
			"dependency" 	=> array(
				"element"	=> "sec_head_style",
				"value"		=> array("style3",),
			)
		),
        array(
		  'param_name' 		=> 'sec_head_text_align',
		  'type' 			=> 'dropdown',
		  'heading' 		=> esc_html__( 'Please select your section text align',  "dustrial" ),
		  'value' 			=> array(
		    esc_html__( 'Select text align',  "dustrial"  ) => ' ',
		    esc_html__( 'Text Align Center',  "dustrial"  ) => 'text-center',
		    esc_html__( 'Text Align Left',  "dustrial"  ) => 'text-left',
		    esc_html__( 'Text Align Right',  "dustrial"  ) => 'text-right',
		  ),
		  "description" 	=> esc_html__( "There have more section head style. check all one by one for your need.", "dustrial" )
		),
		array(
		  'param_name' => 'sec_animation_disable',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Enable/Disable Animation',  "dustrial" ),
		  'std' => esc_html__( '1',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Disable',  "dustrial"  ) => '1',
		    esc_html__( 'Enable',  "dustrial"  ) => '2',
		  ),
		  "description" => esc_html__( "Enable/Disable section title animation.", "dustrial" )
		),
		array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'dustrial' ),
            'param_name' => 'sec_animation',
            'description' => esc_html__( 'Choose your animation style', 'dustrial' ),
        ),

        array(
          "type"        => "notice",
          "heading"     => esc_html__( "Section Title Option", 'dustrial' ),
          "param_name"  => 'titless',
          'class'       => 'cs-success',
          'value'       => '',
          "group"       => esc_html__('Styling', 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Title Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your section heading Title color.', 'dustrial' ),
          "param_name" => "title_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Sub title Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your section heading Sub Title color.', 'dustrial' ),
          "param_name" => "subtitle_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
          	"type" => "colorpicker",
          	"heading" => esc_html__( "Content Color", 'dustrial' ),
          	'description' => esc_html__( 'Choose your section heading content color.', 'dustrial' ),
          	"param_name" => "sub_content_color",
          	'value' => '',
          	"group" => esc_html__( "Styling", 'dustrial'),
			"dependency" => array(
				"element"=> "sec_head_style",
				"value"=> array("style3",),
			)
        ),

	),
));



/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Button
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_button',
	'name' => esc_html__('Button', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-paperclip',
	'params' => array(

		array(
			"param_name" => "button_text",
			"type" => "textfield",
    		"heading" => esc_html__("Button Text", "dustrial"),
		),
		array(
			"param_name" => "button_link",
			"type" => "textfield",
    		"heading" => esc_html__("Button Link", "dustrial"),
		),
		// add params same as with any other content element
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon library for phone icon', 'dustrial' ),
			'value' => array(
				esc_html__( 'flaticons Fonts', 'dustrial' ) => 'flaticons',
				esc_html__( 'Font Awesome 4', 'dustrial' ) => 'fontawesome4',
				esc_html__( 'Typicons', 'dustrial' ) => 'typicons',
			),
			'admin_label' => false,
			'param_name' => 'type',
			'description' => esc_html__( 'Select icon library.', 'dustrial' ),
		),
		array(
	      'param_name' => 'pretty_icon1',
	      'type' => 'iconpicker',
	      'heading' => esc_html__( 'Icon', 'dustrial' ),
	      // 'param_name' => 'icon_flaticon',
	      'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
	      'settings' => array(
	        'emptyIcon' => false, // default true, display an "EMPTY" icon?
	        'type' => 'flaticon',
	        'iconsPerPage' => 200, // default 100, how many icons per/page to display
	      ),
	      'dependency' => array(
	        'element' => 'type',
	        'value' => 'flaticons',
	      ),
	      'description' => esc_html__( 'Select icon from library.', 'dustrial' ),
	    ),
		array(
			'param_name' => 'pretty_icon2',
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'dustrial' ),
			// 'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-adjust', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
	        	'type' => 'fontawesome4',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'fontawesome4',
			),
			'description' => esc_html__( 'Select icon from library.', 'dustrial' ),
		),
		array(
	      'param_name' => 'pretty_icon3',
	      'type' => 'iconpicker',
	      'heading' => esc_html__( 'Icon', 'dustrial' ),
	      // 'param_name' => 'icon_flaticon',
	      'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
	      'settings' => array(
	        'emptyIcon' => false, // default true, display an "EMPTY" icon?
	        'type' => 'typicons',
	        'iconsPerPage' => 200, // default 100, how many icons per/page to display
	      ),
	      'dependency' => array(
	        'element' => 'type',
	        'value' => 'typicons',
	      ),
	      'description' => esc_html__( 'Select icon from library.', 'dustrial' ),
	    ),
		array(
		  'param_name' => 'btn_animation_disable',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Enable/Disable Animation',  "dustrial" ),
		  'std' => esc_html__( '1',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Disable',  "dustrial"  ) => '1',
		    esc_html__( 'Enable',  "dustrial"  ) => '2',
		  ),
		  "description" => esc_html__( "Enable/Disable section title animation.", "dustrial" )
		),
		array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'dustrial' ),
            'param_name' => 'btn_animation_style',
            'description' => esc_html__( 'Choose animation style', 'dustrial' ),
        ),
	),
));




/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Pretty Icon Box
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_pretty_icon_box',
	'name' => esc_html__('Pretty Icon Box', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-object-group',
	'params' => array(

		// add params same as with any other content element
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Icon library for phone icon', 'dustrial' ),
			'value' => array(
				esc_html__( 'flaticons Fonts', 'dustrial' ) => 'flaticons',
				esc_html__( 'Font Awesome 4', 'dustrial' ) => 'fontawesome4',
			),
			'admin_label' => false,
			'param_name' => 'type',
			'description' => esc_html__( 'Select icon library.', 'dustrial' ),
		),
		array(
	      'param_name' => 'pretty_icon1',
	      'type' => 'iconpicker',
	      'heading' => esc_html__( 'Icon', 'dustrial' ),
	      // 'param_name' => 'icon_flaticon',
	      'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
	      'settings' => array(
	        'emptyIcon' => false, // default true, display an "EMPTY" icon?
	        'type' => 'flaticon',
	        'iconsPerPage' => 200, // default 100, how many icons per/page to display
	      ),
	      'dependency' => array(
	        'element' => 'type',
	        'value' => 'flaticons',
	      ),
	      'description' => esc_html__( 'Select icon from library.', 'dustrial' ),
	    ),
		array(
			'param_name' => 'pretty_icon2',
			'type' => 'iconpicker',
			'heading' => esc_html__( 'Icon', 'dustrial' ),
			// 'param_name' => 'icon_fontawesome',
			'value' => 'fa fa-adjust', // default value to backend editor admin_label 
			'settings' => array(
				'emptyIcon' => false,
				// default true, display an "EMPTY" icon?
				'type' => 'fontawesome4',
				'iconsPerPage' => 4000,
				// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'dependency' => array(
				'element' => 'type',
				'value' => 'fontawesome4',
			),
			'description' => esc_html__( 'Select icon from library.', 'dustrial' ),
		), 
		array(
			"param_name" => "box_title",
			"type" => "textarea_raw_html",
    		"heading" => esc_html__("Box Title", "dustrial")
		),
		array(
			"param_name" => "box_desc",
			"type" => "textarea",
    		"heading" => esc_html__("Box Description", "dustrial"),
		),
		array(
          'param_name' => 'item_text_align',
          'type' => 'dropdown',
          'heading' => __( 'Select text align',  "dustrial" ),
          'value' => array(
            __( 'Select text align',  "dustrial"  ) => ' ',
            __( 'Text Align Center',  "dustrial"  ) => 'text-center',
            __( 'Text Align Left',  "dustrial"  ) => 'text-left',
            __( 'Text Align Right',  "dustrial"  ) => 'text-right',
          ),
          "description" => __( "There are item text alignment.", "dustrial" )
        ),
		array(
		  'param_name' => 'animation_disable',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Enable/Disable Animation',  "dustrial" ),
		  'std' => esc_html__( '1',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Disable',  "dustrial"  ) => '1',
		    esc_html__( 'Enable',  "dustrial"  ) => '2',
		  ),
		  "description" => esc_html__( "Enable/Disable Animation.", "dustrial" )
		),
		array(
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'dustrial' ),
            'param_name' => 'animation',
            'description' => esc_html__( 'Choose your animation style', 'dustrial' ),
        ),
		array(
		  'param_name' => 'pretty_box_style',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Please select Your Box Style',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select Style',  "dustrial"  ) => ' ',
		    esc_html__( 'Box Style 1',  "dustrial"  ) => 'style1',
		    esc_html__( 'Box Style 2',  "dustrial"  ) => 'style2',
		    esc_html__( 'Box Style 3',  "dustrial"  ) => 'style3',
		  ),
		  "description" => esc_html__( "There have more pretty box style. check all one by one for your need.", "dustrial" )
		),
		array(
			"param_name" => "pretty_box_custom_class",
			"type" => "textfield",
    		"heading" => esc_html__("Add Custom Class", "dustrial"),
    		"description" => esc_html__( "You can add pretty box custom class for your additional style", "dustrial" )
		),

        array(
          "type"        => "notice",
          "heading"     => esc_html__( "Prety Icon Style Option", 'dustrial' ),
          "param_name"  => 'titless',
          'class'       => 'cs-success',
          'value'       => '',
          "group"       => esc_html__('Styling', 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Icon Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your Icon color.', 'dustrial' ),
          "param_name" => "prety_icon_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Icon Hover Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your Icon hover color.', 'dustrial' ),
          "param_name" => "prety_icon_hover_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Title Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your title color.', 'dustrial' ),
          "param_name" => "icon_title_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Title Hover Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your title hover color.', 'dustrial' ),
          "param_name" => "icon_title_hover_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Content Text Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your content text color.', 'dustrial' ),
          "param_name" => "icon_content_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),


	),
));



/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial video section
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_video',
	'name' => esc_html__('Video Section', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-file-video-o',
	'params' => array(
		array(
		  'param_name' => 'video_style',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Select video Style',  "dustrial" ),
		  'std' => esc_html__( 'style1',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Video Style 1',  "dustrial"  ) => 'style1',
		    esc_html__( 'Video Style 2',  "dustrial"  ) => 'style2',
		  ),
		  "description" => esc_html__( "Choose your video style.", "dustrial" )
		),
		array(
			"param_name" => "section_icon_img",
			"type" => "attach_image",
    		"heading" => esc_html__("Section head icon image", "dustrial"),
		),
		array(
			"param_name" => "section_title",
			"type" => "textfield",
    		"heading" => esc_html__("Section Title", "dustrial"),
		),
		array(
			"param_name" => "section_sub_title",
			"type" => "textfield",
    		"heading" => esc_html__("Section Sub Title", "dustrial"),
		),
		array(
		  'param_name' => 'section_desc',
		  'type' => 'textarea',
		  'heading' => esc_html__( 'Section Description',  "dustrial" ),
		),
		array(
			"param_name" => "sign_img",
			"type" => "attach_image",
    		"heading" => esc_html__("Section sign image", "dustrial"),
		),
		array(
			"param_name" => "author_name",
			"type" => "textfield",
    		"heading" => esc_html__("Author Name", "dustrial"),
		),
		array(
			"param_name" => "author_designation",
			"type" => "textfield",
    		"heading" => esc_html__("Author Designation", "dustrial"),
		),
		array(
		  'param_name' => 'video_link',
		  'type' => 'textfield',
		  'heading' => esc_html__( 'Video Link',  "dustrial" ),
		),
		array(
			"param_name" => "sec_bg_img",
			"type" => "attach_image",
    		"heading" => esc_html__("Section background image", "dustrial"),
		),
		array(
		  'param_name' => 'video_animation_disable',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Enable/Disable Animation',  "dustrial" ),
		  'std' => esc_html__( '1',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Disable',  "dustrial"  ) => '1',
		    esc_html__( 'Enable',  "dustrial"  ) => '2',
		  ),
		  "description" => esc_html__( "Enable/Disable section title animation.", "dustrial" )
		),
		array(
            'type' 		=> 'animation_style',
            'heading' 	=> esc_html__( 'Animation Style', 'dustrial' ),
            'param_name' => 'video_animation_style',
            'description' => esc_html__( 'Choose animation style', 'dustrial' ),
        ),

        array(
          "type"        => "notice",
          "heading"     => esc_html__( "Video Section Option", 'dustrial' ),
          "param_name"  => 'titless',
          'class'       => 'cs-success',
          'value'       => '',
          "group"       => esc_html__('Styling', 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Title Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your Video Section Title color.', 'dustrial' ),
          "param_name" => "title_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Sub title Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your Video Section Sub Title color.', 'dustrial' ),
          "param_name" => "subtitle_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Content Text Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your Video Section Sub Title color.', 'dustrial' ),
          "param_name" => "video_content_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Video Button background Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your Video button background color.', 'dustrial' ),
          "param_name" => "video_buttonbg_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Video Button Icon Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your Video button Icon color.', 'dustrial' ),
          "param_name" => "video_buttonicon_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
		
	),
));




/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Service Section
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_market_posts',
	'name' => esc_html__('Our Services', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-clone',
	'params' => array(

		array(
			"param_name" => "posts_per_page",
			"type" => "textfield",
    		"heading" => esc_html__("Posts Per Page", "dustrial"),
		),
		array(
			"param_name" => "content_expcerpt",
			"type" => "textfield",
    		"heading" => esc_html__("Content Excerpt Length", "dustrial"),
		),
		array(
			"param_name" => "posts_cat_id",
			"type" => "textarea",
    		"heading" => esc_html__("Put your category name ( Optional )", "dustrial"),
    		"description" => esc_html__( "If you want to specific category post display here. Put your category name with comma, example ( Economy,More money,Stratigy ). ", "dustrial" )
		),
		array(
		  "param_name" => "no_gurters",
		  "type" => "checkbox",
		  "class" => "",
		  "heading" => esc_html__( "No Gurters?", "dustrial" ),
		  "value" => esc_html__( "", "dustrial" ),
		  "description" => esc_html__( "If you want to hide post author please check the box", "dustrial" )
		),
		array(
		  'param_name' => 'select_post_column',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Please select Your Post Column',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select Your Column',  "dustrial"  ) => ' ',
		    esc_html__( 'Column 1',  "dustrial"  ) => '12',
		    esc_html__( 'Column 2',  "dustrial"  ) => '6',
		    esc_html__( 'Column 3',  "dustrial"  ) => '4',
		    esc_html__( 'Column 4',  "dustrial"  ) => '3',
		  ),
		  "description" => esc_html__( "Select", "dustrial" )
		),
		array(
		  'param_name' => 'select_market_style',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Please select market style',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select market style',  "dustrial"  ) => ' ',
		    esc_html__( 'Style 1',  "dustrial"  ) => '1',
		    esc_html__( 'Style 2',  "dustrial"  ) => '2',
		    esc_html__( 'Style 3',  "dustrial"  ) => '3',
		  ),
		  "description" => esc_html__( "Select", "dustrial" )
		),
		array(
			'param_name' => 'service_opacity',
			'group'       => esc_html__('Style Options', 'dustrial'),
			'heading' 	=> esc_html__( 'Box Overlay',  "dustrial" ),
			'type' => 'dropdown',
			'std' => esc_html__( '0.8',  "dustrial" ),
			'value' => array(
			  esc_html__( 'Opacity .1',  "dustrial"  ) => '0.1',
			  esc_html__( 'Opacity .2',  "dustrial"  ) => '0.2',
			  esc_html__( 'Opacity .3',  "dustrial"  ) => '0.3',
			  esc_html__( 'Opacity .4',  "dustrial"  ) => '0.4',
			  esc_html__( 'Opacity .5',  "dustrial"  ) => '0.5',
			  esc_html__( 'Opacity .6',  "dustrial"  ) => '0.6',
			  esc_html__( 'Opacity .7',  "dustrial"  ) => '0.7',
			  esc_html__( 'Opacity .8',  "dustrial"  ) => '0.8',
			  esc_html__( 'Opacity .9',  "dustrial"  ) => '0.9',
			),
			'heading' => esc_html__( 'Box Opacity', 'dustrial' ),
		),
		array(
		  'param_name' 	=> 'service_overlay_color',
		  'group'       => esc_html__('Style Options', 'dustrial'),
		  'type' 		=> 'colorpicker',
		  'heading' 	=> esc_html__( 'Overlay Color',  "dustrial" ),
		  'value' 		=> '#000',
		  "description" => esc_html__( "Choose service bo overlay color.", "dustrial" ),
		),
		
	),
));


/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Project Section
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_project_posts',
	'name' => esc_html__('Our Project', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-clipboard',
	'params' => array(
		
		array(
		  "param_name" => "no_filter",
		  "type" => "checkbox",
		  "heading" => esc_html__( "No Filter?", "dustrial" ),
		  "description" => esc_html__( "If you want to hide filter options please check the box", "dustrial" )
		),
		array(
		  'param_name' => 'select_filter_button_style',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Please select filter button style',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select filter button style',  "dustrial"  ) => ' ',
		    esc_html__( 'Style 1',  "dustrial"  ) => '1',
		    esc_html__( 'Style 2',  "dustrial"  ) => '2',
		    esc_html__( 'Style 3',  "dustrial"  ) => '3',
		  ),
		  "description" => esc_html__( "Please select your filter button style", "dustrial" )
		),
		array(
			"param_name" => "posts_per_page",
			"type" => "textfield",
    		"heading" => esc_html__("Posts Per Page", "dustrial"),
		),
		array(
			"param_name" => "content_expcerpt",
			"type" => "textfield",
    		"heading" => esc_html__("Content Excerpt Length", "dustrial"),
		),
		array(
			"param_name" => "posts_cat_id",
			"type" => "textarea",
    		"heading" => esc_html__("Put your category name", "dustrial"),
    		"description" => esc_html__( "If you want to specific category post display here. Put your category name with comma, example ( Economy,More money,Stratigy ). ", "dustrial" )
		),
		array(
		  "param_name" => "no_gutters",
		  "type" => "checkbox",
		  "heading" => esc_html__( "No Gurters?", "dustrial" ),
		  "description" => esc_html__( "If you want to remove column gap please check the box", "dustrial" )
		),
		array(
		  'param_name' => 'select_post_column',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Please select Your Post Column',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select Your Column',  "dustrial"  ) => ' ',
		    esc_html__( 'Column 1',  "dustrial"  ) => '12',
		    esc_html__( 'Column 2',  "dustrial"  ) => '6',
		    esc_html__( 'Column 3',  "dustrial"  ) => '4',
		    esc_html__( 'Column 4',  "dustrial"  ) => '3',
		  ),
		  "description" => esc_html__( "Please select your item columns", "dustrial" )
		),
		array(
		  'param_name' => 'select_layout_style',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Please select layout style',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select layout style',  "dustrial"  ) => ' ',
		    esc_html__( 'Style 1',  "dustrial"  ) => '1',
		    esc_html__( 'Style 2',  "dustrial"  ) => '2',
		    esc_html__( 'Style 3',  "dustrial"  ) => '3',
		  ),
		  "description" => esc_html__( "Please select your item style variation", "dustrial" )
		),
		array(
			'param_name' => 'project_opacity',
			'group'       => esc_html__('Style Options', 'dustrial'),
			'heading' 	=> esc_html__( 'Box Overlay',  "dustrial" ),
			'type' => 'dropdown',
			'std' => esc_html__( '0.8',  "dustrial" ),
			'value' => array(
			  esc_html__( 'Opacity .1',  "dustrial"  ) => '0.1',
			  esc_html__( 'Opacity .2',  "dustrial"  ) => '0.2',
			  esc_html__( 'Opacity .3',  "dustrial"  ) => '0.3',
			  esc_html__( 'Opacity .4',  "dustrial"  ) => '0.4',
			  esc_html__( 'Opacity .5',  "dustrial"  ) => '0.5',
			  esc_html__( 'Opacity .6',  "dustrial"  ) => '0.6',
			  esc_html__( 'Opacity .7',  "dustrial"  ) => '0.7',
			  esc_html__( 'Opacity .8',  "dustrial"  ) => '0.8',
			  esc_html__( 'Opacity .9',  "dustrial"  ) => '0.9',
			),
			'heading' => esc_html__( 'Box Opacity', 'dustrial' ),
		),
		array(
		  'param_name' 	=> 'project_overlay_color',
		  'group'       => esc_html__('Style Options', 'dustrial'),
		  'type' 		=> 'colorpicker',
		  'heading' 	=> esc_html__( 'Overlay Color',  "dustrial" ),
		  'value' 		=> '#000',
		  "description" => esc_html__( "Choose project bo overlay color.", "dustrial" ),
		),
		
	),
));




/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Testimonial Section
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_testimonial_posts',
	'name' => esc_html__('Testimonial', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-id-card-o',
	'params' => array(

		array(
			"param_name" => "posts_per_page",
			"type" => "textfield",
    		"heading" => esc_html__("Posts Per Page", "dustrial"),
		),
		array(
		  'param_name' => 'select_style',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Please Style',  "dustrial" ),
		  'std' => esc_html__( '1',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Style 1',  "dustrial"  ) => '1',
		    esc_html__( 'Style 2',  "dustrial"  ) => '2',
		    esc_html__( 'Style 3',  "dustrial"  ) => '3',
		  ),
		  "description" => esc_html__( "There have more testimonial style", "dustrial" )
		),
		array(
			'heading' => esc_html__( "Desktop Count",  "dustrial" ),
			"param_name" => "desktop_count",
			"type" => "textfield",
    		"std" => esc_html__("5", "dustrial"),
    		"description" => esc_html__( "Display Testimonial in desktop device", "dustrial" ),
		),
		array(
			'heading' => esc_html__( "Tablet Count",  "dustrial" ),
			"param_name" => "tablet_count",
			"type" => "textfield",
    		"std" => esc_html__("3", "dustrial"),
    		"description" => esc_html__( "Display Testimonial in tablet device", "dustrial" ),
		),
		array(
			'heading' => esc_html__( "Mobile Count",  "dustrial" ),
			"param_name" => "mobile_count",
			"type" => "textfield",
    		"std" => esc_html__("2", "dustrial"),
    		"description" => esc_html__( "Display Testimonial in mobile device", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_autoplay',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Enable Autoplay?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Slider Autoplay.", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_loop',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Enable Loop?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Slider Loop.", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_navigation',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Navigation?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Slider Navigation button.", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_speed',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Testimonial Speed?',  "dustrial" ),
		  'value' => array(
		    esc_html__( '1 Second',  "dustrial"  ) => '1000',
		    esc_html__( '2 Second',  "dustrial"  ) => '2000',
		    esc_html__( '3 Second',  "dustrial"  ) => '3000',
		    esc_html__( '4 Second',  "dustrial"  ) => '4000',
		    esc_html__( '5 Second',  "dustrial"  ) => '5000',
		    esc_html__( '6 Second',  "dustrial"  ) => '6000',
		    esc_html__( '7 Second',  "dustrial"  ) => '7000',
		    esc_html__( '8 Second',  "dustrial"  ) => '8000',
		    esc_html__( '9 Second',  "dustrial"  ) => '9000',
		    esc_html__( '10 Second',  "dustrial"  ) => '10000',
		    esc_html__( '11 Second',  "dustrial"  ) => '11000',
		    esc_html__( '12 Second',  "dustrial"  ) => '12000',
		    esc_html__( '13 Second',  "dustrial"  ) => '13000',
		    esc_html__( '14 Second',  "dustrial"  ) => '14000',
		    esc_html__( '15 Second',  "dustrial"  ) => '15000',
		  ),
		  "description" => esc_html__( "Choose Testimonial slide speed (second).", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_pagination',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Pagination?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Slider Pagination Button.", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_mousedrag',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Mouse Drag?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Slider Mouse Drag to slide.", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_ratings',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Testimonial Rating',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => '1',
		    esc_html__( 'No',  "dustrial"  ) => '2',
		  ),
		  "description" => esc_html__( "Enable/Disable Rating Options.", "dustrial" ),
		),
		
	),
));



/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial company section
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_company',
	'name' => esc_html__('Our company', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-address-card-o',
	'params' => array(

		array(
			"param_name" => "section_bg_img",
			"type" => "attach_image",
    		"heading" => esc_html__("Section background image", "dustrial"),
		),
		array(
			"param_name" => "section_side_img",
			"type" => "attach_image",
    		"heading" => esc_html__("Section side image", "dustrial"),
		),
		array(
			"param_name" => "section_title",
			"type" => "textfield",
    		"heading" => esc_html__("Section Head Title", "dustrial"),
		),
		array(
			"param_name" => "section_sub_title",
			"type" => "textfield",
    		"heading" => esc_html__("Section Sub Title", "dustrial"),
		),
		array(
			"param_name" => "section_icon_img",
			"type" => "attach_image",
    		"heading" => esc_html__("Section icon image", "dustrial"),
		),
		array(
		  'param_name' => 'section_desc_title',
		  'type' => 'textarea',
		  'heading' => esc_html__( 'Section description title',  "dustrial" ),
		),
		array(
		  'param_name' => 'section_desc',
		  'type' => 'textarea',
		  'heading' => esc_html__( 'Section Description',  "dustrial" ),
		),
		array(
	      'param_name' => 'company_service_item',
	      'type' => 'param_group',
	      'params' => array(
	      	// add params same as with any other content element
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library for phone icon', 'dustrial' ),
				'value' => array(
					esc_html__( 'flaticons Fonts', 'dustrial' ) => 'flaticons',
					esc_html__( 'Font Awesome 4', 'dustrial' ) => 'fontawesome4',

				),
				'admin_label' => false,
				'param_name' => 'type',
				'description' => esc_html__( 'Select icon library.', 'dustrial' ),
			),
			array(
		      'param_name' => 'pretty_icon1',
		      'type' => 'iconpicker',
		      'heading' => esc_html__( 'Icon', 'dustrial' ),
		      // 'param_name' => 'icon_flaticon',
		      'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
		      'settings' => array(
		        'emptyIcon' => false, // default true, display an "EMPTY" icon?
		        'type' => 'flaticon',
		        'iconsPerPage' => 200, // default 100, how many icons per/page to display
		      ),
		      'dependency' => array(
		        'element' => 'type',
		        'value' => 'flaticons',
		      ),
		      'description' => esc_html__( 'Select icon from library.', 'dustrial' ),
		    ),
			array(
				'param_name' => 'pretty_icon2',
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'dustrial' ),
				// 'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-adjust', // default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'fontawesome4',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'fontawesome4',
				),
				'description' => esc_html__( 'Select icon from library.', 'dustrial' ),
			),
	        array(
	          'param_name' => 'company_service_title',
	          'type' => 'textfield',
	          'heading' => esc_html__('Service Title', 'dustrial'),
	        ),
	        array(
	          'param_name' => 'company_service_desc',
	          'type' => 'textarea',
	          'heading' => esc_html__('Service Description', 'dustrial'),
	        ),
	       
	      )
	    ),	
		
	),
));


/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial call to action
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' 		=> 'dustrial_call_to_action',
	'name' 		=> esc_html__('Call To Action', 'dustrial'),
	'category' 	=> esc_html__('Dustrial', 'dustrial'),
	'icon' 		=> 'fa fa-anchor',
	'params' 	=> array(

		array(
		  'param_name' 	=> 'call_toaction_style',
		  'type' 		=> 'dropdown',
		  'heading' 	=> esc_html__( 'Select Call To Action Style',  "dustrial" ),
		  "std" 		=> esc_html__("style1", "dustrial"),
		  'value' => array(
		    esc_html__( 'Style 1',  "dustrial"  ) => 'style1',
		    esc_html__( 'Style 2',  "dustrial"  ) => 'style2',
		    esc_html__( 'Style 3',  "dustrial"  ) => 'style3',
		    esc_html__( 'Style 4',  "dustrial"  ) => 'style4',
		  ),
		  "description" => esc_html__( "There are more call to action style. check all one by one if you want.", "dustrial" ),
		),

		array(
		  'param_name' 	=> 'call_toaction_position',
		  'type' 		=> 'dropdown',
		  'heading' 	=> esc_html__( 'Select Position',  "dustrial" ),
		  "std" 		=> esc_html__("style1", "dustrial"),
		  'value' => array(
		    esc_html__( 'Position Center',  "dustrial"  ) 	=> 'style1',
		    esc_html__( 'Position Left',  "dustrial"  ) 	=> 'style2',
		    esc_html__( 'Position Right',  "dustrial"  ) 	=> 'style3',
		  ),
		  "description" => esc_html__( "choose your call to action position.", "dustrial" ),
		),

		array(
			"param_name" => "call_to_action_video",
			"type" => "textfield",
    		"heading" => esc_html__("Insert Video URL", "dustrial"),
			"dependency" => array(
				"element"=> "call_toaction_style",
				"value"=> array("style2"),
			)
		),
		array(
			"param_name" => "section_title",
			"type" => "textfield",
    		"heading" => esc_html__("Call to Action Title", "dustrial"),
		),
		array(
			"param_name" => "section_description",
			"type" => "textarea",
    		"heading" => esc_html__("Call to Action description.", "dustrial"),
		),
		array(
			"type" 			=> "dropdown",
			"param_name" 	=> "type",
    		"heading" 		=> esc_html__("Link Type", "dustrial"),
    		"std" 			=> esc_html__("1", "dustrial"),
    		"value" => array(
    			'Link to page' => 1,
    			'External Link' => 2,
    		),
    		"description" 	=> esc_html__("Link Type", "dustrial"),
		),
		array(
			"type" 			=> "dropdown",
			"param_name" 	=> "link_to_page",
    		"heading" 		=> esc_html__("Link to page", "dustrial"),
    		"value" 		=> dustrial_get_page_as_list(),
    		"description" 	=> esc_html__("Link Type", "dustrial"),
			"dependency" => array(
				"element"=> "type",
				"value"=> array("1"),
			)
		),
		array(
			"type" 			=> "textfield",
			"param_name" 	=> "external_links",
    		"heading" 		=> esc_html__("External Link", "dustrial"),
    		"description" 	=> esc_html__("External Link", "dustrial"),
			"dependency" => array(
				"element"=> "type",
				"value"=> array("2"),
			)
		),
		array(
			"type" 			=> "textfield",
			"param_name" 	=> "link_text",
    		"heading" 		=> esc_html__("Link Text", "dustrial"),
    		"description" 	=> esc_html__("Link Text", "dustrial"),
			"dependency" => array(
				"element"=> "type",
				"value"=> array("2"),
			)
		),
		
	),
));



/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Video Button
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_videobtn',
	'name' => esc_html__('Dustrial Video Button', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-anchor',
	'params' => array(
		array(
			"type" 			=> "textfield",
			"param_name" 	=> "external_links",
    		"heading" 		=> esc_html__("Video Link", "dustrial"),
    		"description" 	=> esc_html__("Input Video Link", "dustrial"),
		),
		
	),
));



/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Blog Section
/*------------------------------------------------------------------------------------------------------------------*/
vc_map(array(
	'base' => 'dustrial_blog_posts',
	'name' => esc_html__('Blog Posts', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-pencil-square-o',
	'params' => array(

		array(
		  'param_name' => 'select_blog_style',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Select blog style',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select Your Style',  "dustrial"  ) => '',
		    esc_html__( 'style 1',  "dustrial"  ) => '1',
		    esc_html__( 'style 2',  "dustrial"  ) => '2',
		    esc_html__( 'style 3',  "dustrial"  ) => '3',
		    esc_html__( 'style 4',  "dustrial"  ) => '4',
		    esc_html__( 'style 5',  "dustrial"  ) => '5',
		  ),
		  "description" => esc_html__( "Select blog layout style.", "dustrial" )
		),
		array(
			"param_name" => "posts_per_page",
			"type" => "textfield",
    		"std" => esc_html__("12", "dustrial"),
    		"heading" => esc_html__("Posts Per Page", "dustrial"),
		),
		array(
			"param_name" => "content_expcerpt",
			"type" => "textfield",
    		"heading" => esc_html__("Content Excerpt Length", "dustrial"),
		),
		array(
			'param_name' => 'blog_post_column',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Please post columns',  "dustrial" ),
			'value' => array(
		    esc_html__( 'Select your columns',  "dustrial"  ) => ' ',
		    esc_html__( 'Columns 2',  "dustrial"  ) => '6',
		    esc_html__( 'Columns 3',  "dustrial"  ) => '4',
		    esc_html__( 'Columns 4',  "dustrial"  ) => '3',
			),
			"dependency" => array(
		        "element" => "select_blog_style",
		        "value" => array('3', '4', '5'),
		    )
		),
		array(
		    "param_name" => "no_post_thumb",
		    "type" => "checkbox",
		    "heading" => "Post thumb no ?",
		     "value" => array(
		        "" => "true"
		    ),
		),
		array(
		  "param_name" => "hide_post_author",
		  "type" => "checkbox",
		  "class" => "",
		  "heading" => esc_html__( "Hide post author?", "dustrial" ),
		  "value" => esc_html__( "", "dustrial" ),
		  "description" => esc_html__( "If you want to hide post author please check the box", "dustrial" )
		),
		array(
		  "param_name" => "hide_post_date",
		  "type" => "checkbox",
		  "class" => "",
		  "heading" => esc_html__( "Hide post date?", "dustrial" ),
		  "value" => esc_html__( "", "dustrial" ),
		  "description" => esc_html__( "If you want to hide post date please check the box", "dustrial" )
		),
		array(
		  "param_name" => "hide_post_comment",
		  "type" => "checkbox",
		  "class" => "",
		  "heading" => esc_html__( "Hide post comment?", "dustrial" ),
		  "value" => esc_html__( "", "dustrial" ),
		  "description" => esc_html__( "If you want to hide post comment please check the box", "dustrial" )
		),
		array(
			'heading' => esc_html__( "Desktop Count",  "dustrial" ),
			"param_name" => "desktop_count",
			"type" => "textfield",
    		"std" => esc_html__("5", "dustrial"),
    		"description" => esc_html__( "Display Blog item in desktop device", "dustrial" ),
		),
		array(
			'heading' => esc_html__( "Tablet Count",  "dustrial" ),
			"param_name" => "tablet_count",
			"type" => "textfield",
    		"std" => esc_html__("3", "dustrial"),
    		"description" => esc_html__( "Display Blog item in tablet device", "dustrial" ),
		),
		array(
			'heading' => esc_html__( "Mobile Count",  "dustrial" ),
			"param_name" => "mobile_count",
			"type" => "textfield",
    		"std" => esc_html__("2", "dustrial"),
    		"description" => esc_html__( "Display Blog item in mobile device", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_autoplay',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Enable Autoplay?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Blog Carousel Autoplay.", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_loop',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Enable Loop?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Blog Carousel Loop.", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_navigation',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Navigation?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Blog Carousel Navigation button.", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_speed',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Blog Carousel Speed?',  "dustrial" ),
		  'value' => array(
		    esc_html__( '1 Second',  "dustrial"  ) => '1000',
		    esc_html__( '2 Second',  "dustrial"  ) => '2000',
		    esc_html__( '3 Second',  "dustrial"  ) => '3000',
		    esc_html__( '4 Second',  "dustrial"  ) => '4000',
		    esc_html__( '5 Second',  "dustrial"  ) => '5000',
		    esc_html__( '6 Second',  "dustrial"  ) => '6000',
		    esc_html__( '7 Second',  "dustrial"  ) => '7000',
		    esc_html__( '8 Second',  "dustrial"  ) => '8000',
		    esc_html__( '9 Second',  "dustrial"  ) => '9000',
		    esc_html__( '10 Second',  "dustrial"  ) => '10000',
		    esc_html__( '11 Second',  "dustrial"  ) => '11000',
		    esc_html__( '12 Second',  "dustrial"  ) => '12000',
		    esc_html__( '13 Second',  "dustrial"  ) => '13000',
		    esc_html__( '14 Second',  "dustrial"  ) => '14000',
		    esc_html__( '15 Second',  "dustrial"  ) => '15000',
		  ),
		  "description" => esc_html__( "Choose Blog Carousel slide speed (second).", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_pagination',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Pagination?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Blog Carousel Pagination Button.", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_mousedrag',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Mouse Drag?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Blog Carousel Mouse Drag.", "dustrial" ),
		),

	),
));


/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Counter Item box
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_counter',
	'name' => esc_html__('Counter', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-creative-commons',
	'params' => array(

		array(
			"param_name" => "counter_title1",
			"type" => "textfield",
    		"heading" => esc_html__("Counter Title", "dustrial"),
    		"description" => esc_html__("Counter Title", "dustrial"),
		),
		array(
			"param_name" => "counter_title2",
			"type" => "textfield",
    		"heading" => esc_html__("Counter Sub Title", "dustrial"),
    		"description" => esc_html__("Counter Sub Title", "dustrial"),
		),
		array(
			"param_name" => "count_number",
			"type" => "textfield",
    		"heading" => esc_html__("Count Number", "dustrial"),
    		"description" => esc_html__("Counter Number", "dustrial"),
		),
		array(
			"param_name" => "counter_desc",
			"type" => "textarea",
    		"heading" => esc_html__("Counter Description", "dustrial"),
    		"description" => esc_html__("Counter Description", "dustrial"),
		),
		array(
		  'param_name' => 'select_counter_style',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Select counter style',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select Your Style',  "dustrial"  ) => ' ',
		    esc_html__( 'style 1',  "dustrial"  ) => '1',
		    esc_html__( 'style 2',  "dustrial"  ) => '2',
		  ),
		  "description" => esc_html__( "Select", "dustrial" )
		),

        array(
          "type"        => "notice",
          "heading"     => esc_html__( "Counter Style Option", 'dustrial' ),
          "param_name"  => 'titless',
          'class'       => 'cs-success',
          'value'       => '',
          "group"       => esc_html__('Styling', 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Counter Number Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your Counter Number color.', 'dustrial' ),
          "param_name" => "count_number_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Counter Small Text Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your Counter Small Title color.', 'dustrial' ),
          "param_name" => "count_small_text_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
          "type" => "colorpicker",
          "heading" => esc_html__( "Counter Big Text Color", 'dustrial' ),
          'description' => esc_html__( 'Choose your Counter Big Title color.', 'dustrial' ),
          "param_name" => "count_big_text_color",
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),


	),
));


/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial client slider
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_client_slider',
	'name' => esc_html__('Client Slider', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-sliders',
	'params' => array(

		array(
			"param_name" => "client_brand_img",
			"type" => "attach_images",
    		"heading" => esc_html__("Upload Client image", "dustrial"),
		),
		array(
			'heading' => esc_html__( "Desktop Count",  "dustrial" ),
			"param_name" => "desktop_count",
			"type" => "textfield",
    		"std" => esc_html__("5", "dustrial"),
    		"description" => esc_html__( "Display Logo in desktop device", "dustrial" ),
		),
		array(
			'heading' => esc_html__( "Tablet Count",  "dustrial" ),
			"param_name" => "tablet_count",
			"type" => "textfield",
    		"std" => esc_html__("3", "dustrial"),
    		"description" => esc_html__( "Display Logo in tablet device", "dustrial" ),
		),
		array(
			'heading' => esc_html__( "Mobile Count",  "dustrial" ),
			"param_name" => "mobile_count",
			"type" => "textfield",
    		"std" => esc_html__("2", "dustrial"),
    		"description" => esc_html__( "Display Logo in mobile device", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_autoplay',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Enable Autoplay?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Logo Carousel Autoplay.", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_loop',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Enable Loop?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Logo Carousel Loop.", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_navigation',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Navigation?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Logo Carousel Navigation button.", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_speed',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Logo Carousel Speed?',  "dustrial" ),
		  'value' => array(
		    esc_html__( '1 Second',  "dustrial"  ) => '1000',
		    esc_html__( '2 Second',  "dustrial"  ) => '2000',
		    esc_html__( '3 Second',  "dustrial"  ) => '3000',
		    esc_html__( '4 Second',  "dustrial"  ) => '4000',
		    esc_html__( '5 Second',  "dustrial"  ) => '5000',
		    esc_html__( '6 Second',  "dustrial"  ) => '6000',
		    esc_html__( '7 Second',  "dustrial"  ) => '7000',
		    esc_html__( '8 Second',  "dustrial"  ) => '8000',
		    esc_html__( '9 Second',  "dustrial"  ) => '9000',
		    esc_html__( '10 Second',  "dustrial"  ) => '10000',
		    esc_html__( '11 Second',  "dustrial"  ) => '11000',
		    esc_html__( '12 Second',  "dustrial"  ) => '12000',
		    esc_html__( '13 Second',  "dustrial"  ) => '13000',
		    esc_html__( '14 Second',  "dustrial"  ) => '14000',
		    esc_html__( '15 Second',  "dustrial"  ) => '15000',
		  ),
		  "description" => esc_html__( "Choose Logo Carousel slide speed (second).", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_pagination',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Pagination?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Logo Carousel Pagination Button.", "dustrial" ),
		),
		array(
		  'param_name' => 'enable_mousedrag',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Mouse Drag?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Logo Carousel Mouse Drag.", "dustrial" ),
		),
		
	),
));


/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Team member
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'team_member',
	'name' => esc_html__('Team member', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-users',
	'params' => array(

		array(
			"param_name" => "member_name",
			"type" => "textfield",
    		"heading" => esc_html__("Member name", "dustrial"),
		),
		array(
			"param_name" => "member_designation",
			"type" => "textfield",
    		"heading" => esc_html__("Member designation", "dustrial"),
		),
		array(
	      'param_name' => 'social_media',
	      'type' => 'param_group',
	      'params' => array(
	        array(
	          'param_name' => 'social_icon',
	          'type' => 'iconpicker',
	          'name' => 'Social Icon',
	          'heading' => esc_html__('Member Social', 'dustrial'),
	        ),
	        array(
	          'param_name' => 'social_link',
	          'name' => 'Social Link',
	          'type' => 'textfield',
	          'heading' => esc_html__('Put Link', 'dustrial'),
	        )
	      )
	    ),
		array(
			"param_name" => "member_picture",
			"type" => "attach_image",
    		"heading" => esc_html__("Team member picture", "dustrial"),
		),
		array(
			"param_name" => "box_custom_class",
			"type" => "textfield",
    		"heading" => esc_html__("Add Custom Class", "dustrial"),
    		"description" => esc_html__( "You can add pretty box custom class for your additional style", "dustrial" )
		),
	),
));



/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Team Section
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_team_posts',
	'name' => esc_html__('Our Team', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-users',
	'params' => array(

		array(
			"param_name" => "posts_per_page",
			"type" => "textfield",
    		"heading" => esc_html__("Posts Per Page", "dustrial"),
		),
		array(
		  'param_name' => 'select_post_column',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Please select Your Post Column',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select Your Column',  "dustrial"  ) => ' ',
		    esc_html__( 'Column 1',  "dustrial"  ) => '12',
		    esc_html__( 'Column 2',  "dustrial"  ) => '6',
		    esc_html__( 'Column 3',  "dustrial"  ) => '4',
		    esc_html__( 'Column 4',  "dustrial"  ) => '3',
		  ),
		  "description" => esc_html__( "Please select your item columns", "dustrial" )
		),

	),
));



/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Featured Market Item
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'featured_market',
	'name' => esc_html__('Featured Item', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-industry',
	'params' => array(

		array(
		  'param_name' => 'post_img',
		  'type' => 'attach_image',
		  'heading' => esc_html__( 'Select Featured Image',  "dustrial" ),
		),
		array(
			"param_name" => "post_title",
			"type" => "textfield",
    		"heading" => esc_html__("Featured Item Title", "dustrial"),
		),
		array(
			"param_name" => "post_description",
			"type" => "textarea",
    		"heading" => esc_html__("Featured Item Description", "dustrial"),
		),
		array(
		  'param_name' => 'post_link',
		  'type' => 'textfield',
		  'heading' => esc_html__( 'Featured Item link',  "dustrial" ),
		),
	),
));



/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial contact info
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'contact_info',
	'name' => esc_html__('Contact Information', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-list',
	'params' => array(

		array(
			"param_name" => "title_line1",
			"type" => "textfield",
    		"heading" => esc_html__("Title Line 1", "dustrial"),
		),
		array(
			"param_name" => "title_line2",
			"type" => "textfield",
    		"heading" => esc_html__("Title Line 2", "dustrial"),
		),
		array(
	      'param_name' => 'info_list',
	      'type' => 'param_group',
	      'params' => array(

	        // add params same as with any other content element
			array(
				'param_name' => 'type',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library for phone icon', 'dustrial' ),
				'value' => array(
					esc_html__( 'flaticons Fonts', 'dustrial' ) => 'flaticons',
					esc_html__( 'Font Awesome 4', 'dustrial' ) => 'fontawesome4',
					esc_html__( 'Typicons', 'dustrial' ) => 'typicons',
				),
				'admin_label' => false,
				'description' => esc_html__( 'Select icon library.', 'dustrial' ),
			),
			array(
		      'param_name' => 'pretty_icon1',
		      'type' => 'iconpicker',
		      'heading' => esc_html__( 'Icon', 'dustrial' ),
		      'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
		      'settings' => array(
		        'emptyIcon' => false, // default true, display an "EMPTY" icon?
		        'type' => 'flaticon',
		        'iconsPerPage' => 200, // default 100, how many icons per/page to display
		      ),
		      'dependency' => array(
		        'element' => 'type',
		        'value' => 'flaticons',
		      ),
		      'description' => esc_html__( 'Select icon from library.', 'dustrial' ),
		    ),
			array(
				'param_name' => 'pretty_icon2',
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'dustrial' ),
				// 'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-adjust', // default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'fontawesome4',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'fontawesome4',
				),
				'description' => esc_html__( 'Select icon from library.', 'dustrial' ),
			),
			array(
		      'param_name' => 'pretty_icon3',
		      'type' => 'iconpicker',
		      'heading' => esc_html__( 'Icon', 'dustrial' ),
		      'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
		      'settings' => array(
		        'emptyIcon' => false, // default true, display an "EMPTY" icon?
		        'type' => 'typicons',
		        'iconsPerPage' => 200, // default 100, how many icons per/page to display
		      ),
		      'dependency' => array(
		        'element' => 'type',
		        'value' => 'typicons',
		      ),
		      'description' => esc_html__( 'Select icon from library.', 'dustrial' ),
		    ),
			array(
				"param_name" => "info_title",
				"type" => "textfield",
	    		"heading" => esc_html__("Info Title", "dustrial"),
			),
			array(
				"param_name" => "info_text",
				"type" => "textfield",
	    		"heading" => esc_html__("Info Text", "dustrial"),
			),

	      )
	    ),

	    array(
	      'param_name' => 'social_info',
	      'type' => 'param_group',
	      'params' => array(

			array(
				"param_name" => "social_icon",
				"type" => "iconpicker",
	    		"heading" => esc_html__("Select your social media", "dustrial"),
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'fontawesome4',
					'iconsPerPage' => 4000,
				),
			),
			array(
				"param_name" => "social_link",
				"type" => "textfield",
	    		"heading" => esc_html__("Social link", "dustrial"),
			),

	      )
	    ),
		
	),

));


/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Slider
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_slider',
	'name' => esc_html__('Slider', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-sliders',
	'params' => array(

		array(
		  'param_name' => 'select_slider_style',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Select Slider Style',  "dustrial" ),
		  'std' => esc_html__( '1',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select your style',  "dustrial"  ) => ' ',
		    esc_html__( 'Style 1', "dustrial"  ) => '1',
		    esc_html__( 'Style 2', "dustrial"  ) => '2',
		    esc_html__( 'Banner',  "dustrial"  ) => '3',
		  ),
		  "description" => esc_html__( "There have more slider style", "dustrial" )
		),

		// Banner
		array(
	     	'param_name' => 'banner_bg_img',
	     	'type' => 'attach_image',
	     	'heading' => esc_html__('Banner background image', 'dustrial'),
	     	"dependency" => array(
		        "element" => "select_slider_style",
		        "value" => "3"
		    )
	    ),
	    array(
          'param_name' => 'banner_title_line1',
          'type' => 'textfield',
          'heading' => esc_html__('Banner Sub Title', 'dustrial'),
          "dependency" => array(
		        "element" => "select_slider_style",
		        "value" => "3"
		    )
        ),
        array(
          'param_name' => 'banner_title_line2',
          'type' => 'textfield',
          'heading' => esc_html__('Banner Title', 'dustrial'),
          "dependency" => array(
		        "element" => "select_slider_style",
		        "value" => "3"
		    )
        ),
        array(
          'param_name' => 'banner_desc',
          'type' => 'textarea',
          'heading' => esc_html__('Banner Description', 'dustrial'),
          "dependency" => array(
		        "element" => "select_slider_style",
		        "value" => "3"
		    )
        ), 
        array(
          'param_name' => 'banner_btn1',
          'type' => 'vc_link',
          'heading' => esc_html__('Banner Button 1', 'dustrial'),
          "dependency" => array(
		        "element" => "select_slider_style",
		        "value" => "3"
		    )
        ),
        array(
          'param_name' => 'banner_btn2',
          'type' => 'vc_link',
          'heading' => esc_html__('Banner Button 2', 'dustrial'),
          "dependency" => array(
		        "element" => "select_slider_style",
		        "value" => "3"
		    )
        ),

		// Slider 1
		array(
	      'param_name' => 'slide_item',
	      'type' => 'param_group',
	      'params' => array(

		        array(
		          'param_name' => 'slide_bg_img',
		          'type' => 'attach_image',
		          'heading' => esc_html__('Slide background Image', 'dustrial'),
		        ),
		        array(
		          'param_name' => 'slide_title',
		          'type' => 'textfield',
		          'value' => '',
		          'admin_label' => true,
		          'heading' => esc_html__('Slide Title', 'dustrial'),
		        ),
		        array(
		          'param_name' => 'subtitle_part2',
		          'type' => 'textfield',
		          'heading' => esc_html__('Slide Sub Title', 'dustrial'),
		        ),
		        array(
		          'param_name' => 'subtitle_part1',
		          'type' => 'textfield',
		          'value' => '',
		          'heading' => esc_html__('Slide Light Text', 'dustrial'),
		        ),
		        array(
		          'param_name' => 'slide_desc',
		          'type' => 'textarea',
		          'heading' => esc_html__('Slide Description', 'dustrial'),
		        ),
				array(
					'type' => 'textfield',
					'value' => '',
					'heading' => esc_html__( 'Button One Text', 'dustrial' ),
					'param_name' => 'slider_btone_text',
				), 
				array(
					'type' => 'textfield',
					'value' => '',
					'heading' => esc_html__( 'Button One Link', 'dustrial' ),
					'param_name' => 'slide_btn1',
				),
				array(
					'type' => 'textfield',
					'value' => '',
					'heading' => esc_html__( 'Button Two Text', 'dustrial' ),
					'param_name' => 'slider_bttwo_text',
				),
				array(
					'type' => 'textfield',
					'value' => '',
					'heading' => esc_html__( 'Button Two Link', 'dustrial' ),
					'param_name' => 'slide_btn2',
				),
		        array(
				  'param_name' => 'slide_content_align',
				  'type' => 'dropdown',
				  'heading' => esc_html__( 'Content Align',  "dustrial" ),
				  'std' => esc_html__( 'text-left',  "dustrial" ),
				  'value' => array(
				    esc_html__( 'Text Left',  "dustrial"  ) => 'text-left',
				    esc_html__( 'Text center', "dustrial"  ) => 'text-center',
				    esc_html__( 'Text right',  "dustrial"  ) => 'text-right',
				  ),
				  "description" => esc_html__( "Select Slider Text Alignment.", "dustrial" )
				),
	       
	        ),
		    "dependency" => array(
		        "element" => "select_slider_style",
		        "value" => "1"
		    )
	    ),

	    // Slider 2
	    array(
          	'param_name' => 'slider_bg_img',
          	'type' => 'attach_image',
          	'heading' => esc_html__( 'Slider background Image', 'dustrial' ),
        	"dependency" => array(
		        "element" => "select_slider_style",
		        "value" => "2"
		    )
        ),
	    array(
	      'param_name' => 'slide_item2',
	      'type' => 'param_group',
	      'params' => array(

		        array(
		          'param_name' => 'subtitle_part1',
		          'type' => 'textfield',
		          'admin_label' => true,
		          'heading' => esc_html__('Sub Title Part 1', 'dustrial'),
		        ),
		        array(
		          'param_name' => 'subtitle_part2',
		          'type' => 'textfield',
		          'heading' => esc_html__('Sub Title Part 2', 'dustrial'),
		        ),
		        array(
		          'param_name' => 'slide_title',
		          'type' => 'textfield',
		          'heading' => esc_html__('Slide Title', 'dustrial'),
		        ),
		        array(
		          'param_name' => 'slide_desc',
		          'type' => 'textarea',
		          'heading' => esc_html__('Slide Description', 'dustrial'),
		        ),
				array(
					'type' => 'textfield',
					'value' => '',
					'heading' => esc_html__( 'Slide Button One Text', 'dustrial' ),
					'param_name' => 'slider_btone_text',
				),
		        array(
		          'param_name' => 'slide_btn1',
		          'type' => 'textfield',
		          'heading' => esc_html__('Slide Button One Link', 'dustrial'),
		        ),
				array(
					'type' => 'textfield',
					'value' => '',
					'heading' => esc_html__( 'Slide Button Two Text', 'dustrial' ),
					'param_name' => 'slider_bttwo_text',
				),
		        array(
		          'param_name' => 'slide_btn2',
		          'type' => 'textfield',
		          'heading' => esc_html__('Slide Button Two Link', 'dustrial'),
		        ),
		        array(
				  'param_name' => 'slide_content_align',
				  'type' => 'dropdown',
				  'heading' => esc_html__( 'Content Align',  "dustrial" ),
				  'std' => esc_html__( 'text-left',  "dustrial" ),
				  'value' => array(
				    esc_html__( 'Text Left',  "dustrial"  ) => 'text-left',
				    esc_html__( 'Text center',  "dustrial"  ) => 'text-center',
				    esc_html__( 'Text right',  "dustrial"  ) => 'text-right',
				  ),
				  "description" => esc_html__( "Select Slider Text Alignment.", "dustrial" )
				),
	       
	        ),
		    "dependency" => array(
		        "element" => "select_slider_style",
		        "value" => "2"
		    )
	    ),

		array(
		  'param_name' 	=> 'enable_autoplay',
		  'type' 		=> 'dropdown',
		  'group'       => esc_html__('Slide Options', 'dustrial'),
		  'heading' 	=> esc_html__( 'Enable Autoplay?',  "dustrial" ),
		  'value' 		=> array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Slide Autoplay.", "dustrial" ),
		),
		array(
		  'param_name' 	=> 'enable_speed',
		  'type' 		=> 'dropdown',
		  'group'       => esc_html__('Slide Options', 'dustrial'),
		  'heading' 	=> esc_html__( 'Slide Speed?',  "dustrial" ),
		  'value' => array(
		    esc_html__( '1 Milliseconds',  "dustrial"  ) => '10000',
		    esc_html__( '2 Milliseconds',  "dustrial"  ) => '2000',
		    esc_html__( '3 Milliseconds',  "dustrial"  ) => '3000',
		    esc_html__( '4 Milliseconds',  "dustrial"  ) => '4000',
		    esc_html__( '5 Milliseconds',  "dustrial"  ) => '5000',
		    esc_html__( '6 Milliseconds',  "dustrial"  ) => '6000',
		    esc_html__( '7 Milliseconds',  "dustrial"  ) => '7000',
		    esc_html__( '8 Milliseconds',  "dustrial"  ) => '8000',
		    esc_html__( '9 Milliseconds',  "dustrial"  ) => '9000',
		    esc_html__( '10 Milliseconds',  "dustrial"  ) => '10000',
		    esc_html__( '11 Milliseconds',  "dustrial"  ) => '11000',
		    esc_html__( '12 Milliseconds',  "dustrial"  ) => '12000',
		    esc_html__( '13 Milliseconds',  "dustrial"  ) => '13000',
		    esc_html__( '14 Milliseconds',  "dustrial"  ) => '14000',
		    esc_html__( '15 Milliseconds',  "dustrial"  ) => '15000',
		  ),
		  "description" => esc_html__( "Choose slide speed (second).", "dustrial" ),
		),
		array(
		  'param_name' 	=> 'enable_fade',
		  'type' 		=> 'dropdown',
		  'group'       => esc_html__('Slide Options', 'dustrial'),
		  'heading' 	=> esc_html__( 'Slide fade?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Slide Pagination Button.", "dustrial" ),
		),
		array(
		  'param_name' 	=> 'enable_pagination',
		  'type' 		=> 'dropdown',
		  'group'       => esc_html__('Slide Options', 'dustrial'),
		  'heading' 	=> esc_html__( 'Pagination?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Slide Pagination Button.", "dustrial" ),
		),
		array(
		  'param_name' 	=> 'enable_navigation',
		  'type' 		=> 'dropdown',
		  'group'       => esc_html__('Slide Options', 'dustrial'),
		  'heading' 	=> esc_html__( 'Navigation?',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Yes',  "dustrial"  ) => 'true',
		    esc_html__( 'No',  "dustrial"  ) => 'false',
		  ),
		  "description" => esc_html__( "Enable/Disable Slide Navigation Button.", "dustrial" ),
		),
		
		array(
			'param_name' => 'slider_opacity',
			'group'       => esc_html__('Style Options', 'dustrial'),
			'heading' 	=> esc_html__( 'Slider Overlay',  "dustrial" ),
			'type' => 'dropdown',
			'std' => esc_html__( '0.8',  "dustrial" ),
			'value' => array(
			  esc_html__( 'Opacity .1',  "dustrial"  ) => '0.1',
			  esc_html__( 'Opacity .2',  "dustrial"  ) => '0.2',
			  esc_html__( 'Opacity .3',  "dustrial"  ) => '0.3',
			  esc_html__( 'Opacity .4',  "dustrial"  ) => '0.4',
			  esc_html__( 'Opacity .5',  "dustrial"  ) => '0.5',
			  esc_html__( 'Opacity .6',  "dustrial"  ) => '0.6',
			  esc_html__( 'Opacity .7',  "dustrial"  ) => '0.7',
			  esc_html__( 'Opacity .8',  "dustrial"  ) => '0.8',
			  esc_html__( 'Opacity .9',  "dustrial"  ) => '0.9',
			),
			'heading' => esc_html__( 'Slider Opacity', 'dustrial' ),
		),
		array(
		  'param_name' 	=> 'slider_overlay_color',
		  'group'       => esc_html__('Style Options', 'dustrial'),
		  'type' 		=> 'colorpicker',
		  'heading' 	=> esc_html__( 'Overlay Background Color',  "dustrial" ),
		  'value' 		=> '#000',
		  "description" => esc_html__( "Choose slider overlay background color.", "dustrial" ),
		),

	),
));


/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial h3 featured itrems
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_h3_featured',
	'name' => esc_html__('Featured Group', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-sliders',
	'params' => array(

		array(
		  'param_name' => 'featured_group_column',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Choose Featured Columns',  "dustrial" ),
		  'std' => esc_html__( '4',  "dustrial" ),
		  'value' => array(
		    esc_html__( '2 Column',  "dustrial"  ) => '6',
		    esc_html__( '3 Column',  "dustrial"  ) => '4',
		    esc_html__( '4 Column',  "dustrial"  ) => '3',
		    esc_html__( '6 Column',  "dustrial"  ) => '2',
		  ),
		  "description" => esc_html__( "Choose Featured Group Columns.", "dustrial" )
		),

		// Slider 1
		array(
	      'param_name' => 'h3featured_item',
	      'type' => 'param_group',
	      'params' => array(

		        array(
		          'param_name' => 'h3featured_img',
		          'type' => 'attach_image',
		          'heading' => esc_html__('Featured background Image', 'dustrial'),
		        ),
		        array(
		          'param_name' => 'h3featured_title',
		          'type' => 'textfield',
		          'value' => '',
		          'admin_label' => true,
		          'heading' => esc_html__('Featured Title', 'dustrial'),
		        ),
		        array(
		          'param_name' => 'h3featured_desc',
		          'type' => 'textarea',
		          'heading' => esc_html__('Featured Description', 'dustrial'),
		        ),
				array(
					'type' => 'textfield',
					'value' => '',
					'heading' => esc_html__( 'Featured Button Text', 'dustrial' ),
					'param_name' => 'h3featured_text',
				),
				array(
					'type' => 'textfield',
					'value' => '',
					'heading' => esc_html__( 'Featured Button Link', 'dustrial' ),
					'param_name' => 'h3featured_link',
				),
				array(
		            'type' => 'animation_style',
		            'heading' => esc_html__( 'Animation Style', 'dustrial' ),
		            'param_name' => 'h3featured_animation',
		            'description' => esc_html__( 'Choose your animation style', 'dustrial' ),
		        ),
	       
	        ),
	    ),		
	),
));



/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial h3 featured Single itrems
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_h3_featured_single',
	'name' => esc_html__('Featured Single Items', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-sliders',
	'params' => array(

        array(
          'param_name' => 'h3_single_featured_img',
          'type' => 'attach_image',
          'heading' => esc_html__('Featured background Image', 'dustrial'),
        ),
        array(
          'param_name' => 'h3_single_featured_title',
          'type' => 'textfield',
          'value' => '',
          'admin_label' => true,
          'heading' => esc_html__('Featured Title', 'dustrial'),
        ),
        array(
          'param_name' => 'h3_single_featured_desc',
          'type' => 'textarea',
          'heading' => esc_html__('Featured Description', 'dustrial'),
        ),
		array(
			'type' => 'textfield',
			'value' => '',
			'heading' => esc_html__( 'Featured Button Text', 'dustrial' ),
			'param_name' => 'h3_single_featured_text',
		),
		array(
			'type' => 'textfield',
			'value' => '',
			'heading' => esc_html__( 'Featured Button Link', 'dustrial' ),
			'param_name' => 'h3_single_featured_link',
		),

	),
));







/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial gallery item
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_gallery',
	'name' => esc_html__('Gallery', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-picture-o',
	'params' => array(

		// Gallery
		array(
	    	"param_name" => "galleries_image",
	    	"type" => "attach_images",
	        "heading" => __("Client logo image", "dustrial"),
	    ),
	    array(
            'param_name' => 'animation',
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'dustrial' ),
            'description' => esc_html__( 'Choose your animation style', 'dustrial' ),
        ),
	    array(
	    	"param_name"  => "grid_columns",
	    	"type"      => "dropdown",
	        "heading"     => __("Column Style", "dustrial"),
	        "std"       => __("4", "dustrial"),
	        "value" => array(
	          'Columns 1' => '12',
	          'Columns 2' => '6',
	          'Columns 3' => '4',
	          'Columns 4' => '3',
	        ),
	    	"description"   => __("Layout Column", "dustrial"),
	    ),
	    array(
	      	"param_name" => "no_gutters",
	      	"type" => "checkbox",
	      	"heading" => __( "No Gutters?", "dustrial" ),
	      	"description" => __( "If you want to remove column gap please check the box", "dustrial" )
	    ),	
	    array(
	    	"param_name"  => "padding_around",
	    	"type"      => "dropdown",
	        "heading"     => __("Padding around", "dustrial"),
	        "std"       => __("0", "dustrial"),
	        "value" => array(
	          'Padding around none' => '0',
	          'Padding around 1'  => 'pa-1',
	          'Padding around 2'  => 'pa-2',
	          'Padding around 3'  => 'pa-3',
	          'Padding around 5'  => 'pa-5',
	          'Padding around 7'  => 'pa-7',
	          'Padding around 10' => 'pa-10',
	          'Padding around 15' => 'pa-15',
	        ),
	    	"description"   => __("If you want to no gutter but will be some gape then use it", "dustrial"),
	    	"dependency" => array(
		        "element" => "no_gutters",
		        "value" => 'true'
		    )
	    ),
	    array(
	    	"param_name"  => "gallery_variation",
	    	"type"      => "dropdown",
	        "heading"     => __("Variation Style", "dustrial"),
	        "std"       => __("1", "dustrial"),
	        "value" => array(
	          'Variation 1' => '1',
	          'Variation 2' => '2',
	        ),
	    	"description"   => __("Layout Variation", "dustrial"),
	    ),
	    array(
	        'param_name' => 'custom_class',
	        'type' => 'textfield',
	        'heading' => esc_html__( 'Custom Class', 'dustrial' ),
	        'description' => esc_html__( 'Put custom class if need extra style', 'dustrial' ),
	    ),	
	),
));


/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Gallery Section
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_gallery_posts',
	'name' => esc_html__('Gallery post', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-picture-o',
	'params' => array(
		
		array(
		  "param_name" => "no_filter",
		  "type" => "checkbox",
		  "heading" => esc_html__( "No Filter?", "dustrial" ),
		  "description" => esc_html__( "If you want to hide filter options please check the box", "dustrial" )
		),
		array(
		  'param_name' => 'select_filter_button_style',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Please select filter button style',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select filter button style',  "dustrial"  ) => ' ',
		    esc_html__( 'Style 1',  "dustrial"  ) => '1',
		    esc_html__( 'Style 2',  "dustrial"  ) => '2',
		  ),
		  "description" => esc_html__( "Please select your filter button style", "dustrial" )
		),
		array(
			"param_name" => "posts_per_page",
			"type" => "textfield",
    		"heading" => esc_html__("Posts Per Page", "dustrial"),
		),
		array(
			"param_name" => "content_expcerpt",
			"type" => "textfield",
    		"heading" => esc_html__("Content Excerpt Length", "dustrial"),
		),
		array(
			"param_name" => "posts_cat_id",
			"type" => "textarea",
    		"heading" => esc_html__("Put your category name", "dustrial"),
    		"description" => esc_html__( "If you want to specific category post display here. Put your category name with comma, example ( Economy,More money,Stratigy ). ", "dustrial" )
		),
		array(
		  "param_name" => "no_gutters",
		  "type" => "checkbox",
		  "heading" => esc_html__( "No Gurters?", "dustrial" ),
		  "description" => esc_html__( "If you want to remove column gap please check the box", "dustrial" )
		),
		array(
	    	"param_name"  => "padding_around",
	    	"type"      => "dropdown",
	        "heading"     => __("Padding around", "dustrial"),
	        "std"       => __("0", "dustrial"),
	        "value" => array(
	          'Padding around none' => '0',
	          'Padding around 1'  => 'pa-1',
	          'Padding around 2'  => 'pa-2',
	          'Padding around 3'  => 'pa-3',
	          'Padding around 5'  => 'pa-5',
	          'Padding around 7'  => 'pa-7',
	          'Padding around 10' => 'pa-10',
	          'Padding around 15' => 'pa-15',
	        ),
	    	"description"   => __("If you want to no gutter but will be some gape then use it", "dustrial"),
	    	"dependency" => array(
		        "element" => "no_gutters",
		        "value" => 'true'
		    )
	    ),
		array(
		  'param_name' => 'select_post_column',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Please select Your Post Column',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select Your Column',  "dustrial"  ) => ' ',
		    esc_html__( 'Column 1',  "dustrial"  ) => '12',
		    esc_html__( 'Column 2',  "dustrial"  ) => '6',
		    esc_html__( 'Column 3',  "dustrial"  ) => '4',
		    esc_html__( 'Column 4',  "dustrial"  ) => '3',
		  ),
		  "description" => esc_html__( "Please select your item columns", "dustrial" )
		),
		array(
		  'param_name' => 'select_layout_style',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Please select layout style',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select layout style',  "dustrial"  ) => ' ',
		    esc_html__( 'Style 1',  "dustrial"  ) => '1',
		    esc_html__( 'Style 2',  "dustrial"  ) => '2',
		  ),
		  "description" => esc_html__( "Please select your item style variation", "dustrial" )
		),
		array(
			'param_name' => 'gallery_opacity',
			'group'       => esc_html__('Style Options', 'dustrial'),
			'heading' 	=> esc_html__( 'Overlay',  "dustrial" ),
			'type' => 'dropdown',
			'std' => esc_html__( '0.8',  "dustrial" ),
			'value' => array(
			  esc_html__( 'Opacity .1',  "dustrial"  ) => '0.1',
			  esc_html__( 'Opacity .2',  "dustrial"  ) => '0.2',
			  esc_html__( 'Opacity .3',  "dustrial"  ) => '0.3',
			  esc_html__( 'Opacity .4',  "dustrial"  ) => '0.4',
			  esc_html__( 'Opacity .5',  "dustrial"  ) => '0.5',
			  esc_html__( 'Opacity .6',  "dustrial"  ) => '0.6',
			  esc_html__( 'Opacity .7',  "dustrial"  ) => '0.7',
			  esc_html__( 'Opacity .8',  "dustrial"  ) => '0.8',
			  esc_html__( 'Opacity .9',  "dustrial"  ) => '0.9',
			),
			'heading' => esc_html__( 'Opacity', 'dustrial' ),
		),
		array(
		  'param_name' 	=> 'gallery_overlay_color',
		  'group'       => esc_html__('Style Options', 'dustrial'),
		  'type' 		=> 'colorpicker',
		  'heading' 	=> esc_html__( 'Overlay Color',  "dustrial" ),
		  'value' 		=> '#000',
		  "description" => esc_html__( "Choose gallery overlay color.", "dustrial" ),
		),
		
	),
));



/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial pricing itrem
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'dustrial_pricing_table',
	'name' => esc_html__('Pricing Table', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-money',
	'params' => array(

		// Gallery
		array(
		  'param_name' => 'select_price_style',
		  'type' => 'dropdown',
		  'heading' => esc_html__( 'Select Pricing Table style',  "dustrial" ),
		  'value' => array(
		    esc_html__( 'Select layout style',  "dustrial"  ) => ' ',
		    esc_html__( 'Style 1',  "dustrial"  ) => '1',
		    esc_html__( 'Style 2',  "dustrial"  ) => '2',
		  ),
		  "description" => esc_html__( "Please select your price table style variation", "dustrial" )
		),		
	    array(
	        'param_name' => 'pricing_title',
	        'type' => 'textfield',
	        'heading' => esc_html__( 'Pricing Title', 'dustrial' ),
	    ),
	    array(
	        'param_name' => 'pricing_currency',
	        'type' => 'textfield',
	        'heading' => esc_html__( 'Currency', 'dustrial' ),
			"dependency" => array(
	            "element"=> "select_price_style",
	            "value"=> array( "2" ),
	        )
	    ),
	    array(
	        'param_name' => 'pricing_price',
	        'type' => 'textfield',
	        'heading' => esc_html__( 'Price', 'dustrial' ),
	    ),
	    array(
	        'param_name' => 'pricing_time',
	        'type' => 'textfield',
	        'heading' => esc_html__( 'Pricing Time', 'dustrial' ),
	    ),

	    array(
	      'param_name' => 'table_list',
	      'type' => 'param_group',
	      'params' => array(
	      	array(
	          "param_name"  => "list_variation",
	          "type"      => "dropdown",
	            "heading"     => __("List Style", "digee"),
	            "value" => array(
	              'Normal List' => '1',
	              'List with icon' => '2',
	            ),
	          "description"   => __("List Variation", "digee"),
	          'admin_label' => true,
	        ),

			// add params same as with any other content element
			array(
				'param_name' => 'type',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Icon library for phone icon', 'dustrial' ),
				'value' => array(
					esc_html__( 'flaticons Fonts', 'dustrial' ) => 'flaticons',
					esc_html__( 'Font Awesome 4', 'dustrial' ) => 'fontawesome4',
				),
				'admin_label' => false,
				'description' => esc_html__( 'Select icon library.', 'dustrial' ),
				"dependency"  => array(
		            "element" => "list_variation",
		            "value" => array( "2" ),
		        )
			),
			array(
		      'param_name' => 'pricing_icon1',
		      'type' => 'iconpicker',
		      'heading' => esc_html__( 'Icon', 'dustrial' ),
		      'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
		      'settings' => array(
		        'emptyIcon' => false, // default true, display an "EMPTY" icon?
		        'type' => 'flaticon',
		        'iconsPerPage' => 200, // default 100, how many icons per/page to display
		      ),
		      'dependency' => array(
		        'element' => 'type',
		        'value' => 'flaticons',
		      ),
		      'description' => esc_html__( 'Select icon from library.', 'dustrial' ),
		    ),
			array(
				'param_name' => 'pricing_icon2',
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'dustrial' ),
				// 'param_name' => 'icon_fontawesome',
				'value' => 'fa fa-adjust', // default value to backend editor admin_label
				'settings' => array(
					'emptyIcon' => false,
					// default true, display an "EMPTY" icon?
					'type' => 'fontawesome4',
					'iconsPerPage' => 4000,
					// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
				),
				'dependency' => array(
					'element' => 'type',
					'value' => 'fontawesome4',
				),
				'description' => esc_html__( 'Select icon from library.', 'dustrial' ),
			),
			array(
				"param_name" => "list_text",
				"type" => "textfield",
	    		"heading" => esc_html__("Info Text", "dustrial"),
			),
			array(
				'param_name' => 'inactive_item',
				'type' => 'dropdown',
				'heading' => esc_html__( 'Active or inactive list', 'dustrial' ),
				'std' => 'no',
				'value' => array(
					esc_html__( 'Active', 'dustrial' ) => 'no',
					esc_html__( 'Inactive', 'dustrial' ) => 'yes',
				),
				'admin_label' => false,
				'description' => esc_html__( 'If you want to inactive list. please select Yes', 'dustrial' ),
			),


	      )
	    ),
		array(
			'param_name' => 'inactive_priceitem',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Active or inactive Item', 'dustrial' ),
			'std' => 'no',
			'value' => array(
				esc_html__( 'Inactive', 'dustrial' ) => 'no',
				esc_html__( 'Active', 'dustrial' ) => 'yes',
			),
			'admin_label' => false,
			'description' => esc_html__( 'If you want to inactive list. please select Yes', 'dustrial' ),
			"dependency" => array(
	            "element"=> "select_price_style",
	            "value"=> array( "2" ),
	        )
		),
	    array(
	        'param_name' => 'pricing_btn_text',
	        'type' => 'textfield',
	        'heading' => esc_html__( 'Button text', 'dustrial' ),
	    ),
	    array(
	        'param_name' => 'pricing_btn_link',
	        'type' => 'textfield',
	        'heading' => esc_html__( 'Pricing button link', 'dustrial' ),
	    ),
	    array(
            'param_name' => 'animation',
            'type' => 'animation_style',
            'heading' => esc_html__( 'Animation Style', 'dustrial' ),
            'description' => esc_html__( 'Choose your animation style', 'dustrial' ),
        ),
	    array(
	        'param_name' => 'custom_class',
	        'type' => 'textfield',
	        'heading' => esc_html__( 'Custom class', 'dustrial' ),
	    ),

	    array(
          "param_name" => "title_color",
          "heading" => esc_html__( "Title Color", 'dustrial' ),
          "type" => "colorpicker",
          'description' => esc_html__( 'Choose your pricing title color.', 'dustrial' ),
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
          "param_name" => "pricing_color",
          "heading" => esc_html__( "Pricing Color", 'dustrial' ),
          "type" => "colorpicker",
          'description' => esc_html__( 'Choose your pricing color.', 'dustrial' ),
          'value' => '',
          "group" => esc_html__( "Styling", 'dustrial'),
        ),
        array(
			'param_name' => 'pricing_radius',
			'type' => 'dropdown',
			'heading' => esc_html__( 'Pricing border radius', 'dustrial' ),
			'std' => '5px',
			'value' => array(
				esc_html__( '0', 'dustrial' ) => '0px',
				esc_html__( '1', 'dustrial' ) => '1px',
				esc_html__( '2', 'dustrial' ) => '2px',
				esc_html__( '3', 'dustrial' ) => '3px',
				esc_html__( '4', 'dustrial' ) => '4px',
				esc_html__( '5', 'dustrial' ) => '5px',
				esc_html__( '6', 'dustrial' ) => '6px',
				esc_html__( '7', 'dustrial' ) => '7px',
				esc_html__( '8', 'dustrial' ) => '8px',
				esc_html__( '9', 'dustrial' ) => '9px',
				esc_html__( '10', 'dustrial' ) => '10px'
			),
			'admin_label' => false,
			"group" => esc_html__( "Styling", 'dustrial'),
		),
	    array(
          "param_name" => "active_bg_color",
          "heading" => esc_html__( "Active Item Bg Color", 'dustrial' ),
          "type" => "colorpicker",
          'description' => esc_html__( 'Choose your active pricing item bg color.', 'dustrial' ),
          'value' => '#ff5e14',
          "group" => esc_html__( "Styling", 'dustrial'),
			"dependency" => array(
	            "element"=> "select_price_style",
	            "value"=> array( "2" ),
	        )
        ),
	),
));

/*------------------------------------------------------------------------------------------------------------------*/
/*	Dustrial Breadcrumb
/*------------------------------------------------------------------------------------------------------------------*/

vc_map(array(
	'base' => 'breadcrumb_shortcode',
	'name' => esc_html__('Custom Breadcrumb', 'dustrial'),
	'category' => esc_html__('Dustrial', 'dustrial'),
	'icon' => 'fa fa-credit-card',
	'params' => array(
		
		array(
			"param_name" => "breadcrumb_bd_img",
			"type" => "attach_image",
    		"heading" => esc_html__("Breadcrumb background image", "dustrial"),
		),
		array(
			"param_name" => "breadcrumb_title",
			"type" => "textfield",
    		"heading" => esc_html__("Breadcrumb Title", "dustrial"),
		),
		
	),
));