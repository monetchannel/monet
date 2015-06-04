{extends file="video_list_header.tpl"}
{block name=body}
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong><em>Change Password</em></strong>
        </div>
    </div>

    <form id="new-pass-form" class="pass-form" onsubmit="javascript:return change_password()">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 align-center">
            <input type="password" id="user-old-pass" required class="form-control" placeholder="Old Password" name="old_pass">
            <br><br>
            <input type="password" id="user-new-pass" required class="form-control" placeholder="New Password" name="new_pass">
            <br><br>
            <input type="password" id="user-confirm-pass" required class="form-control" placeholder="Confirm New Password" name="confirm_new_pass">
            <br><br>
            <input type="submit" name="update_pass" value="Update Password" class="btn btn-default" id="update-pass-btn"/>
            <input type="hidden" name="act" value="change_password"/>
            <br>
            <br>
        </div>
        <div class="col-sm-4"></div>
    </form>
        <script>
            jQuery.ajax({
               type: "POST",
               url:"account_info.php",
               data: $('#new-pass-form').serialize(),
               success: function(js){
                   if(js!=1){
                       bootbox.alert(js) 
                       return false;
                   }
               },
               error: function(){
                   alert("Please try again. Server have not sent response.");
               }
            });
       </script>
    
{/block}
