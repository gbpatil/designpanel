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
                <h1>Project List</h1>
                <table id="tblProjectList">
                    <tr>
                        <th>Project Name</th>
                        <th>Designs</th>
                        <th>Clients</th>
                        <th>Add Design</th>
                        <th>Edit Project</th>
                        <th>Delete Project</th>
                    </tr>
                    <tr>
                        <td>Project Name</td>
                        <td>Designs</td>
                        <td>Clients</td>
                        <td>Add Design</td>
                        <td>Edit Project</td>
                        <td>Delete Project</td>
                    </tr>
                    <tr>
                        <td>Project Name</td>
                        <td>Designs</td>
                        <td>Clients</td>
                        <td>Add Design</td>
                        <td>Edit Project</td>
                        <td>Delete Project</td>
                    </tr>
                </table>
            </div>	
            <?php include "inc/inc-Footer.php"; ?>		
		</div>

        <?php include "inc/inc-FooterIncludes.php"; ?>
		
		<?php include "inc/inc-SEOCode.php"; ?>

    </body>
</html>
