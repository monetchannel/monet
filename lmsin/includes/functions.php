<?php

sajax_export("show_monet_channel", "show_comments", "results_available", "get_right_column_data", "notifications_friends_invites", "notifications_analysis_results", "news_feed", "setting", "get_newsfeed_data");

sajax_export("my_monet", "insights", "off_the_charts", "monet_analysis", "recommendations", "view_video", "get_frnds_pending_video", "suggest_video", "get_pending_video", "get_approved_video", "show_comments", "results_available", "news_feed", "get_right_column_data", "get_newsfeed_data", "set_challenge_to", "show_challenge_result", "add_ch_user", "ch_user_remove", "challenge");

sajax_export("top_monet", "show_comments", "news_feed", "results_available", "get_right_column_data");

sajax_export("rate_videos", "get_right_column_data", "news_feed", "recommendations", "get_newsfeed_data");

sajax_export("my_friends", "search_friends", "friend_invites", "invite_friends_popup", "email_invite", "profile_view", "insights", "off_the_charts", "my_monet", "show_comments", "results_available", "get_right_column_data", "approve_decline_friend");

sajax_export("edit_profile", "edit_profile_do", "open_upload_popup", "set_profile_image");

sajax_export("play_video");


##############################################################################3

function global_function($smarty = '') {
    global $from;
    //$breadcrumb='<li><a href="#">Home</a></li>';
    if ($from == 3) {  //<li>Analysis Result;
        $breadcrumb.='<li><a href="analysis.php" >Analysis Result</a></li>';
        if ($_REQUEST[act] == 'analysis_graph')
            $breadcrumb.='<li><a href="analysis.php?act=analysis_results" >Analysis Result</a></li><li>Graph</li>';
        elseif ($_REQUEST[act] == 'analysis_results' || $_REQUEST[act] == 'analysis_graph' && $_REQUEST[type] == '')
            $breadcrumb.='<li>Analysis Result</li>';
        else if ($_REQUEST[act] == 'analysis_results')
            $breadcrumb.='<li>Compare Videos</li>';
        else if ($_REQUEST[act] == 'compare_youtube')
            $breadcrumb.='<li>Compare Videos</li>';
        else if ($_REQUEST[act] == 'video_section')
            $breadcrumb.='<li>Video Section</li>';
        else if ($_REQUEST[act] == 'play_video')
            $breadcrumb.='<li><a href="analysis.php?act=video_section" >Video Section</a></li><li>Play</li>';
        else if ($_REQUEST[act] == 'compare_youtube')
            $breadcrumb.='<li><a href="analysis.php?act=video_section" >Video Section</a></li><li>Compare Videos</li>';
        else if ($_REQUEST[act] == 'video_analysis')
            $breadcrumb.='<li>Video Analysis</li>';
    }

    $smarty->assign(array("breadcrumb" => $breadcrumb));
}

function company_edit($callback, $company_id, $called = 0) {
    global $js, $View_Path;
    $R = DIN_ALL($_REQUEST);
    $smarty = new Smarty;
    get_row_con_info("company", "where company_id='$company_id'", "", $company);
    get_new_option_list('countries', 'countries_id', 'countries_name', $company[company_country], $country_name, 0, "");
    $smarty->assign($company);

    get_row_con_info("uploads", " where up_s_id='$company_id' and up_s_type='company_logo'", "", $up);
    //$up[up_thumb_view_path]=$View_Path.$up[up_fname]."_thumb".$up[up_ext];
    $smarty->assign(array("msg" => $msg,
        "act" => "company_update",
        "heading" => "Edit",
        "country_name" => $country_name,
        "pass" => 'none',
        "up_thumb_view_path" => $View_Path . "thumb_" . $up[up_fname] . $up[up_ext],
        "file_name" => $up[up_oname],
        "called" => $called,
    ));
    $ary[0] = $smarty->fetch('add_company.tpl');
    $ary[3] = $callback;
    return ($ary);
}

function company_update() {
    $R = DIN_ALL($_REQUEST);

    if ($R[called])// When called by Inviteation request
        $msg = accept_company_invite_request($R[company_id]);
    if ($msg == -1) {
        print '<script>parent.window.refresh_page("Company Already Exist.");</script>';
        return;
    }

    if (get_row_count("company", "where company_email='$R[company_email]' AND company_id<> '$R[company_id]'") > 0) {
        print "<script>parent.window.set_content('Email already exist. Please enter another email.')</script>";
        return;
    } else {
        if ($R[company_password] && !$R[called])
            $company_password = "company_password = '" . md5($R[company_password]) . "',";
        else
            $company_password = '';

        $SQL = "update company set company_name='$R[company_name]',
								 company_email = '$R[company_email]',
								 " . $company_password . "
								 company_address = '$R[company_address]',
								 company_country = '$R[company_country]',
								 company_zipcode = '$R[company_zipcode]',
								 company_contactno = '$R[company_contactno]' where company_id='$R[company_id]'";
        eq($SQL, $rs);

        if (strlen($_FILES[company_logo]['name']) > 0)
            upload_file_new("company_logo", $R[company_id], "company_logo", 0, $msg, "Company Logo", 1);

        if ($R[called])// When called by Inviteation request
            print '<script>parent.window.refresh_page("' . $msg . '");</script>';
        else
            print '<script>parent.window.refresh_page("Your account update successfully.");</script>';
        return;
    }
}

function accept_company_invite_request($company_id) {
    global $Server_View_Path;
    global $Server_company_Path;
    global $FromMail;
    global $js;
    $num_rows = get_row_con_info("company", "where company_id='$company_id'", "", $company);
    if (get_row_count("company", "where company_name= '" . addslashes($company[company_name]) . "' AND company_email = '" . addslashes($company[company_email]) . "' AND company_status=1"))
        return "Company Already Invited.<br><br>";

    if ($num_rows) {
        //$company[password]=generatePassword(10,4);
        $company[password] = $company[company_password];
        $company[word] = $company[password];
        $company[password] = md5($company[password]);
        $company[SERVER_PATH] = $Server_company_Path;
        $company[company_url] = $company[company_url];
        $message = get_parse_tpl_page("approve_company_signup_mail.tpl", $company);
        send_mail_new($company[company_name], $company[company_email], "MonetChannel", $FromMail, "Company login information from Monet", $message);

        $SQL = "update company set company_status=1 ,company_password='$company[password]' where company_id='$company_id'";
        eq($SQL, $rs);
        return "Company Accepted Successfully.";
    } else
        return "-1"; //Company Already Exist.
}

function get_company_url($company_name, $i = 0) {
    $replace_key = array("/", "'", " ", "&", "%", "@", ",", ".");
    $comp_url = str_replace($replace_key, "-", $company_name);
    if ($i > 0)
        $comp_url = $comp_url . $i;

    if (get_row_count("company", "where company_url='$comp_url'")) {
        $i++;
        $comp_url = get_company_url($company_name, $i);
    }
    return $comp_url;
}

##############################################################################3

function setting() {
    $smarty = new Smarty;
    return $smarty->fetch('settings.tpl');
}

###############################################################

function view_toc() {
    global $Server_View_Path;
    $smarty = new Smarty;
    $smarty->debugging = false;
    $smarty->caching = false;
    $smarty->cache_lifetime = 120;
    $smarty->assign(array("msg" => $msg, "SERVER_PATH" => $Server_View_Path, "act" => "accept_toc"));
    $smarty->display('view_toc.tpl');
}

############################################################

function accept_toc() {
    $SQL = "Update users set user_accept_toc= '1' where user_id='$_COOKIE[UserId]'";
    eq($SQL, $rs);
    if ($_REQUEST[uf_id])// If we click " Confirm Friend Request" button in mail 
        confirm_friend_invitation($_REQUEST);

    header("Location:monet_channel.php");
}

#############################################################

function off_the_charts($cat_id = -1, $type = "", $user_id) {
    global $Server_View_Path, $View_Path;
    $R = DIN_ALL($_REQUEST);
    $smarty = new Smarty;
    $smarty->debugging = false;
    $smarty->caching = false;
    $smarty->cache_lifetime = 120;
    get_new_option_list('category', 'cat_id', 'cat_name', $cat_id, $category_list, 1, "", 1);
    get_row_con_info("category", "where cat_id='$cat_id'", "", $category);
    if ($cat_id == -1 || $cat_id == 'undefined')
        $category[cat_name] = "all categories";
    if (!$user_id)
        $user_id = $_COOKIE[UserId];

    get_row_con_info("users", "where user_id='$user_id'", "user_fname", $user);
    if ($user_id == $_COOKIE[UserId])
        $user_name = "";
    else
        $user_name = $user[user_fname] . "'s";
    //$most_extreem_insight=inner_most_extreem_inner_insight($cat_id,$type,$user_id);
    if ($cat_id && ($cat_id <> -1 && $cat_id <> 'undefined'))
        $cat_cond = "AND cf_c_id IN(select cv_c_id from category_video where cv_cat_id='$cat_id')";
    else
        $cat_cond = "";
    if ($type == "3") {
        $active1 = "style='text-decoration:underline'";
        $active2 = "";
        $active3 = "";
    } elseif ($type == "2") {
        $active2 = "style='text-decoration:underline'";
        $active1 = "";
        $active3 = "";
    } else {
        $active3 = "style='text-decoration:underline'";
        $active1 = "";
        $active2 = "";
    }
    if ($type == 1) { // My Monet
        $heading = "$user_name Extreme Rating";
        get_row_con_info("content,content_feedback, emotional_profile", "where cf_user_id='$user_id' AND cf_c_id=c_id AND cf_rating >= '0' AND cf_ep_id=ep_id $cat_cond Order by cf_rating DESC, cf_date desc Limit 0,1", "", $extreme);
        if ($extreme[c_url] == "") {
            if (get_row_con_info("uploads", "where up_s_id='$extreme[cf_c_id]' AND up_s_type='video_image'", "", $up)) {
                $extreme[c_thumb_url] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
            }
        }

        //Get of ny Network's
        get_row_con_info("content,content_feedback, emotional_profile", "where cf_user_id IN (Select uf_user_id from user_friends Where uf_fuser_id='$user_id' AND uf_approved=1 UNION Select uf_fuser_id from user_friends Where uf_user_id='$user_id' AND uf_approved=1) AND cf_c_id=c_id AND cf_rating >= '0' AND cf_ep_id=ep_id AND cf_ep_id = '$extreme[cf_ep_id]' $cat_cond Order by cf_rating DESC, cf_date desc Limit 0,1", "", $extreme_mn);
        if ($extreme_mn[c_url] == "") {
            if (get_row_con_info("uploads", "where up_s_id='$extreme_mn[cf_c_id]' AND up_s_type='video_image'", "", $up)) {
                $extreme_mn[c_thumb_url] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
            }
        }
        // Get Overall
        get_row_con_info("content,content_feedback, emotional_profile", "where cf_c_id=c_id AND cf_rating >= '0' AND cf_ep_id=ep_id AND cf_ep_id = '$extreme[cf_ep_id]' $cat_cond Order by cf_rating DESC, cf_date desc Limit 0,1", "", $extreme_ov);
        if ($extreme_ov[c_url] == "") {
            if (get_row_con_info("uploads", "where up_s_id='$extreme_ov[cf_c_id]' AND up_s_type='video_image'", "", $up)) {
                $extreme_ov[c_thumb_url] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
            }
        }
    } elseif ($type == 2) { // My Network

        $heading = "$user_name Network Rating";
        get_row_con_info("content,content_feedback,emotional_profile", "where cf_user_id IN (Select uf_user_id from user_friends Where uf_fuser_id='$user_id' AND uf_approved=1 UNION Select uf_fuser_id from user_friends Where uf_user_id='$user_id' AND uf_approved=1)  AND cf_c_id=c_id AND cf_rating >= '0' AND cf_ep_id=ep_id  $cat_cond Order by cf_rating DESC, cf_date desc Limit 0,1", "", $extreme);
        if ($extreme[c_url] == "") {
            if (get_row_con_info("uploads", "where up_s_id='$extreme[cf_c_id]' AND up_s_type='video_image'", "", $up)) {
                $extreme[c_thumb_url] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
            }
        }
        //my own
        get_row_con_info("content,content_feedback,emotional_profile", "where cf_user_id='$user_id'  AND cf_c_id=c_id AND cf_rating >= '0' AND cf_ep_id=ep_id AND cf_ep_id = '$extreme[cf_ep_id]'  $cat_cond Order by cf_rating DESC, cf_date desc Limit 0,1", "", $extreme_mo);
        if ($extreme_mo[c_url] == "") {
            if (get_row_con_info("uploads", "where up_s_id='$extreme_mo[cf_c_id]' AND up_s_type='video_image'", "", $up)) {
                $extreme_mo[c_thumb_url] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
            }
        }
        //overall
        get_row_con_info("content,content_feedback, emotional_profile", "where cf_c_id=c_id AND cf_rating >= '0' AND cf_ep_id=ep_id AND cf_ep_id = '$extreme[cf_ep_id]' $cat_cond Order by cf_rating DESC, cf_date desc Limit 0,1", "", $extreme_ov);
        if ($extreme_ov[c_url] == "") {
            if (get_row_con_info("uploads", "where up_s_id='$extreme_ov[cf_c_id]' AND up_s_type='video_image'", "", $up)) {
                $extreme_ov[c_thumb_url] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
            }
        }
    } else { // Overall
        $heading = "Overall Rating";
        get_row_con_info("content,content_feedback,emotional_profile", "where cf_rating >= '0' AND cf_ep_id=ep_id $cat_cond Order by cf_rating DESC , cf_date desc Limit 0,1", "", $extreme);
        if ($extreme[c_url] == "") {
            if (get_row_con_info("uploads", "where up_s_id='$extreme[cf_c_id]' AND up_s_type='video_image'", "", $up)) {
                $extreme[c_thumb_url] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
            }
        }
        //My Network

        get_row_con_info("content,content_feedback,emotional_profile", "where cf_user_id IN (Select uf_user_id from user_friends Where uf_fuser_id='$user_id' AND uf_approved=1 UNION Select uf_fuser_id from user_friends Where uf_user_id='$user_id' AND uf_approved=1)  AND  cf_ep_id = '$extreme[cf_ep_id]' AND cf_rating >= '0' AND cf_c_id=c_id $cat_cond Order by cf_rating DESC , cf_date desc Limit 0,1", "", $extreme_mn);
        if ($extreme_mn[c_url] == "") {
            if (get_row_con_info("uploads", "where up_s_id='$extreme_mn[cf_c_id]' AND up_s_type='video_image'", "", $up)) {
                $extreme_mn[c_thumb_url] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
            }
        }

        //My Own
        get_row_con_info("content,content_feedback,emotional_profile", "where cf_user_id='$user_id'  AND cf_c_id=c_id AND cf_ep_id = '$extreme[cf_ep_id]' AND cf_rating >= '0' AND cf_ep_id=ep_id $cat_cond Order by cf_rating DESC , cf_date desc Limit 0,1", "", $extreme_mo);
        if ($extreme_mo[c_url] == "") {
            if (get_row_con_info("uploads", "where up_s_id='$extreme_mo[cf_c_id]' AND up_s_type='video_image'", "", $up)) {
                $extreme_mo[c_thumb_url] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
            }
        }
    }

//	print_r($extreme);
    $extreme[c_tot_positive] = round(floatval($extreme[c_tot_positive]));
    $extreme_mn[c_tot_positive] = round(floatval($extreme_mn[c_tot_positive]));
    $extreme_mo[c_tot_positive] = round(floatval($extreme_mo[c_tot_positive]));
    $extreme_ov[c_tot_negative] = round(floatval($extreme_ov[c_tot_negative]));

    $extreme[c_tot_positive] = round(floatval($extreme[c_tot_positive]));
    $extreme_mn[c_tot_positive] = round(floatval($extreme_mn[c_tot_positive]));
    $extreme_mo[c_tot_positive] = round(floatval($extreme_mo[c_tot_positive]));
    $extreme_ov[c_tot_positive] = round(floatval($extreme_ov[c_tot_positive]));


    $extreme[c_date] = days_ago($extreme[c_date]);
    $extreme_mo[c_date] = days_ago($extreme_mo[c_date]);
    $extreme_ov[c_date] = days_ago($extreme_ov[c_date]);
    $extreme_mn[c_date] = days_ago($extreme_mn[c_date]);

    $extreme[cf_date] = days_ago($extreme[cf_date]);
    $extreme_mo[cf_date] = days_ago($extreme_mo[cf_date]);
    $extreme_ov[cf_date] = days_ago($extreme_ov[cf_date]);
    $extreme_mn[cf_date] = days_ago($extreme_mn[cf_date]);

    if ($user_id == $_COOKIE[UserId])
        $var = "true";
    else
        $var = "false";


    $smarty->assign(array("msg" => $msg, "SERVER_PATH" => $Server_View_Path,
        "extreme" => $extreme, "mild" => $mild, "user_id" => $user_id, "extreme_mn" => $extreme_mn, "heading" => $heading,
        "extreme_ov" => $extreme_ov, "extreme_mo" => $extreme_mo,
        "most_extreem_insight" => $most_extreem_insight, "type" => $type,
        "category_list" => $category_list, "cat_name" => $category[cat_name],
        "color" . $type => "#FFFFFF", "user_name" => $user_name, "active1" => $active1, "active2" => $active2, "active3" => $active3, "var" => $var));
    return $smarty->fetch('off_the_charts.tpl');
}

##########################################################################################################

function insights($user_id = "", $cat_id = "", $graph_type = "") {
    $smarty = new Smarty;
    $smarty->debugging = false;
    $smarty->caching = false;
    $smarty->cache_lifetime = 120;

    if ($user_id == '')
        $user_id = $_COOKIE[UserId];

    if ($graph_type == 'undefined')
        $graph_type = 'this_week';

    if ($graph_type == "overall") {
        $active1 = "style='text-decoration:underline'";
        $active2 = "";
        $active3 = "";
    } elseif ($graph_type == "this_month") {
        $active2 = "style='text-decoration:underline'";
        $active1 = "";
        $active3 = "";
    } else {
        $active3 = "style='text-decoration:underline'";
        $active1 = "";
        $active2 = "";
    }

    if ($cat_id == 'undefined')
        $cat_id = -1;

    get_new_option_list('category', 'cat_id', 'cat_name', $cat_id, $category_list, 1, "", 1);
    get_row_con_info("category", "where cat_id='$cat_id'", "", $category);
    if ($cat_id == -1 || $cat_id == 'undefined' || $cat_id == '')
        $category[cat_name] = "All category";

    if ($user_id == $_COOKIE[UserId])
        $var = "true";
    else
        $var = "false";
    get_row_con_info("users", "where user_id='$user_id'", "", $user);
    if ($user_id == $_COOKIE[UserId])
        $user_name = "";
    else
        $user_name = $user[user_fname] . "'s";


    $smarty->assign(array("msg" => $msg, "SERVER_PATH" => $Server_View_Path,
        "user" => $user, "monet" => $monet, "user_name" => $user_name,
        "user_id" => $user_id, "cat_id" => $cat_id,
        "cat_name" => $category[cat_name], "page_type" => 'insights',
        "category_list" => $category_list, "graph_type" => $graph_type,
        "active1" => $active1, "active2" => $active2, "active3" => $active3, "var" => $var));


    return $smarty->fetch('insights.tpl');
}

////////////////////////////////////////////////////////////////////////////////
function my_monet($st_pos = 0, $user_id = 0, $hedng = "", $cat_id = "") {
    global $View_Path;
    $feed = array();

    $limit = 5;
    $limit = $limit + $st_pos;

    if ($cat_id && $cat_id != -2) {
        $cond = " cv_cat_id='$cat_id' AND c_id=cv_c_id AND";
        $cond_tbl = ",category_video";
    } else {
        $cond = "";
        $cond_tbl = "";
    }


    if (!$user_id)
        $user_id = $_COOKIE[UserId];

    $no = 0;
    $tot_rows = get_row_count("content $cond_tbl", "where 1 AND $cond c_id IN(select cf_c_id from content_feedback where cf_user_id='$user_id' AND cf_rating >= '0') order by c_id DESC");

    $SQL = "select * from content $cond_tbl where 1 AND $cond c_id IN(select cf_c_id from content_feedback where cf_user_id='$user_id' AND cf_rating >= '0') order by c_id DESC LIMIT 0,$limit";

    eq($SQL, $rs);
    //get_nb_text_multi_monet($tot_rows,"",$st_pos,$con_limit,$nb_text,$nrpp,5,'_monet');
    //$SQL=$SQL.$con_limit;
    //eq($SQL,$rs);
    if ($user_id == $_COOKIE[UserId])
        $msg = "You have not rated any videos yet.<br><h4><a href='monet_channel.php?view=unrated'>Click here to start rating videos.</a></h4>";
    else
        $msg = "No Record Found.";
    if ($tot_rows > 0) {
        while ($data = mfa($rs)) {
            $msg = "";
            $no++;
            $data[rating] = '';

            $data[days_ago] = get_days_ago($data[c_date], time());


            $c_desc = substr($data[c_desc], 0, 120);
            if (strlen($data[c_desc]) > strlen($c_desc))
                $data[c_desc] = $c_desc . "...";
            else
                $data[c_desc] = $c_desc;


            $data[rating].="<div>";
            get_row_con_info("content_feedback", "where cf_c_id='$data[c_id]' AND cf_rating >= 0 ", "SUM(cf_rating) as average", $avg);
            $data[average] = ceil($avg[average]);
            if ($user_id)
                $comments = show_comments($data[c_id], $user_id);

            $data[comments] = $comments[0];
            $data[end_limit] = $comments[2];
            if ($data[c_url] == "") {
                if (get_row_con_info("uploads", "where up_s_id='$data[c_id]' AND up_s_type='video_image'", "", $up)) {
                    $data[c_thumb_url] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
                }
            }
            $data[no] = $no;
            $data[c_tot_positive] = round(floatval($data[c_tot_positive]));
            $data[c_tot_negative] = round(floatval($data[c_tot_negative]));
            array_push($feed, $data);
        }
    }
    get_row_con_info("users", "where user_id='$user_id'", "", $user);
    //------
    if ($hedng)
        $heading = "My Rated Videos";
    else
        $heading = "";
    //----
    if ($user_id == $_COOKIE[UserId])
        $user_name = "My";
    else
        $user_name = $user[user_fname] . "'s";

    $hide_approved = "";
    if ($tot_rows <= $limit)
        $hide_approved = "none";
    get_new_option_list('category', 'cat_id', 'cat_name', $cat_id, $category_list, 1, "", 1);
    $smarty = new Smarty;
    $smarty->debugging = false;
    $smarty->caching = false;
    $smarty->cache_lifetime = 120;
    $smarty->assign(array("feed" => $feed, "nb_text" => $nb_text, "user_id" => $user_id, "page_type" => "my_monet",
        "user_name" => $user_name, "nb_type" => "monet", "msg" => $msg, "category_list" => $category_list,
        "hide_approved" => $hide_approved, "limit" => $limit, "heading" => $heading1, "cat_id" => $cat_id,
        "video_type" => "my_rated"));
    return $smarty->fetch('video_list.tpl');
}

///////////////////// Notifications sections start /////////////////
function get_notifications() {
    $notifications = array();
//if rating less than 5 For Rating
    $num_rating = get_row_count("content", "where 1 AND c_id IN(select cf_c_id from content_feedback where cf_user_id='" . $_COOKIE[UserId] . "' AND cf_rating >= '0') order by c_id DESC");
//If no added Friends in your Network
    $num_friends = get_row_count("users", "where  user_id IN(select uf_fuser_id from user_friends where uf_user_id='$_COOKIE[UserId]' AND uf_approved=1 UNION select uf_user_id from user_friends where uf_fuser_id='$_COOKIE[UserId]' AND uf_approved=1)");

    if ($num_rating < 5) {
        $notifications[0] = "rating";
        $notifications[1] = $num_rating;
    } elseif ($num_friends < 2) {
        $notifications[0] = "friends";
        $notifications[1] = $num_friends;
    }

    return $notifications;
}

///////////////////////////////////////////////////
function notifications_friends_invites($nf_id = 0, $callby = 0, $nf_type_id = 0) {
    global $Server_View_Path, $View_Path;
    $smarty = new Smarty;
    $friends = array();
    if ($nf_id > 0) {
        if ($nf_type_id == 9) {
            $cond.="uf_id IN (SELECT nfi_item_id from newsfeed_items WHERE nfi_nf_id = $nf_id)";
        } else {
            $cond.="uf_fuser_id='$_COOKIE[UserId]' AND user_id IN (SELECT nfi_item_id from newsfeed_items WHERE nfi_nf_id = $nf_id)";
        }
    } else {
        $cond.="uf_fuser_id='$_COOKIE[UserId]' AND uf_approved=0";
    }
    $SQL = "select * from user_friends,users where uf_user_id=user_id AND $cond order by user_fname DESC";
    $my_net = eq($SQL, $rs);
    if ($my_net > 0) {
        while ($data = mfa($rs)) {
            if ($nf_type_id != 9) {//For Friend Request
                if (get_row_con_info("uploads", "where up_s_id='$data[user_id]' AND up_s_type='user_profile_photo'", "", $up))
                    $data[profile_picture] = $View_Path . "small_thumb_" . $up[up_fname] . $up[up_ext];
                else
                    $data[profile_picture] = "images/no_profile_pic.jpg";
            }
            else {//For accepting request
                get_row_con_info("users", "where user_id = '$data[uf_fuser_id]'", "user_fname,user_lname", $users);
                $data[user_fname] = $users[user_fname];
                $data[user_lname] = $users[user_lname];
                if (get_row_con_info("uploads", "where up_s_id='$data[uf_fuser_id]' AND up_s_type='user_profile_photo'", "", $up))
                    $data[profile_picture] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
                else
                    $data[profile_picture] = "images/no_profile_pic.jpg";
            }
            array_push($friends, $data);
            //print_r($friends);
        }


        $smarty->assign(array("SERVER_PATH" => $Server_View_Path, "msg" => $msg, "friends" => $friends, "tot_row" => $tot_row, "hide_heading" => $callby, "nf_type_id" => $nf_type_id));
        return $smarty->fetch('notifications_friends_invites.tpl');
    }
}

//////////////////////////////////////////////////
function notifications_analysis_results($callby = 0) {
    /// If anayliss resutls exist. found number of analysis results
    $smarty = new Smarty;
    $analysis_data = "";
    $analysis = array();
    $SQL = "SELECT c_id,c_thumb_url,cf_id,c_title,cf_date,cf_rating,ar_date,c_views,ar_dominant_emoton,ep_name FROM analysis_results,content_feedback,content,emotional_profile where  cf_id=ar_cf_id AND ar_viewed=0 AND cf_user_id='" . $_COOKIE[UserId] . "' AND cf_c_id=c_id AND ep_id=cf_ep_id";
    $analysis_results = eq($SQL, $rs);
    while ($data = mfa($rs)) {
        if (!$data[c_thumb_url]) {
            get_upload_info("$data[c_id]", 'video_image', 0, $up);
            $data[c_thumb_url] = $up[up_view_path];
        }
        $data[cf_id] = $data[cf_id];
        $data[c_title] = $data[c_title];
        $data[ar_date] = days_ago($data[ar_date]);
        $data[cf_rating] = $data[cf_rating];
        array_push($analysis, $data);
    }
    $smarty->assign(array("analysis" => $analysis, "hide_heading" => $callby));
    return $smarty->fetch("notifications_analysis_result.tpl");
    //return $smarty->fetch("video_list.tpl");
}

///////////////////// NOtifications sections End //////////////////
############################################################3
function results_available($cf_id) {
    global $Server_View_Path;
    $smarty = new Smarty;
    get_row_con_info("analysis_results,content_feedback,content,emotional_profile", "where  cf_id = ar_cf_id AND cf_c_id=c_id AND cf_ep_id=ep_id AND cf_id='$cf_id' AND cf_user_id='$_COOKIE[UserId]'", "ar_dominant_emoton,c_title,ep_name,c_thumb_url,c_desc,c_id,cf_date,cf_rating,ar_viewed,ar_id,cf_user_id,cf_c_id", $data);
    if (!$data[c_thumb_url]) {
        get_upload_info("$data[cf_c_id]", 'video_image', 0, $up);
        $data[c_thumb_url] = $up[up_view_path];
    }

    //Update analysis_results table set ar_viewed as 1 . when user see resutls
    if (!$data[ar_viewed]) {
        $SQL = "UPDATE analysis_results SET ar_viewed=1 where ar_id = '" . $data[ar_id] . "'";
        eq($SQL, $rs);
    }
    get_row_con_info("users", "where user_id='$data[cf_user_id]'", "", $user);
    if ($_COOKIE[UserId] == $data[cf_user_id])
        $user_name = "You ";
    else
        $user_name = $user[user_fname];
    $smarty->assign(array("msg" => $msg,
        "ar_dominant_emoton" => $data[ar_dominant_emoton],
        "ep_name" => $data[ep_name], "cf_id" => $cf_id,
        "c_thumb_url" => $data[c_thumb_url], "c_desc" => $data[c_desc],
        "c_id" => $data[c_id], "cf_date" => days_ago($data[cf_date]),
        "cf_rating" => $data[cf_rating], "user_name" => $user_name,
        "SERVER_PATH" => $Server_View_Path));
    $ary = array();
    $ary[0] = "Analysis Results for: " . $data[c_title]; // Set Title
    $ary[1] = $smarty->fetch('results_available.tpl'); //
    return $ary;
}

########################################################################

function show_comments($c_id, $user_id = "", $st_limit = 0, $end_limit = "") {
    global $View_Path;
    $comments = array();
    //print $user_id;
    if (!$user_id)
        $user_id = $_COOKIE[UserId];
    if (count($user_id) == 0)
        $user_id = $_COOKIE[UserId];
    else if (is_array($user_id))
        $user_id = implode(",", $user_id);

    if (!$end_limit)
        $end_limit = 3;
    $no = 0;
    $SQL = "select * from content_feedback where  cf_c_id='$c_id' AND cf_user_id IN($user_id) AND cf_rating >='0' ORDER BY cf_date DESC LIMIT $st_limit,$end_limit "; //cf_user_id IN($user_id) AND 
    $tot_rows = eq($SQL, $rs);
    if ($tot_rows > 0) {
        while ($data = mfa($rs)) {
            $no++;
            get_row_con_info("users", "where user_id='$data[cf_user_id]'", "", $user);

            if (get_row_con_info("uploads", "where up_s_id='$data[cf_user_id]' AND up_s_type='user_profile_photo'", "", $up))
                $data[profile_picture] = $View_Path . "small_thumb_" . $up[up_fname] . $up[up_ext];
            else
                $data[profile_picture] = "images/small_no_profile_pic.jpg";

            $days = intval((time() - $data[cf_date]) / 86400);

            $data[days_ago] = get_days_ago($data[cf_date], time());

            $data[username] = $user[user_fname] . " " . $user[user_lname];

            get_row_con_info("emotional_profile", "where ep_id='$data[cf_ep_id]'", "", $ep);
            $data[emotions] = "Monet Profile: " . $ep[ep_name];
            if (get_row_count("analysis_results,users,content_feedback", "where cf_user_id = user_id  AND cf_id = ar_cf_id AND ar_cf_id='" . $data[cf_id] . "' AND user_id='" . $_COOKIE[UserId] . "'"))
                $data[result_available] = "Analysis Results";
            else
                $data[result_available] = "";

            $data[no] = $no;
            array_push($comments, $data);
        }
        $smarty = new Smarty;
        $smarty->debugging = false;
        $smarty->caching = false;
        $smarty->cache_lifetime = 120;
        $smarty->assign("comments", $comments);
        $tot_comments = get_row_count("content_feedback", "where  cf_c_id='$c_id' AND cf_user_id IN($user_id) AND cf_rating >='0'");
        if ($tot_comments > $end_limit)
            $end_limit = $tot_comments;
        $smarty->assign(array("js" => $js, "tot_comments" => $tot_comments, "c_id" => $c_id,
            "st_limit" => $st_limit, "end_limit" => $end_limit, "user_ids" => $user_id));
        $ary[0] = $smarty->fetch('video_list_comments.tpl');
        $ary[1] = $c_id;
        $ary[2] = $end_limit;
    } else
        $ary = '';
    return $ary;
}

####################################################

function approve_frnd_req($u_id = "", $uf_date = "") {

    print $u_id . " " . $uf_date;
    die();
    $SQL = "update user_friends set uf_approved=1 where `uf_date`='$uf_date'";
    eq($SQL, $rs);
    //show_prelogin_page();
}

####################################################

function show_prelogin_page($msg = "", $u_id = "", $uf_date = "") {
    $R = DIN_ALL($_REQUEST);
    global $Server_View_Path;
    $smarty = new Smarty;
    $smarty->debugging = false;
    $smarty->caching = false;
    $smarty->cache_lifetime = 120;
    get_yy_list($R[dob_yy], 2011, 1905, $dob_yy);
    get_mm_list($R[dob_mm], $option_dob_mm);
    get_dd_list($R[dob_dd], $option_dob_dd);
    if ($R[uf_id]) {
        $query_string = "&uf_id=" . $R[uf_id];
    } else {
        $query_string = "";
    }

    $SQL = "update user_friends set uf_approved=1 where `uf_date`='$uf_date'";
    eq($SQL, $rs);
    if (isset($_COOKIE[UserId])) {
        header("location:monet_channel.php");
        die();
    }



    get_new_option_list('countries', 'countries_id', 'countries_name', '', $country_name, 0, "", 1);
    $smarty->assign(array("msg" => $msg, "option_dob_yy" => $dob_yy, "SERVER_PATH" => $Server_View_Path,
        "option_dob_dd" => $option_dob_dd, "option_dob_mm" => $option_dob_mm, "country_name" => $country_name));
    $smarty->assign($R);
    $smarty->display('index_outer.tpl');
}

################## For update analysis result #############################################

function update_ar_feedback($cf_ids) {
    foreach ($cf_ids as $key3 => $cf_id) {
        if (get_row_con_info("content_feedback", "where cf_id='$cf_id' limit 0,1", "cf_c_id", $c_id)) {
            $ary = get_value_ary("analysis_results left join content_feedback on ar_cf_id=cf_id", "ar_id", "where cf_c_id='$c_id[cf_c_id]'");
            if (count($ary) > 1) {
                $ar_rows = array();
                foreach ($ary as $id) {
                    $ar[ar_total] = get_row_count("analysis_detail", "where ad_ar_id='$id'");
                    if ($ar[ar_total] > $max) {
                        $max = $ar[ar_total];
                        $max_id = $id;
                    }
                    $ar[ar_id] = $id;
                    array_push($ar_rows, $ar);
                }
                update_disable($ar_rows, $max, $max_id); // disable less than 60% ratings
                $max = 0;
                $max_id = 0;
            }
        }
    }
}

function update_disable($arr_ar, $max, $max_id) {
    $limit = (60 / 100) * $max;
    foreach ($arr_ar as $data) {
        if ($data[ar_total] < $limit && $data[ar_id] != $max_id && $data[ar_total] > 0 && $limit > 0) {
            $SQL = "Update analysis_results set  ar_disabled='1' where ar_id='$data[ar_id]'";
            eq($SQL, $rs);
        }
    }
}

function get_average_of_valence_rows($ar_id, &$percent) {
    get_row_con_info("analysis_results left join content_feedback on ar_cf_id=cf_id", "where ar_id='$ar_id' limit 0,1", "cf_c_id,(Select count(*) from analysis_detail where ad_ar_id='$ar_id') as current_vlc", $c_id);
    get_row_con_info("analysis_results", "where ar_cf_id IN (select cf_id from content_feedback where cf_c_id='$c_id[cf_c_id]') order by tot DESC limit 0,1", "ar_id as ar_id,(Select count(*) from analysis_detail where ad_ar_id=ar_id ) as tot", $tot);
    if ($c_id[current_vlc] == $tot[tot])
        $percent = "100%";
    else {
        $percent = number_format(($c_id[current_vlc] * 100) / $tot[tot], 2);
        if ($percent > 0)
            $percent.="%";
        else {
            $percent = "---";
        }
    }

    /* $ary=get_value_ary("analysis_results left join content_feedback on ar_cf_id=cf_id","ar_id","where cf_c_id='$c_id[cf_c_id]'");
      $crrent_valence=0;
      if(count($ary)>1)
      {
      $ar_rows=array();
      foreach($ary as $id)
      {
      $ar[ar_total]=get_row_count("analysis_detail","where ad_ar_id='$id'");
      if($ar[ar_total]>$max)
      $max=$ar[ar_total];
      if($ar_id==$id)
      $crrent_valence=$ar[ar_total];
      }
      $percent=$max/$crrent_valence;
      $percent.="%";

      }
      else
      {
      $percent="100%";
      } */
}

###################################################################

function calculate_avg_valence($cf_ids) {
    $R = DIN_ALL($_REQUEST);
    global $STDMUL;
    $cf_ids = implode(",", $cf_ids);
    if (!$cf_ids)
        $cf_ids = 0;
    $SQL = "SELECT DISTINCT(c_id) from content where c_id IN (Select DISTINCT(cf_c_id) from content_feedback where cf_id IN ($cf_ids))";
    eq($SQL, $rs);
    while ($data_c = mfa($rs)) {
        $datax = array();
        $datay_valence = array();
        $ary = get_value_ary("analysis_results left join content_feedback on ar_cf_id=cf_id", "ar_id", "where cf_c_id='$data_c[c_id]' and ar_disabled=0");
        if (count($ary) > 0) {
            $SQL1 = "Delete from analysis_results_average where ara_c_id='$data_c[c_id]'";
            eq($SQL1, $rs4);

            $tot = count($ary);
            $ar_ids = implode(',', $ary);
            $SQL = "SELECT  ad_time,ad_valence FROM analysis_detail  WHERE ad_ar_id IN($ar_ids)  ORDER BY ad_time ASC ;";
            $tot_rows = eq($SQL, $rs1);
            $i = 1;
            $count = 0;
            while ($data = mfa($rs1)) {
                if ($i == 1)
                    $sec = (float) convert_to_sec($data[ad_time]);
                $curr = (float) convert_to_sec($data[ad_time]);
                if ($tot == 1) {
                    array_push($datax, (float) convert_to_sec($data[ad_time]));
                    array_push($datay_valence, (float) $data[ad_valence]);
                } else if ($sec >= $curr || ($sec + .1) > $curr) {
                    $count++;
                    $vlc = $vlc + $data[ad_valence];
                } else {
                    if ($count == 0) {
                        array_push($datax, (float) convert_to_sec($data[ad_time]));
                        array_push($datay_valence, (float) $data[ad_valence]);
                        $sec = (float) convert_to_sec($data[ad_time]);
                        $vlc = 0;
                        $count = 0;
                    } else {
                        array_push($datax, (float) convert_to_sec($data[ad_time]));
                        array_push($datay_valence, (float) $vlc / $count);
                        $sec = (float) convert_to_sec($data[ad_time]);
                        $vlc = 0;
                        $count = 0;
                    }
                }
                $i++;
            }
            for ($i = 0; $i < count($datax); $i++) {
                $SQL = "INSERT INTO  `analysis_results_average` ( `ara_c_id` ,  `ara_time` ,  `ara_valence` ) VALUES ('$data_c[c_id]','$datax[$i]',  '$datay_valence[$i]');
	";
                ei($SQL);
            }
        }
    }
}

###############################################################

function get_days_ago($from, $to, $today = 0) {
    if ($from > $to)
        return "Date is not recognized";
    $time = $to - $from;
    if ($time < 86400) {//If less than one day
        if ($today == 1) {
            $day1 = date("D", $from);
            $day2 = date("D", $to);
            if ($day1 == $day2)
                return "Today";
            else
                return "1 Day Ago";
        }
        if ($time < 3600) { // If less than one hour
            $m = intval($time / 60);
            if ($m == 1)
                return $m . " Minute Ago";
            else
                return $m . " Minutes Ago";
        }
        else { // If greater than one hour
            $h = intval($time / 3600);
            if ($h == 1)
                return $h . " Hour Ago";
            else
                return $h . " Hours Ago";
        }
    }
    else if ($time < 604800) { //If less than a week
        $day = intval($time / 86400);
        if ($day == 1)
            return $day . " Day Ago";
        else
            return $day . " Days Ago";
    }
    else if ($time < 2592000) { // If less than one month (For weaks)
        $week = intval($time / 604800);
        if ($week == 1)
            return $week . " Week Ago";
        else
            return $week . " Weeks Ago";
    }
    else if ($time < 31536000) { // If less than one year
        $month = intval($time / 2592000);
        if ($month == 1)
            return $month . " Month Ago";
        else
            return $month . " Months Ago";
    }
    else {
        $year = intval($time / 2592000);
        if ($year == 1)
            return $year . " Year Ago";
        else
            return $year . " Years Ago";
    }
}

#############################################################################

function generatePassword($length = 9, $strength = 0) {
    $vowels = 'aeuy';
    $consonants = 'bdghjmnpqrstvz';
    if ($strength >= 1) {
        $consonants .= 'BDGHJLMNPQRSTVWXZ';
    }
    if ($strength >= 2) {
        $vowels .= "AEUY";
    }
    if ($strength >= 4) {
        $consonants .= '23456789';
    }
    if ($strength >= 8) {
        $vowels .= '@#$%';
    }

    $password = '';
    $alt = time() % 2;
    for ($i = 0; $i < $length; $i++) {
        if ($alt == 1) {
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;
        } else {
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }
    }
    return $password;
}

##########################################################

function days_ago($date) {
    if ($date) {
        $days = intval((time() - $date) / 86400);
        if ($days == 0) {
            $days_ago = intval((time() - $date) / 60) . " minutes ago";
            if ($days_ago > 60)
                $days_ago = intval((time() - $date) / 3600) . " hours ago";
        } else
            $days_ago = intval((time() - $date) / 86400) . " days ago";
    } else
        $days_ago = "--";

    return $days_ago;
}

###############################################################

function get_new_option_multiple_list($table, $id_col, $val_col, $sel_id, &$option, $con = "", $DISTINCT = '') {
    if ($DISTINCT != '') {
        $SQL_TCON = $DISTINCT;
    } else {
        $SQL_TCON = '*';
    }
    $SQL = "SELECT $SQL_TCON FROM $table $con";
    $rs = mysql_query($SQL) or die($SQL);
    while ($data = mysql_fetch_assoc($rs)) {
        $sel = "";
        $id = $data[$id_col];
        if (is_array($sel_id)) {
            if (in_array($id, $sel_id))
                $sel = "selected";
        }
        $option.="<option value=\"$data[$id_col]\"$sel>$data[$val_col]</option>";
    }
}

function get_video_id($video_url) {
    $video_id = explode("http://www.youtube.com/v/", $video_url);
    $v_id = explode("&hl=en_US&fs=1", $video_id[1]);
    return $v_id[0];
}

function isValidEmail($email) {
    return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}

function image_resize($img, &$img_h, &$img_w, $img_dw) {
    $ary = getimagesize($img);
    if ($ary[0] > $img_dw) {
        $img_w = $img_dw;
        $img_h = $ary[1] / $ary[0] * $img_w; //height/width*defined width
    } else {
        $img_w = $ary[0];
        $img_h = $ary[1];
    }
}

//////////////////////////////////////////////////////////////
function get_newsfeed_data($nf_id, $position_id) {
    global $View_Path;
    global $Server_View_Path;
    global $Server_Upload_Path;
    $smarty = new Smarty;
    $ary = array();
    $newfeed = array();
    get_row_con_info("newsfeed", "where nf_id='$nf_id'", "", $newsfeed);
    get_row_con_info("newsfeed_type", "where nftype_id='$newsfeed[nf_nftype_id]'", "", $newsfeed_type);
    if ($newsfeed[nf_nftype_id] == 9) {
        get_row_con_info("newsfeed_items", "where nfi_nf_id='$nf_id'", "nfi_item_id", $nfi);
        get_row_con_info("user_friends", "where uf_id='$nfi[nfi_item_id]'", "uf_fuser_id", $uf);
        get_row_con_info('users', "WHERE `user_id` = '$uf[uf_fuser_id]'", "`user_fname`,`user_lname`", $user);
    } else
        get_row_con_info("users", "where user_id = $newsfeed[nf_user_id]", "user_fname,user_lname", $user);

    if ($newsfeed[nf_nftype_id] == 10) {//Challenge
        get_row_con_info("newsfeed_items,content,users", "where nfi_item_id=c_id AND nfi_nf_id='$newsfeed[nf_id]' AND user_id=c_user_id", "user_fname,user_lname", $user);
    }

    if ($newsfeed[nf_nftype_id] == 11) { //Challenge Response
        get_row_con_info("newsfeed_items,content_feedback,users", "where nfi_nf_id='$newsfeed[nf_id]' AND nfi_item_id=cf_id AND cf_user_id = user_id", "user_fname,user_lname", $user);
    }
    if ($newsfeed[nf_count] > 1)
        $newsfeed_type[nftype_title] = str_replace("{count}", $newsfeed[nf_count], $newsfeed_type[nftype_title]);
    else
        $newsfeed_type[nftype_title] = str_replace("{count}", $newsfeed[nf_count], $newsfeed_type[nftype_title_singular]);

    $newsfeed_type[nftype_title] = str_replace("{name}", "$user[user_fname] $user[user_lname]", $newsfeed_type[nftype_title]);

    $days_ago = get_days_ago($newsfeed[nf_date], time());
    //For videos
    if ($newsfeed[nf_nftype_id] == 1 || $newsfeed[nf_nftype_id] == 2 || $newsfeed[nf_nftype_id] == 4 || $newsfeed[nf_nftype_id] == 6 || $newsfeed[nf_nftype_id] == 7) {
        $SQL = "select * from content LEFT JOIN content_feedback on cf_c_id=c_id AND cf_rating>=0 AND cf_user_id='$newsfeed[nf_user_id]' where c_id in (SELECT DISTINCT nfi_item_id FROM newsfeed_items WHERE nfi_nf_id = '$nf_id') order by cf_date desc";

        $tot_rows_videos = eq($SQL, $rs);
        if ($tot_rows_videos > 0) {
            while ($data = mfa($rs)) {
//				if(strlen($data[c_desc])>50)
//					$data[c_desc]=substr($data[c_desc],0,50)." ...";
                $data[c_desc] = "";

                $c_title = substr($data[c_title], 0, 45);
                if (strlen($data[c_title]) > strlen($c_title))
                    $data[c_title] = $c_title . "...";
                else
                    $data[c_title] = $c_title;
                if ($newsfeed[nf_nftype_id] == 2)
                    $data[days_ago] = get_days_ago($data[cf_date], time());
                else
                    $data[days_ago] = get_days_ago($data[c_date], time());
                if ($data[c_url] == "") {
                    get_row_con_info("uploads", "where up_s_id='$data[c_id]' AND up_s_type='video_image'", "", $up);
                    $data[c_thumb_url] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
                }
                array_push($newfeed, $data);
            }
        }
    }

    //For friends
    if ($newsfeed[nf_nftype_id] == 3 || $newsfeed[nf_nftype_id] == 9)
        $contents = notifications_friends_invites($nf_id, "", $newsfeed[nf_nftype_id]);
    if ($newsfeed[nf_nftype_id] == 5)
        $contents = monet_analysis($st_pos = 0, $user_id = 0, $nf_id);

    //For Cagegory
    if ($newsfeed[nf_nftype_id] == 8) {
        $SQL = "select * from category where cat_id in (SELECT DISTINCT nfi_item_id FROM newsfeed_items WHERE nfi_nf_id = '$nf_id')";
        $tot_rows_cat = eq($SQL, $rs);
        if ($tot_rows_cat > 0) {
            while ($data = mfa($rs)) {
                array_push($newfeed, $data);
            }
        }
    }
    //For Challenge

    if ($newsfeed[nf_nftype_id] == 10 || $newsfeed[nf_nftype_id] == 11) {
        if ($newsfeed[nf_nftype_id] == 10) {
            $SQL = "select * from  content,challenge where ch_c_id=c_id AND ch_fr_user_id='$newsfeed[nf_user_id]' AND c_id in (SELECT DISTINCT nfi_item_id FROM newsfeed_items WHERE nfi_nf_id = '$nf_id')  order by ch_date desc";
        } else {
            $SQL = "select * from  content, content_feedback,challenge where cf_c_id = c_id AND ch_id=cf_ch_id AND cf_id in (SELECT DISTINCT nfi_item_id FROM newsfeed_items WHERE nfi_nf_id = '$nf_id')  order by cf_date desc";
        }

        $tot_rows_videos = eq($SQL, $rs);
        if ($tot_rows_videos > 0) {
            while ($data = mfa($rs)) {
                if ($newsfeed[nf_nftype_id] == 10)
                    $data[days_ago] = get_days_ago($data[ch_date], time());
                else
                    $data[days_ago] = get_days_ago($data[cf_date], time());


                if ($newsfeed[nf_count] > 1) {
                    get_row_con_info("users", "where user_id='$data[cf_user_id]'", "user_fname,user_lname", $responsed_user);
                    $data[user_name] = $responsed_user[user_fname] . " " . $responsed_user[user_lname];
                } else
                    $data[user_name] = "user ";

                if ($data[c_url] == "") {
                    get_row_con_info("uploads", "where up_s_id='$data[c_id]' AND up_s_type='video_image'", "", $up);
                    $data[c_thumb_url] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
                }
                /* $c_desc=substr($data[c_desc],0,80);
                  if(strlen($data[c_desc])>strlen($c_desc))
                  $data[c_desc]=$c_desc."...";
                  else */
                $data[c_desc] = $c_desc;

                $c_title = substr($data[c_title], 0, 45);
                if (strlen($data[c_title]) > strlen($c_title))
                    $data[c_title] = $c_title . "...";
                else
                    $data[c_title] = $c_title;

                array_push($newfeed, $data);
            }
        }
    }
    $smarty->assign(array("feed" => $newfeed,
        "tot_rows_cat" => $tot_rows_cat,
        "nftype_title" => $newsfeed_type[nftype_title],
        "nf_nf_type_id" => $newsfeed[nf_nftype_id],
        "days_ago" => $days_ago,
        "width" => '325px', "rowshadding" => 1));
    if ($newsfeed[nf_nftype_id] == 1 || $newsfeed[nf_nftype_id] == 2 || $newsfeed[nf_nftype_id] == 4 || $newsfeed[nf_nftype_id] == 6 || $newsfeed[nf_nftype_id] == 7 || $newsfeed[nf_nftype_id] == 10 || $newsfeed[nf_nftype_id] == 11)
        $contents = $smarty->fetch("video_list.tpl");

    $smarty->assign(array("heading" => $newsfeed_type[nftype_title], "contents" => $contents));
    $ary[0] = $smarty->fetch("activities.tpl");
    $ary[1] = $position_id; //for get postion offset for popup 
    return $ary;
}

/////////////////////// Right data End/////////////////////////
#####################################################
function get_parse_tpl_page($file_name, $R = "") {
    global $Server_View_Path;
    global $Server_Upload_Path;
    $smarty = new Smarty;
    if ($R) {
        if (is_array($R)) {
            foreach ($R as $k => $v) {
                $smarty->assign(array("$k" => DOUT($v),));
            }
        } else {
            $smarty->assign(array($R => "selected"));
        }
    }
    return $smarty->fetch($file_name);
}

##################################################################

function get_ids($table, $id, $con, &$ids, $print = 0) {
    $ids = array();
    $SQL = "SELECT  $id FROM $table  $con";

    if ($print == 1)
        print $SQL;

    eq($SQL, $rs);
    $i = 0;
    while ($data = mfa($rs))
        $ids[$i++] = $data[$id];
}

//----------------------------------------------------------------
function get_timezone($time) {
    if ($time > 1) {
        global $user_data;
        get_row_con_info("time_zones", "where tz_id='$user_data[l_tz_id]' limit 0,1", "", $tz);
        return $time - $tz[tz_offset];
    } else
        return $time;
}

############################################################

function get_date_to_mktime($date) {
    $mk_date = -1;

    if ($date != "") {
        $mk_date = explode("/", $date); //explode( string $delimiter , string $string [, int $limit ] ) � Split a string by string
        $mk_date = mktime(0, 0, 0, $mk_date[0], $mk_date[1], $mk_date[2]); // mktime � Get Unix timestamp for a date
    }

    return $mk_date;
}

##################################################################

function create_backup() {
    $str = date("jFY");
    $db = "tea_company";
    $file = "backups/" . $str . "$db.sql";
    $dt = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
    //$dt=time();
    $SQL = "SELECT * from site_admin";
    eq($SQL, $rs);
    $data = mfa($rs);

    $curr_time = (time() - (8 * 60 * 60));

    if ($data[sa_db_backup_time] != $dt) {
        $SQL1 = "UPDATE site_admin SET sa_db_backup_time='$dt'";
        eq($SQL1, $rs1);
        $cmd = "\"C:\Program Files\MySQL\MySQL Server 5.1\bin\mysqldump\" -u root $db> $file";
        $opt = exec($cmd);
    }
}

####################################### not used

function get_mm_list($sel_id, &$option, $show_all = 0) {
    $mon[1] = "Jan";
    $mon[2] = "Feb";
    $mon[3] = "Mar";
    $mon[4] = "Apr";
    $mon[5] = "May";
    $mon[6] = "Jun";
    $mon[7] = "Jul";
    $mon[8] = "Aug";
    $mon[9] = "Sep";
    $mon[10] = "Oct";
    $mon[11] = "Nov";
    $mon[12] = "Dec";
    $ss = 0;
    for ($i = 1; $i <= 12; $i++) {
        $j = $i;
        if (strlen($j) == 1) {
            $j = "0" . $j;
        }
        if ($i == $sel_id) {
            $sel = "selected";
            $ss = 1;
        }
        $option.="<option value=\"$j\"$sel>$mon[$i]</option>";
        $sel = "";
    }
    if ($show_all == 1) {
        if ($sel_id == -2) {
            $sel = "selected";
            $ss = 1;
        }
        $option = "<option value=\"-2\" $sel>All</option>" . $option;
    }
    if ($ss == 0) {
        $option = "<option value=\"-1\" selected> Month </option>" . $option;
    }
    return 1;
}

##################################### not used

function get_dd_list($sel_id, &$option, $show_all = 0) {
    $ss = 0;
    for ($i = 1; $i <= 31; $i++) {
        if ($i == $sel_id) {
            $sel = "selected";
            $ss = 1;
        }
        $j = $i;
        if (strlen($j) == 1) {
            $j = "0" . $j;
        }
        $option.="<option value=\"$j\"$sel>$i</option>";
        $sel = "";
    }
    if ($show_all == 1) {
        if ($sel_id == -2) {
            $sel = "selected";
            $ss = 1;
        }
        $option = "<option value=\"-2\" $sel>All</option>" . $option;
    }
    if ($ss == 0) {
        $option = "<option value=\"-1\" selected> Day </option>" . $option;
    }
    return 1;
}

######################################## 

function get_yy_list($sel_id, $s_yy, $e_yy, &$option, $show_all = 0) {
    $dt = getdate();
    if ($s_yy == -2) {
        $s_yy = 1980;
    }
    if ($e_yy == -2) {
        $e_yy = $dt[year] + 10;
    }
    $ss = 0;
    for ($i = $s_yy; $i >= $e_yy; $i--) {
        if ($i == $sel_id) {
            $sel = "selected";
            $ss = 1;
        }
        $option.="<option value=\"$i\"$sel>$i</option>";
        $sel = "";
    }
    if ($show_all == 1) {
        if ($sel_id == -2) {
            $sel = "selected";
            $ss = 1;
        }
        $option = "<option value=\"-2\" $sel>All</option>" . $option;
    }
    if ($ss == 0) {
        $option = "<option value=\"-1\" selected> Year </option>" . $option;
    }
    return 1;
}

##################################

function get_admin_info(&$data) {
    $SQL = "SELECT * FROM site_admin";
    if (eq($SQL, $rs) > 0) {
        $data = mfa($rs);
        return 1;
    } else {
        return 0;
    }
}

#################################

function fe($fnm) {
    global $func_ary;
    return in_array($fnm, $func_ary);
}

######################################################################## not used

function convert_to_html($mystring) {
    return stripslashes(htmlspecialchars($mystring));
}

function get_new_option_list($table, $id_col, $val_col, $sel_id, &$option, $show_all = 0, $con = "", $show_select = 1, $DISTINCT = '') {
    if ($DISTINCT != '') {
        $SQL_TCON = $DISTINCT;
    } else {
        $SQL_TCON = '*';
    }
    //if(!is_array($sel_id))    {	$sel_id=array($sel_id);    }
    $SQL = "SELECT $SQL_TCON FROM $table $con "; //echo $SQL; die();
    //print $SQL."<br>";
    $rs = mysql_query($SQL) or die($SQL);
    $ss = 0;
    while ($data = mfa($rs)) {
        if ($data[$id_col] == $sel_id) {
            $sel = "selected";
            $ss = 0;
        }
        if ($data[$id_col])
            $option.="<option value=\"$data[$id_col]\" $sel>$data[$val_col]</option>";
        $sel = "";
    }
    $sel = "";
    if ($ss == 0 and $show_all == 1) {
        $sel = "selected";
        $ss = 1;
    }
    if ($show_all == 1) {
        $option = "<option value=\"-2\"$sel>" . All . "</option>" . $option;
    }
    if ($show_all == 2) {
        $option = "<option value=\"-1\" selected>Company Country</option>" . $option;
    }
    if ($ss == 0 AND $show_select == 1) {
        $option = "<option value=\"-1\" selected>Country</option>" . $option;
    }
}

//----------------------------FULL NAME OPTION LIST----------------------------------------------------
function get_new_option_list_full_name($table, $id_col, $val_col, $val_col2, $sel_id, &$option, $show_all = 0, $con = "", $show_select = 1, $distinct = '') {
    if ($distinct != '') {
        $SQL_TCON = $distinct;
    } else {
        $SQL_TCON = '*';
    }

    //if(!is_array($sel_id))    {	$sel_id=array($sel_id);    }
    $SQL = "SELECT $SQL_TCON FROM $table $con "; //echo $SQL; die();
    //print $SQL."<br>";
    $rs = mysql_query($SQL) or die($SQL);
    $ss = 0;
    while ($data = mfa($rs)) {
        if ($data[$id_col] == $sel_id) {
            $sel = "selected";
            $ss = 0;
        }
        if ($data[$id_col])
            $option.="<option value=\"$data[$id_col]\" $sel>$data[$val_col] $data[$val_col2]</option>";
        $sel = "";
    }
    $sel = "";
    if ($ss == 0 and $show_all == 1) {
        $sel = "selected";
        $ss = 1;
    }
    if ($show_all == 1) {
        $option = "<option value=\"-2\"$sel>" . All . "</option>" . $option;
    }
    if ($show_all == 2) {
        $option = "<option value=\"-1\" selected>Please Select</option>" . $option;
    }
    if ($ss == 0 AND $show_select == 1) {
        $option = "<option value=\"-1\" selected>Please Select</option>" . $option;
    }
}

//----------------------------TWO FIELDS OPTION LIST----------------------------------------------------
function get_new_option_list_with_mail($table, $id_col, $val_col, $val_col2, $val_col3, $sel_id, &$option, $show_all = 0, $con = "", $show_select = 1) {
    //if(!is_array($sel_id))    {	$sel_id=array($sel_id);    }
    $SQL = "SELECT * FROM $table $con "; //echo $SQL; die();
    //print $SQL."<br>";
    $rs = mysql_query($SQL) or die($SQL);
    $ss = 0;
    while ($data = mfa($rs)) {
        if ($data[$id_col] == $sel_id) {
            $sel = "selected";
            $ss = 0;
        }
        $option.="<option value=\"$data[$id_col]\" $sel>$data[$val_col] $data[$val_col2] &lt;$data[$val_col3]&gt; </option>";
        $sel = "";
    }
    $sel = "";
    if ($ss == 0 and $show_all == 1) {
        $sel = "selected";
        $ss = 1;
    }
    if ($show_all == 1) {
        $option = "<option value=\"-2\"$sel>" . All . "</option>" . $option;
    }
    if ($show_all == 2) {
        $option = "<option value=\"-1\" selected>Please Select</option>" . $option;
    }
    if ($ss == 0 AND $show_select == 1) {
        $option = "<option value=\"-1\" selected>Please Select</option>" . $option;
    }
}

//----------------------------DISTINCT OPTION LIST----------------------------------------------------
function get_new_option_list_dis($table, $field, $id_col, $val_col, $sel_id, &$option, $show_all = 0, $con = "", $show_select = 1) {
    //if(!is_array($sel_id))    {	$sel_id=array($sel_id);    }
    $SQL = "SELECT DISTINCT $field FROM $table $con "; //echo $SQL; die();
    //print $SQL."<br>";
    $rs = mysql_query($SQL) or die($SQL);
    $ss = 0;
    while ($data = mfa($rs)) {
        if ($data[$id_col] == $sel_id) {
            $sel = "selected";
            $ss = 0;
        }
        $option.="<option value=\"$data[$id_col]\" $sel>$data[$val_col]</option>";
        $sel = "";
    }
    $sel = "";
    if ($ss == 0 and $show_all == 1) {
        $sel = "selected";
        $ss = 1;
    }
    if ($show_all == 1) {
        $option = "<option value=\"-2\"$sel>" . All . "</option>" . $option;
    }
    if ($show_all == 2) {
        $option = "<option value=\"-1\" selected>Please Select</option>" . $option;
    }
    if ($ss == 0 AND $show_select == 1) {
        $option = "<option value=\"-1\" selected>Please Select</option>" . $option;
    }
}

########################################################################

function get_new_option_list_new($table = "", $id_col = "", $val_col = "", $sel_id, &$option, $show_all = 0, $con = "", $first_op = "Please Select", $both = 0) {
    $date_col = "";
    $option = "";
    if (substr($val_col, 0, 1) == "#") {
        $date_col = substr($val_col, 1);
        $val_col = $date_col;
    }

    if ($table != "" AND $val_col != "" AND $id_col != "") {
        $SQL = "SELECT * FROM $table $con";
        $rs = mysql_query($SQL) or die($SQL);
        $ss = 0;
        while ($data = mfa($rs)) {
            $val = $data[$val_col];
            if (is_array($sel_id)) {
                if (in_array($data[$id_col], $sel_id)) {
                    $sel = "selected";
                    $ss = 1;
                }
            } else {
                if ($data[$id_col] == $sel_id) {
                    $sel = "selected";
                    $ss = 1;
                }
            }
            if (!$date_col == "") {
                $tm = $data[$date_col];
                format_date($tm, $tmp, $dt);
                $val = $dt;
            }
            $option.="<option value=\"$data[$id_col]\"$sel>$val</option>";
            $sel = "";
        }
    }
    $sel = "";
    if ($ss == 0 and $show_all == 1) {
        $sel = "selected";
        $ss = 1;
    }

    if ($both == 1) {
        $option = "<option value=\"-2\"$sel>" . ALL . "</option> <option value=\"-1\" >$first_op</option>" . $option;
        return;
    }
    if ($show_all == 1) {
        $option = "<option value=\"-2\"$sel>" . All . "</option>" . $option;
    }
    if (strlen($first_op) > 0) {
        $option = "<option value=\"-1\" >$first_op</option>" . $option;
    }
}

###################################

function DIN_ALL($ary) {
    if ($ary) {
        foreach ($ary as $k => $v) {
            $ary[$k] = DIN($v);
        }
    }
    return $ary;
}

function get_mktime_to_date($date) {
    if ($date == -1 || $date == 0)
        $data = "";
    else {
        $data = getdate($date);
        $data = $data[mday] . "/" . $data[mon] . "/" . $data[year];
    }
    return $data;
}

function get_mktime_to_date_mdy($date) {
    if ($date == -1 || $date == 0)
        $data = "";
    else {
        $data = getdate($date);
        $data = $data[mon] . "/" . $data[mday] . "/" . $data[year];
    }
    return $data;
}

#################################
//for storage to database

function DIN($input) {
    $input = trim($input);
    if (!get_magic_quotes_gpc()) {
        return addslashes($input);
    }
    return $input;
}

################################### not used

function get_value_ary($table, $col, $con = "") {
    $ary = array();
    $SQL = "SELECT $col FROM $table $con";
    eq($SQL, $rs);
    while ($data = mfa($rs)) {
        array_push($ary, $data[$col]);
    }
    return $ary;
}

################################# 

function get_nb_text($tot_rows, $title, $st_pos = 0, &$con_limit, &$nb_text, $nrpp = 0, $nspp = 10) {
    //$nspp=316;
    $link_color = "#464646";
    $unlink_color = "#6E6E6E";
    global $NRPP;
    if ($st_pos == "") {
        $st_pos = 0;
    }
    if (!$nrpp) {
        $nrpp = $NRPP;
    }
    if (!$nrpp) {
        $nrpp = 20;
    }
    $con_limit = " LIMIT $st_pos, $nrpp";
    $con_mid = "";
    $first = 0;
    $last = $nrpp * (round($tot_rows / $nrpp));
    $k = 1;
    //getting the set
    for ($i = 0; $i != 1;) {
        if (($k * $nrpp * $nspp) > $st_pos) {
            $set = $k;
            $i = 1;
        }
        $k++;
    }
    $next = $set * $nrpp * $nspp;
    $back = $next - ($nrpp * $nspp);
    $set1 = $set;
    if ($set > 1) {
        $set1 = 2;
    }
    $prev = $next - ($nrpp * $nspp * $set1);
    for ($i = ($back / $nrpp); $i < ($next / $nrpp); $i++) {
        $pos = $i * $nrpp;
        $b1 = "";
        $b2 = "";
        if ($pos == $st_pos) {
            $b1 = "<b>";
            $b2 = "</b>";
        }
        $j = $i + 1;
        $HL1 = "";
        $HL2 = "";
        $color = $link_color;
        if ($pos >= $tot_rows) {
            continue;
            $HL1 = "<!--";
            $HL2 = "-->";
            $color = $unlink_color;
        }
        $con_mid.=<<<EOM
&nbsp;$HL1<a href="JavaScript:nb($pos)">$HL2$b1<font color="$color">$j</font>$b2$HL1</a>$HL2
EOM
        ;
    }
    $curr_pos1 = $st_pos + 1;
    $curr_pos2 = $st_pos + $nrpp;
    if ($curr_pos2 > $tot_rows) {
        $curr_pos2 = $tot_rows;
    }
    $HFP1 = "";
    $HFP2 = "";
    $HNL1 = "";
    $HNL2 = "";
    $color_first = $link_color;
    $color_last = $link_color;
    if (($next - ($nrpp * $nspp)) == 0) {
        $HFP1 = "<!--";
        $HFP2 = "-->";
        $color_first = $unlink_color;
    }
    if ($next >= $tot_rows) {
        $HNL1 = "<!--";
        $HNL2 = "-->";
        $color_last = $unlink_color;
    }
    if ($last > $tot_rows) {
        $last = $last - $nrpp;
    }


    $nb_text = <<<EOM
           $title $curr_pos1 - $curr_pos2 of $tot_rows
EOM
    ;
}

################################# 

function get_nb_text_multi($tot_rows, $title, $st_pos = 0, &$con_limit, &$nb_text, $nrpp = 0, $nspp = 10) {
    //$nspp=316;
    $link_color = "#464646";
    $unlink_color = "#6E6E6E";
    global $NRPP;
    if ($st_pos == "") {
        $st_pos = 0;
    }
    if (!$nrpp) {
        $nrpp = $NRPP;
    }
    if (!$nrpp) {
        $nrpp = 20;
    }
    $con_limit = " LIMIT $st_pos, $nrpp";
    $con_mid = "";
    $first = 0;
    $last = $nrpp * (round($tot_rows / $nrpp));
    $k = 1;
    //getting the set
    for ($i = 0; $i != 1;) {
        if (($k * $nrpp * $nspp) > $st_pos) {
            $set = $k;
            $i = 1;
        }
        $k++;
    }
    $next = $set * $nrpp * $nspp;
    $back = $next - ($nrpp * $nspp);
    $set1 = $set;
    if ($set > 1) {
        $set1 = 2;
    }
    $prev = $next - ($nrpp * $nspp * $set1);
    for ($i = ($back / $nrpp); $i < ($next / $nrpp); $i++) {
        $pos = $i * $nrpp;
        $b1 = "";
        $b2 = "";
        if ($pos == $st_pos) {
            $b1 = "<b>";
            $b2 = "</b>";
        }
        $j = $i + 1;
        $HL1 = "";
        $HL2 = "";
        $color = $link_color;
        if ($pos >= $tot_rows) {
            continue;
            $HL1 = "<!--";
            $HL2 = "-->";
            $color = $unlink_color;
        }
        $con_mid.=<<<EOM
&nbsp;$HL1<a href="JavaScript:nb($pos)">$HL2$b1<font color="$color">$j</font>$b2$HL1</a>$HL2
EOM
        ;
    }
    $curr_pos1 = $st_pos + 1;
    $curr_pos2 = $st_pos + $nrpp;
    if ($curr_pos2 > $tot_rows) {
        $curr_pos2 = $tot_rows;
    }
    $HFP1 = "";
    $HFP2 = "";
    $HNL1 = "";
    $HNL2 = "";
    $color_first = $link_color;
    $color_last = $link_color;
    if (($next - ($nrpp * $nspp)) == 0) {
        $HFP1 = "<!--";
        $HFP2 = "-->";
        $color_first = $unlink_color;
    }
    if ($next >= $tot_rows) {
        $HNL1 = "<!--";
        $HNL2 = "-->";
        $color_last = $unlink_color;
    }
    if ($last > $tot_rows) {
        $last = $last - $nrpp;
    }

    $n = "";
    $b = "";
    if ($curr_pos1 > 1) {
        $b = $st_pos - $nrpp;
        $b = "<a href=\"JavaScript:nb($b)\">&lt;&lt;&nbsp;Back</a>";
    }
    if ($curr_pos2 < $tot_rows) {
        $n = "<a href=\"JavaScript:nb($curr_pos2)\">Next&nbsp;&gt;&gt;</a>";
    }
    $nb_text = <<<EOM
           $title $curr_pos1 - $curr_pos2 of $tot_rows $b [$con_mid ] $n
EOM
    ;
}

################################# 

function get_nb_text_multi_monet($tot_rows, $title, $st_pos = 0, &$con_limit, &$nb_text, $nrpp = 0, $nspp = 5, $func_prefix = '') {
    //$nspp=316;
    $link_color = "#464646";
    $unlink_color = "#6E6E6E";
    global $NRPP;
    if ($st_pos == "") {
        $st_pos = 0;
    }
    if (!$nrpp) {
        $nrpp = $NRPP;
    }
    if (!$nrpp) {
        $nrpp = 20;
    }
    $con_limit = " LIMIT $st_pos, $nrpp";
    $con_mid = "";
    $first = 0;
    $last = $nrpp * (round($tot_rows / $nrpp));
    $k = 1;
    //getting the set
    for ($i = 0; $i != 1;) {
        if (($k * $nrpp * $nspp) > $st_pos) {
            $set = $k;
            $i = 1;
        }
        $k++;
    }
    $next = $set * $nrpp * $nspp;
    $back = $next - ($nrpp * $nspp);
    $set1 = $set;
    if ($set > 1) {
        $set1 = 2;
    }
    $prev = $next - ($nrpp * $nspp * $set1);
    for ($i = ($back / $nrpp); $i < ($next / $nrpp); $i++) {
        $pos = $i * $nrpp;
        $b1 = "";
        $b2 = "";
        if ($pos == $st_pos) {
            $b1 = "<b>";
            $b2 = "</b>";
        }
        $j = $i + 1;
        $HL1 = "";
        $HL2 = "";
        $color = $link_color;
        if ($pos >= $tot_rows) {
            continue;
            $HL1 = "<!--";
            $HL2 = "-->";
            $color = $unlink_color;
        }
        $con_mid.=<<<EOM
&nbsp;$HL1<a href="JavaScript:nb$func_prefix($pos)">$HL2$b1<font color="$color">$j</font>$b2$HL1</a>$HL2
EOM
        ;
    }
    $curr_pos1 = $st_pos + 1;
    $curr_pos2 = $st_pos + $nrpp;
    if ($curr_pos2 > $tot_rows) {
        $curr_pos2 = $tot_rows;
    }
    $HFP1 = "";
    $HFP2 = "";
    $HNL1 = "";
    $HNL2 = "";
    $color_first = $link_color;
    $color_last = $link_color;
    if (($next - ($nrpp * $nspp)) == 0) {
        $HFP1 = "<!--";
        $HFP2 = "-->";
        $color_first = $unlink_color;
    }
    if ($next >= $tot_rows) {
        $HNL1 = "<!--";
        $HNL2 = "-->";
        $color_last = $unlink_color;
    }
    if ($last > $tot_rows) {
        $last = $last - $nrpp;
    }

    $n = "";
    $b = "";
    if ($curr_pos1 > 1) {
        $b = $st_pos - $nrpp;
        $b = "<a href=\"JavaScript:nb$func_prefix($b)\">&lt;&lt;&nbsp;Back</a>";
    }
    if ($curr_pos2 < $tot_rows) {
        $n = "<a href=\"JavaScript:nb$func_prefix($curr_pos2)\">Next&nbsp;&gt;&gt;</a>";
    }
    $nb_text = <<<EOM
           $title $curr_pos1 - $curr_pos2 of $tot_rows $b [$con_mid ] $n
EOM
    ;
}

################################# 

function get_nb_text_multi_pop($tot_rows, $title, $st_pos = 0, &$con_limit, &$nb_text, $nrpp = 0, $nspp = 10) {
    //$nspp=316;
    $link_color = "#464646";
    $unlink_color = "#6E6E6E";
    global $NRPP;
    if ($st_pos == "") {
        $st_pos = 0;
    }
    if (!$nrpp) {
        $nrpp = $NRPP;
    }
    if (!$nrpp) {
        $nrpp = 20;
    }
    $con_limit = " LIMIT $st_pos, $nrpp";
    $con_mid = "";
    $first = 0;
    $last = $nrpp * (round($tot_rows / $nrpp));
    $k = 1;
    //getting the set
    for ($i = 0; $i != 1;) {
        if (($k * $nrpp * $nspp) > $st_pos) {
            $set = $k;
            $i = 1;
        }
        $k++;
    }
    $next = $set * $nrpp * $nspp;
    $back = $next - ($nrpp * $nspp);
    $set1 = $set;
    if ($set > 1) {
        $set1 = 2;
    }
    $prev = $next - ($nrpp * $nspp * $set1);
    for ($i = ($back / $nrpp); $i < ($next / $nrpp); $i++) {
        $pos = $i * $nrpp;
        $b1 = "";
        $b2 = "";
        if ($pos == $st_pos) {
            $b1 = "<b>";
            $b2 = "</b>";
        }
        $j = $i + 1;
        $HL1 = "";
        $HL2 = "";
        $color = $link_color;
        if ($pos >= $tot_rows) {
            continue;
            $HL1 = "<!--";
            $HL2 = "-->";
            $color = $unlink_color;
        }
        $con_mid.=<<<EOM
&nbsp;$HL1<a href="JavaScript:pop_nb($pos)">$HL2$b1<font color="$color">$j</font>$b2$HL1</a>$HL2
EOM
        ;
    }
    $curr_pos1 = $st_pos + 1;
    $curr_pos2 = $st_pos + $nrpp;
    if ($curr_pos2 > $tot_rows) {
        $curr_pos2 = $tot_rows;
    }
    $HFP1 = "";
    $HFP2 = "";
    $HNL1 = "";
    $HNL2 = "";
    $color_first = $link_color;
    $color_last = $link_color;
    if (($next - ($nrpp * $nspp)) == 0) {
        $HFP1 = "<!--";
        $HFP2 = "-->";
        $color_first = $unlink_color;
    }
    if ($next >= $tot_rows) {
        $HNL1 = "<!--";
        $HNL2 = "-->";
        $color_last = $unlink_color;
    }
    if ($last > $tot_rows) {
        $last = $last - $nrpp;
    }

    $n = "";
    $b = "";
    if ($curr_pos1 > 1) {
        $b = $st_pos - $nrpp;
        $b = "<a href=\"JavaScript:pop_nb($b)\">&lt;&lt;&nbsp;Back</a>";
    }
    if ($curr_pos2 < $tot_rows) {
        $n = "<a href=\"JavaScript:pop_nb($curr_pos2)\">Next&nbsp;&gt;&gt;</a>";
    }
    $nb_text = <<<EOM
           $title $curr_pos1 - $curr_pos2 of $tot_rows $b [$con_mid ] $n
EOM
    ;
}

################################

function get_nb_text_multi_pvideo($tot_rows, $title, $st_pos = 0, &$con_limit, &$nb_text, $nrpp = 0, $nspp = 5, $func_prefix = '') {
    //$nspp=316;
    $link_color = "#464646";
    $unlink_color = "#6E6E6E";
    global $NRPP;
    if ($st_pos == "") {
        $st_pos = 0;
    }
    if (!$nrpp) {
        $nrpp = $NRPP;
    }
    if (!$nrpp) {
        $nrpp = 20;
    }
    $con_limit = " LIMIT $st_pos, $nrpp";
    $con_mid = "";
    $first = 0;
    $last = $nrpp * (round($tot_rows / $nrpp));
    $k = 1;
    //getting the set
    for ($i = 0; $i != 1;) {
        if (($k * $nrpp * $nspp) > $st_pos) {
            $set = $k;
            $i = 1;
        }
        $k++;
    }
    $next = $set * $nrpp * $nspp;
    $back = $next - ($nrpp * $nspp);
    $set1 = $set;
    if ($set > 1) {
        $set1 = 2;
    }
    $prev = $next - ($nrpp * $nspp * $set1);
    for ($i = ($back / $nrpp); $i < ($next / $nrpp); $i++) {
        $pos = $i * $nrpp;
        $b1 = "";
        $b2 = "";
        if ($pos == $st_pos) {
            $b1 = "<b>";
            $b2 = "</b>";
        }
        $j = $i + 1;
        $HL1 = "";
        $HL2 = "";
        $color = $link_color;
        if ($pos >= $tot_rows) {
            continue;
            $HL1 = "<!--";
            $HL2 = "-->";
            $color = $unlink_color;
        }
        $con_mid.=<<<EOM
&nbsp;$HL1<a href="JavaScript:nb$func_prefix($pos)">$HL2$b1<font color="$color">$j</font>$b2$HL1</a>$HL2
EOM
        ;
    }
    $curr_pos1 = $st_pos + 1;
    $curr_pos2 = $st_pos + $nrpp;
    if ($curr_pos2 > $tot_rows) {
        $curr_pos2 = $tot_rows;
    }
    $HFP1 = "";
    $HFP2 = "";
    $HNL1 = "";
    $HNL2 = "";
    $color_first = $link_color;
    $color_last = $link_color;
    if (($next - ($nrpp * $nspp)) == 0) {
        $HFP1 = "<!--";
        $HFP2 = "-->";
        $color_first = $unlink_color;
    }
    if ($next >= $tot_rows) {
        $HNL1 = "<!--";
        $HNL2 = "-->";
        $color_last = $unlink_color;
    }
    if ($last > $tot_rows) {
        $last = $last - $nrpp;
    }

    $n = "";
    $b = "";
    if ($curr_pos1 > 1) {
        $b = $st_pos - $nrpp;
        $b = "<h2><a href=\"JavaScript:nb$func_prefix($b)\">&lt;&lt;&nbsp;Back</a></h2>";
    }
    if ($curr_pos2 < $tot_rows) {
        $n = "<h2><a href=\"JavaScript:nb$func_prefix($curr_pos2)\">Next&nbsp;&gt;&gt;</a></h2>";
    }
    $nb_text = <<<EOM
           $title $curr_pos1 - $curr_pos2 of $tot_rows $b [$con_mid ] $n
EOM
    ;
}

##########################################3

function get_nb_text_multi_avideo($tot_rows, $title, $st_pos = 0, &$con_limit, &$nb_text, $nrpp = 0, $nspp = 5, $func_prefix = '') {
    //$nspp=316;
    $link_color = "#464646";
    $unlink_color = "#6E6E6E";
    global $NRPP;
    if ($st_pos == "") {
        $st_pos = 0;
    }
    if (!$nrpp) {
        $nrpp = $NRPP;
    }
    if (!$nrpp) {
        $nrpp = 20;
    }
    $con_limit = " LIMIT $st_pos, $nrpp";
    $con_mid = "";
    $first = 0;
    $last = $nrpp * (round($tot_rows / $nrpp));
    $k = 1;
    //getting the set
    for ($i = 0; $i != 1;) {
        if (($k * $nrpp * $nspp) > $st_pos) {
            $set = $k;
            $i = 1;
        }
        $k++;
    }
    $next = $set * $nrpp * $nspp;
    $back = $next - ($nrpp * $nspp);
    $set1 = $set;
    if ($set > 1) {
        $set1 = 2;
    }
    $prev = $next - ($nrpp * $nspp * $set1);
    for ($i = ($back / $nrpp); $i < ($next / $nrpp); $i++) {
        $pos = $i * $nrpp;
        $b1 = "";
        $b2 = "";
        if ($pos == $st_pos) {
            $b1 = "<b>";
            $b2 = "</b>";
        }
        $j = $i + 1;
        $HL1 = "";
        $HL2 = "";
        $color = $link_color;
        if ($pos >= $tot_rows) {
            continue;
            $HL1 = "<!--";
            $HL2 = "-->";
            $color = $unlink_color;
        }
        $con_mid.=<<<EOM
&nbsp;$HL1<a href="JavaScript:nb$func_prefix($pos)">$HL2$b1<font color="$color">$j</font>$b2$HL1</a>$HL2
EOM
        ;
    }
    $curr_pos1 = $st_pos + 1;
    $curr_pos2 = $st_pos + $nrpp;
    if ($curr_pos2 > $tot_rows) {
        $curr_pos2 = $tot_rows;
    }
    $HFP1 = "";
    $HFP2 = "";
    $HNL1 = "";
    $HNL2 = "";
    $color_first = $link_color;
    $color_last = $link_color;
    if (($next - ($nrpp * $nspp)) == 0) {
        $HFP1 = "<!--";
        $HFP2 = "-->";
        $color_first = $unlink_color;
    }
    if ($next >= $tot_rows) {
        $HNL1 = "<!--";
        $HNL2 = "-->";
        $color_last = $unlink_color;
    }
    if ($last > $tot_rows) {
        $last = $last - $nrpp;
    }

    $n = "";
    $b = "";
    if ($curr_pos1 > 1) {
        $b = $st_pos - $nrpp;
        $b = "<a href=\"JavaScript:nb$func_prefix($b)\">&lt;&lt;&nbsp;Back</a>";
    }
    if ($curr_pos2 < $tot_rows) {
        $n = "<a href=\"JavaScript:nb$func_prefix($curr_pos2)\">Next&nbsp;&gt;&gt;</a>";
    }
    $nb_text = <<<EOM
           $title $curr_pos1 - $curr_pos2 of $tot_rows $b [$con_mid ] $n
EOM
    ;
}

############################################

function get_row_con_info($tab_name, $con, $cols, &$row, $show_err = 1, $print_sql = 0) {
    if ($cols == "") {
        $cols = "*";
    }
    $ss = 0;
    $SQL = "SELECT $cols FROM $tab_name $con ";
    if ($print_sql == 1) {
        print "$SQL<br>";
    }
//    $rs=mysql_query($SQL) OR $ss=1;

    eq($SQL, $rs);

    if ($ss and $show_err == 1) {
        kill("Invalid condition $con on  table $tab_name");
    }
    if ($rs) {
        $row = mfa($rs);
        return mysql_num_rows($rs);
    }
    return 0;
}

function get_new_ids_dis($table, $id, $con, &$ids, $print = 0) {
    $ids = array();
    $SQL = "SELECT DISTINCT $id FROM $table  $con";

    if ($print == 1)
        print $SQL;

    eq($SQL, $rs);
    $i = 0;
    while ($data = mfa($rs))
        $ids[$i++] = $data[$id];
}

#####################################################

function make_round($num) {
    return number_format($num, 2, ".", ",");
}

#################################

function DOUT($output, $use_hsc = 0) {
    $output = ltrim($output);
    if ($use_hsc) {
        $output = htmlentities(stripslashes($output), ENT_QUOTES);
    } else {
        $output = stripslashes($output);
    }
    return $output;
}

#################################

function DOUT_ALL($output, $use_hsc = 0) {
    if ($output) {
        foreach ($output as $k => $v) {
            $output[$k] = DOUT($v, $use_hsc);
        }
    }
    return $output;
}

############################ not used
#truncates the passed in string upto the passed in length

function tstr($data, $len = 13) {
    $more = "";
    if (strlen($data) > $len) {
        $more = "...";
    }
    return substr($data, 0, $len) . $more;
}

#################################

function get_row_count($tab_name, $con, $print = 0) {

    $SQL = "SELECT count(*) FROM $tab_name $con";
    if ($print == 1) {
        print $SQL . "<br>";
    }
//    $rs=mysql_query($SQL) or die($SQL);
    eq($SQL, $rs);
    $data = mysql_fetch_array($rs);
    return $data[0];
}

#######################################
#displays the message and then die :-0

function kill($msg) {
    die("<center><h3>$msg</h3></center>");
}

##############################
#send mail

function send_mail($to_name = "", $to_email = "", $from_name = "", $from_email = "", $subject, $message, $mail_type = "") {
    //using $mail type  for additional settings based on mail type passed
    global $Site_Name;
    global $AdminName;
    global $AdminMail;
    global $AdminToName;
    global $AdminToEmail;
    if ($from_name == "") {
        $from_name = $AdminName;
    }
    if ($from_email == "") {
        $from_email = $AdminMail;
    }
    if ($to_name == "") {
        $to_name = $AdminToName;
    }
    if ($to_email == "") {
        $to_email = $AdminToEmail;
    }

    //print "To:$to_name &lt;$to_email&gt; <br>From:$from_name&lt;$from_email&gt; <br>Subject:$subject <br>Message:$message";
    //return 1;

    $t = new htmlMimeMail();
    $from = "$from_name <$from_email>";
    $t->setHtml($message, $text_ver);
    $t->setFrom($from);
    $t->setSubject($subject);
    $mail = "$to_name<$to_email>";
    return $t->send(array($mail, ''));
}

##############################
/* function send_mail_new($to_name="",$to_email="",$from_name="",$from_email="",$subject="",$message , $mail_type=""  ,  $att_ids=0 , $bcc_email="",$reply="")
  {
  require_once 'swift/lib/swift_required.php';
  global $Site_Name;
  global $AdminName;
  global $AdminMail;
  global $AdminToName;
  global $AdminToEmail;
  global $USESENDGRID,$user_data;
  global $Server_View_Path,$View_Path;
  if($from_name=="")	{	    $from_name=$AdminName;	}
  if($from_email=="")	{	    $from_email=$AdminMail;	}
  if($to_name=="")	{	    $to_name=$AdminToName;	}
  if($to_email=="")	{	    $to_email=$AdminToEmail;	}
  $t=time();
  $message = str_replace("\\n","\\r\\n",$message);

  $from="$from_name <$from_email>";
  $to="$to_name <$to_email>";
  if($USESENDGRID==0)
  {
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $from\n";
  if($reply)
  $headers .= "Reply-To: $reply \n";
  if($cc_email)
  $headers .= "CC: $cc_email \n";
  if($bcc_email)
  $headers .="BCC: ".$bcc_email;
  if($att_ids)
  {
  global $Server_View_Path;
  $mail = new htmlMimeMail();
  $SQL="Select * from uploads where up_id IN ($att_ids)  ORDER BY `up_id` DESC";
  $tot=eq($SQL,$rs);
  if($tot>0)
  {
  while($data=mfa($rs))
  {
  $path=$View_Path.$data[up_fname].$data[up_ext];
  $attachment = $mail->getFile($path);
  $mail->addAttachment($attachment,$data[up_oname],$data[up_ext]);
  }
  }
  $mail->setSubject($subject);
  //$mail->setText($message);
  $mail->setHtml($message);
  $mail->setFrom($from);
  if($cc_email)
  $mail->setCc($cc_email);
  if($bcc_email)
  $mail->setBcc($bcc_email);
  if($reply)
  {
  $mail->setHeader("Return-Path",$reply);
  $mail->setHeader("Reply-To", $reply);
  }
  $result = $mail->send(array($to));
  //print $result;
  }
  else
  {
  mail($to, $subject, $message, $headers);
  }

  }
  else
  {
  global $send_grid_email;
  global $send_grid_pass;

  $transport = Swift_SmtpTransport::newInstance('smtp.sendgrid.net', 25)
  ->setUsername($send_grid_email)
  ->setPassword($send_grid_pass)
  ;
  //Create the Mailer using your created Transport
  $mailer = Swift_Mailer::newInstance($transport);
  $orig_msg = $message;
  //Create a message
  $message = Swift_Message::newInstance($subject)
  ->setFrom(array($from_email => $from_name))
  ->setTo(array($to_email=>$to_name))
  ;

  $message->setSender($from_email);
  $message->setBody($orig_msg, 'text/html');

  if($reply)
  $message->setReplyTo($reply);
  if($cc_email)
  $message->setCc($cc_email);

  if($bcc_email)
  $message->addBcc($bcc_email);
  // Attachments
  if($att_ids)
  {
  global $Server_View_Path;
  $SQL="Select * from uploads where up_id IN ($att_ids)  ORDER BY `up_id` DESC";
  $tot=eq($SQL,$rs);
  if($tot>0)
  {
  while($data=mfa($rs))
  {
  $path=$View_Path.$data[up_fname].$data[up_ext];
  $attach = Swift_Attachment::fromPath($path, $attachment['mime'])->setFilename($data[up_oname]);
  $message->attach($attach);
  //$message->attach(Swift_Attachment::fromPath($path));
  }
  }
  }
  //Send the message
  $result = $mailer->send($message);
  }
  } */
########################################

function send_mail_new($to_name = "", $to_email = "", $from_name = "", $from_email = "", $subject, $message, $mail_type = "", $att_ids = "", $bcc_email = "", $reply_to = "") {
    //using $mail type  for additional settings based on mail type passed
    global $Site_Name;
    global $AdminName;
    global $AdminMail;
    global $AdminToName;
    global $AdminToEmail;

    global $Server_View_Path;

    if ($from_name == "") {
        $from_name = $AdminName;
    }
    if ($from_email == "") {
        $from_email = $AdminMail;
    }


    if ($to_name == "") {
        $to_name = $AdminToName;
    }
    if ($to_email == "") {
        $to_email = $AdminToEmail;
    }

    $message = str_replace("\\n", "\\r\\n", $message);
    $from = "$from_name <$from_email>";
    $to = "$to_name <$to_email>";
    $headers = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $headers .= "From: $from\n";
    $headers .= "Cc:cynets@gmail.com\n";
    $headers .= "Bcc:dinesh.chandra@cynets.com\n";
    $headers .= "Reply-To: $reply_to \n";
    $headers .=$bcc_email;

    if ($att_ids != "") {
        $SQL = "SELECT * FROM `uploads` WHERE up_id IN( $att_ids ) ORDER BY `up_id` DESC ";
        eq($SQL, $rs);
        $mail = new htmlMimeMail();
        while ($data = mfa($rs)) {
            $path = $Server_View_Path . "uploads/" . $data[up_fname] . $data[up_ext];
            $attachment = $mail->getFile($path);
            $mail->addAttachment($attachment, $data[up_oname], '');
        }
        $mail->setSubject($subject);
        //$mail->setText($message);
        $mail->setHtml($message);
        $mail->setFrom($from_name . ' <' . $from_email . '>');
        $result = $mail->send(array($to_name . ' <' . $to_email . '>'));
    } else {
        mail($to, $subject, $message, $headers);
    }
}

##############################33

function eq($sql, &$rs, $print = 0) {
    if ($print == 1) {
        print $sql . "<br>";
    }
    $rs = mysql_query($sql) or die(mysql_error()); //query db and store response
    $affected_rows = mysql_affected_rows();

    return $affected_rows; //return data
}

##############################33

function ei($sql, $print = 0) {
    if ($print == 1) {
        print $sql . "<br>";
    }
    mysql_query($sql) or die(mysql_error());

    $lid = mysql_insert_id(); //mysql_insert_id � Get the ID generated in the last query

    return $lid;
}

###########################################

function mfa($rs) {
    $data = mysql_fetch_assoc($rs);
    return DOUT_ALL($data);
}

############################
######################################################

function nr($rs) {
    return mysql_num_rows($rs);
}

#returns the info of passed in upload id

function get_upload_info($s_id, $s_type, $pos = 0, &$up, $show_err = 0) {
    global $View_Path;
    global $Server_View_Path;
    global $Upload_Path;
    global $Server_Upload_Path;
    $SQL = "SELECT * FROM uploads where up_s_id='$s_id' and up_s_type='$s_type' limit $pos,1";
    eq($SQL, $rs);
    if (nr($rs) == 0 and $show_err == 1) {
        kill("Invalid s_id#$s_id and s_type#$s_type");
    }
    $up = mfa($rs);
    $up[up_view_path] = $View_Path . $up[up_fname] . $up[up_ext];
    $up[up_upload_path] = $Upload_Path . $up[up_fname] . $up[up_ext];
    $up[up_thumb_view_path] = $View_Path . "thumb_" . $up[up_fname] . $up[up_ext];
    $up[up_small_thumb_view_path] = $View_Path . $up[up_fname] . $up[up_ext];
    $up[up_size] = 0;
    if ($up[up_id] > 0) {
        get_file_size($up[up_id], $up[up_size]);
    } else {
        $up[up_view_path] = $Server_View_Path . "images/clear.gif";
        $up[up_upload_path] = $Server_Upload_Path . "images/clear.gif";
        $up[up_thumb_view_path] = $Server_View_Path . "images/clear.gif";
        $up[up_small_thumb_view_path] = $Server_View_Path . "images/clear.gif";
    }
    return nr($rs);
}

#############################
#returns the file size

function get_file_size($up_id, &$up_size) {//$up_size = formatted upload size (including MB or KB etc)
    global $Upload_Path;
    get_row_con_info("uploads", "WHERE up_id='$up_id'", "", $up, 1);
    $fn = $Upload_Path . $up[up_fname] . $up[up_ext];
    $up_size = 0;
    $size = 0;
    if (file_exists($fn)) {
        $size = (filesize($fn) / 1000);
        $up_size = round($size, 2) . "K";
        if ($size > 1024) {
            $up_size = round(($size / 1024), 2) . "M";
        }
    }
    return $size;
}

####################################################

function delete_upload($up_id, $msg = "") {
    global $Upload_Path;
    $upload_path = $Upload_Path;
    get_row_con_info("uploads", "WHERE up_id='$up_id'", "", $up, 0);
    // checking for file existence
    $fn = $upload_path . $up[up_fname] . $up[up_ext];
    $thumb_fn = $upload_path . "thumb_" . $up[up_fname] . $up[up_ext];
    $small_thumb_fn = $upload_path . "small_thumb_" . $up[up_fname] . $up[up_ext];
    if ($up[up_id] AND file_exists($fn)) {
        @unlink($fn);
        @unlink($thumb_fn);
        @unlink($small_thumb_fn);
    }
    $SQL = "DELETE FROM uploads where up_id='$up_id'";
    mysql_query($SQL) or die($SQL);
    $msg = "File Upload Deleted Successfully";
    $ret = mysql_affected_rows();
    if ($ret == 0) {
        $msg = "Delete File Upload Failed";
    }
    return $ret;
}

########################################################################

function delete_upload_file($up_s_id, $type, $msg = "") {
    global $Upload_Path;
    get_row_con_info("uploads", "WHERE up_s_id='$up_s_id' and up_s_type='$type' ", "", $up, 0);
    // checking for file existence
    $fn = $Upload_Path . $up[up_fname] . $up[up_ext];
    $thumb_fn = $Upload_Path . "thumb_" . $up[up_fname] . $up[up_ext];
    $small_thumb = $Upload_Path . "small_thumb_" . $up[up_fname] . $up[up_ext];
    if ($up[up_id] AND @ file_exists($fn)) {
        @unlink($fn);
        @unlink($thumb_fn);
        @unlink($small_thumb);
    }
    $SQL = "DELETE FROM uploads where up_id='$up[up_id]'";
    mysql_query($SQL) or die($SQL);
    $msg = "File Upload Deleted Successfully";
    $ret = mysql_affected_rows();
    if ($ret == 0) {
        $msg = "Delete File Upload Failed";
    }
    return $ret;
}

##################################

function resize_image($up_id, &$img_w, &$img_h, $img_dw = 100) {
    global $View_Path;
    global $Upload_Path;
    get_row_con_info("uploads", " WHERE up_id='$up_id'", "", $up, 0);
    $img_thumb1 = $Upload_Path . $up[up_fname] . $up[up_ext];
    $img_thumb = $View_Path . $up[up_fname] . $up[up_ext];
    if (!file_exists($img_thumb1)) {
        return;
    }
    $i = @getimagesize($img_thumb1);
    #checking if original width of image is less than desired width the not resizing photo
    if ($img_dw > $i[0]) {
        $img_w = $i[0];
        $img_h = $i[1];
        return;
    }

    $img_w = $img_dw;
    $img_h = ($img_w / $i[0]) * $i[1];
}

#############################################

function upload_file_new($upld_name, $sid, $stype, $allow_multiple = 0, &$msg, $up_title = "", $thumbnail = 0) {
    global $Upload_Path;

    if (strlen($_FILES[$upld_name]['name']) > 0) {
        $ary = explode(".", $_FILES[$upld_name]['name']);  // seperates the file extension
        if (!($ary[1] == "php" || $ary[1] == "asp" || $ary[1] == "cgi" || $ary[1] == "pl" )) {
            if ($allow_multiple == 0) {
                $SQL = "SELECT  * FROM uploads where up_s_id='$sid' and up_s_type='$stype'";
                $rs = mysql_query($SQL) or die($SQL);
                while ($data = mysql_fetch_assoc($rs)) {
                    delete_upload($data[up_id]);
                }
            }
            //$ext=strtolower(substr($_FILES[$upld_name]['name'],strlen($_FILES[$upld_name]['name'])-4));
            $ext = strrchr($_FILES[$upld_name]['name'], '.');
            $nm1 = rand();
            $nm = $nm1 . $ext;
            $onm = $_FILES[$upld_name]['name'];
            if (!(move_uploaded_file($_FILES[$upld_name]['tmp_name'], $Upload_Path . $nm))) {
                print "Possible file upload attack! Here's some debugging info:\n";
                print_r($_FILES);
            }
            #now saving img in db

            $dt = time();
            $file_type = $_FILES[$upld_name]['type'];
            $SQL = "INSERT INTO uploads(up_s_id,up_s_type,up_fname,up_oname,up_ext,up_date,up_file_type,up_title) VALUES(
					'$sid','$stype','$nm1','$onm','$ext','$dt','$file_type','$up_title')";

            $up_id = ei($SQL, $rs);
            //	return $up_id;

            /* if($thumbnail==1)
              {
              global $imagemagick;
              $file=$Upload_Path.$nm;
              $thumb=$Upload_Path."thumb_".$nm;
              $small_thumb=$Upload_Path."small_thumb_".$nm;
              $size = getimagesize($file);
              if($size[0]>=$size[1])
              {
              $th_size=$size[1]/$size[0]*200; //height/width*defined width
              $small_th_size=$size[1]/$size[0]*100;
              }
              else
              {
              $th_size=110;
              $small_th_size=80;
              }

              $command="$imagemagick  \"$file\" -scale $th_size \"$thumb\"";
              exec($command);
              $command1="$imagemagick  \"$file\" -scale $small_th_size \"$small_thumb\"";
              exec($command1);
              } */

            if ($thumbnail == 1) {
                global $imagemagick;
                $file = $Upload_Path . $nm;
                $thumb = $Upload_Path . "thumb_" . $nm;
                $small_thumb = $Upload_Path . "small_thumb_" . $nm;
                $size = getimagesize($file);
                if ($size[0] >= $size[1]) {
                    $th_size = ($size[1] / $size[0]) * 200; //height/width*defined width
                    $th_size = "200X" . $th_size;
                    $small_th_size = ($size[1] / $size[0]) * 100;
                    $small_th_size = "100X" . $small_th_size;
                } elseif ($size[0] <= $size[1]) {
                    $th_size = ($size[0] / $size[1]) * 200;
                    $th_size = $th_size . "X150";
                    $small_th_size = ($size[0] / $size[1]) * 100;
                    $small_th_size = $small_th_size . "X100";
                } else {
                    $th_size = 110;
                    $small_th_size = 80;
                }

                $command = "$imagemagick  \"$file\" -scale $th_size \"$thumb\"";
                exec($command);
                $command1 = "$imagemagick  \"$file\" -scale $small_th_size \"$small_thumb\"";
                exec($command1);
            }
            return 1;
        } else {
            $msg = "<br>File can not be uploaded as it a $ary[1] file";
            return -1;
        }
    }
    return 0;
}

########################################
#uploads the specified file

function upload_file($upld_name, $sid, $stype, $allow_multiple = 0, &$msg) {
    global $Upload_Path;
    if (strlen($_FILES[$upld_name]['name']) > 0) {
        if ($allow_multiple == 0) {
            $SQL = "SELECT  * FROM uploads where up_s_id='$sid' and up_s_type='$stype'";
            eq($SQL, $rs);
            while ($data = mfa($rs)) {
                delete_upload($data[up_id], $tmp);
            }
        }
        $ext = strtolower(substr($_FILES[$upld_name]['name'], strlen($_FILES[$upld_name]['name']) - 4));
        $ary = explode(".", $_FILES[$upld_name]['name']);
        if ($ary[1] == "php" || $ary[1] == "asp" || $ary[1] == "cgi" || $ary[1] == "pl") {
            $msg = "Unsupported File Type <b>'$ary[1]'</b> File Name : <b>" . $_FILES[$upld_name]['name'] . "</b>";
            return -1;
        } else {
            $nm1 = rand();
            $nm = $nm1 . $ext;
            $onm = $_FILES[$upld_name]['name'];

            if (!(move_uploaded_file($_FILES[$upld_name]['tmp_name'], $Upload_Path . $nm))) {
                $msg = "Possible file upload attack! Here's some debugging info:\n";
                print_r($_FILES);
                return -1;
            }
            chmod($Upload_Path . $nm, 0777);
            //print $Upload_Path;
            #now saving img in db
            $dt = time();
            $file_type = $_FILES[$upld_name]['type'];
            $SQL = "INSERT INTO uploads(up_s_id,up_s_type,up_fname,up_oname,up_ext,up_date,up_file_type) VALUES(
	            '$sid','$stype','$nm1','$onm','$ext','$dt','$file_type')";
            $up_id = ei($SQL);
            //$img_ary=array(".gif",".bmp",".png",".jpg",".jpeg",".tif");
            return $up_id;
        }
    }
    return -1;
}

########################################################################

function func_unlink_file($id, $type) {
    global $Upload_Path;
    //print $id;print "<br>".$type;
    if (get_row_con_info("uploads", "WHERE up_s_id='$id' and up_s_type='$type'", "", $upload_info2)) {

        $unlink_file = $Upload_Path . "thumb_" . $upload_info2[up_fname] . $upload_info2[up_ext];
        $unlink_file_en = $Upload_Path . "enlarge_" . $upload_info2[up_fname] . $upload_info2[up_ext];
        $unlink_file_sam = $Upload_Path . $upload_info2[up_fname] . $upload_info2[up_ext];

        if ($unlink_file)
            if (file_exists($unlink_file)) {
                chmod("../uploads", 0777);
                unlink($unlink_file);
            }
        if ($unlink_file_en)
            if (file_exists($unlink_file_en)) {
                chmod("../uploads", 0777);
                unlink($unlink_file_en);
            }
        if ($unlink_file_sam)
            if (file_exists($unlink_file_sam)) {
                chmod("../uploads", 0777);
                unlink($unlink_file_sam);
            }
    }
}

########################################################################
#merge the passed in data with header and footer and displays it

function parse_index($data = "", $msg = "", $select = "") {
    global $SiteName;
    global $Server_View_Path;
    global $Server_Icon_Path;
    $R = DIN_ALL($_REQUEST);
    global $js;
    $smarty = new Smarty;
    $smarty->debugging = false;
    $smarty->caching = false;
    $smarty->cache_lifetime = 120;
    if ($_SESSION[UserId])
        $login = "1";
    else
        $login = "";

    get_row_con_info("users", "where user_id='$_SESSION[UserId]'", "", $user);
    $smarty->assign("user", $user);
    $smarty->assign(array("dt" => $dt,
        "body_data" => $data,
        "msg" => $msg,
        "show_menu" => $show_menu,
        "SiteName" => $SiteName,
        "SERVER_PATH" => $Server_View_Path,
        "hide_table" => $hide_table,
        "selected_" . $select => "selected",
        "hide_welcome" => $hide_welcome,
        "hide_login_box" => $hide_table,
        "login" => $login
    ));
    $smarty->display("index.tpl");
}

########################################################################
#merge the passed in data with header and footer and displays it

function parse_admin_index($data = "", $msg = "", $admin = 0) {
    global $js;
    global $SiteName;
    global $Server_View_Path;
    global $Server_Icon_Path;
    $R = DIN_ALL($_REQUEST);
    //format_date(time(),$dt,$tm);
    $t = new Template("templates");
    $t->set_file("MyFileHandle", "admin_index.htm");
    if ($_COOKIE["AdminId"] != "")
        $show_menu = "";
    else
        $show_menu = "none";

    $t->set_var(array("dt" => $dt,
        "body_data" => $data,
        "msg" => $msg, "js" => $js,
        "show_menu" => $show_menu,
        "SiteName" => $SiteName,
        "SERVER_PATH" => $Server_View_Path,
        "ICON_PATH" => $Server_Icon_Path,
    ));
    $t->parse("MyOutput", "MyFileHandle");
    $t->p("MyOutput");
}

####################################################################

function gri($tab_name, $con, $cols, &$row, $show_err = 1, $print_sql = 0) {
    return get_row_con_info($tab_name, $con, $cols, $row, $show_err, $print_sql);
}

################################################################

function get_checkbox_list($table, $id, $name, $se_ids, $chk_name, $cond = "", $no_col = "", $check_box_property = "", $html_name = "") {
    $t = new Template("templates");
    $t->set_file("MyFileHandle", "checkbox_list.htm");
    if ($no_col == "" || $no_col == 0) {
        $no_col = 3;
    }
    $i = 1;
    $selected = "";
    $SQL = "SELECT * FROM $table  $cond ";
    $tot = eq($SQL, $rs);
    $t->set_block('MyFileHandle', 'AccessBlockList', 'ABlock');
    while ($data = mfa($rs)) {
        if (is_array($se_ids)) {
            if (in_array($data[$id], $se_ids))
                $selected = "checked";
            else
                $selected = "";
        } else
            $selected = "";
        if ($i == 3) {
            $tr_end_and_start = "</tr><tr>";
            $i = 1;
        } else {
            $tr_end_and_start = "";
            $i++;
        }
        $t->set_var(array("tr_end_and_start" => $tr_end_and_start, "selected" => $selected, "name" => $data[$name], "idVal" => $data[$id], "chk_name" => "$chk_name"));
        $t->set_var($data);
        $t->Parse('ABlock', 'AccessBlockList', true);
    }
    $t->set_var(array("check_box_property" => $check_box_property));
    $t->parse("MyOutput", "MyFileHandle");
    if ($tot > 0)
        return($t->get("MyOutput"));
    else
        return("");
}

##################################

function getmicrotime() {
    list($usec, $sec) = explode(" ", microtime()); #0:00:00 January 1, 1970 GMT
    return ((float) $usec + (float) $sec);
}

#########################################################

function getvar($name) {
    global $_GET, $_POST;
    if (isset($_GET[$name]))
        return $_GET[$name];
    else if (isset($_POST[$name]))
        return $_POST[$name];
    else
        return false;
}

#############################################################
##########################################################################################################################
###Image resizing for gd-library with croping
##########################################################################################################################
##########################################################################################################
# IMAGE FUNCTIONS																						 #
# You do not need to alter these functions																 #
##########################################################################################################

function resizeImage($image, $width, $height, $scale) {
    list($imagewidth, $imageheight, $imageType) = getimagesize($image);
    $imageType = image_type_to_mime_type($imageType);
    $newImageWidth = ceil($width * $scale);
    $newImageHeight = ceil($height * $scale);
    $newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);
    switch ($imageType) {
        case "image/gif":
            $source = imagecreatefromgif($image);
            break;
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg":
            $source = imagecreatefromjpeg($image);
            break;
        case "image/png":
        case "image/x-png":
            $source = imagecreatefrompng($image);
            break;
    }
    imagecopyresampled($newImage, $source, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $width, $height);

    switch ($imageType) {
        case "image/gif":
            imagegif($newImage, $image);
            break;
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg":
            imagejpeg($newImage, $image, 90);
            break;
        case "image/png":
        case "image/x-png":
            imagepng($newImage, $image);
            break;
    }

    chmod($image, 0777);
    return $image;
}

//You do not need to alter these functions
function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale) {
    list($imagewidth, $imageheight, $imageType) = getimagesize($image);
    $imageType = image_type_to_mime_type($imageType);

    $newImageWidth = ceil($width * $scale);
    $newImageHeight = ceil($height * $scale);
    $newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);
    switch ($imageType) {
        case "image/gif":
            $source = imagecreatefromgif($image);
            break;
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg":
            $source = imagecreatefromjpeg($image);
            break;
        case "image/png":
        case "image/x-png":
            $source = imagecreatefrompng($image);
            break;
    }
    imagecopyresampled($newImage, $source, 0, 0, $start_width, $start_height, $newImageWidth, $newImageHeight, $width, $height);
    switch ($imageType) {
        case "image/gif":
            imagegif($newImage, $thumb_image_name);
            break;
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg":
            imagejpeg($newImage, $thumb_image_name, 90);
            break;
        case "image/png":
        case "image/x-png":
            imagepng($newImage, $thumb_image_name);
            break;
    }
    chmod($thumb_image_name, 0777);
    return $thumb_image_name;
}

//You do not need to alter these functions
function getHeight($image) {
    $size = getimagesize($image);
    $height = $size[1];
    return $height;
}

//You do not need to alter these functions
function getWidth($image) {
    $size = getimagesize($image);
    $width = $size[0];
    return $width;
}

function sec2hms($sec, $padHours = false) {

    // start with a blank string
    $hms = "";

    // do the hours first: there are 3600 seconds in an hour, so if we divide
    // the total number of seconds by 3600 and throw away the remainder, we're
    // left with the number of hours in those seconds
    $hours = intval(intval($sec) / 3600);

    // add hours to $hms (with a leading 0 if asked for)
    $hms .= ($padHours) ? str_pad($hours, 2, "0", STR_PAD_LEFT) . ":" : $hours . ":";

    // dividing the total seconds by 60 will give us the number of minutes
    // in total, but we're interested in *minutes past the hour* and to get
    // this, we have to divide by 60 again and then use the remainder
    $minutes = intval(($sec / 60) % 60);

    // add minutes to $hms (with a leading 0 if needed)
    $hms .= str_pad($minutes, 2, "0", STR_PAD_LEFT) . ":";

    // seconds past the minute are found by dividing the total number of seconds
    // by 60 and using the remainder
    $seconds = intval($sec % 60);

    // add seconds to $hms (with a leading 0 if needed)
    $hms .= str_pad($seconds, 2, "0", STR_PAD_LEFT);

    // done!
    return $hms;
}

function convert_to_sec($time) {
    $time_ary = explode(":", $time);
    $hor_to_sec = intval($time_ary[0] * 60 * 60);
    $min_to_sec = intval($time_ary[1] * 60);
    return $min_to_sec + $hor_to_sec + $time_ary[2];
}

function count_spikes($valence, &$negative, &$positive) {
    $spike = .2;
    $positive = 0;
    $negative = 0;
    if (count($valence) > 0) {
        for ($i = 0; $i < count($valence); $i++) {
            if ($valence[$i] > 0) {
                if ($valence[$i] > $valence[$i + 1] && $valence[$i] > $valence[$i - 1])
                    $positive++;
            }
            else if ($valence[$i] < 0) {
                if ($valence[$i] < $valence[$i + 1] && $valence[$i] < $valence[$i - 1])
                    $negative++;
            }
        }
    }
}

function update_rating_status($cf_ids) {
    $cf_ids = implode(",", $cf_ids);
    if (!$cf_ids)
        $cf_ids = 0;
    $SQL = "SELECT DISTINCT(c_id) from content where c_id IN (Select DISTINCT(cf_c_id) from content_feedback where cf_id IN ($cf_ids))";
    $tot_rows = eq($SQL, $rs_data);
    if ($tot_rows > 0) {
        while ($c_data = mfa($rs_data)) {
            $SQL = "Select ar_id from analysis_results left join content_feedback on ar_cf_id=cf_id where cf_c_id='$c_data[c_id]'";
            $tot = eq($SQL, $rs);
            if ($tot > 0) {
                $positive = 0;
                $negative = 0;
                $neutral = 0;
                while ($data = mfa($rs)) {
                    $positive+=get_row_count("analysis_detail", "where ad_ar_id='$data[ar_id]' and ad_valence>0");
                    $negative+=get_row_count("analysis_detail", "where ad_ar_id='$data[ar_id]' and ad_valence<0");
                    $neutral+=get_row_count("analysis_detail", "where ad_ar_id='$data[ar_id]' and ad_valence=0");
                    //print "Positive: ".$positive.", Negative: ".$negative.", Neutral: ".$neutral."<br>";
                }
                $total = $positive + $negative + $neutral; //Overall Total				
                if ($total > 0) {
                    $positive_percent = ($positive / $total) * 100;
                    $negative_percent = ($negative / $total) * 100;
                    $neutral_percent = ($neutral / $total) * 100;
                    ////////////////////////////////////
                    $pos_neg_total = $positive_percent + $negative_percent;
                    $c_tot_positive = ($positive_percent / $pos_neg_total) * 100;
                    $c_tot_negative = ($negative_percent / $pos_neg_total) * 100;

                    $SQL = "Update content set c_tot_positive='$c_tot_positive',c_tot_negative='$c_tot_negative' where c_id='$c_data[c_id]'";
                    eq($SQL, $rs1);
                }
            }
        }
    }
}

##########################################################################

function get_new_age_list($table, $id_col, $val_col, $sel_id, &$option, $show_all = 0, $con = "", $show_select = 1, $DISTINCT = '') {
    if ($DISTINCT != '') {
        $SQL_TCON = $DISTINCT;
    } else {
        $SQL_TCON = '*';
    }
    //if(!is_array($sel_id))    {	$sel_id=array($sel_id);    }
    $SQL = "SELECT $SQL_TCON FROM $table $con "; //echo $SQL; die();
    //print $SQL."<br>";
    $rs = mysql_query($SQL) or die($SQL);
    $ss = 0;
    while ($data = mfa($rs)) {
        if ($data[$id_col] == $sel_id) {
            $sel = "selected";
            $ss = 0;
        }
        if ($data[$id_col])
            $option.="<option value=\"$data[$id_col]\" $sel>$data[$val_col]</option>";
        $sel = "";
    }
    $sel = "";
    if ($ss == 0 and $show_all == 1) {
        $sel = "selected";
        $ss = 1;
    }
    if ($show_all == 1) {
        $option = "<option value=\"-2\"$sel>" . All . "</option>" . $option;
    }
    if ($show_all == 2) {
        $option = "<option value=\"-1\" selected>Company Country</option>" . $option;
    }
    if ($ss == 0 AND $show_select == 1) {
        $option = "<option value=\"-1\" selected>Country</option>" . $option;
    }
}

#################################################################################

function get_age_list($sel_id, &$option, $show_all = 0) {
    $ss = 0;
    for ($i = 1; $i <= 100; $i++) {
        if ($i == $sel_id) {
            $sel = "selected";
            $ss = 1;
        }
        $j = $i;
        if (strlen($j) == 1) {
            $j = "0" . $j;
        }
        $option.="<option value=\"$j\"$sel>$i</option>";
        $sel = "";
    }
    if ($show_all == 1) {
        if ($sel_id == -2) {
            $sel = "selected";
            $ss = 1;
        }
        $option = "<option value=\"-2\" $sel>All</option>" . $option;
    }
    if ($ss == 0) {
        $option = "<option value=\"-1\" selected> Age </option>" . $option;
    }
    return 1;
}

###############################################################################

function get_state_list($table, $id_col, $val_col, $sel_id, &$option, $show_all = 0, $con = "", $show_select = 1, $DISTINCT = '') {

    if ($DISTINCT != '') {
        $SQL_TCON = $DISTINCT;
    } else {
        $SQL_TCON = '*';
    }
    $cond = "WHERE states_countries_id='" . $con . "'";
    //if(!is_array($sel_id))    {	$sel_id=array($sel_id);    }
    $SQL = "SELECT $SQL_TCON FROM $table $cond "; //echo $SQL; die();
    //print $SQL."<br>";
    $rs = mysql_query($SQL) or die($SQL);
    $ss = 0;
    while ($data = mfa($rs)) {
        if ($data[$id_col] == $sel_id) {
            $sel = "selected";
            $ss = 0;
        }
        if ($data[$id_col])
            $option.="<option value=\"$data[$id_col]\" $sel>$data[$val_col]</option>";
        $sel = "";
    }
    $sel = "";
    if ($ss == 0 and $show_all == 1) {
        $sel = "selected";
        $ss = 1;
    }
    if ($show_all == 1) {
        $option = "<option value=\"-2\"$sel>" . All . "</option>" . $option;
    }
    if ($show_all == 2) {
        $option = "<option value=\"-1\" selected>Company State</option>" . $option;
    }
    if ($ss == 0 AND $show_select == 1) {
        $option = "<option value=\"-1\" selected>State</option>" . $option;
    }
}

?>