{extends file="video_list_header.tpl"}
{block name=body}

{if $userimage}
    <img src="{$userimage}" width="80" height="80">
{else}
    <img src="./images/dashboard/user.jpg" width="80" height="80">
{/if}

</br></br>
<p>Name: {$user_data.user_fname} {$user_data.user_lname}</p>
<p>Birthday: {$user_data.user_dob}</p>
<p>Email: {$user_data.user_email}</p>
<p>Zip: {$user_data.user_zipcode}</p>                                                
<p>Country: {$user_data.countries_name}</p>

<button class='btn-primary' onclick="javascript: window.location.href='account_info.php?act=edit_profile'">Edit</button>
<button class='btn-primary' onclick="javascript: window.location.href='watch_video.php'">Dashboard</button>

{/block}