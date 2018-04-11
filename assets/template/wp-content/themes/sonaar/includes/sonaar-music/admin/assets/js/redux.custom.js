
jQuery(document).ready(function ($) {

	$('input[name="ironband[newsletter_type]"]').change(function() {

		if($(this).val() == 'iron_newsletter_subscribe') {

			$('#mailchimp_api_key').closest('tr').hide();
			$('#mailchimp_list_id').closest('tr').hide();
			$('#newsletter_download').closest('tr').fadeIn();

		}else{

			$('#newsletter_download').closest('tr').hide();
			$('#mailchimp_api_key').closest('tr').fadeIn();
			$('#mailchimp_list_id').closest('tr').fadeIn();

		}

	});

	$('input[name="ironband[newsletter_type]"]:checked').change();

	$('#single_post_default_sidebar, #single_video_default_sidebar, #single_event_default_sidebar, #single_discography_default_sidebar').parents('tr').css('border','none')
	$('#single_post_default_sidebar, #single_video_default_sidebar, #single_event_default_sidebar, #single_discography_default_sidebar').parents('tr').find('th,td').css('padding-bottom', '0')
});