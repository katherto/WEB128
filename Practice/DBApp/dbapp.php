<!DOCTYPE html>
<html lang="en">  
    <head>    
        <meta charset="utf-8" />    
        <meta http-equiv="x-ua-compatible" content="ie=edge" />    
        <meta name="viewport" content="width=device-width, initial-scale=1" />    
        <title>Simple Database App</title>    
        <style>
          label { display: block; margin: 5px 0; }
          table { border-collapse: collapse; border-spacing: 0; } 
          td, th { padding: 5px; border-bottom: 1px solid #aaa; }
        </style>
    </head>  
    <body>    
        <h1>Simple Web Database App</h1>       
        <input type='button' value="Add User" onclick="document.getElementById('insertform').style.display = 'block'; document.getElementById('selectform').style.display = 'none';" />&nbsp;&nbsp;
        <input type='button' value="Find User"onclick="document.getElementById('insertform').style.display = 'none'; document.getElementById('selectform').style.display = 'block';" />&nbsp;&nbsp;
        <br/><br/>

        <form id="insertform" action="dbapp.php" method="post" style="display:none;">
            <h2>Add a User</h2>
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname"><br/>
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname"><br/>
            <label for="email">Email Address</label>
            <input type="text" name="email" id="email"><br/>
            <label for="department">Department</label>
            <input type="text" name="department" id="department"><br/>
            <label for="location">Location</label>
            <input type="text" name="location" id="location"><br/>
            <input type="submit" name="action" value="Insert Record">
            <?php if ($_REQUEST['action'] == "Insert Record") { require_once 'insert.php'; }?>            
        </form>

        <form id="selectform" action="dbapp.php" method="post" style="display:none;"> 
            <h2>Find User</h2> 
            <label for="query">
                Last Name: <input type="text" id="lastname" name="lastname"><br />
                -- or --<br />
                Department: <input type="text" id="department" name="department"/>
            </label><br />
            <input type="submit" name="action" value="View Results"/> 
            <?php if ($_REQUEST['action'] == "View Results") { require_once 'select.php'; }?>
        </form>
    </body>
</html>