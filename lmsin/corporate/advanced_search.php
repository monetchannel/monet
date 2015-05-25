<?php       //aadi
include ("../includes/common.php");
include ("../includes/common_functions.php");
init();

$graphsToShowArray = explode(",", $_COOKIE['graphs_to_show']);

// use this array to filter which graph to show on the screen
$chkArray = array();
foreach($graphsToShowArray as $key=>$value){
    $filteredStr = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
    array_push($chkArray, trim($filteredStr)); 
}

####################################
if($_COOKIE[CompanyId]=="")
{ #not logged in
   header("Location: index.php?msg=Please first login to access admin area");
   return;
}




if($_COOKIE[CompanyId])
{
    $R=  DIN_ALL($_REQUEST);
    $category_name=array();
    $country_name=array();
    $videos=array();
    $SQL="Select * FROM category";
    eq($SQL,$rs);
    $func_ary=array("analyse");
  
    while($data = mfa($rs))
    {
            if($data['cat_id'] == $R['cat'])
            {
                    $data['selected'] = 'selected';
            }else {
                    $data['selected'] = '';
            }
            array_push($category_name, $data);
    }
    $SQL="Select * FROM countries";
    eq($SQL,$rs);
    
    while($data = mfa($rs))
    {
            if($data['countries_id'] == $R['countries'])
            {
                    $data['selected'] = 'selected';
            }else {
                    $data['selected'] = '';
            }
            array_push($country_name, $data);
    }
    if($R['gender'] == "Male")
        $male=array("key"=>"Male","selected"=>"selected");
    
    else
        $male=array("key"=>"Male","selected"=>'');
    
    if($R['gender'] == "Female")
        $female=array("key"=>"Female","selected"=>"selected");
    
    else
        $female=array("key"=>"Female","selected"=>'');
    $gender=array($male,$female);
    $condition1="";
    $condition2="";
    $condition3="";
    $AnalysisResultId=array();
    //if($R['filter'] && $R['filter']=='true'){
        
        if(isset($R['cat']) && $R['cat'] != '')
            $condition1 = " AND cv.cv_cat_id = ".$R['cat'];
        if(isset($R['countries']) && $R['countries'] != '')
            $condition2 = " AND u.user_country = ".$R['countries'];
        if(isset($R['gender']) && $R['gender'] != '')
            $condition3 = " AND u.user_gender = '".$R['gender']."'";

        $SQL="SELECT c.c_id
              FROM content c 
              JOIN category_video cv ON c_id=cv.cv_c_id  
              WHERE c.c_company_id= ".$_COOKIE[CompanyId]."".$condition1;
        eq($SQL, $rs);
        while($content= mfa($rs)){        //
            $SQL1="SELECT ar.ar_id
            FROM analysis_results ar
            JOIN content_feedback cf ON ar.ar_cf_id=cf.cf_id 
            JOIN users u ON cf.cf_user_id=u.user_id
            WHERE cf.cf_c_id=".$content[c_id]."".$condition2."".$condition3;
            eq($SQL1,$rs1);
            while($Id=mfa($rs1))
            array_push($AnalysisResultId, $Id[ar_id]);    //$AnalysisResultId contains the ar_id of the filtered feedbacks
        }
        //echo $rs;
    //}
        $id=array();  
        $video_num_rows=0;
        $num_rec_per_page=5;
            //print_r(array_values($AnalysisResultId));
        
        if(fe($_REQUEST[act]))
        {
          $_REQUEST[act]($_REQUEST[msg]);
           die();
        }
        
        else{
                foreach($AnalysisResultId as $v)
                {
                    $SQL2="SELECT c.c_id FROM content c
                           JOIN content_feedback cf ON c.c_id=cf.cf_c_id
                           JOIN analysis_results ar ON cf.cf_id=ar.ar_cf_id
                           WHERE ar.ar_id=".$v;
                    //print_r(array_values($v));      

                    eq($SQL2,$rs2);
                    while($result=mfa($rs2)){
                        if(!in_array($result,$id))    
                        {
                            array_push ($id, $result);
                            $SQL3="SELECT *,(SELECT count(*) FROM content_feedback WHERE cf_c_id = c_id AND cf_rating>'0' and cf_ep_id>'0') AS num_feedback FROM content where c_id=".$result[c_id];
                            eq($SQL3,$rs3);
                            while($video= mfa($rs3)){
                                if(check_vid_exist($video[c_url])){
                                    $video[c_date]=date('m/d/y',$video[c_date]);
                                    array_push($videos, $video);
                                    $video_num_rows++;
                                }
                            }    
                        }
                    }
                    //echo "ar_id=".$v[ar_id].",video_num_rows=".$video_num_rows.",video[c_id]=".$videos[c_id]."<br>";
                }
            $smarty = new Smarty;
            //print_r(array_values($gender));
            $smarty->assign(array("category_name"=>$category_name,
                                "country_name"=>$country_name,
                                "gender"=>$gender,
                                "video_num_rows" => $video_num_rows,  
                                "videos" => $videos));
        
            $smarty->display('advanced_search.tpl');
        }
        
    

}

function analyse($msg=''){
    $c_id=$_REQUEST[c_id];
    //echo $c_id;
    global $AnalysisResultId;
    
    $graphsToShowArray = explode(",", $_COOKIE['graphs_to_show']);
    $chkArray = array();
    foreach($graphsToShowArray as $key=>$value){
        $filteredStr = preg_replace('/[^A-Za-z0-9\-]/', '', $value);
        array_push($chkArray, trim($filteredStr)); 
    }
    $Ids=array();
    $SQL="SELECT ar_id
                FROM analysis_results ar
                JOIN content_feedback cf ON ar.ar_cf_id=cf.cf_id
                WHERE cf.cf_c_id=".$c_id;
    eq($SQL, $rs);
    while($data=mfa($rs)){
        if(in_array($data[ar_id], $AnalysisResultId))
            array_push ($Ids, $data[ar_id]);
    }
    //print_r(array_values($Ids));    //Ids contains ar_id of the filtered results corresponding to the video
    
    
    
}


?> 
