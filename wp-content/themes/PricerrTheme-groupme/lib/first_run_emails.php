<?php

$opt = get_option('PricerrTheme_new_emails_1201');
if (empty($opt)):

    update_option('PricerrTheme_new_emails_1201', 'DonE');

    update_option('PricerrTheme_new_user_email_subject', 'Welcome to ##your_site_name##');
    update_option('PricerrTheme_new_user_email_message', 'Hello ##username##,' . PHP_EOL . PHP_EOL .
        'Welcome to our website.' . PHP_EOL .
        'Your username: ##username##' . PHP_EOL .
        'Your password: ##user_password##' . PHP_EOL . PHP_EOL .
        'Login here: ##site_login_url##' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');

    //-----------------------------------------------------------------------------------------------------------

    update_option('PricerrTheme_new_user_email_admin_subject', 'New user registration on your site');
    update_option('PricerrTheme_new_user_email_admin_message', 'Hello admin,' . PHP_EOL . PHP_EOL .
        'A new user has been registered on your website.' . PHP_EOL .
        'See the details below:' . PHP_EOL . PHP_EOL .
        'Username: ##username##' . PHP_EOL .
        'Email: ##user_email##');


    //------------------------------------------------------------------------------------------------------------

    update_option('PricerrTheme_new_job_email_not_approve_admin_subject', 'New job posted: ##job_name##');
    update_option('PricerrTheme_new_job_email_not_approve_admin_message', 'Hello admin,' . PHP_EOL . PHP_EOL .
        'The user ##username## has posted a new job on your website.' . PHP_EOL .
        'The job name: [##job_name##]' . PHP_EOL .
        'The job was automatically approve on your website.' . PHP_EOL . PHP_EOL .
        'View the job here: ##job_link##' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');

    //------------------------------------------------------------------------------------------------------------

    update_option('PricerrTheme_new_job_email_approve_admin_subject', 'New job posted. Must approve ##job_name##');
    update_option('PricerrTheme_new_job_email_approve_admin_message', 'Hello admin,' . PHP_EOL . PHP_EOL .
        'The user ##username## has posted a new job on your website.' . PHP_EOL .
        'The job name: <b>##job_name##</b> ' . PHP_EOL .
        'The job is not automatically approved so you have to manually approve the job before it appears on your website.' . PHP_EOL . PHP_EOL .
        'You can approve the job by going to your admin dashboard in your website' . PHP_EOL .
        'Go here: ##your_site_url##/wp-admin');

    //------------------------------------------------------------------------------------------------------------

    update_option('PricerrTheme_new_job_email_not_approved_subject', 'Your new job posted, but not yet approved: ##job_name##');
    update_option('PricerrTheme_new_job_email_not_approved_message', 'Hello ##username##,' . PHP_EOL . PHP_EOL .
        'Your job <b>##job_name##</b> has been posted on the website. However it is not live yet.' . PHP_EOL .
        'The job needs to be approved by the admin before it goes live. ' . PHP_EOL .
        'You will be notified by email when the job is active and published.' . PHP_EOL . PHP_EOL .
        'After is approved the job will appear here: ##job_link##' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');

    //--------------------------------------------------------------------------------------------------------------

    update_option('PricerrTheme_new_job_email_approved_subject', 'Your new job posted, and approved: ##job_name##');
    update_option('PricerrTheme_new_job_email_approved_message', 'Hello ##username##,' . PHP_EOL . PHP_EOL .
        'Your job <b>##job_name##</b> has been posted on the website.' . PHP_EOL .
        'The job is live and you can see it here: ##job_link##' . PHP_EOL .
        'Also you can check your job offers here: ##my_account_url##' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');

    //----------------------------------------------------------------------------------------------------------


    update_option('PricerrTheme_seller_purchase_job_email_subject', 'New job sold: ##job_name##');
    update_option('PricerrTheme_seller_purchase_job_email_message', 'Hello ##receiver_username##,' . PHP_EOL . PHP_EOL .
        'You have just sold the job named [##job_name##] to the user ##sender_username##' . PHP_EOL .
        'To get in touch with the buyer you need to login to your account and use the conversation chat box in
        your account for the order. Follow the next link: ##conversation_page_link##' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');

    //----------------------------------------------------------------------------------------------------------


    update_option('PricerrTheme_buyer_purchase_job_email_subject', 'New job purchased: ##job_name##');
    update_option('PricerrTheme_buyer_purchase_job_email_message', 'Hello ##receiver_username##,' . PHP_EOL . PHP_EOL .
        'You have just bought the job named [##job_name##] from the user ##sender_username##' . PHP_EOL .
        'To get in touch with the seller you need to login to your account and use the conversation
        chat box in your account for the order. Follow the next link: ##conversation_page_link##' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');

    //----------------------------------------------------------------------------------------------------------


    update_option('PricerrTheme_private_message_email_subject', 'New Private Message Received: ##subject_of_message##');
    update_option('PricerrTheme_private_message_email_message', 'Hello ##receiver_username##,' . PHP_EOL . PHP_EOL .
        'You have received a new private message from the user ##sender_username##' . PHP_EOL .
        'To view and reply to this message you need to login to your account area.' . PHP_EOL .
        'Follow this link to login: ##my_account_url##' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');

    //----------------------------------------------------------------------------------------------------------


    update_option('PricerrTheme_chat_order_email_subject', 'New Chat Message Received: ##job_name##');
    update_option('PricerrTheme_chat_order_email_message', 'Hello ##receiver_username##,' . PHP_EOL . PHP_EOL .
        'You have received a new chat message on the conversation page of your job order.' . PHP_EOL .
        'To view and reply to this message you need to login to your account area.' . PHP_EOL .
        'Follow this link to reply: ##conversation_page_link##' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');

    //----------------------------------------------------------------------------------------------------------


    update_option('PricerrTheme_job_finished_email_subject', 'Your job has been completed: ##job_name##');
    update_option('PricerrTheme_job_finished_email_message', 'Hello ##receiver_username##,' . PHP_EOL . PHP_EOL .
        'The seller of the job you purchased just marked the job as finished.' . PHP_EOL .
        'To check the results and the validity of the job go here: ##conversation_page_link##' . PHP_EOL . PHP_EOL .
        'After you checked and everything is good you need to mark the job as complete so the funds are released to the seller.' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');

    //----------------------------------------------------------------------------------------------------------


    update_option('PricerrTheme_job_completed_email_subject', 'Groups accepted as completed by the buyer: ##job_name##');
    update_option('PricerrTheme_job_completed_email_message', 'Hello ##receiver_username##,' . PHP_EOL . PHP_EOL .
        'The buyer of your job has accepted your work and the job has now get marked as completed. ' . PHP_EOL .
        'To reply to this you can follow the next link: ##conversation_page_link##' . PHP_EOL . PHP_EOL .
        'Also the funds for this job have been released to your account.' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');

    //----------------------------------------------------------------------------------------------------------


    update_option('PricerrTheme_feedback_received_seller_email_subject', 'New feedback left: ##job_name##');
    update_option('PricerrTheme_feedback_received_seller_email_message', 'Hello ##receiver_username##,' . PHP_EOL . PHP_EOL .
        'The user: ##sender_username## has left some feedback on your profile. The job related to this feed back is ##job_name##' . PHP_EOL . PHP_EOL .
        'To view more feedback go to your account page ##my_account_url##' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');


    //----------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------------

    update_option('PricerrTheme_withdraw_rejected_email_subject', 'Your withdrawal request has been rejected');
    update_option('PricerrTheme_withdraw_rejected_email_message', 'Hello ##username##,' . PHP_EOL . PHP_EOL .
        'We are sad to inform you that your withdrawal request has been denied.' . PHP_EOL .
        'Amount: ##amount_withdrawn##' . PHP_EOL .
        'Requested method: ##withdraw_method##' . PHP_EOL . PHP_EOL .
        'Contact us for more information about this' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');


    //--------------------------------------------------------------------------------------------------------------

    update_option('PricerrTheme_order_closed_by_seller_email_subject', 'Order closed: ##job_name##');
    update_option('PricerrTheme_order_closed_by_seller_email_message', 'Hello ##receiver_username##,' . PHP_EOL . PHP_EOL .
        'The order for the job: ##job_name## was just closed' . PHP_EOL .
        'To find out more about this check your user account: ##my_account_url##' . PHP_EOL . PHP_EOL .
        'Thank you' . PHP_EOL .
        '##your_site_name## Team');




endif;


$opt = get_option('PricerrTheme_new_emails_a12011');
if (empty($opt)):

    update_option('PricerrTheme_new_emails_a12011', 'DonE');


    update_option('PricerrTheme_withdraw_request_email_subject', 'You have requested a withdrawal');
    update_option('PricerrTheme_withdraw_request_email_message', 'Hello ##username##,' . PHP_EOL . PHP_EOL .
        'You have just requested a new withdrawal.' . PHP_EOL .
        'Your request have ben queued.' . PHP_EOL .
        'See the details below:' . PHP_EOL .
        'Amount: ##amount_withdrawn##' . PHP_EOL .
        'Method: ##withdraw_method##' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');


    //----------------------------------------------------------------------------------------------------------


    update_option('PricerrTheme_withdraw_released_email_subject', 'Your withdraw request was completed');
    update_option('PricerrTheme_withdraw_released_email_message', 'Hello ##username##,' . PHP_EOL . PHP_EOL .
        'Your withdraw request has been completed via the requested method.' . PHP_EOL .
        'Amount: ##amount_withdrawn##' . PHP_EOL .
        'Method: ##withdraw_method##' . PHP_EOL . PHP_EOL .
        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');

endif;


$opt = get_option('PricerrTheme_new_emails_a12011_9');
if (empty($opt)):


    update_option('PricerrTheme_emails_mutual_buyer_subject', 'Mutual Cancellation Request from Buyer');
    update_option('PricerrTheme_emails_mutual_buyer_message', 'Hello ##username##,' . PHP_EOL . PHP_EOL .
        'The buyer of this job <b>##job_name##</b> has requested a mutual cancellation.' . PHP_EOL .
        'Please login to your account and accept or deny this request: ##my_account_url##' . PHP_EOL . PHP_EOL .

        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');


    //----------------------------------------------------------------------------------------------------------


    update_option('PricerrTheme_emails_mutual_seller_subject', 'Mutual Cancellation Request from Seller');
    update_option('PricerrTheme_emails_mutual_seller_message', 'Hello ##username##,' . PHP_EOL . PHP_EOL .
        'The seller of this job <b>##job_name##</b> has requested a mutual cancellation.' . PHP_EOL .
        'Please login to your account and accept or deny this request: ##my_account_url##' . PHP_EOL . PHP_EOL .

        'Thank you,' . PHP_EOL .
        '##your_site_name## Team');


endif;

?>