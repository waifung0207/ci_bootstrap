<?php

/**
 * Helper class to generate HTML elements
 */

function btn($label, $url = '', $icon = '', $style = 'primary', $size = '')
{
	$size = empty($size) ? '' : 'btn-'.$size;
	$url = empty($url) ? '' : site_url($url);
	$icon = empty($icon) ? '' : "<i class='fa fa-$icon'></i>";

	if ( empty($url) )
		return "<button class='btn btn-$style $size'>$icon $label</button>";
	else
		return "<a class='btn btn-$style $size' href='$url'>$icon $label</a>";
}