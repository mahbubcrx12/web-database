$(function() {
    $('#fileuload').hide();
	$('#choicefiletype').hide();
	$('#companyname').hide();
	$('#paidstatus').hide();
	
    $('#filetype').change(function(){
        if($('#filetype').val() == '0') {
            $('#fileuload').show(); 
			$('#choicefiletype').show();
			$('.filead').attr("disabled",true);
			$('#companyname').hide();
		$('#paidstatus').hide();
        }
		else if($('#filetype').val() == '1') {
           $('#fileuload').show();
			$('#choicefiletype').show();
		$('#companyname').show();
		$('#paidstatus').show();
		$('.filead').attr("disabled",false);
        }
			else {
             $('#fileuload').hide();
			$('#choicefiletype').hide();
		$('#companyname').hide();
		$('#paidstatus').hide();
        } 
    });
});