<?php

global $wp_query, $wpdb, $wp_query;
$pid = $wp_query->query_vars['jobid'];
$action = $_GET['action'];

global $current_user;
get_currentuserinfo();
$uid = $current_user->ID;
$post = get_post($pid);

//-------------------------------

if ($current_user->ID == $post->post_author) {
    echo 'DEBUG_INFO: You cannot buy your own stuff.';
    exit;
}
$tm = time();

$nts = nl2br(strip_tags($_POST['notes_to_seller']));
update_option("purchase_notes_" . $tm . $uid, base64_encode($nts));

$price = get_post_meta($pid, 'price', true);
if (empty($price)) $price = get_option('PricerrTheme_job_fixed_amount');

$job_title = get_post_meta($pid, 'job_title', true);
if (empty($job_title)) $job_title = $post->post_title;

//--------------

$extr_ttl = 0;
$xtra_stuff = '';

$extras = $_GET['extras'];
$extras = explode("|", $extras);

if (count($extras)) {
    foreach ($extras as $myitem) {
        if (!empty($myitem)) {
            $extra_price = get_post_meta($pid, 'extra' . $myitem . '_price', true);
            $extr_ttl += $extra_price;
            $xtra_stuff .= '|' . $myitem;
        }
    }
}

$shipping = get_post_meta($pid, 'shipping', true);
if (empty($shipping)) $shipping = 0;

$total = $price + $extr_ttl + $shipping;

//--------------------------------------


$projectplugin_signature = get_option('pricerr_theme_signature');
$projectplugin_apipass = get_option('pricerr_theme_apipass');
$projectplugin_apiuser = get_option('pricerr_theme_apiuser');
$projectplugin_appid = get_option('pricerr_theme_appid');


$signature = $projectplugin_signature;
$api_pass = $projectplugin_apipass;
$api_user = $projectplugin_apiuser;
$apiid = $projectplugin_appid;

//------------------------------------------------------------------------

$pmnt_id = time() . $pid;
$sk = $pid . '|' . $uid . '|' . $tm . $xtra_stuff;
update_option('pmnt_contet_' . $pmnt_id, $sk);

$ret = get_bloginfo('siteurl') . "/?return_chained=" . $pmnt_id;
$receiver_user_id = $post->post_author;


$PricerrTheme_percent_fee_taken = get_option('PricerrTheme_percent_fee_taken');
if (!empty($PricerrTheme_percent_fee_taken)):
    $deducted = $total * ($PricerrTheme_percent_fee_taken * 0.01);
else:
    $deducted = 0;
endif;


//------------------------------------

$PricerrTheme_solid_fee_taken = get_option('PricerrTheme_solid_fee_taken');
if (!empty($PricerrTheme_solid_fee_taken)):
    if (is_numeric($PricerrTheme_solid_fee_taken)):
        $deducted = $PricerrTheme_solid_fee_taken;
    endif;
endif;


$fee = $deducted;

if (empty($fee)) {
    wp_redirect(get_bloginfo('url') . "?p_action=no_percent_speficied");
    die();
}

//-------------------------------------------------------------------------


$adminfee = $fee; //$total*($fee*0.01);

$receiver1 = get_option('PricerrTheme_paypal_email');
if (empty($receiver1)) {
    die('ERROR. The admin has no paypal email defined.');
}
$amount1 = PricerrTheme_formats_special($adminfee, 2);


$receiver2 = get_user_meta($receiver_user_id, 'paypal_email', 'true');
if (empty($receiver2)) {
    wp_redirect(get_bloginfo('url') . "?p_action=no_paypal_email");
    die();

}

$amount2 = PricerrTheme_formats_special($total - $adminfee, 2);


$currency = get_option('PricerrTheme_currency');
$enasdbx = get_option('PricerrTheme_paypal_enable_sdbx');

if ($enasdbx == "yes")
    $link = "https://svcs.sandbox.paypal.com/AdaptivePayments/Pay";
else $link = "https://svcs.paypal.com/AdaptivePayments/Pay";

$notifyURL = get_bloginfo('siteurl') . "/?notify_chained=1";
$trID = $bid_id . "_" . time();

$auctionTheme_paypal_ad_model = get_option('PricerrTheme_paypal_ad_model');
if ($auctionTheme_paypal_ad_model != "chained"):

    $params = "actionType=PAY&cancelUrl=" . $ret . "&trackingId=" . $trID . "&ipnNotificationUrl=" . $notifyURL . "&currencyCode=" . $currency .
        "&receiverList.receiver(0).amount=" . $amount1 . "&receiverList.receiver(0).email=" . $receiver1 .
        "&receiverList.receiver(0).primary=false&receiverList.receiver(1).amount=" . $amount2 .
        "&receiverList.receiver(1).email=" . $receiver2 . "&requestEnvelope.errorLanguage=en_US" .
        "&returnUrl=" . $ret; //.".paymentType=DIGITALGOODS";

else:


    $params = "actionType=PAY&cancelUrl=" . $ret . "&trackingId=" . $trID . "&ipnNotificationUrl=" . $notifyURL . "&currencyCode=" . $currency .
        "&receiverList.receiver(0).amount=" . ($amount1 + $amount2) . "&receiverList.receiver(0).email=" . $receiver1 .
        "&receiverList.receiver(0).primary=true&receiverList.receiver(1).amount=" . $amount2 .
        "&receiverList.receiver(1).email=" . $receiver2 . "&requestEnvelope.errorLanguage=en_US" .
        "&returnUrl=" . $ret; //.".paymentType=DIGITALGOODS";


endif;

function array_push_assoc($array, $key, $value)
{
    $array[$key] = $value;
    return $array;
}

function my_xml2array($contents)
{
    $xml_values = array();
    $parser = xml_parser_create('');
    if (!$parser)
        return false;

    xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, 'UTF-8');
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
    xml_parse_into_struct($parser, trim($contents), $xml_values);
    xml_parser_free($parser);
    if (!$xml_values)
        return array();

    $xml_array = array();
    $last_tag_ar =& $xml_array;
    $parents = array();
    $last_counter_in_tag = array(1 => 0);
    foreach ($xml_values as $data) {
        switch ($data['type']) {
            case 'open':
                $last_counter_in_tag[$data['level'] + 1] = 0;
                $new_tag = array('name' => $data['tag']);
                if (isset($data['attributes']))
                    $new_tag['attributes'] = $data['attributes'];
                if (isset($data['value']) && trim($data['value']))
                    $new_tag['value'] = trim($data['value']);
                $last_tag_ar[$last_counter_in_tag[$data['level']]] = $new_tag;
                $parents[$data['level']] =& $last_tag_ar;
                $last_tag_ar =& $last_tag_ar[$last_counter_in_tag[$data['level']]++];
                break;
            case 'complete':
                $new_tag = array('name' => $data['tag']);
                if (isset($data['attributes']))
                    $new_tag['attributes'] = $data['attributes'];
                if (isset($data['value']) && trim($data['value']))
                    $new_tag['value'] = trim($data['value']);

                $last_count = count($last_tag_ar) - 1;
                $last_tag_ar[$last_counter_in_tag[$data['level']]++] = $new_tag;
                break;
            case 'close':
                $last_tag_ar =& $parents[$data['level']];
                break;
            default:
                break;
        };
    }
    return $xml_array;
}

function get_web_page($url, $posts, $api_user, $api_pass, $signature, $apiid)
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true, // return web page
        CURLOPT_HEADER => false, // don't return headers
        CURLOPT_FOLLOWLOCATION => false, // follow redirects
        CURLOPT_ENCODING => "", // handle all encodings
        CURLOPT_USERAGENT => "sitemile", // who am i
        CURLOPT_AUTOREFERER => true, // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
        CURLOPT_TIMEOUT => 120, // timeout on response
        CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
        CURLOPT_POSTFIELDS => $posts,
        CURLOPT_HTTPHEADER =>
            array(
                "X-PAYPAL-SECURITY-USERID: " . $api_user,
                "X-PAYPAL-SECURITY-PASSWORD: " . $api_pass,
                "X-PAYPAL-SECURITY-SIGNATURE: " . $signature,
                "X-PAYPAL-APPLICATION-ID: " . $apiid,

                "X-PAYPAL-DEVICE-IPADDRESS: " . $_SERVER['REMOTE_ADDR'],
                "X-PAYPAL-REQUEST-DATA-FORMAT: NV",
                "X-PAYPAL-RESPONSE-DATA-FORMAT: XML")
    );

    $ch = curl_init($url);
    curl_setopt_array($ch, $options);
    $content = curl_exec($ch);
    $err = curl_errno($ch);
    $errmsg = curl_error($ch);
    $header = curl_getinfo($ch);
    curl_close($ch);

    $header['errno'] = $err;
    $header['errmsg'] = $errmsg;
    $header['content'] = $content;
    return $header;
}


$cont = get_web_page($link, $params, $api_user, $api_pass, $signature, $apiid);
$co = $cont['content'];

$arr = my_xml2array($co);
//echo '<pre>';
//print_r( $arr );
//echo '<pre>';

//exit;

$ap = $arr[0][1]['value'];

if (empty($ap)) {
    echo "ERROR<br/>";

    echo '<pre>';
    print_r($arr);
    echo '<pre>';
    exit;
}


if ($enasdbx == "yes")
    header("Location: https://www.sandbox.paypal.com/webscr?cmd=_ap-payment&paykey=" . $ap);
else header("Location: https://www.paypal.com/webscr?cmd=_ap-payment&paykey=" . $ap);



?>