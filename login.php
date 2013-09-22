<!DOCTYPE html>
	<?php include "inc/inc-IENoJS.php"; ?> 
    <head>
        <?php include "inc/inc-MetaData.php"; ?> 
        <title></title>
        <?php include "inc/inc-HeadIncludes.php"; ?>
    </head>
    <body>
        
		<?php include "inc/inc-NoJSMsg.php"; ?>

        <div id="container">
		    <div id="divLogin">
                <form id="frmLogin" method="post">
                    
					<h2>Log In</h2>

					<div id="divMsg"></div>

                    <label for="lblUsername">Username</label>
                    <input type="text" id="txtUsername" maxlength="10">

                    <div class="divFrmElSpacer"></div>

                    <label for="lblUsername">Password</label>
                    <input type="password" id="txtPassword" maxlength="10">

                    <div class="divFrmElSpacer"></div>
                    <div class="divFrmElSpacer"></div>

                    <input type="submit" id="btnLogin" value="Login">

                    <input type="hidden" id="hdnid" name="hdnid">
                    <input type="hidden" id="hdnname" name="hdnname">

                </form>
            </div>	
            
		</div>
			
		<?php include "inc/inc-FooterIncludes.php"; ?>
		<?php include "inc/inc-SEOCode.php"; ?>

    </body>
</html>
