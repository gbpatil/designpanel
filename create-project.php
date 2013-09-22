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
                
                <div id="divFormCreateProject" class="Form-Outer-Div">
                    <form id="frmCreateProject" method="post">

                        <h1>Create Project</h1>

                        <div id="divMsg"></div>

                        <div class="divFrmElSpacer"></div>
                        
                        <label for="txtProjectName">Project Name</label>    
                        <input type="text" id="txtProjectName" maxlength="100">

                        <div class="divFrmElSpacer"></div>

                        <label for="txtProjectDesc">Project Description</label>    
                        <textarea id="txtProjectDesc"></textarea>

                        <div class="divFrmElSpacer"></div>

                        <input type="submit" id="btnSubmit" value="Create Project">

                        <input type="hidden" id="hdnMsg">
                    </form>                    
                </div>
            </div>	
            <?php include "inc/inc-Footer.php"; ?>		
		</div>

        <?php include "inc/inc-FooterIncludes.php"; ?>
		
		<?php include "inc/inc-SEOCode.php"; ?>

    </body>
</html>
