
<html>
    <head> 
    <style>

@font-face {
  font-family: 'PacFont';
  src: url('css/fonts/PAC-FONT.ttf');
}

@font-face {
  font-family: 'ArcadeClassic';
  src: url('css/fonts/ARCADECLASSIC.ttf');
}

body {
    background-color: Black;
    color:#ffffff;
    /*background-image: url("http://www.classicgaming.cc/classics/pac-man/images/web/web-maze.gif");*/
    background-image: url("https://noobtuts.com/content/unity/2d-pacman-game/unity_pacman.gif");
    /*background-image: url("https://images7.alphacoders.com/416/thumb-350-416822.jpg");*/
    /*background-image: url("https://i.pinimg.com/originals/7d/b7/d7/7db7d7c805ef78784e4b95978c92c9c9.jpg");*/
    background-repeat:no-repeat;
    background-attachment: fixed;
    background-position: center; 
    background-size: 1400px 1000px;
    font-size:25px;
}



h1 {
   
    text-align: center;
    padding-top:20px;
    padding-bottom:20px;
    font-family:"PacFont";
    color:orange;
    background-color: Black;
} 

/*.left{
    background-image: url("https://i.pinimg.com/originals/7d/b7/d7/7db7d7c805ef78784e4b95978c92c9c9.jpg");
    float:left; 
    width:50%;
    height:100%;
}

.right{
    
    float:left; 
    width:50%;
}*/

.top {
    font-family:"ArcadeClassic"; 
    
}

table{

    width: auto;
	margin: 0 auto 1em;
    background-color: Black;
    border:10px;
    
    
   

}
th {
    font-family:"ArcadeClassic";
    padding-left: 100px;
    padding-right:100px;
    padding-bottom:15px;
    padding-top:15px;
    text-align: left;
    border: 1px solid white;
    font-size:20px;
    color:#EE82EE;
}

 td {
    font-family:"ArcadeClassic";
    padding-left: 100px;
    padding-right:100px;
    padding-bottom:15px;
    padding-top:15px;
    text-align: left;
    border: 1px solid white;
    font-size:14px;
  
  
}
  


</style>



    </head>
    <body >
<h1>Pac - Bash </h1>
<!--<tr><td>Cards In Review:'.($list[2]+ $list2[2]).'</td></tr>
            <tr><td>Cards In Progress:'.($list[3]+ $list2[3]).'</td></tr>
            <tr><td>Cards To Do/new:'.($list[4]+ $list2[4]).'</td></tr>-->


<!--<div class="left">


</div>
<div class="right">-->


   
        
        <?php 

    
            $result =Get_Issues(67);
            $result2 =Get_Issues(66);
            /*foreach ($result2 as &$value) {
            array_push($result,$value);
            }*/
            
      

            foreach ($result2[0] as $key => $value) { 
                if(isset($result[0][$key]))
                    $result[0][$key][1] = $result[0][$key][1] + $value[1]; 
                else array_push($result[0],$value); 
            }

        
          
            //$list = BuildList(json_decode($result,true));
            
            //var_dump($list);
            rsort($result[0]);
            //rsort($list[0][$email][1]);


           /* array(5) {
                 [0]=> array(10) {
                      ["maarten@paddle.com"]=> array(2) { [0]=> string(18) "maarten@paddle.com" [1]=> int(10) }
                       ["johan@paddle.com"]=> array(2) { [0]=> string(16) "johan@paddle.com" [1]=> int(5) }
                        ["aram@paddle.com"]=> array(2) { [0]=> string(15) "aram@paddle.com" [1]=> int(5) } 
                        ["tatiana@paddle.com"]=> array(2) { [0]=> string(18) "tatiana@paddle.com" [1]=> int(5) } 
                        ["victor@paddle.com"]=> array(2) { [0]=> string(17) "victor@paddle.com" [1]=> int(26) } 
                        ["daniel@paddle.com"]=> array(2) { [0]=> string(17) "daniel@paddle.com" [1]=> int(5) } 
                        ["marcus@paddle.com"]=> array(2) { [0]=> string(17) "marcus@paddle.com" [1]=> int(9) } 
                        ["leonardo@paddle.com"]=> array(2) { [0]=> string(19) "leonardo@paddle.com" [1]=> int(7) } 
                        ["cc@paddle.com"]=> array(2) { [0]=> string(13) "cc@paddle.com" [1]=> int(7) } 
                        ["ioannis@paddle.com"]=> array(2) { [0]=> string(18) "ioannis@paddle.com" [1]=> int(3) } 
                    }
                     [1]=> int(19) 
                     [2]=> int(10) 
                     [3]=> int(8) 
                     [4]=> int(13) 
                    }*/
            

/*foreach($list as $res)
     $sortAux[] = $res[0][1];

array_multisort($sortAux, SORT_ASC, $list);*/

        


            
            echo'<table>
            <tr class="top"><td> Cards done : '.($result[1]+ $result2[1]).'</td></tr>
            
            </table>';

   
            ?>
            <table >
            <tr>
                <th>User</th>
                <th>Score</th>
                <!--<th>Num cards</th>-->
            </tr>
        <?php
            foreach ($result[0] as &$value) {
            echo '<tr > 
            <td>'.$value[0].'</td>
            <td>'.$value[1].'</td> 
            
            </tr>';
            }

          //<td>'.$value[2].'</td> 

        ?>
    </table>

    <!--</div>-->
        </body>
<?php
  
  error_reporting(E_ALL);
ini_set('display_errors', 'On');

function Get_Issues($id){
    //next example will insert new conversation

    $curl = curl_init();

    $service_url = 'https://paddle.atlassian.net/rest/agile/latest/board/'.$id.'/issue';
   
    //'https://paddle.atlassian.net/rest/agile/latest/board/66/issue';
    //'https://paddle.atlassian.net/rest/agile/latest/board/67/issue';


    // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $service_url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_USERPWD, "joana@paddle.com:LRzk8OccplnGbjcosB0X512E");
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   //return $result;

   
   $list = BuildList(json_decode($result,true));


   return $list;

    
};


Function BuildList($result){

    //var_dump($result);
    //print_r($result["issues"][0]["fields"]["reporter"]);
    $length=count($result["issues"]);
    $list = array();
    $cards_done = 0;
    $review = 0;
    $inprog = 0;
    $new = 0;
 
    for ($i = 0; $i < $length; $i++) {
        $key=$result["issues"][$i]["key"];
        $card_id=$result["issues"][$i]["id"];
        
        $name=$result["issues"][$i]["fields"]["assignee"]["name"];
        if ($name == "")
            $name= "Unassigned";
        $email=$result["issues"][$i]["fields"]["assignee"]["emailAddress"];
        $status=$result["issues"][$i]["fields"]["status"]["name"];
        $priority=$result["issues"][$i]["fields"]["priority"]["id"];
    
        if ($status== "Done" || $status== "In Production"|| $status== "Release Candidate" || $status== "Reviewed")
        {
        
            $cards_done++;
            if(isset($list[$email])){
                $list[$email][1] = $list[$email][1] + 6-$priority; 
                $list[$email][2] = $list[$email][2] + 1; 

            }
               else
                $list[$email]= array($email,6-$priority,1);
                
        }

        if ($status== "In Pull Request" )
            $review++;
        
        
        if ($status== "PR Failed" || $status== "In Progress")
            $inprog++;
        
        if ($status== "To Do" || $status== "New" || $status=="Investigating")
            $new++;
        

        
      

    }
    

return array ($list, $cards_done, $review, $inprog, $new);
//return $cards_done;

};



?>

<script>
setTimeout(() => {
    window.location.reload()
}, 60000);




</script>

</body>
</html>

