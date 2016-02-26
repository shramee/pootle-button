<!DOCTYPE html>
<html>
<head>
	<style>
		html {
			margin: 2px !important;
		}
		body.wp-core-ui {
			font-family: verdana, arial, sans-serif;
			color: #454545;
			overflow: initial;
			height: auto;
		}
		section {
			padding: 70px 0 70px;
		}
		p {
			font-size: 0.88em;
			margin: 0.5em;
		}
		h3 {
			font-weight: normal;
			color: #333;
		}
		.field {
			margin: 1em;
		}

		.field > label {
			display: inline-block;
			width: 180px;
		}

		.field > input, .field select {
			width: 160px;
		}

		header, footer {
			background: #fcfcfc;
			padding: 5px;
			position: fixed;
			bottom: 0;
			left: 0;
			right: 0;
			text-align: right;
			z-index: 16;
		}
		footer {
			border-top: 1px solid #dfdfdf;
		}
		header.preview {
			border-bottom: 1px solid #dfdfdf;
			bottom: auto;
			top: 0;
			text-align: center;
		}
		.preview p {
			position: absolute;
			top: 0;
			margin: 0;
		}

	</style>
	<?php
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_style( 'wp-admin' );
	wp_enqueue_style( 'dashicons' );

	// Admin CSS
	wp_enqueue_style( 'wp-admin',				"/wp-admin/css/wp-admin.min.css", array( 'open-sans', 'dashicons' ) );
	wp_enqueue_style( 'login',					"/wp-admin/css/login.min.css", array( 'buttons', 'open-sans', 'dashicons' ) );
	wp_enqueue_style( 'install',				"/wp-admin/css/install.min.css", array( 'buttons', 'open-sans' ) );
	wp_enqueue_style( 'wp-color-picker',		"/wp-admin/css/color-picker.min.css" );
	wp_enqueue_style( 'customize-controls',		"/wp-admin/css/customize-controls.min.css", array( 'wp-admin', 'colors', 'ie', 'imgareaselect' ) );
	wp_enqueue_style( 'customize-widgets',		"/wp-admin/css/customize-widgets.min.css", array( 'wp-admin', 'colors' ) );
	wp_enqueue_style( 'customize-nav-menus',	"/wp-admin/css/customize-nav-menus.min.css", array( 'wp-admin', 'colors' ) );
	wp_enqueue_style( 'press-this',				"/wp-admin/css/press-this.min.css", array( 'open-sans', 'buttons' ) );
	?>
</head>
<body class="wp-core-ui">
	<header class="preview">
		<p>Preview</p>
		<a href="#" id="preview"></a>
	</header>
	<section>
		<h3>General</h3>
		<div class="field">
			<label>Button Text</label>
			<input type="text" class="button-text" name="text" placeholder="Text" value="<?php echo filter_input( INPUT_GET, 'text' ) ?>">
		</div>
		<div class="field">
			<label>Button Link</label>
			<input type="text" class="input-attr" name="href" placeholder="URL" value="<?php echo filter_input( INPUT_GET, 'url' ) ?>">
		</div>
		<div class="field">
			<label>Open in a new window</label>
			<input type="checkbox" class="input-attr" name="target"  value="_blank">
		</div>
		<div class="field">
			<label>Icon</label>
			<input type="hidden" class="button-icon" name="dashicon"  value="<?php echo htmlspecialchars( filter_input( INPUT_GET, 'icon' ) ) ?>">
		</div>
		<h3>Colors</h3>
		<div class="field">
			<label>Background color</label>
			<input class="input-bg-color" name="background-color" type="colorpicker"  data-alpha="true" value="#f0f0f1" placeholder="Background color">
		</div>
		<div class="field">
			<label>Second Background color</label>
			<input class="input-bg-color2" name="background-color2" type="colorpicker"  data-alpha="true" value="" placeholder="Bottom Color for Gradient">
			<p>Use different second background color for a beautiful gradient!</p>
		</div>
		<div class="field">
			<label>Text color</label>
			<input class="input-style" name="color" type="colorpicker"  data-alpha="true" value="#111112" placeholder="Text color">
		</div>
		<div class="field">
			<label>Hover color</label>
			<input class="input-attr" name="data-hover-color" type="colorpicker"  data-alpha="true" placeholder="Hover Color" value="<?php echo filter_input( INPUT_GET, 'hoverClr' ) ?>">
		</div>
		<h3>Border</h3>
		<div class="field">
			<label>Border color</label>
			<input  type="hidden" class="input-style" name="border-style" value="solid">
			<input class="input-style" name="border-color" value="#111112" type="colorpicker"  data-alpha="true" placeholder="Border color">
		</div>
		<div class="field">
			<label>Border width ( pixels )</label>
			<input class="input-style" name="border-width" type="number" min="0" value="1" max="25">
		</div>
		<div class="field">
			<label>Border Radius ( pixels )</label>
			<input class="input-style" name="border-radius" type="number" min="0" value="0" max="99">
		</div>
		<div class="field">
			<label>Size</label>
			<select class="input-style" name="font-size">
				<option value="8px">Small</option>
				<option value="12px" selected="selected">Medium</option>
				<option value="16px">Large</option>
				<option value="20px">Extra Large</option>
				<option value="25px">Huge</option>
			</select>
		</div>
		<div class="field">
			<label>Align</label>
			<select class="input-attr" name="class">
				<option value="pbtn" selected="selected">None</option>
				<option value="pbtn align-left" selected="selected">Left</option>
				<option value="pbtn align-center">Center</option>
				<option value="pbtn align-right">Right</option>
			</select>
		</div>
	</section>
	<footer>
		<input type="button" class="button-primary" id="submit" value="Insert Button">
	</footer>

	<?php wp_print_footer_scripts(); ?>
	<script src="<?php echo $_GET['assets_url'] . 'alpha-color.js' ?>"></script>
	<link rel="stylesheet" href="<?php echo $_GET['assets_url'] . 'dashicons-select.css' ?>">
	<script src="<?php echo $_GET['assets_url'] . 'dashicons-select.js' ?>"></script>

	<script>
		jQuery( function ( $ ) {
			var get_input_styles, get_background, preview,
				params = top.tinymce.activeEditor.windowManager.getParams(),
				$icon = $( '.button-icon' ),
				$prevu = $( '#preview' ),
				$style_inputs = $( '.input-style' ),
				$submit = $( '#submit' );

			<?php
			if ( ! empty( $_GET['edit_button'] ) ) {
				?>
				var parts = params.button.attr( 'style' ).replace(/ /gi, '').split( ";" );
				for (var i=0;i < parts.length; i++) {
					var subParts = parts[i].split(':');
					if ( subParts[1] ) {
						var $f = $( '[name="' + subParts[0] + '"]' );
						console.log( '[name="' + subParts[0] + '"]' + ' ' + $f.length )
						if ( 'number' == $f.attr( 'type' ) ) {
							$f.val( subParts[1].replace( 'px', '' ) ).change();
						} else {
							$f.val( subParts[1] ).change();
						}
					}
				}
				$( '[name="class"]' );
				<?php
			}
			?>

			$icon.dashiconSelector();

			preview = function () {
				$prevu
					.attr( 'style', get_input_styles() )
					//.attr( 'class', $( '.button-icon' ).val() )
					.data( 'hover-color', $( '.input-attr[name="data-hover-color"]' ).val() )
					.html( $icon.val() + ' ' + $( '.button-text' ).val() );
				$( 'section' ).css( 'padding-top', $( 'header.preview' ).outerHeight() - 7 );
			};

			get_input_styles = function () {
				var return_text = '';
				$style_inputs.each( function () {
					var $t = $( this );
					var val = $t.val();

					if ( ! val ) { return; }
					if ( 'number' == $t.attr( 'type' ) ) { val = $t.val() + 'px'; }

					return_text += $t.attr( 'name' ) + ':' + val + ';';
				} );
				return return_text + get_background() + 'display:inline-block;padding: 0.5em 1em;text-decoration: none;';
			};

			get_background = function () {
				var return_text = '',
					color = $( '.input-bg-color' ).val(),
					color2 = $( '.input-bg-color2' ).val();
				return_text += 'background-color:' + color + ';';

				if ( color2 ) {
					var gradient = 'linear-gradient(' + color + ',' + color2 + ')';
					return_text += 'background:-webkit-' + gradient + ';';
					return_text += 'background:-o-' + gradient + ';';
					return_text += 'background:-moz-' + gradient + ';';
					return_text += 'background:' + gradient + ';';
				}
				return return_text;
			};

			$( 'input[type="colorpicker"]' ).each( function () {
				var $t = $( this );
				$t.libColorPicker({
					change: preview
				});
			} );

			$submit.click( function () {
				var return_text = '<a ',
					attr = '',
					style = '',
					ed = params.editor;

				// Button attributes
				$( '.input-attr' ).each( function () {
					var $t = $( this );
					return_text += $t.attr( 'name' ) + '="' + $t.val() + '" ';
				} );

				// Button styles
				return_text += 'style="' + get_input_styles() + '">' + $icon.val() + ' ' + $( '.button-text' ).val() + "</a>&nbsp;\n";

				ed.execCommand( 'mceInsertContent', 0, return_text );
				ed.windowManager.close();
			} );

			$style_inputs.change( preview );
			$( '.button-text, .button-icon' ).change( preview );
			$style_inputs.last().change();
			$prevu.hover(
				function() {
					var $t = $( this );
					if ( ! $t.data( 'hover-color' ) ) {
						$t.css( 'opacity', '0.7' );
						return;
					}
					$t.data( 'background', $t.css( 'background' ) );
					$t.css( 'background', $t.data( 'hover-color' ) );
				},
				function() {
					var $t = $( this );
					if ( ! $t.data( 'background' ) ) {
						$t.css( 'opacity', 1 );
						return;
					}
					$t.css( {
						'background' : $t.data( 'background' ),
					} );
				}
			);
		} );
	</script>
</body>
</html>
<?php die(); ?>