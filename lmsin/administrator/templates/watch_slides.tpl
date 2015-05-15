<style>
.boxy-content {
padding:0px;
}

</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td></td>
  </tr>
</table>

<script>
	var Onerotate_delay = 2000; // delay in milliseconds (5000 = 5 secs)
	Onecurrent = 0;
	function Onenext() {
		if (document.Oneslideform.Oneslide[Onecurrent+1]) {
			document.images.Oneshow.src = document.Oneslideform.Oneslide[Onecurrent+1].value;
			document.getElementById('emotion').innerHTML = document.getElementById(document.Oneslideform.Oneslide[Onecurrent+1].value).innerHTML;
			document.Oneslideform.Oneslide.selectedIndex = ++Onecurrent;
	   	}
		else Onefirst();
	}
	function Oneprevious() {
		if (Onecurrent-1 >= 0) {
			document.images.Oneshow.src = document.Oneslideform.Oneslide[Onecurrent-1].value;
			document.getElementById('emotion').innerHTML = document.getElementById(document.Oneslideform.Oneslide[Onecurrent-1].value).innerHTML;
			document.Oneslideform.Oneslide.selectedIndex = --Onecurrent;
		}
		else Onelast();
	}
	function Onefirst() {
		Onecurrent = 0;
		document.images.Oneshow.src = document.Oneslideform.Oneslide[0].value;
		document.getElementById('emotion').innerHTML = document.getElementById(document.Oneslideform.Oneslide[0].value).innerHTML;
		document.Oneslideform.Oneslide.selectedIndex = 0;
	}
	function Onelast() {
		Onecurrent = document.Oneslideform.Oneslide.length-1;
		document.images.Oneshow.src = document.Oneslideform.Oneslide[Onecurrent].value;
		document.getElementById('emotion').innerHTML = document.getElementById(document.Oneslideform.Oneslide[Onecurrent].value).innerHTML;
		document.Oneslideform.Oneslide.selectedIndex = Onecurrent;
	}
	function Oneap(text) {
		document.Oneslideform.Oneslidebutton.value = (text == "Stop") ? "Start" : "Stop";
		Onerotate();
	}
	function Onechange() {
		Onecurrent = document.Oneslideform.Oneslide.selectedIndex;
		document.images.Oneshow.src = document.Oneslideform.Oneslide[Onecurrent].value;
		document.getElementById('emotion').innerHTML = document.getElementById(document.Oneslideform.Oneslide[Onecurrent].value).innerHTML;
	}
	function Onerotate() {
		if (document.Oneslideform.Oneslidebutton.value == "Stop") {
			Onecurrent = (Onecurrent == document.Oneslideform.Oneslide.length-1) ? 0 : Onecurrent+1;
			document.images.Oneshow.src = document.Oneslideform.Oneslide[Onecurrent].value;
			document.getElementById('emotion').innerHTML = document.getElementById(document.Oneslideform.Oneslide[Onecurrent].value).innerHTML;
			document.Oneslideform.Oneslide.selectedIndex = Onecurrent;
			window.setTimeout("Onerotate()", Onerotate_delay);
		}
	}
</script>
  <TABLE border="0" cellspacing="0" cellpadding="0">
    <TR>
      <TD>
        <form name="Oneslideform" >
          <DIV align="center">
            <TABLE width="490" border="1" cellspacing="0" cellpadding="4" bordercolor="#3b9bc4">
              <TR>
                <TD bgcolor="#FFFFFF">
                  <DIV align="center"><IMG src="{$pic[0][0]}" width="470" height="340" name="Oneshow" border="0"></DIV>
                </TD>
              </TR>
              <TABLE>
              <col width="160">
  			  <col width="160">
  			  <col width="160">
              <TR>
                <TD bgcolor="#3b9bc4">
                  <DIV align="center">
                    <SELECT name="Oneslide" onChange="Onechange();">
						<OPTION value="{$pic[0][0]}" selected>{$pic[0][1]}</OPTION>
						{assign var="pic_pl" value=$pic[0][0]}
						{foreach from=$pic key=k item=f}
	                    	{if $f[0] ne $pic_pl}
	                      		<OPTION value="{$f[0]}">{$f[1]}</OPTION>
	                    	{/if}
						{/foreach}
                    </SELECT>
                  </DIV>
                  </TD>
                  <TD bgcolor="#3b9bc4">
                  <DIV align="center">
                    <INPUT type=button onClick="Oneprevious();" value="<<" title="Previous">
                    <INPUT type=button name="Oneslidebutton" onClick="Oneap(this.value);" value="Start" title="AutoPlay">
                    <INPUT type=button onClick="Onenext();" value=">>" title="Next">
                  </DIV>
                </TD>
                  <TD bgcolor="#3b9bc4">
                  <DIV align="center" id="emotion" bgcolor="#FFFFFF">
                  	{$pic[0][2]}
                  </DIV>
                  </TD>
                  {foreach from=$pic key=k item=f}
	                 <DIV id="{$f[0]}" style="display: none;">{$f[2]}</DIV>
				  {/foreach}
                
              </TR>
              </TABLE>
            </TABLE>
          </DIV>
        </form>
      </TD>
    </TR>
  </TABLE>