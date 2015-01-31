$(document).ready(function() {
	var newFieldCount = 0;
	
	$("#add").click(function (e) {
		newFieldCount++;
		
		$("#items").append(
			'<div>' + 
				'<input type="text" id="fieldName'+ newFieldCount +'" name="fieldName'+ newFieldCount +'" placeholder="Field Name">' +
				'<input type="text" id="fieldDescription'+ newFieldCount +'" name="fieldDescription'+ newFieldCount +'" placeholder="Field Description">' +
				'<select class="form-control fieldType" id="fieldType'+ newFieldCount +'" name="fieldType'+ newFieldCount +'">' +
					'<option value="null"></option>' +
					'<option value="text">text</option>' +
					'<option value="drop-down">drop-down</option>' +
					'<option value="number">number</option>' +
					'<option value="password">password</option>' +
				'</select>' +
				'<a  href="#" class="delete">Remove Field</a>' +
				'<div id="fieldTypeValidation'+ newFieldCount +'">' +	
				'</div><br/>' +
			'</div>'
		);
	});
  
	$("body").on("change", ".fieldType", function (e) {
		
		callerFieldID = this.id;
		fieldNumber = callerFieldID.substr(callerFieldID.length - 1);
	
		$('#fieldTypeValidation'+fieldNumber).empty();
		
		var dropDownElement = document.getElementById("fieldType"+fieldNumber);
		var selectedOption = dropDownElement.options[dropDownElement.selectedIndex].value;
		
		if( selectedOption == "drop-down" )
		{
			
		}
		else if( selectedOption == "number" )
		{
			$('#fieldTypeValidation'+fieldNumber).append('<input type="text" placeholder="Minimum value"/>');
			$('#fieldTypeValidation'+fieldNumber).append('<input type="text" placeholder="Maximum value"/>');
		}
		else if( selectedOption == "text" )
		{
			$('#fieldTypeValidation'+fieldNumber).append('<input type="text" placeholder="Maximum Text Length"/>');
		}
		else if( selectedOption == "password" )
		{
			$('#fieldTypeValidation'+fieldNumber).append('<input type="text" placeholder="Password Blah Blah"/>');
		}
	});
	
	$("body").on("click", ".delete", function (e) {
		$(this).parent("div").remove();
		newFieldCount--;
	});
  
});