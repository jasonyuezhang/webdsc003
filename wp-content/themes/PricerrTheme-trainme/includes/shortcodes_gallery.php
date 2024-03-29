
<?php
require('../../../../wp-blog-header.php');
$root = "../wp-content/themes/fitness";  
$name = "gallery";
$submit = "Insert gallery section";
?>

<div id="shortcodes_<?php echo $name; ?>-form">

<table id="shortcodes_<?php echo $name; ?>-table" class="form-table">

    <tr><?php $field_ = "Title"; $field = "title"; $default = "Recent gallery"; $description = "Title above items"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input style="width:200px" type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" /><br><br>
        <small><?php echo $description; ?></small>
        </td>    
    </tr>
    
    <tr><?php $field_ = "No of items to show"; $field = "no"; $default = "-1"; $description = "Number of items to show"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td><input style="width:400px" type="text" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>" value="<?php echo $default; ?>" /><br><br>
        <small><?php echo $description; ?></small>
        </td>    
    </tr>
    
    <tr><?php $field_ = "Gallery category"; $field = "cat_id"; $description = "Category with items to show"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">
<option value="">&nbsp;&nbsp;Gallery type</option>
<?php
//$terms = array();
$terms = get_terms("gallery_category");
if ( !(empty($terms))) {
 foreach ( $terms as $term ) {
   $all_gallery_terms[$term->term_id] = $term->name;                   
 }
  
    foreach ($all_gallery_terms as $term_id => $term_name) 
    { 
    ?>
    <option value="<?php echo $term_id; ?>"><?php echo $term_name; ?></option>
    <?php 
    } 
}
?>
<option value="">&nbsp;&nbsp;Blog type</option>
<?php
$terms_2 = get_terms("category");
if ( !(empty($terms_2))) {
 foreach ( $terms_2 as $term_2 ) {
   $all_gallery_terms_2[$term_2->term_id] = $term_2->name;                   
 }
  
    foreach ($all_gallery_terms_2 as $term_id_2 => $term_name_2) 
    { 
    ?>
    <option value="<?php echo $term_id_2; ?>"><?php echo $term_name_2; ?></option>
    <?php 
    } 
}
?>
          </select>
          <br />
            <small><?php echo $description; ?></small>
             </td>
    </tr>
    
    <tr><?php $field_ = "Show filters"; $field = "show_filters"; $description = "Show subcats as filters"; ?>
        <th><label for="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>"><?php echo $field_; ?></label></th>
        <td>
          <select style="float:left" id="shortcodes_<?php echo $name; ?>-<?php echo $field; ?>" name="<?php echo $field; ?>">

    <option value="yes">Yes</option>
    <option value="no">No</option>

          </select>
          <br />
            <small><?php echo $description; ?></small>
             </td>
    </tr>
    
    <tr><?php $field_ = "Number of columns"; $field = "columns"; $description = "How many columns you want to have"; ?>
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
                      
	</table>
<p class="submit">
	<input type="button" id="shortcodes_<?php echo $name; ?>-submit" class="button-primary" value="<?php echo $submit; ?>" name="submit" />
</p>
</div>