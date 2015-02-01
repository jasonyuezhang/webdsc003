<?php
/*
 * User Role Editor Pro WordPress plugin options page
 *
 * @Author: Vladimir Garagulya
 * @URL: http://role-editor.com
 * @package UserRoleEditor
 *
 */

?>
    <tr>
        <td>
            <input type="checkbox" name="use_jquery_cdn_for_ui_css" id="use_jquery_cdn_for_ui_css" value="1" 
                   <?php echo ($use_jquery_cdn_for_ui_css == 1) ? 'checked="checked"' : ''; ?> /> 
            <label for="use_jquery_cdn_for_ui_css"><?php esc_html_e('Download jQuery UI CSS from jQuery CDN', 'ure'); ?></label></td>
        <td>                        
        </td>
    </tr>
    <tr>
        <td>
            <label for="ure_key_capability"><?php esc_html_e('User Role Editor full access capability:', 'ure'); ?></label>
            <input type="text" name="ure_key_capability" id="ure_key_capability" value="<?php echo $ure_key_capability; ?>"  style="width: 300px;" />
        </td>
        <td>
 <?php     
    if (!empty($this->ure_key_capability_error)) {
?>
     <br/>
     <span style="color:red; font-weight: bold;"><?php echo esc_html($this->ure_key_capability_error); ?></span>
<?php            
    }
 ?>
            
        </td>
      </tr>
      <tr>
          <td cospan="2"><h3><?php esc_html_e('Content editing restrictions', 'ure');?></h3></td>
      </tr>
      <tr>
        <td>
            <input type="checkbox" name="activate_create_post_capability" id="activate_create_post_capability" value="1" 
            <?php echo ($activate_create_post_capability==1) ? 'checked="checked"' : ''; ?> /> 
            <label for="activate_create_post_capability"><?php esc_html_e('Activate "Create Post/Page" capability', 'ure'); ?></label>
        </td>
        <td>
        </td>
      </tr>      
      <tr>
        <td>
            <input type="checkbox" name="manage_posts_edit_access" id="manage_posts_edit_access" value="1" 
            <?php echo ($manage_posts_edit_access==1) ? 'checked="checked"' : ''; ?> /> 
            <label for="manage_posts_edit_access"><?php esc_html_e('Activate user access management to editing selected posts and pages', 'ure'); ?></label>
        </td>
        <td>
        </td>
      </tr>
      <tr>
        <td>
            <input type="checkbox" name="manage_plugin_activation_access" id="manage_plugin_activation_access" value="1" 
            <?php echo ($manage_plugin_activation_access==1) ? 'checked="checked"' : ''; ?> /> 
            <label for="manage_plugin_activation_access"><?php esc_html_e('Activate per plugin user access management for plugins activation', 'ure'); ?></label>
        </td>
        <td>
        </td>
      </tr>
<?php
if (class_exists('GFForms')) {
?>
      <tr>
        <td>
            <input type="checkbox" name="manage_gf_access" id="manage_gf_access" value="1" 
            <?php echo ($manage_gf_access==1) ? 'checked="checked"' : ''; ?> />
            <label for="manage_gf_access"><?php esc_html_e('Activate per form user access management for Gravity Forms', 'ure'); ?></label>
        </td>
        <td> 
        </td>
      </tr>
<?php
    
}
?>
      <tr>
          <td cospan="2"><h3><?php esc_html_e('Content view restrictions', 'ure');?></h3></td>          
      </tr>
      <tr>
          <td>
              <input type="checkbox" name="activate_content_for_roles_shortcode" id="activate_content_for_roles_shortcode" value="1" 
                    <?php echo ($activate_content_for_roles_shortcode==1) ? 'checked="checked"' : ''; ?> />
              <label for="activate_content_for_roles_shortcode"><?php esc_html_e('Activate [user_role_editor roles="role1, role2, ..."] shortcode', 'ure'); ?></label>
          </td>
          <td>              
          </td>
      </tr>
      <tr>
          <td cospan="2"><h3><?php esc_html_e('License', 'ure');?></h3></td>
      </tr>      
      <tr>
        <td>
            <label for="license_key"><?php esc_html_e('License Key:', 'ure'); ?></label>
<?php
    $license_key_value = empty($license_key) ? '': str_repeat('*', 64);
?>
            <input type="text" name="license_key" id="license_key" value="<?php echo $license_key_value; ?>" size="15" style="width:450px;" /> 
<?php            
            if (!empty($license_key)) {
?>                
                <span style="font-weight: bold; color: green;" title="<?php esc_html_e('License key is hidden to limit access to it', 'ure'); ?>" ><?php esc_html_e('Installed', 'ure'); ?></span>
<?php                
                } else {
?>
                <span style="font-weight: bold; color: red"><?php esc_html_e('Not installed!', 'ure');?></span>
                 <?php esc_html_e('Input license key to activate automatic updates from role-editor.com', 'ure'); ?>
<?php                
                }                
?>                            
        </td>
        <td>
        </td>
      </tr>

