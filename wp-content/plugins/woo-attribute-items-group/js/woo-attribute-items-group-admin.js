jQuery(document).ready(function($) {
    var plugin_url = woo_attribute_items_group_ajax.plugin_url;
    $('.reset-group').on('click', function(e) {
        location.href   =   plugin_url;
    });
});
