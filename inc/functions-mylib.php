<?php
/**
*	@package Portfolio
*   ////////////////////
*   // CUstom functions
*   ////////////////////
* 
*/


	function taxonomy_labels_list( $id, $slug ) {
		$terms = get_the_terms($id, $slug);
		echo '<ul class="technology-list">';
		foreach($terms as $term){
			echo '<li class="technology-list__element">'.$term->name.'</li>';
		}
		echo '</ul>';
	}