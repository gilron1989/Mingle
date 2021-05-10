<?php
                
require_once('init.php');
$resulTable="";

if ($_GET)
{
    $subject=$_GET['subject'];
    echo $subject;
}



function getSubjects()
{
    global $database;
    $result=$database->query("select * from subject");
    if ($result){
        $subjects = array();
        if ($result->num_rows>0)
        {
            while($row=$result->fetch_assoc()){
              array_push($subjects,$row);
            }
        }
    }
    return $subjects;
}

?>

<!DOCTYPE html> 
<html> 
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/mingleSelectStyle.css">
        <title>Mingle Selection</title>
   </head>
   <body>


   <header class = "my-header">
        <div class = "logo">
            <h3 class = logo-name>Mingle</h3>
        </div>

        <?php
            echo "<div class='initials'>
                        <p>Hi, ".$_SESSION['firstName'].' '.$_SESSION['lastName']."</p>
                        <button><a href ='logout.php'>Logout</a></button>
                    </div>";
        ?>
    </header>

        <main>
            <h3 class = "intro-text">What's on your mind today?<br>Choose a topic </h3>
                <div class="my-grid">
                    <?php
                        require_once('init.php');
                        $res=getSubjects();

                        for ($i=0; $i<sizeof($res); $i++)
                        {

                            echo '<div class="grid-item" style="background-image: url('.$res[$i]['img'].')" data-id = '.$res[$i]["meetingId"].'>
                                <h3>'.$res[$i]['subject'].'</h3>
                                <a target="_blank" href = "'.$res[$i]["url"].'"><div class = "black-background"></div></a>';
                                if ($res[$i]['url']=='')
                                {
                                        echo '<div class = "lock-indicator">Mingeling\'s OFF</div>';
                                }
                                elseif($res[$i]['status'] == 1){
                                    echo '<div class = "on-indicator">Mingeling\'s ON</div>';
                                }elseif($res[$i]['status'] != 1){
                                    echo'<div class = "off-indicator">Mingeling\'s await </div>';
                                }
                                
                                if($_SESSION['user_email'] == 'admin@admin.com')
                                {
                                    if($res[$i]['url']=='')
                                    {
                                        echo '<button class = "admin-btn" onclick = "openRoom(this)" data-subject = '.$res[$i]['subject'].'>Open Room</button>';
                                    }
                                }
                           echo 
                           '</div>';
                        }
                    ?>
                </div>                 
        </main>

	</body>

    <footer>
        <div class="footer">
            <ul>
                <li>About</li>
                <li>Blog</li>
                <li>Careers</li>
            </ul>            
            <ul>
                <li>Branches</li>
                <li>Address</li>
                <li>Careers</li>
            </ul>            
            <ul>
                <li>Support</li>
                <li>FAQ</li>
                <li>Help Docs</li>
            </ul>
        </div>
    <div class="copyright"><b>©  2021  Copyright: G T A <b></div>

  </footer>

<script src = "JS/script.js"></script>
</html>