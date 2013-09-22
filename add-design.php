<!DOCTYPE html>
    <?php include "session.php"; ?>   
    <?php include "global-functions.php"; ?>
	<?php include "inc/inc-IENoJS.php"; ?> 
    <head>
        <?php include "inc/inc-MetaData.php"; ?> 

        <title></title>
        
        <?php include "inc/inc-HeadIncludes.php"; ?>
    </head>
    <body>

        <?php include "inc/inc-NoJSMsg.php"; ?>

        <div id="container">
		    <?php include "inc/inc-Header.php"; ?>
            <?php include "inc/inc-HeaderMenu.php"; ?>
            <?php include "inc/inc-LeftNav.php"; ?>	
            <div id="divBody">
                

                <div id="divFormAddDesign" class="Form-Outer-Div FormDiv">
                    <form id="frmAddDesign" method="post">

                        <h1>Add Design</h1>    
                        
                        <div id="divMsg"></div>
                        
                        <div class="divFrmElSpacer"></div>
                        
                        <label for="DesignImageFile">Upload Design Image</label>    
                        <div class="divFrmElSpacer"></div>
                        <a href="javascript: return false;" id="uploadFile" title="Upload" class="clsUploadButton">UPLOAD</a>
						<a href="javascript: return false;" id="delete" title="Delete" class="clsUploadButton">REMOVE</a>
						<br><br>
                        <a id="aDesignImage" href="" title=""><img src="no-value" id="imgDesignImage" alt="your uploaded design"></a>
                        
						<input type="hidden" value="" id="DesignImageFile" name="DesignImageFile">
                        <input type="hidden" value="" id="DesignImagePath" name="DesignImageFile">
                        <input type="hidden" value="" id="DesignThumbFile" name="DesignImageFile">
                        <input type="hidden" value="" id="DesignThumbPath" name="DesignImageFile">

                        <div class="divFrmElSpacer"></div>

                        <label for="txtDesignName">Design Name</label>    
                        <input type="text" id="txtDesignName" maxlength="100">

                        <div class="divFrmElSpacer"></div>

                        <label for="txtDesignDesc">Design Description</label>    
                        <textarea id="txtDesignDesc"></textarea>

                        <div class="divFrmElSpacer"></div>

                        <input type="submit" id="btnSubmit" value="Upload Design">
                    </form>                    
                </div>
            </div>	
            <?php include "inc/inc-Footer.php"; ?>		
		</div>

        <?php include "inc/inc-FooterIncludes.php"; ?>
		
		<?php include "inc/inc-SEOCode.php"; ?>

    </body>
</html>
