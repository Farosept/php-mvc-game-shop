<?php
class View
{
	function generate($content_view, $template_view, $data = null)
	{
		include 'application/views/'.$template_view;
		include 'application/views/'.$content_view;
	}
}
class PartialView
{
	function generate($content_view, $data = null)
	{
		include 'application/views/'.$content_view;
	}
}
