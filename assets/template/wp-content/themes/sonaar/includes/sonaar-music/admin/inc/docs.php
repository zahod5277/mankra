<?php
global $iron_updates;
$theme_data = wp_get_theme();
$item_uri = $theme_data->get('ThemeURI');
$name = $theme_data->get('Name');
$description = $theme_data->get('Description');
$author = $theme_data->get('Author');
$author_uri = $theme_data->get('AuthorURI');
$version = $theme_data->get('Version');
$tags = $theme_data->get('Tags');

?>
<!-- CSS -->

<script>
jQuery(document).ready(function(e) {
	jQuery('div#0_section_group h2').remove();
	jQuery('div#0_section_group table.form-table').remove();
});
</script>



<style type="text/css">
	.wrap .iron-docs{
		font-size: 1rem;
	}
	.wrap .iron-docs .lead{
		font-size: 1.25rem;
	}
	.wrap .iron-docs p{
		font-size: 1rem;
	}
</style>

<div class="iron-docs">
	<div class="jumbotron">
	  	<h1>Activate Sonaar</h1>
		<p class="current-version">Version installed is <?php echo esc_html($version); ?></p>
		<p class="sub-lead">A valid license key is required to import the demos, access the theme updates and tech support.</p>
	  	<p class="lead">Enter your license key provided with your purchase.</p>
	   	<div id="validate_licence">
			<div class="form-group mx-sm-3">
		  		<div class="message" v-if="message.display" v-html="message.data" :class="{'display': message.display, 'type': message.type }"></div>
		    		<input type="text" value="" class="form-control" id="licenceKey" v-model="licenceKey" placeholder="License key">
		  	</div>
		  		<button @click="validate_licence" class="btn btn-primary">Activate my license</button>
		  		<button @click="clearCache('transient', $event)" class="btn btn-hidden">Delete Transient</button>
		  		<button @click="clearCache('option', $event)" class="btn btn-hidden">Delete Option</button>
		</div>
	</div>

		<div class="minipanels">
			<h1>Documentation</h1>
			<p class="lead">Extensive documentation including up-to-date changelog.</p>
			<a class="btdocs"href="https://sonaar.ticksy.com" target="_blank">View Documentation</a>
		</div>
		<div class="minipanels panelright">
			<h1>Get Support</h1>
		  	<p class="lead">Couldn't find what you're looking for?</p>
		  	<a class="btdocs"href="https://sonaar.ticksy.com" target="_blank">Submit a ticket</a>
		</div>
</div>