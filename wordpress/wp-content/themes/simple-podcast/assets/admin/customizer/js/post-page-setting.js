(function (wp, $) {

    wp.customize.bind('ready', function () {
        wp.customize('blog_layout', function (setting) {
            var value = setting.get();
            simplePodcastToggleLayoutSettings(value);
        });


    });

    wp.customize.control('blog_layout', function (control) {

        control.container.on('click', '.image-select', function (event) {
            event.stopPropagation();

            /*On layout change*/
            var chagedLayout = jQuery(this).val()
            simplePodcastToggleLayoutSettings(chagedLayout)

        });

    });



})(wp, jQuery);

function simplePodcastToggleLayoutSettings(setting) {
    if (setting == 'standard') {
        simplePodcastShowStandardLayoutOptions()
    } else {
        simplePodcastShowListLayoutOptions()
    }
}

function simplePodcastShowStandardLayoutOptions() {
    jQuery('#customize-control-simple-podcast_theme_options-blog_sortable_content_sandard').fadeIn(1000);
    jQuery('#customize-control-entry_footer_bgcolor').fadeIn(1000);
    jQuery('#customize-control-simple-podcast_theme_options-blog_sortable_content_list').hide();
    jQuery('#customize-control-simple-podcast_theme_options-blog_sortable_content_list2').hide();
}

function simplePodcastShowListLayoutOptions() {
    jQuery('#customize-control-simple-podcast_theme_options-blog_sortable_content_sandard').hide();
    jQuery('#customize-control-entry_footer_bgcolor').hide();
    jQuery('#customize-control-simple-podcast_theme_options-blog_sortable_content_list').fadeIn(1000);
    jQuery('#customize-control-simple-podcast_theme_options-blog_sortable_content_list2').fadeIn(1000);
}