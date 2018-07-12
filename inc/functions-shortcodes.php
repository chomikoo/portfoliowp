<?php
/**
*	@package Portfolio
*   ////////////////////
*   // Shortcodes
*   ////////////////////
* 
*/

function chomikoo_tooltiop( $atts, $content = null ) {

	// <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Tooltip on top</button>

	$atts = shortcode_atts( 
		array(
			'placement' => 'top', 
			'title' 	=> '',
		),
		$atts, 'tooltip' );

	$title = ( $atts['title']== '' ? $content : $atts['title'] );

	return '<span class="chomikoo-tooltip" data-toggle="tooltip" data-placement="' . $atts['placement'] . '" title="' . $title . '">' . $content . '</span>';

}


add_shortcode( 'tooltip', 'chomikoo_tooltiop' );
//[tooltip placement="top" title="asdasdas asdasd "]This is a content[/tooltip]


function chomikoo_popover( $atts, $content = null ) {

	$atts = shortcode_atts( 
		array(
			'placement'	=> 'top',
			'title'		=> '',
			'trigger' 	=> 'click',
			'content'	=> '',
		),
		$atts, 'popover'
	);

	return '<span class="chomikoo-popover" data-toggle="popover" data-placement="' . $atts['placement'] . '" title="' . $atts['title'] . '" data-trigger="' . $atts['trigger'] . '" data-content="' . $atts['content'] . '">' . $content . '</span>';

}

add_shortcode( 'popover', 'chomikoo_popover' );

//[popover placement="top" title="Test Title" trigger="click" content="This is popover content"]Lorem ipsum dolor [/popover]



// Contact form shortcode 

// function chomikoo_contact_form( $atts, $content ){
// 	// [contact_form]

// 	$atts = shortcode_atts( 
// 		array(),
// 		$atts,
// 		'contact_form'
// 	);

// 	ob_start();

// 	include dirname(__DIR__). '/template-parts/contact-from.php';
// 	return ob_get_clean();
// }

// add_shortcode( 'contact_form', 'chomikoo_contact_form' );