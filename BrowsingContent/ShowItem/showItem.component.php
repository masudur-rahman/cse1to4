<?php

include('../../Rating/rating.component.php');
include('../../Tags/tags.component.php');

function returnItem($ttl,$discuss, $usr, $rate, $tag, $urlink, $frmt, $dt){  // RETURNS DATA TO GETDATA FILE

    $ratediv = rating($rate);                           //  TO GET THE RATING DIV WORKING FOR EACH ITEM
    $tagdiv = tags($tag);                           //  TO GET THE TAG DIV WORKING FOR EACH ITEM

    return "<div class = 'item'>
        <div class = 'ico ".$frmt."'></div>
        <div class = 'title' title='".$ttl."'>".$ttl."</div>
        <div class = 'upUser'>
            <div class = 'upBy'><b>Uploaded By:</b></div>
            <a href = '' class = 'userId' title='".$usr."'><strong>".$usr."</strong></a>
        </div>
        <div class = 'rating' id = 'rating'>".$ratediv."

        </div>
        <div class = 'tags'>
            <div class = 'tagdiv'><b>Tags:</b></div>
            ".$tagdiv."
        </div>
        <div class = 'itemButtons'>
            <a href = '".$urlink."' class = 'fa fa-download' id = 'button1' title='Download'>
            </a>

            <a href='/cse1to4/discussionBoard/discussionBoard.component.php?postNo={$discuss}' class = 'fa fa-comments' id = 'button2' title='Discuss'>
            </a>


            <a href='#' class = 'fa fa-flag' id = 'button3' title='Flag'>
            </a>
        </div>
    </div>";
}

?>

