<?php
	include("session_call.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>ACDSS | Services</title>
		<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width" />

		<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link rel="stylesheet" href="style.css" media="screen" />
		<!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
		<link rel="stylesheet" href="style.responsive.css" media="all" />

		<script src="jquery.js"></script>
		<script src="script.js"></script>
		<script src="script.responsive.js"></script>
		<meta name="description" content="Description" />
		<meta name="keywords" content="Keywords" />

		<script>
			jQuery(function($) {
				"use strict';
				if ($.fn.slider) {
					$(".art-slidecontainerburial3").each(function () {
						var slideContainer = $(this), tmp;
						var inner = $(".art-slider-inner", slideContainer);
						var helper = null;

						inner.children().eq(0).addClass("active");
						slideContainer.slider({
							pause: 2600,
							speed: 600,
							repeat: true,
							animation: "fade",
							direction: "next",
							navigator: slideContainer.siblings(".art-slidenavigatorburial3"),
							helper: helper
						});
					});
				}
			});

			jQuery(function($) {
				"use strict';
				if ($.fn.slider) {
					$(".art-slidecontainerrehab1").each(function () {
						var slideContainer = $(this), tmp;
						var inner = $(".art-slider-inner", slideContainer);
						var helper = null;

						inner.children().eq(0).addClass("active");
						slideContainer.slider({
							pause: 2600,
							speed: 600,
							repeat: true,
							animation: "fade",
							direction: "next",
							navigator: slideContainer.siblings(".art-slidenavigatorrehab1"),
							helper: helper
						});
					});
				}
			});

			jQuery(function($) {
				"use strict';
				if ($.fn.slider) {
					$(".art-slidecontainere6edc34d24434ba7ae91f0f20b98716d").each(function () {
						var slideContainer = $(this), tmp;
						var inner = $(".art-slider-inner", slideContainer);
						var helper = null;

						inner.children().eq(0).addClass("active");
						slideContainer.slider({
							pause: 2600,
							speed: 600,
							repeat: true,
							animation: "fade",
							direction: "next",
							navigator: slideContainer.siblings(".art-slidenavigatore6edc34d24434ba7ae91f0f20b98716d"),
							helper: helper
						});
					});
				}
			});

			jQuery(function($) {
				"use strict';
				if ($.fn.slider) {
					$(".art-slidecontaineroutreach2").each(function () {
						var slideContainer = $(this), tmp;
						var inner = $(".art-slider-inner", slideContainer);
						var helper = null;

						inner.children().eq(0).addClass("active");
						slideContainer.slider({
							pause: 2600,
							speed: 600,
							repeat: true,
							animation: "fade",
							direction: "next",
							navigator: slideContainer.siblings(".art-slidenavigatoroutreach2"),
							helper: helper
						});
					});
				}
			});
		</script>

		<style>
			.art-slidecontainerburial3
			{
				position: relative;
				width: 194px;
				height: 130px;
			}

			.art-slidecontainerburial3 .art-slide-item
			{

			}

			.art-slidecontainerburial3 .art-slide-item
			{
				-webkit-transition: 600ms ease-in-out opacity;
				-moz-transition: 600ms ease-in-out opacity;
				-ms-transition: 600ms ease-in-out opacity;
				-o-transition: 600ms ease-in-out opacity;
				transition: 600ms ease-in-out opacity;
				position: absolute;
				display: none;
				left: 0;
				top: 0;
				opacity: 0;
				width:  100%;
				height: 100%;
			}

			.art-slidecontainerburial3 .active, .art-slidecontainerburial3 .next, .art-slidecontainerburial3 .prev
			{
				display: block;
			}

			.art-slidecontainerburial3 .active
			{
				opacity: 1;
			}

			.art-slidecontainerburial3 .next, .art-slidecontainerburial3 .prev
			{
				width: 100%;
			}

			.art-slidecontainerburial3 .next.forward, .art-slidecontainerburial3 .prev.back
			{
				opacity: 1;
			}

			.art-slidecontainerburial3 .active.forward
			{
				opacity: 0;
			}

			.art-slidecontainerburial3 .active.back
			{
				opacity: 0;
			}

			.art-slideburial30
			{
				background-image:  url("images/slideburial30.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}

			.art-slideburial31
			{
				background-image:  url("images/slideburial31.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}

			.art-slideburial32
			{
				background-image:  url("images/slideburial32.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}

			.art-slideburial33
			{
				background-image:  url("images/slideburial33.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}

			.art-slideburial34
			{
				background-image:  url("images/slideburial34.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}

			.art-slidenavigatorburial3
			{
	display: inline-block;
	position: absolute;
	direction: ltr !important;
	top: 105px;
	left: 74px;
	z-index: 101;
	line-height: 0 !important;
	-webkit-background-origin: border !important;
	-moz-background-origin: border !important;
	background-origin: border-box !important;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	text-align: center;
	white-space: nowrap;
			}

			.art-slidenavigatorburial3
			{
				background: #CEE58A;background: linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -webkit-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -moz-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -o-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -ms-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;-svg-background: linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;
				-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;
				padding:7px;
			}

			.art-slidenavigatorburial3 > a
			{
				background: #8DB027;background: #8DB027;background: #8DB027;background: #8DB027;background: #8DB027;background: #8DB027;background: #8DB027;-svg-background: #8DB027;
				-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;
				margin:0 10px 0 0;
				width: 10px;
				height: 10px;
			}

			.art-slidenavigatorburial3 > a.active
			{
				background: #B2B493;background: #B2B493;background: #B2B493;background: #B2B493;background: #B2B493;background: #B2B493;background: #B2B493;-svg-background: #B2B493;
				-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;
				margin:0 10px 0 0;
				width: 10px;
				height: 10px;
			}

			.art-slidenavigatorburial3 > a:hover
			{
				background: #6B6C4B;background: #6B6C4B;background: #6B6C4B;background: #6B6C4B;background: #6B6C4B;background: #6B6C4B;background: #6B6C4B;-svg-background: #6B6C4B;
				-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;
				margin:0 10px 0 0;
				width: 10px;
				height: 10px;
			}

			.art-slidecontainerrehab1
			{
				position: relative;
				width: 175px;
				height: 116px;
			}

			.art-slidecontainerrehab1 .art-slide-item
			{

			}

			.art-slidecontainerrehab1 .art-slide-item
			{
				-webkit-transition: 600ms ease-in-out opacity;
				-moz-transition: 600ms ease-in-out opacity;
				-ms-transition: 600ms ease-in-out opacity;
				-o-transition: 600ms ease-in-out opacity;
				transition: 600ms ease-in-out opacity;
				position: absolute;
				display: none;
				left: 0;
				top: 0;
				opacity: 0;
				width:  100%;
				height: 100%;
			}

			.art-slidecontainerrehab1 .active, .art-slidecontainerrehab1 .next, .art-slidecontainerrehab1 .prev
			{
				display: block;
			}

			.art-slidecontainerrehab1 .active
			{
				opacity: 1;
			}

			.art-slidecontainerrehab1 .next, .art-slidecontainerrehab1 .prev
			{
				width: 100%;
			}

			.art-slidecontainerrehab1 .next.forward, .art-slidecontainerrehab1 .prev.back
			{
				opacity: 1;
			}

			.art-slidecontainerrehab1 .active.forward
			{
				opacity: 0;
			}

			.art-slidecontainerrehab1 .active.back
			{
				opacity: 0;
			}

			.art-sliderehab10
			{
				background-image:  url("images/sliderehab10.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}
			
			.art-sliderehab11
			{
				background-image:  url("images/sliderehab11.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}
			
			.art-sliderehab12
			{
				background-image:  url("images/sliderehab12.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}
			
			.art-sliderehab13
			{
				background-image:  url("images/sliderehab13.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}
			
			.art-sliderehab14
			{
				background-image:  url("images/sliderehab14.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}

			.art-slidenavigatorrehab1
			{
	display: inline-block;
	position: absolute;
	direction: ltr !important;
	top: 92px;
	left: 69px;
	z-index: 101;
	line-height: 0 !important;
	-webkit-background-origin: border !important;
	-moz-background-origin: border !important;
	background-origin: border-box !important;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	text-align: center;
	white-space: nowrap;
			}
			
			.art-slidenavigatorrehab1
			{
				background: #CEE58A;background: linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -webkit-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -moz-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -o-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -ms-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;-svg-background: linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;
				-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;
				padding:7px;
			}
			
			.art-slidenavigatorrehab1 > a
			{
				background: #8DB027;
				-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;
				margin:0 10px 0 0;
				width: 10px;
				height: 10px;
			}
			
			.art-slidenavigatorrehab1 > a.active
			{
				background: #B2B493;
				-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;
				margin:0 10px 0 0;
				width: 10px;
				height: 10px;
			}
			
			.art-slidenavigatorrehab1 > a:hover
			{
				background: #6B6C4B;
				-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;
				margin:0 10px 0 0;
				width: 10px;
				height: 10px;
			}

			.art-slidecontainere6edc34d24434ba7ae91f0f20b98716d 
			{
				position: relative;
				width: 208px;
				height: 139px;
			}

			.art-slidecontainere6edc34d24434ba7ae91f0f20b98716d .art-slide-item
			{

			}

			.art-slidecontainere6edc34d24434ba7ae91f0f20b98716d .art-slide-item
			{
				-webkit-transition: 600ms ease-in-out opacity;
				-moz-transition: 600ms ease-in-out opacity;
				-ms-transition: 600ms ease-in-out opacity;
				-o-transition: 600ms ease-in-out opacity;
				transition: 600ms ease-in-out opacity;
				position: absolute;
				display: none;
				left: 0;
				top: 0;
				opacity: 0;
				width:  100%;
				height: 100%;
			}

			.art-slidecontainere6edc34d24434ba7ae91f0f20b98716d .active, .art-slidecontainere6edc34d24434ba7ae91f0f20b98716d .next, .art-slidecontainere6edc34d24434ba7ae91f0f20b98716d .prev
			{
				display: block;
			}

			.art-slidecontainere6edc34d24434ba7ae91f0f20b98716d .active
			{
				opacity: 1;
			}

			.art-slidecontainere6edc34d24434ba7ae91f0f20b98716d .next, .art-slidecontainere6edc34d24434ba7ae91f0f20b98716d .prev
			{
				width: 100%;
			}

			.art-slidecontainere6edc34d24434ba7ae91f0f20b98716d .next.forward, .art-slidecontainere6edc34d24434ba7ae91f0f20b98716d .prev.back
			{
				opacity: 1;
			}

			.art-slidecontainere6edc34d24434ba7ae91f0f20b98716d .active.forward
			{
				opacity: 0;
			}

			.art-slidecontainere6edc34d24434ba7ae91f0f20b98716d .active.back
			{
				opacity: 0;
			}

			.art-slidee6edc34d24434ba7ae91f0f20b98716d0
			{
				background-image:  url("images/slidee6edc34d24434ba7ae91f0f20b98716d0.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}
			
			.art-slidee6edc34d24434ba7ae91f0f20b98716d1
			{
				background-image:  url("images/slidee6edc34d24434ba7ae91f0f20b98716d1.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}
			
			.art-slidee6edc34d24434ba7ae91f0f20b98716d2
			{
				background-image:  url("images/slidee6edc34d24434ba7ae91f0f20b98716d2.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}
			
			.art-slidee6edc34d24434ba7ae91f0f20b98716d3
			{
				background-image:  url("images/slidee6edc34d24434ba7ae91f0f20b98716d3.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}
			
			.art-slidee6edc34d24434ba7ae91f0f20b98716d4
			{
				background-image:  url("images/slidee6edc34d24434ba7ae91f0f20b98716d4.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}

			.art-slidenavigatore6edc34d24434ba7ae91f0f20b98716d
			{
	display: inline-block;
	position: absolute;
	direction: ltr !important;
	top: 116px;
	left: 108px;
	z-index: 101;
	line-height: 0 !important;
	-webkit-background-origin: border !important;
	-moz-background-origin: border !important;
	background-origin: border-box !important;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	text-align: center;
	white-space: nowrap;
			}
			
			.art-slidenavigatore6edc34d24434ba7ae91f0f20b98716d
			{
				background: #CEE58A;background: linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -webkit-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -moz-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -o-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -ms-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;-svg-background: linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;
				-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;
				padding:7px;
			}
			
			.art-slidenavigatore6edc34d24434ba7ae91f0f20b98716d > a
			{
				background: #8DB027;
				-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;
				margin:0 10px 0 0;
				width: 10px;
				height: 10px;
			}
			
			.art-slidenavigatore6edc34d24434ba7ae91f0f20b98716d > a.active
			{
				background: #B2B493;
				-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;
				margin:0 10px 0 0;
				width: 10px;
				height: 10px;
			}
			
			.art-slidenavigatore6edc34d24434ba7ae91f0f20b98716d > a:hover
			{
				background: #6B6C4B;
				-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;
				margin:0 10px 0 0;
				width: 10px;
				height: 10px;
			}

			.art-slidecontaineroutreach2
			{
				position: relative;
				width: 193px;
				height: 145px;
			}

			.art-slidecontaineroutreach2 .art-slide-item
			{

			}

			.art-slidecontaineroutreach2 .art-slide-item
			{
				-webkit-transition: 600ms ease-in-out opacity;
				-moz-transition: 600ms ease-in-out opacity;
				-ms-transition: 600ms ease-in-out opacity;
				-o-transition: 600ms ease-in-out opacity;
				transition: 600ms ease-in-out opacity;
				position: absolute;
				display: none;
				left: 0;
				top: 0;
				opacity: 0;
				width:  100%;
				height: 100%;
			}

			.art-slidecontaineroutreach2 .active, .art-slidecontaineroutreach2 .next, .art-slidecontaineroutreach2 .prev
			{
				display: block;
			}

			.art-slidecontaineroutreach2 .active
			{
				opacity: 1;
			}

			.art-slidecontaineroutreach2 .next, .art-slidecontaineroutreach2 .prev
			{
				width: 100%;
			}

			.art-slidecontaineroutreach2 .next.forward, .art-slidecontaineroutreach2 .prev.back
			{
				opacity: 1;
			}

			.art-slidecontaineroutreach2 .active.forward
			{
				opacity: 0;
			}

			.art-slidecontaineroutreach2 .active.back
			{
				opacity: 0;
			}

			.art-slideoutreach20
			{
				background-image:  url("images/slideoutreach20.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}
			
			.art-slideoutreach21
			{
				background-image:  url("images/slideoutreach21.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}
			
			.art-slideoutreach22
			{
				background-image:  url("images/slideoutreach22.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}
			
			.art-slideoutreach23
			{
				background-image:  url("images/slideoutreach23.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}
			
			.art-slideoutreach24
			{
				background-image:  url("images/slideoutreach24.jpg");
				background-position:  0 0;
				background-repeat: no-repeat;
			}

			.art-slidenavigatoroutreach2
			{
	display: inline-block;
	position: absolute;
	direction: ltr !important;
	top: 121px;
	left: 82px;
	z-index: 101;
	line-height: 0 !important;
	-webkit-background-origin: border !important;
	-moz-background-origin: border !important;
	background-origin: border-box !important;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	text-align: center;
	white-space: nowrap;
			}
			
			.art-slidenavigatoroutreach2
			{
				background: #CEE58A;background: linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -webkit-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -moz-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -o-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: -ms-linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;background: linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;-svg-background: linear-gradient(top, rgba(234, 244, 205, 0.6) 0, rgba(179, 215, 71, 0.6) 100%) no-repeat;
				-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px;
				padding:7px;
			}
			
			.art-slidenavigatoroutreach2 > a
			{
				background: #8DB027;
				-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;
				margin:0 10px 0 0;
				width: 10px;
				height: 10px;
			}
			
			.art-slidenavigatoroutreach2 > a.active
				{
				background: #B2B493;
				-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;
				margin:0 10px 0 0;
				width: 10px;
				height: 10px;
			}

			.art-slidenavigatoroutreach2 > a:hover
			{
				background: #6B6C4B;
				-webkit-border-radius:50%;-moz-border-radius:50%;border-radius:50%;
				margin:0 10px 0 0;
				width: 10px;
				height: 10px;
			}
		</style>
	</head>

	<script type="text/javascript">
	function confirmation()
		{
			var answer = confirm ("You must index first.")
			if (answer)
			{
				header("location:index.php");
			}
			else
			{
				
			}
		}
	</script>

	<body><a name="top"></a>
		<div id="art-main">
			<?php
				include("header.php");
				echo '<p align="right"><font color="white" size="2">Current User: '.strtoupper($_SESSION['valid_username']).'&nbsp;&nbsp;</font></p>';
				include("nav.php");
			?>
			<div class="art-sheet clearfix">
				<div class="art-layout-wrapper clearfix">
					<div class="art-content-layout">
						<div class="art-content-layout-row">
							<div class="art-layout-cell art-content clearfix">
								<article class="art-post art-article">								
								<h2 class="art-postheader"><font color="white">Programs and Services</font></h2>
								<font color="#F1EDC2">
								<div class="art-postcontent art-postcontent-0 clearfix">
                                	<div class="art-post">
										<div class="art-post-body">
											<div class="art-post-inner art-article">
												<div class="art-postcontent">
													<table class="art-article" cellspacing="2" cellpadding="3" style="border:0;width:100%;">
														<tbody>
															<tr class="even">
																<td style="border:0;width:25%;padding:4px;">
																<div id="burial3" style="position: relative; display: inline-block; z-index: 0; margin: 7px;  border-width: 0px;  " class="art-collage">
																	<div class="art-slider art-slidecontainerburial3">
																		<div align="center" class="art-slider-inner">
																			<div class="art-slide-item art-slideburial30"></div>
																			<div class="art-slide-item art-slideburial31"></div>
																			<div class="art-slide-item art-slideburial32"></div>
																			<div class="art-slide-item art-slideburial33"></div>
																			<div class="art-slide-item art-slideburial34"></div>
																		</div>
																	</div>
																	<div class="art-slidenavigator art-slidenavigatorburial3">
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																	</div>
																</div><br />
																</td>

																<td style="border:0;width:25%;padding:4px;">
																<div id="outreach2" style="position: relative; display: inline-block; z-index: 0; margin: 7px;  border-width: 0px;  " class="art-collage">
																	<div class="art-slider art-slidecontaineroutreach2">
																		<div class="art-slider-inner">
																			<div class="art-slide-item art-slideoutreach20"></div>
																			<div class="art-slide-item art-slideoutreach21"></div>
																			<div class="art-slide-item art-slideoutreach22"></div>
																			<div class="art-slide-item art-slideoutreach23"></div>
																			<div class="art-slide-item art-slideoutreach24"></div>
																		</div>
																	</div>
																	<div class="art-slidenavigator art-slidenavigatoroutreach2">
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																	</div>
																</div><br />
																</td>

																<td style="border:0;width:25%;padding:4px;">
																<div id="rehab1" style="position: relative; display: inline-block; z-index: 0; margin: 7px;  border-width: 0px;  " class="art-collage">
																	<div class="art-slider art-slidecontainerrehab1">
																		<div class="art-slider-inner">
																			<div class="art-slide-item art-sliderehab10"></div>
																			<div class="art-slide-item art-sliderehab11"></div>
																			<div class="art-slide-item art-sliderehab12"></div>
																			<div class="art-slide-item art-sliderehab13"></div>
																			<div class="art-slide-item art-sliderehab14"></div>
																		</div>
																	</div>
																	<div class="art-slidenavigator art-slidenavigatorrehab1">
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																	</div>
																</div><br />
																</td>

																<td style="border:0;width:25%;padding:4px;">
																<div id="e6edc34d24434ba7ae91f0f20b98716d" style="position: relative; display: inline-block; z-index: 0; margin: 0px;  border-width: 0px;  " class="art-collage">
																	<div class="art-slider art-slidecontainere6edc34d24434ba7ae91f0f20b98716d">
																		<div class="art-slider-inner">
																			<div class="art-slide-item art-slidee6edc34d24434ba7ae91f0f20b98716d0"></div>
																			<div class="art-slide-item art-slidee6edc34d24434ba7ae91f0f20b98716d1"></div>
																			<div class="art-slide-item art-slidee6edc34d24434ba7ae91f0f20b98716d2"></div>
																			<div class="art-slide-item art-slidee6edc34d24434ba7ae91f0f20b98716d3"></div>
																			<div class="art-slide-item art-slidee6edc34d24434ba7ae91f0f20b98716d4"></div>
																		</div>
																	</div>
																	<div class="art-slidenavigator art-slidenavigatore6edc34d24434ba7ae91f0f20b98716d">
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																		<a href="#" class="art-slidenavigatoritem"></a>
																	</div>
																</div><br />
																</td>
															</tr>

															<tr>
																<td style="border:0;width:25%;padding:7px;"><span style="background-color:rgb(47, 137, 182);color:rgb(255, 255, 255);"> RELIEF AND PUBLIC ASSISTANCE DIVISION</span></td>
																<td style="border:0;width:25%;padding:7px;"><span style="background-color:rgb(160, 70, 97);color:rgb(255, 255, 255);">COMMUNITY OUTREACH DIVISION</span></td>
																<td style="border:0;width:25%;padding:7px;"><span style="background-color:rgb(83, 133, 30);color:rgb(255, 255, 255);">RESIDENTIAL AND REHABILITATION DIVISION</span></td>
																<td style="border:0;width:25%;padding:7px;"><span style="background-color:rgb(235, 149, 0);color:rgb(255, 255, 255);">SPECIAL PROGRAMS AND PROJECTS</span></td>
															</tr>

															<tr>
																<td style="text-align:justify;width:25%;padding:7px;">...<a href="services_relief_public_assistance.php">Read More</a>&nbsp;<br /></td>
																<td style="text-align:justify;width:25%;padding:7px;">Some of the projects of the Community Outreach Division are Child and Youth Development Program, Program for Out-of-School Youth that is for the whole year of 2011, there were four hundred sixty seven (467) OSY registered and active officers and members of the Pag-asa Youth Association of the Philippines- Antipolo Chapter...&nbsp;<a href="services_comm_outreach.php">Read More</a>&nbsp;<br /></td>
																<td style="width:25%;text-align:justify;padding:7px;">Bahay Kalinga-Antipolo Center for Girls is one of the projects of this division. This center has been in operation for nine (9) years now. It was established to provide livelihood. Last December 28, 2011, BK Founding Anniversary was held...<a href="services_residential_rehabilitation.php">Read More</a>&nbsp;<br /></td>
																<td style="width:25%;text-align:justify;padding:7px;">The State of Local Governance Performance presents the inputs to the development of the City most of which are institutional in nature. The development of said institutions has a significant bearing in the improvement of the delivery of public services hence, should be a continuing agenda of the City Government. Ultimately, any improvement in the capability of the existing institutions contributes to the quality of public service delivery that trickles down to a better quality of life of Antipoleños...<a href="services_special_prog_proj.php">Read More</a>&nbsp;<br /></td>
															</tr>
														</tbody>														
													</table>
												</div>
											</div>
										</div>
										</font>
									</div>
								</div>
								</article>
							</div>
						</div>
					</div>
				</div>
				<hr /><?php include("footer.php"); ?>
			</div><br />
		</div>
	</body>
</html>