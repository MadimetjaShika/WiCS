$(document).ready(function() {
        var newFieldCount = 0;
        var formFields = new Array();
        var divName = "";
        
        $("#add").click(function (e) {
                e.preventDefault();

                newFieldCount++;
                divName = "fieldContainer_" + newFieldCount;
                
                $("#items").append(
                        '<div id="'+divName+'">' + 
                                '<input type="text" class="form-control" id="fieldName_'+ newFieldCount +'" name="fieldName_'+ newFieldCount +'" placeholder="Field Name">' +
                                '<input type="text" class="form-control" id="fieldDescription_'+ newFieldCount +'" name="fieldDescription_'+ newFieldCount +'" placeholder="Field Description">' +
                                '<select class="form-control fieldType" id="fieldType_'+ newFieldCount +'" name="fieldType_'+ newFieldCount +'">' +
                                        '<option value="" disabled selected>Select field type...</option>' +
                                        '<option value="alpha">Alpha</option>' +
                                        '<option value="alphaNumeric">Alpha-Numeric</option>' +
                                        '<option value="costCentre">Cost Centre</option>' +
                                        '<option value="currency">Currency</option>' +
                                        '<option value="date">Date</option>' +
                                        '<option value="dropDown">Drop-Down</option>' +
                                        '<option value="numeric">Numeric</option>' +
                                '</select>' +
                                '<div id="fieldTypeValidation_'+ newFieldCount +'">' +   
                                '</div><br/>' +
                                '<a  href="javascrip:;" class="delete">Remove Field</a>' +
                        '</div><br/>'
                );
                formFields.push(divName);
        });
  
        $("body").on("change", ".fieldType", function (e) {
                e.preventDefault();
                
                callerFieldID = this.id;
                var temp = callerFieldID.indexOf("_");
                fieldNumber = callerFieldID.substr(temp+1);

                $('#fieldTypeValidation_'+fieldNumber).empty();
                
                var dropDownElement = document.getElementById("fieldType_"+fieldNumber);
                var selectedOption = dropDownElement.options[dropDownElement.selectedIndex].value;
                
                if( selectedOption == "alpha" ){
                        $('#fieldTypeValidation_'+fieldNumber).append('<input type="text" id="maxLen'+fieldNumber+'" name="maxLen'+fieldNumber+'" class="form-control" placeholder="Maximum Text Length"/>');
                }
                else if( selectedOption == "alphaNumeric" ){
                        $('#fieldTypeValidation_'+fieldNumber).append('<input type="text" id="minLen'+fieldNumber+'" name="minLen'+fieldNumber+'" class="form-control" placeholder="Minimum length"/>');
                        $('#fieldTypeValidation_'+fieldNumber).append('<input type="text" id="maxLen'+fieldNumber+'" name="maxLen'+fieldNumber+'" class="form-control" placeholder="Maximum length"/>');
                }
                else if( selectedOption == "costCentre" ){
                        $('#fieldTypeValidation_'+fieldNumber).append(
                                '<div class="alert alert-info alert-dismissable">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                                        '<i class="fa fa-info-circle"></i>Cost Centre Set!' +
                                '</div>'
                                );
                }
                else if( selectedOption == "currency" ){
                        $('#fieldTypeValidation_'+fieldNumber).append(
                                '<select class="form-control currencyType" id="currencyType_'+ fieldNumber +'" name="currencyType_'+ fieldNumber +'">' +
                                        '<option value="" disabled selected>Select currency...</option>' +
                                        '<option value="zar">ZAR</option>' +
                                        '<option value="USD">USD</option>' +
                                        '<option value="gbp">GBP</option>' +
                                        '<option value="yen">YEN</option>' +
                                        '<option value="nzd">NZD</option>' +
                                        '<option value="any">Any</option>' +
                                '</select>'
                                );
                }
                else if( selectedOption == "date" ){
                        $('#fieldTypeValidation_'+fieldNumber).append(
                                '<div class="alert alert-info alert-dismissable">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                                        '<i class="fa fa-info-circle"></i>Date Set!' +
                                '</div>'
                                );
                }
                else if( selectedOption == "dropDown" ){
                        $('#fieldTypeValidation_'+fieldNumber).append(
                                '<a  href="javascript:;" class="addDropDownOption" id="addDropDownOption_'+fieldNumber+'" >Add Option</a>' +
                                '<input type="text" class="form-control" id="dropDownOption_'+ fieldNumber +'" name="dropDownOption_'+ fieldNumber +'" placeholder="Drop Down Option...">'
                                );
                }
                else if( selectedOption == "numeric" )
                {
                        $('#fieldTypeValidation_'+fieldNumber).append('<input type="text" id="minVal'+fieldNumber+'" name="minVal'+fieldNumber+'" class="form-control" placeholder="Minimum value"/>');
                        $('#fieldTypeValidation_'+fieldNumber).append('<input type="text" id="maxVal'+fieldNumber+'" name="maxVal'+fieldNumber+'" class="form-control" placeholder="Maximum value"/>');
                }
        });
        
        $("body").on("click", ".addDropDownOption", function (e) {
                e.preventDefault();

                callerFieldID = this.id;
                var temp = callerFieldID.indexOf("_");
                fieldNumber = callerFieldID.substr(temp+1);

                $('#fieldTypeValidation_'+fieldNumber).append('<input type="text" class="form-control" id="dropDownOption_'+ fieldNumber +'" name="dropDownOption_'+ fieldNumber +'" placeholder="Drop Down Option...">');
        });

        $("body").on("click", ".delete", function (e) {
                e.preventDefault();
                $(this).parent("div").remove();
                newFieldCount--;
        });

        $("#submitCreateFormButton").click(function (e) {

                $('#createNewSpreadsheetForm').append('<input type="hidden" id="newFieldsInput" name="newFieldsInput" />');
                
                var hiddenInput = document.getElementById("newFieldsInput");
                
                hiddenInput.value = formFields.toString();

                document.getElementById("createNewSpreadsheetForm").submit();

                /*
                var submitArray = new Array();
                submitArray.push(form);
                submitArray.push(formFields);

                var postData = $(submitArray).serializeArray();
                var formURL = $(form).attr("action");

                alert("Serialized  and sending to: " + formURL);

                $.ajax(
                {
                        url : formURL,
                        type: "POST",
                        data : postData,
                        success:function(data, textStatus, jqXHR) 
                        {
                            alert("sent successfuly");
                        },
                        error: function(jqXHR, textStatus, errorThrown) 
                        {
                            alert("OOPS!");
                        }
                });
                e.unbind(); //unbind. to stop multiple form submit.*/
        });
});

function validateForm(){
    alert(serverValidationRules);
}

function prepareValidation(rules){
    alert('inside');
}