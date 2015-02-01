/* 
 * User Role Editor WordPress plugin Pro
 * Author: Vladimir Garagulya
 * email: vladimir@shinephp.com
 * 
 */

jQuery(document).ready(function(){
  jQuery("#edit_allowed_plugins").button({
    label: ure_data_pro.edit_allowed_plugins
  }).click(function(event){
      event.preventDefault();
      var user_id = jQuery('#ure_user_id').val();
      var data = {
        action: 'ure_user_profile_plugins_list',
        wp_nonce: ure_data_pro.wp_nonce,
        user_id: user_id        
      };
      var request = jQuery.ajax({
          url: ajaxurl,
          type: "POST",
          data: data,
          dataType: "html"
      });

      request.done(function(response) {
          jQuery('#ure_allowed_plugins_dialog_content').html(response);           
          ure_plugin_selection_dialog();
      });

      request.fail(function(jqXHR, textStatus) {
          alert("Request failed: " + textStatus +'. Refresh the page.');
      });            
            
  });
});    


function ure_plugin_selection_dialog() {    
    jQuery(function($) {
      $info = $('#ure_allowed_plugins_dialog');
      $info.dialog({                   
        dialogClass: 'wp-dialog',           
        modal: true,
        autoOpen: true, 
        closeOnEscape: true,      
        width: 550,
        height: 450,
        resizable: false,
        title: ure_data_pro.edit_allowed_plugins_title,
        'buttons'       : {
            'Close': function() {
                $(this).dialog('close');
                return false;
            }
          }
      });    
      $('.ui-dialog-buttonpane button:contains("Save")').attr("id", "save-plugins-list-button");
      $('#save-plugins-list-button').html(ure_data_pro.save_plugins_list);
      $('.ui-dialog-buttonpane button:contains("Cancel")').attr("id", "dialog-close-button");
      $('#dialog-close-button').html(ure_data_pro.close);
      $('#ure_select_allowed_plugins').multipleSelect({
            filter: true,
            multiple: true,
            selectAll: false,
            multipleWidth: 480,            
            maxHeight: 280,
            placeholder: "Select plugins you permit activate/deactivate",
            onClick: function(view) {
                ure_update_linked_controls();
            }
      });
      var allowed_plugins = $('#ure_allow_plugins').val();
      var selected_plugins = allowed_plugins.split(',');
      $('#ure_select_allowed_plugins').multipleSelect('setSelects', selected_plugins);
    });
}
// end of ure_plugin_selection_dialog()


function ure_update_linked_controls() {
    var data_value = jQuery('#ure_select_allowed_plugins').multipleSelect('getSelects');
    var to_save = '';
    for (i=0; i<data_value.length; i++) {
        if (to_save!=='') {
            to_save = to_save + ', ';
        }
        to_save = to_save + data_value[i];
    }
    jQuery('#ure_allow_plugins').val(to_save);
    
    var data_text = jQuery('#ure_select_allowed_plugins').multipleSelect('getSelects', 'text');
    var to_show = '';
    for (i=0; i<data_text.length; i++) {        
        if (to_show!=='') {
            to_show = to_show + '\n';
        }
        to_show = to_show + data_text[i];
    }    
    jQuery('#show_allowed_plugins').val(to_show);    
}