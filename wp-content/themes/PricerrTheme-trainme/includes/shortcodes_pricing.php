
<?php
require('../../../../wp-blog-header.php');
$root = "../wp-content/themes/fitness";  
$name = "pricing";
$submit = "Insert pricing section";
?>

<div id="shortcodes_<?php echo $name; ?>-form">
<script language="JavaScript" type="text/javascript">
jQuery(document).ready(function($){  	
});
</script>
<table id="shortcodes_<?php echo $name; ?>-table" class="form-table">

    <tr><?php $field = "pricing_name"; $field_ = "Price Name"; $default = "Standard"; $description = "Plan name."; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" /><br />
        <small><?php echo $description; ?></small>
		</td>
    </tr>
    
    <tr><?php $field = "pricing_value"; $field_ = "Value"; $default = "30"; $description = "Value of plan."; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" /><br />
        <small><?php echo $description; ?></small>
        </td>
    </tr>
    
    <tr><?php $field_ = "Local currency"; $field = "pricing_local_currency"; $description = "Select your local currency."; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">
	
    <option value="$">$</option>
    <option value="€">€</option>
    <option value="R$">R$</option>
    <option value="£">£</option>
    

          </select>
          <br />
            <small><?php echo $description; ?></small>
             </td>
    </tr>
    
    <tr><?php $field = "pricing_text"; $field_ = "About"; $default = "Billed annually or $10 month-to-month."; $description = "Some text about this member (you can edit this text in HTML editor"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><textarea style="width:400px" name="<?php echo $field; ?>" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $default; ?></textarea>
        <br />
        <small><?php echo $description; ?></small></td>
    </tr>
    
    <tr><?php $field_ = "Number of columns"; $field = "pricing_columns"; $description = "How many columns you want to show"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">

    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>

          </select>
          <br />
            <small><?php echo $description; ?></small>
             </td>
    </tr>
    
    <tr><?php $field = "pricing_advantages"; $field_ = "List of advantages (comma separated values)"; $default = "With over $10, choose a martial art."; $description = "Advantage 1, Advantage 2, Advantage 3..."; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><textarea style="width:400px" name="<?php echo $field; ?>" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $default; ?></textarea>
        <br />
        <small><?php echo $description; ?></small></td>
    </tr>

                      
	</table>
<p class="submit">
	<input type="button" id="shortcodes_<?php echo $name; ?>-submit" class="button-primary" value="<?php echo $submit; ?>" name="submit" />
</p>
</div>