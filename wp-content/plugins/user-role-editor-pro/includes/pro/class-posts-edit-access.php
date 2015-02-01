<?php
/*
 * Class: Access restrict to posts/pages on per site - per user - per post/page basis 
 * part of User Role Editor Pro plugin
 * Author: Vladimir Garagulya
 * email: vladimir@shinephp.com
 * 
 */

class URE_Posts_Edit_Access {
    
    private $lib = null;
    private $user_meta_key = '';
    private $user_meta_key1 = '';
    private $user_meta_key2 = '';
    private $posts_list = null;
    private $sticky_posts_count = 0;
    private $user_posts_count = 0;
    private $screen;
    
    public function __construct(Ure_Lib $lib) {
    
        global $wpdb;
        
        $this->lib = $lib;
        $this->user_meta_key = $wpdb->prefix . 'ure_posts_list';    // comma separated posts/pages ID list
        $this->user_meta_key1 = $wpdb->prefix . 'ure_posts_restriction_type';   // Allow or Prohibit to edit posts/pages from the list above
        $this->user_meta_key2 = $wpdb->prefix . 'ure_post_types';        // Posts types from the list above
        
        add_action( 'edit_user_profile', array(&$this, 'edit_user_posts_list'), 10, 2 );
        add_action( 'profile_update', array(&$this, 'save_user_posts_list'), 10 );
        add_action( 'admin_init', array(&$this, 'set_final_hooks') );
        
    }
    // end of __construct()
    
    
    protected function is_restriction_applicable() {
        
        global $current_user;
        
        if ( $this->lib->user_is_admin($current_user->ID) ) {
            return false;
        }
        
        $min_cap = $this->lib->user_can_which($current_user, array('edit_posts', 'edit_pages'));
        
        return !empty($min_cap);
    }
    // end of is_restriction_applicable()
    
    
    public function set_final_hooks() {
                                        
        if ($this->is_restriction_applicable()) {
            // post_query possibly!!!
            add_filter('pre_get_posts', array(&$this, 'restrict_posts_list' ));
            // set filters for the correct view count
            $post_types = get_post_types();
            foreach($post_types as $post_type ){
                add_filter('views_edit-'.$post_type, array($this, 'get_views'));
            }
            add_filter('map_meta_cap', array($this, 'block_create_post'), 10, 4);
        }
        
    }
    // end of set_final_hooks()
    
    
    public function block_create_post($caps, $cap='', $user_id=0, $args=array()) {
        
        global $current_user;
        
        $posts_list = $this->get_posts_list();
        if (count($posts_list)==0) {
            return $caps;
        }        
        $posts_restriction_type = get_user_meta($current_user->ID, $this->user_meta_key1, 1);
        $post_types = get_user_meta($current_user->ID, $this->user_meta_key2, 1);
        // create post is prohibited for "Allow" mode only
        if ($cap=='create_posts' && $posts_restriction_type==1 && in_array('post', $post_types)) {
            $caps[] = 'do_not_allow';
        } elseif ($cap=='create_pages' && $posts_restriction_type==1 && in_array('page', $post_types)) {
            $caps[] = 'do_not_allow';
        } elseif ($cap=='edit_post' || $cap=='edit_page') {
            if (count($args)>0) {
                $post_id = $args[0];
            } else {
                $post_id = filter_input(INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT);
            }
            $post = get_post($post_id);
            if (in_array($post->post_type, $post_types)) {                
                $do_not_allow = in_array($post_id, $posts_list);    // not edit these
                if ($posts_restriction_type==1) {
                    $do_not_allow = !$do_not_allow;   // not edit others
                }
                if ($do_not_allow) {
                    $caps[] = 'do_not_allow';
                }
            }
        }
        
        return $caps;
    }
    // end of block_create_post()
    
    
    public function edit_user_posts_list($user) {

        $result = stripos($_SERVER['REQUEST_URI'], 'network/user-edit.php');
        if ($result !== false) {  // exit, this code just for single site user profile only, not for network admin center
            return;
        }
        if ($this->is_restriction_applicable()) {
            return false;
        }
        
        $posts_restriction_type = get_user_meta($user->ID, $this->user_meta_key1, 1);
        if (empty($posts_restriction_type)) {
            $posts_restriction_type = 1;
        }
        $checked1 = ($posts_restriction_type==1) ? 'checked' : '';
        $checked2 = ($posts_restriction_type==2) ? 'checked' : '';
        $posts_list = get_user_meta($user->ID, $this->user_meta_key, true);
?>        
        <h3><?php _e('Posts/Pages Editor Restrictions', 'ure'); ?></h3>
        <table class="form-table">
        		<tr>
        			<th scope="row">
               <input type="radio" name="ure_posts_restriction_type" value="1" <?php  echo $checked1;?> >
               <?php esc_html_e('Allow', 'ure'); ?>
               <input type="radio" name="ure_posts_restriction_type" value="2" <?php  echo $checked2;?> >
               <?php esc_html_e('Prohibit', 'ure'); ?><br/>
               <?php esc_html_e('access to posts/pages with ID (comma separated) ', 'ure'); ?>
           </th>
        			<td>
               <input type="text" name="ure_posts_list" id="ure_posts_list" value="<?php echo $posts_list; ?>" size="40" />
        			</td>
        		</tr>
        </table>		        
        
<?php        
    }
    // end of set_user_posts_list()

    
    // save posts list when user profile is updated, as WordPress itself doesn't know about it
    public function save_user_posts_list($user_id) {

        global $wpdb;
        
        if (!current_user_can('edit_users', $user_id)) {
            return;
        }
        
        if (isset($_POST['ure_posts_restriction_type'])) {
            $value = $_POST['ure_posts_restriction_type'];
            if ($value!=1 && $value!=2) {  // sanitize user input
                $value = 1;
            }
            update_user_meta($user_id, $this->user_meta_key1, $value);
        }
        
        // update posts access restriction: comma separated posts IDs list
        if (isset($_POST['ure_posts_list'])) {
            $posts_list = explode(',', trim($_POST['ure_posts_list']));
            if (count($posts_list)>0) {
                $posts_id_arr = array();
                foreach($posts_list as $post_id) {
                    $post_id = (int) $post_id;  // save interger values only
                    if ($post_id>0) {
                        $posts_id_arr[] = $post_id;
                    }
                }
                $posts_list_str = implode(', ', $posts_id_arr);
                $query = "select distinct post_type from {$wpdb->posts} where ID in ($posts_list_str);";
                $post_types = $wpdb->get_col($query);
                update_user_meta($user_id, $this->user_meta_key, $posts_list_str);
                update_user_meta($user_id, $this->user_meta_key2, $post_types);
            }            
        } else {
            delete_user_meta($user_id, $this->user_meta_key);
            delete_user_meta($user_id, $this->user_meta_key2);
        }        
        
    }
    // end of save_user_posts_list()    
    
    
    private function get_posts_list() {
        
        global $current_user;
    
        if ($this->posts_list==null) {
            $posts_list = get_user_meta($current_user->ID, $this->user_meta_key, true);
            if (empty($posts_list)) {
                return array();
            }
            $this->posts_list = explode(',', $posts_list);
            for ($i=0; $i<count($this->posts_list); $i++) {
                $this->posts_list[$i] = trim($this->posts_list[$i]);
            }
        }
        
        return $this->posts_list;
    }
    // end of get_posts_list()
    
                                    
    public function restrict_posts_list($query) {
        
        global $current_user;
        
        if (!is_blog_admin()) {  // if not admin dashboard - nothing to change
            return $query;
        }
        
        // do not limit user with Administrator role
        if (!$this->is_restriction_applicable()) {
            return $query;
        }

        $suppressing_filters = $query->get('suppress_filters'); // Filter suppression on?

        if (!$suppressing_filters) {
            $post_types = get_user_meta($current_user->ID, $this->user_meta_key2, true);
            if (is_array($post_types) && in_array($query->query['post_type'], $post_types)) {
                $posts_restriction_type = get_user_meta($current_user->ID, $this->user_meta_key1, true);
                $posts_list = $this->get_posts_list();
                if ($posts_restriction_type==1) {   // Allow
                    $query->set('post__in', $posts_list);
                } else {    // Prohibit
                    $query->set('post__not_in', $posts_list);
                }
            }
        }
                       
        return $query;
    }
    // restrict_posts_list()


    /**
     * Initally was taken from Admin for Authors plugin by Marcus Sykes (http://msyk.es)
     * Modified by Vladimir Garagulya (role-editor.com)
     * 
     */
    protected function count_posts($type = 'post', $perm = '') {
        global $wpdb, $current_user;

        $user = wp_get_current_user();

        $cache_key = $type . '_' . $user->ID;

        $query = "SELECT post_status, COUNT( * ) AS num_posts FROM {$wpdb->posts} WHERE post_type = %s";

        if ('readable' == $perm && is_user_logged_in()) {
            
            $posts_list = $this->get_posts_list();
            $posts_restriction_type = get_user_meta($current_user->ID, $this->user_meta_key1, true);
            if (count($posts_list)>0) {
                $posts_list_str = implode(',', $posts_list);
                if ($posts_restriction_type==1) {
                    $query .= " AND ID in ($posts_list_str)";
                } else {
                    $query .= " AND ID not in ($posts_list_str)";
                }
            }
            $post_type_object = get_post_type_object($type);
            if (!current_user_can($post_type_object->cap->read_private_posts)) {
                $cache_key .= '_' . $perm . '_' . $user->ID;
                $query .= " AND (post_status != 'private' OR ( post_author = '$user->ID' AND post_status = 'private' ))";
            }
        }
        $query .= ' GROUP BY post_status';

        $count = wp_cache_get($cache_key, 'counts');
        if (false !== $count)
            return $count;

        $count = $wpdb->get_results($wpdb->prepare($query, $type), ARRAY_A);

        $stats = array();
        foreach (get_post_stati() as $state)
            $stats[$state] = 0;

        foreach ((array) $count as $row)
            $stats[$row['post_status']] = $row['num_posts'];

        $stats = (object) $stats;
        wp_cache_set($cache_key, $stats, 'counts');

        return $stats;
    }
    // end of count_posts()


    /**
     * Modification to this WP function was done by Marcus Sykes (http://msyk.es)
     * His comments are follow untouched:
     * Almost-exact copy of WP_Posts_List_Table::get_views(), but makes subtle changes for $this references and calls internal Admin_For_Authors::wp_count_posts() function instead
	    * Changes highlighted with comments starting //EDIT 
	    */
    public function get_views() {
        global $locked_post_status, $avail_post_stati;

        $this->screen = get_current_screen(); //EDIT - get $screen for use on $this->screen
        $post_type = $this->screen->post_type;

        if (!empty($locked_post_status))
            return array();

        $status_links = array();
        $num_posts = $this->count_posts($post_type, 'readable');
        $class = '';
        $allposts = '';

        $current_user_id = get_current_user_id();

        if ($this->user_posts_count) {
            if (isset($_GET['author']) && ( $_GET['author'] == $current_user_id ))
                $class = ' class="current"';
            $status_links['mine'] = "<a href='edit.php?post_type=$post_type&author=$current_user_id'$class>" . sprintf(_nx('Mine <span class="count">(%s)</span>', 'Mine <span class="count">(%s)</span>', $this->user_posts_count, 'posts'), number_format_i18n($this->user_posts_count)) . '</a>';
            $allposts = '&all_posts=1';
        }

        $total_posts = array_sum((array) $num_posts);

        // Subtract post types that are not included in the admin all list.
        foreach (get_post_stati(array('show_in_admin_all_list' => false)) as $state)
            $total_posts -= $num_posts->$state;

        $class = empty($class) && empty($_REQUEST['post_status']) && empty($_REQUEST['show_sticky']) ? ' class="current"' : '';
        $status_links['all'] = "<a href='edit.php?post_type=$post_type{$allposts}'$class>" . sprintf(_nx('All <span class="count">(%s)</span>', 'All <span class="count">(%s)</span>', $total_posts, 'posts'), number_format_i18n($total_posts)) . '</a>';

        foreach (get_post_stati(array('show_in_admin_status_list' => true), 'objects') as $status) {
            $class = '';

            $status_name = $status->name;

            if (!in_array($status_name, $avail_post_stati))
                continue;

            if (empty($num_posts->$status_name))
                continue;

            if (isset($_REQUEST['post_status']) && $status_name == $_REQUEST['post_status'])
                $class = ' class="current"';

            $status_links[$status_name] = "<a href='edit.php?post_status=$status_name&amp;post_type=$post_type'$class>" . sprintf(translate_nooped_plural($status->label_count, $num_posts->$status_name), number_format_i18n($num_posts->$status_name)) . '</a>';
        }

        //EDIT - START this whole if statement gets sticky posts stat, copied from WP_Posts_List_Table::_construct() but there's maybe a better way for this
        global $wpdb;
        if ('post' == $post_type && $sticky_posts = get_option('sticky_posts')) {
            $sticky_posts = implode(', ', array_map('absint', (array) $sticky_posts));
            $this->sticky_posts_count = $wpdb->get_var($wpdb->prepare("SELECT COUNT( 1 ) FROM $wpdb->posts WHERE post_type = %s AND post_status != 'trash' AND ID IN ($sticky_posts)", $post_type));
        }
        //EDIT - END

        if (!empty($this->sticky_posts_count)) {
            $class = !empty($_REQUEST['show_sticky']) ? ' class="current"' : '';

            $sticky_link = array('sticky' => "<a href='edit.php?post_type=$post_type&amp;show_sticky=1'$class>" . sprintf(_nx('Sticky <span class="count">(%s)</span>', 'Sticky <span class="count">(%s)</span>', $this->sticky_posts_count, 'posts'), number_format_i18n($this->sticky_posts_count)) . '</a>');

            // Sticky comes after Publish, or if not listed, after All.
            $split = 1 + array_search(( isset($status_links['publish']) ? 'publish' : 'all'), array_keys($status_links));
            $status_links = array_merge(array_slice($status_links, 0, $split), $sticky_link, array_slice($status_links, $split));
        }

        return $status_links;
    }
    // end of get_views()
    
}
// end of URE_Posts_Edit_Access
