/* all global function */

var uploadURL = "upload.php";

//=== Jquery Document Ready Function ===//
$(document).ready(function () {

    $("#imgDesignImage").hide();
    $('a#delete').hide();

    $('a#uploadFile').file();
    $('a#delete').click(function () {
        $('input#DesignImageFile').val("");
        $('#imgDesignImage').attr("src", "");
        $("#imgDesignImage").hide();
        $('a#delete').hide();

        $("#divMsg").html("Design removed. Upload new image!");
        $("#divMsg").addClass("Form-Error");

    });

    $('input#uploadFile').file().choose(function (e, input) {
        //== show progress
        $("#divProgress").toggle();

        input.upload(uploadURL, function (res) {
            //== remove progress
            $("#divProgress").toggle();
            
            if (res == "invalid") {
                $("#imgDesignImage").hide();
                $("#divMsg").html("Invalid file uploading! Please upload image file (jpg, gif or png)!");
                $("#divMsg").addClass("Form-Error");
            }
            else {
                $("#imgDesignImage").show();
                
                showMsg("#divMsg","Your design has been uploaded", true);
                
                $('#imgDesignImage').attr("src", "uploaded-designs/thumb_" + res);
                $('#aDesignImage').attr("href", "uploaded-designs/" + res);
                $('#DesignImageFile').val(res);
                $('#DesignImagePath').val("uploaded-designs/"+res);
                $('#DesignThumbFile').val("thumb_" + res);
                $('#DesignThumbPath').val("uploaded-designs/thumb_" + res);
                $('a#delete').show();
                $(this).remove();
            }
        }, '');
    });


    //==== FancyBox Calls ===//

    //--- Fancybox call for add design page
    $("#aDesignImage").fancybox({
    	openEffect	: 'elastic',
    	closeEffect	: 'elastic',

    	helpers : {
    		title : {
    			type : 'inside'
    		}
    	}
    });

});



/**** function to validate login form ****/
$("#frmLogin").submit(function (e) {
    var blnStatus = false;
    var strMsg = "Invalid Username or Password!";

    //e.preventDefault();

    if ($("#txtUsername").val().length == 0 || $("#txtPassword").val().length == 0) {
        blnStatus = false;
        showMsg("#divMsg", strMsg, false)
        return false;
    }
    else {
        //=== Common Ajax Function 
        $.ajax({
            url: 'ajax/ajax_login-check.php',
            type: 'POST',
            data: { username: $("#txtUsername").val(), userpass: $("#txtPassword").val() },
            dataType: 'json',
            beforeSend: function () {
                // this is where we append a loading image

            },
            success: function (data) {
                // successful request; do something with the data
                /*
                if (!data == Object) {
                blnStatus = false;
                showMsg("#divMsg",strMsg,false);
                return false;
                }
                else 
                {
                */
                
                blnStatus = true;
                $("#hdnid").val(data.uid);
                $("#hdnname").val(data.uname);
                //$(location).attr("href", "login-verify.php?uid="+data.uid);

                window.location.href = "login-verify.php?uid="+data.uid+"&uname="+data.uname;
                
                /*}*/
            },
            error: function (err) {
                // failed request; give feedback to user
                blnStatus = false;
                showMsg("#divMsg", "System error occured. Contact your admin.", false);
                //alert(err);
                return false;
            }
        });
    }

    if (blnStatus == false) {
        return false;
    }

});     //--- end of form submit function


$("#txtUsername, #txtPassword").change(function() {
    hideMsg("#divMsg");
});


/* function to validate create project form */
$("#frmCreateProject").submit(function(){

    var blnStatus = false;
    var strMsg = "";
    var blnBlank = false;

    if ($("#txtProjectName").val().length == 0) 
    {
        strMsg += "Enter Project Name<br>";
        blnBlank = true;
    }
    
    if ($("#txtProjectDesc").val().length <= 10) 
    {
        strMsg += "Enter Project Description (Min 10 Characters)<br>";
        blnBlank = true;
    }

    if(blnBlank == false)
    {
        $.ajax({
            url: "ajax/ajax_create-project.php",
            type: "POST",
            data: { name: $("#txtProjectName").val(), desc: $("#txtProjectDesc").val() },
            dataType: "html",
            beforeSend: function () {
                // this is where we append a loading image

            },
            success: function (data) {
                // successful request; do something with the data
                if (data == "" || data == null) {
                    blnStatus = false;
                    strMsg = "Some error occured while creating new project. Please contact your admin.";
                    $("#divMsg").show();
                    $("#divMsg").html(strMsg);
                    $("#divMsg").addClass("Form-Error");
                    return false;
                }
                else 
                {
                    blnStatus = true;
                    $("#divMsg").show();
                    $("#divMsg").html("Project added successfully");
                    $("#divMsg").addClass("Form-Success");
                    $("#frmCreateProject").reset();
                    return false;
                }
            },
            error: function (err) {
                // failed request; give feedback to user
                blnStatus = false;
                strMsg = "Some error occured while processing your request. Please contact your admin."
                $("#divMsg").show();
                $("#divMsg").html(strMsg);
                $("#divMsg").addClass("Form-Error");
                return false;            
            }
        });
    }

    if (blnStatus == false) {
        $("#divMsg").show();
        $("#divMsg").html(strMsg);
        $("#divMsg").addClass("Form-Error");
        return false;
    }
    
});

$("#txtProjectName, #txtProjectDesc").change(function() {
    hideMsg(el);
});

/**** function to validate login form ****/
$("#frmAddDesign").submit(function (e) {
    var blnStatus = false;
    var strMsg = "";
    var blnBlank = false;

    if ($("#DesignImageFile").val().length == 0) 
    {
        strMsg += "Upload Design Image<br>";
        blnBlank = true;
    }
    
    if ($("#txtDesignName").val().length == 0) 
    {
        strMsg += "Enter Design Name<br>";
        blnBlank = true;
    }
    
    if ($("#txtDesignDesc").val().length == 0) 
    {
        strMsg += "Enter Design Description<br>";
        blnBlank = true;
    }

    if(blnBlank == false)
    {
        /*
        alert( $("#DesignImageFile").val() + 
            $("#DesignImagePath").val() +
            $("#DesignThumbFile").val() +
            $("#DesignThumbPath").val() +
            $("#txtDesignName").val() +
            $("#txtDesignDesc").val()
        );
        */

        //=== Common Ajax Function 
        $.ajax({
            url: 'ajax/ajax_add-design.php',
            type: 'POST',
            data: { 
                imgname: $("#DesignImageFile").val(), 
                imgpath: $("#DesignImagePath").val(),
                thumbname: $("#DesignThumbFile").val(),
                thumbpath: $("#DesignThumbPath").val(),
                designname: $("#txtDesignName").val(),
                designdesc: $("#txtDesignDesc").val()
            },
            beforeSend: function () {
                // this is where we append a loading image
                
            },
            success: function (data) {
                
                // successful request; do something with the data
                if (data == "" || data == null) {
                    blnStatus = false;
                    showMsg("#divMsg", "Error occured while adding image", false);
                    return false;
                }
                else {
                    blnStatus = true;
                    //$("#frmAddDesign").reset();
                    showMsg("#divMsg", "Your image added successfully", true);
                    return false;
                }
            },
            error: function (err) {
                // failed request; give feedback to user
                blnStatus = false;
                showMsg("#divMsg", "Error occured while processing request", false);
                return false;
            }
        });
    }

    if (blnStatus == false) {
        showMsg("#divMsg", strMsg, false);
        return false;
    }

});    //--- end of form submit function


$("#txtDesignName, #txtDesignDesc").change(function() {
    hideMsg("#divMsg");
});


function showMsg(el, msg, status)
{
    $(el).show("fast");
    $(el).html(msg);
    
    if(status == true)
    {
        //=== success
        $(el).removeClass();    
        $(el).addClass("Form-Success");
    }
    else
    {
        //=== error
        $(el).removeClass();    
        $(el).addClass("Form-Error");   
    }

}

function hideMsg(el)
{
    $(el).hide('slow', function(){
        $(el).removeClass();
        $(el).html("");    
    });
}