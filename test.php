
<head>
<script type="text/javascript" src="./js/jquery-1.7.min.js"></script>
</head>

<script type="text/javascript">
			$(document).ready(function(){		
				
				$('.del').live('click',function(){
					$(this).parent().parent().remove();
				});
				
				$('.add').live('click',function(){
					$(this).val('Delete');
					$(this).attr('class','del');
					var appendTxt = "<tr><td><input type='text' name='site[]' class='span1' /></td><td><select name='sampletype[]' id='select' class='span2' ><option>Select Sample Type<option>Select Sample Type</option><option>New paper</option><option>Aged paper</option><option>New pressboard </option><option>Aged pressboard</option>	option>Others</option></select></td><td><select name='samplecondition[]' id='select' class='span2' ><option>Select Sample Condition</option><option>Impregnated</option><option>Not impregnated</option><option>Others</option></select></td><td><input type='text' name='samplingpoint[]' class='span1'/></td><td><input type='text'name='txno[]' class='span1'/></td><td><input type='text' name='serialno[]' class='span1'/></td><td><input type='text' name='mnemonic[]' class='span1'></td><td><input type='text' name='loadmva[]' class='span1'/></td><td><input type='text' name='voltages[]' class='span1'/></td><td><input type='text' name='maker[]' class='span1'/></td><td><input type='text' name='yearbuilt[]' class='span1'/></td><td><input type='text' name='sampleremark[]' class='span1'/></td><td><input type='button' class='add' value='Add More' /></td></tr>";
					$("tr:last").after(appendTxt);			
				});        
			});
		</script>
		
		<table id="options-table">					
			<tr>
				<td>Site</td>
				<td>Sample Type</td>
				<td>Sample Condition</td>
				<td>Sampling Point</td>
				<td>Tx No.</td>
				<td>Serial No.</td>
				<td>Mnemonic</td>
				<td>Load MVA</td>
				<td>Voltages (KV)</td>
				<td>Maker</td>
				<td>Year Bulit</td>
				<td>Sample Remark</td>
				<td>&nbsp;</td>
			</tr>
				<tr>
				<td><input type="text" name="site[]" class='span1' /></td>
				<td>
				<select name="sampletype[]" id="select" class='span2' >
				<option>Select Sample Type</option>
				<option>New paper</option>
				<option>Aged paper</option>
				<option>New pressboard </option>
				<option>Aged pressboard</option>
				<option>Others</option>
				</select>
				</td>
				<td>
				<select name="samplecondition[]" id="select" class='span2' >
				<option>Select Sample Condition</option>
				<option>Impregnated</option>
				<option>Not impregnated</option>
				<option>Others</option>
				</select>
				</td>
				<td><input type="text" name="samplingpoint[]" class='span1' /></td>
				<td><input type='text'name='txno[]' class='span1'/></td>
				<td><input type='text' name='serialno[]' class='span1'/></td>
				<td><input type='text' name='mnemonic[]' class='span1'></td>
				<td><input type='text' name='loadmva[]' class='span1'/></td>
				<td><input type='text' name='voltages[]' class='span1'/></td>
				<td><input type='text' name='maker[]' class='span1'/></td>
				<td><input type='text' name='yearbuilt[]' class='span1'/></td>
				<td><input type='text' name='sampleremark[]' class='span1'/></td>
				<td><input type="button" class="add" value="Add More" /></td>
			</tr>
		</table>