<?php

/**
 * Helper class to generate HTML elements
 * Styling from: http://almsaeedstudio.com/AdminLTE/
 */

function btn($label, $url = '', $style = 'primary', $size = '')
{
	$size = empty($size) ? '' : 'btn-'.$size;
	$url = empty($url) ? '' : site_url($url);

	if ( empty($url) )
		return "<button class='btn btn-$style $size'>$label</button>";
	else
		return "<a class='btn btn-$style $size' href='$url'>$label</a>";
}

function btn_submit($label = 'Submit', $style = 'primary')
{
	return "<button class='btn btn-$style' type='submit'>$label</button>";
}

function table_open($headers = '')
{
	$header_rows = '';
	if ( !empty($headers) && is_array($headers) )
	{
		$header_rows = "<thead><tr>";
		foreach ($headers as $header)
		{
			$header_rows.= "<th>$header</th>";
		}
		$header_rows.= "</tr></thead></tbody>";
	}

	return "<table class='table table-bordered table-hover'>".$header_rows;
}

function table_close($close_body = TRUE)
{
	return $close_body ? "</tbody></table>" : "</table>";
}

function box_open($title, $style = 'primary')
{
	$style = empty($style) ? '' : 'box-'.$style;
	return "<div class='box $style'>
		<div class='box-header'>
			<h3 class='box-title'>$title</h3>
		</div>
		<div class='box-body'>";
}

function box_close($footer = '')
{
	$footer = empty($footer) ? '' : "<div class='box-footer'>$footer</div>";
	return "</div>$footer</div>";
}

function small_box($color, $number, $label, $icon, $url = '')
{
	$href = empty($url) ? '#' : site_url($url);
	$more_info = empty($url) ? '&nbsp;' : "More info <i class='fa fa-arrow-circle-right'></i>";
	
	return "<div class='small-box bg-$color'>
		<div class='inner'>
			<h3>$number</h3>
			<p>$label</p>
		</div>
		<div class='icon'>
			<i class='fa fa-$icon'></i>
		</div>
		<a href='$href' class='small-box-footer'>$more_info</a>
	</div>";
}

function app_btn($icon, $label, $url = '', $badge = '', $badge_color = 'purple')
{
	$href = empty($url) ? '#' : site_url($url);
	$badge = empty($badge) ? '' : "<span class='badge bg-$badge_color'>$badge</span>";
	return "<a class='btn btn-app' href='$href'>$badge<i class='fa fa-$icon'></i> $label</a>";
}