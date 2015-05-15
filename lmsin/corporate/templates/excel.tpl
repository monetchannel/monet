{extends file="index.tpl"} {block name=body}
 {if $msg}
	<div class="alert alert-success margin-top">  
  	<a class="close" data-dismiss="alert">×</a>  
 {$msg}  
</div>  
{/if}
 
<div class="alert alert-success margin-top" id="final" style="display: none">Users Updated in Database</div>
<form id="excel" name="excel" action="excel.php" method="post" enctype="multipart/form-data">

	<h3><b><u>Please upload the excel file as per the following Format</u></b></h3>
	<table class="table table-bordered"> 
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Gender</th>
								<th>Birth Year</th>
								<th>Email</th>
                               	<th>Password</th>
                                <th>Country</th>
                                <th>State</th>
								<th>Zip Code</th>
                              </tr>
						</thead>
						<tbody>
							<tr>
								<td class="field-label col-xs-4 col-sm-4 col-md-2  text-align">----- </td>
								<td class="field-label col-xs-4 col-sm-4 col-md-2  text-align">----- </td>
								<td class="field-label col-xs-4 col-sm-4 col-md-2  text-align">----- </td>
								<td class="field-label col-xs-4 col-sm-4 col-md-2  text-align">----- </td>
								<td class="field-label col-xs-4 col-sm-4 col-md-2  text-align">----- </td>
								<td class="field-label col-xs-4 col-sm-4 col-md-2  text-align">----- </td>
								<td class="field-label col-xs-4 col-sm-4 col-md-2  text-align">----- </td>
								<td class="field-label col-xs-4 col-sm-4 col-md-2  text-align">----- </td>
								<td class="field-label col-xs-4 col-sm-4 col-md-2  text-align">----- </td>
							</tr>
                         </tbody>
	</table>
	
	<table>
		<tr>
			<td>Select File</td>
			<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
			<td><input type="submit" value="Upload File" name="submit"></td>
		</tr>
			<input type="hidden" id="excel" value="insert_excel" name="act">
			
	</table>
	
</form>

<script type="text/javascript">
function check_excel()
{
	
	
		var FileName  = document.forms.excel.excel.value;
        var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
        //var FileSize = fieldObj.files[0].size;
        //var FileSizeMB = (FileSize/10485760).toFixed(2);

        if (FileExt != "xlsx")
        {
            var error = "File type : "+ FileExt+"\n\n";
           
            error += "Please make sure your file is in xlsx \n\n";
            alert(error);
            return false;
        }
        return true;
	}
		  
		
</script>
{/block}
