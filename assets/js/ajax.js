$(document).ready(function() {
	$("#create-user").submit(function(evt){
		var formDetails = [];
		evt.stopPropagation();
		$("#create-user input").each(function (){
			formDetails[$(this).attr('name').toLowerCase()] = {"val" : this.value, "obj" : $(this)};
		});
		
		//Lets validate the crap out of this form
		var error = false;
		for (var key in formDetails) {
			if(formDetails[key].val == undefined || formDetails[key].val == ""){
				formDetails[key].obj.parent().parent().attr("class","form-group has-error");
				error = true
			} else if (formDetails[key].val.length < 5) {
				formDetails[key].obj.parent().parent().attr("class","form-group has-warning");
			} else {
				formDetails[key].obj.parent().parent().attr("class","form-group");
			}
		};

		if(formDetails['email_address'].val.indexOf('@') == -1 || formDetails['email_address'].val.indexOf('.') == -1){
			formDetails['email_address'].obj.parent().parent().attr("class","form-group has-error");
			error = true;
		}
		if(error == false){
			dataObj = {}
			for (var key in formDetails) {
				dataObj[key] = formDetails[key].val;
			}

			$.ajax({
			  type: "POST",
			  url: "index.php?c=user&m=add",
			  data: dataObj
			})
			 .done(function(res) {
			 	$("#userform-container").html('<div class="alert alert-success">' +  JSON.parse(res).message + '</div>');
			 	$("p.main_body_content").html(JSON.parse(res).main_body_content);
			});
					}
		return false;
	});
});