 <?php


include_once 'dbconfig.php';
    $user_id = $_GET['id'];
    echo $user_id;
    
/*
if(!$user->is_loggedin())
{
 $user->redirect('index.php');
}

*/
    //$user_id = $_SESSION['user_session'];
    $stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

    //print($userRow['first_name']);
    //print($userRow['last_name']);
    $arrFirstNames = array();
    $arrLastNames = array();

        //API Key testbank simple try to test api of our classmate
        $url = 'http://lilyfactory.net/AliAPI/getPeopleList.php?APIKey=85f7155c69253b860d6707f37d29820d02f670837f91b7988132ca735ae6028e';

        $json = file_get_contents($url);

        $obj = json_decode($json, true);
        $ErrorCode = $obj['ErrorCode'];
        $Message = $obj['Message'];

        if ($ErrorCode == 100) {
            foreach($obj['People'] as $item) {
                //echo 'First Name: ' . $item['firstName'] . '     ';
                //echo 'Last Name: ' . $item['lastName'] . '<br />';
                array_push($arrFirstNames, $item['firstName']);
                array_push($arrLastNames, $item['lastName']);
                
            }
        }
        else {
            echo $ErrorCode . " " . $Message;
        }
  //check if your user is tracked by the government  
if (array_search(($userRow['first_name']),$arrFirstNames))
{
    $idarrnames = array_search(($userRow['last_name']),$arrFirstNames,true);
    if (array_search(($userRow['last_name']),$arrLastNames))
    {
        $idarrlastnames = array_search(($userRow['last_name']),$arrLastNames,true);
    }
    if ($idarrnames == $idarrlastnames)
    {
        echo "The user is inside tracked by the Government";
    }
    else
    {
    //echo $idarrlastnames;
    echo "The user is not tracked by the Government";
    }
    //echo $idarray;
    
}
else
{
    echo "The user is not tracked by the Government";
}


    




?>
