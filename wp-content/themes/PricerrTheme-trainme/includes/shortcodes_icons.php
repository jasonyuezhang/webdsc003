
<?php
$root = "../wp-content/themes/fitness";
$root_ = "wp-content/themes/fitness";
$name = "icons";
$submit = "Insert icon";
?>

<div id="shortcodes_<?php echo $name; ?>-form">
<script language="JavaScript" type="text/javascript">
jQuery(document).ready(function($){  
	
	field_id = "#shortcodes_icons";
	value = "../" + jQuery(field_id).attr('value');

	jQuery("#td_icons img").attr("src", value);
	jQuery(field_id).change(function()
	{
	   value = "../" + jQuery(this).attr('value');
	   jQuery("#td_icons img").attr("src", value);
		
	});
	
	
	
});
</script>
<table id="shortcodes_<?php echo $name; ?>-table" class="form-table">

    
    <tr><?php $field_ = "Icon"; $field = "icons"; $description = "Icon below the title"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>" name="<?php echo $field; ?>">
          <option value=""></option>
          <?php
          $icons_urls = glob("../images/icons/*.*");
          foreach ($icons_urls as $icon_url)
          {
              $icon_url = $root_.substr($icon_url, 2);
              $icon_url_ = substr($icon_url, strpos($icon_url, "/icons/") + 7);
          ?>
            <option value="<?php echo $icon_url; ?>"><?php echo $icon_url_; ?></option>
          <?php
          }
          ?>
          </select>
		  <div id="td_icons"><img src="" /></div>
          <br />
	  	   </td>
    </tr>

                      
	</table>
<p class="submit">
	<input type="button" id="shortcodes_<?php echo $name; ?>-submit" class="button-primary" value="<?php echo $submit; ?>" name="submit" />
</p>
</div>