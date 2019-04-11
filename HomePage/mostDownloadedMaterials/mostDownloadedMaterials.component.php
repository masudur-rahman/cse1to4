<?php
include('../Rating/rating.component.php');
include('../Tags/tags.component.php');
include('../Database/databaseConnect.php');
include("../Database/getRating.component.php");
include("../Database/getTags.services.php");


//get top donwloaded items
$top_item_id=array();
$sql = "SELECT material_id,COUNT(material_id) as downloaded, time FROM `Item_Download` GROUP BY material_id ORDER BY downloaded DESC, time DESC LIMIT 10";
$result1 = $conn->query($sql);
if ( $result1->num_rows >0) {
    while($row = $result1->fetch_assoc()) {
        array_push($top_item_id, $row['material_id']);
    }
}

$result_materials=array();
for($iter = 0 ;$iter<count($top_item_id); $iter++){
    $sql1 = "SELECT * FROM Materials WHERE material_id = {$top_item_id[$iter]}";
    $result2 = $conn->query($sql1);

    while ($row = $result2->fetch_assoc()) {
        $material = array(
            'material_id' => $row['material_id'],
            'discussion_id' => $row['discussion_id'],
            'user_id' => $row['user_id'],
            'title' => $row['title'],
            'url' => $row['url'],
            'rating' => item_rating($row['material_id'], $conn),
            'tags' =>   item_tags($row['material_id'], $conn),
            'format' => $row['format'],
            'dateTime' => $row['date_and_time']
        );
        array_push($result_materials, $material);
    }
}

//get top downloaded projects
$top_project_id=array();
$sql = "SELECT material_id,COUNT(material_id) as downloaded, datetime FROM `Project_Download` GROUP BY material_id ORDER BY downloaded DESC, datetime DESC LIMIT 10";
$result1 = $conn->query($sql);
if ( $result1->num_rows >0) {
    while($row = $result1->fetch_assoc()) {
        array_push($top_project_id, $row['material_id']);
    }
}
$result_projects=array();
for($iter = 0 ;$iter<count($top_project_id); $iter++){
    $sql1 = "SELECT * FROM Project_Materials WHERE material_id = {$top_project_id[$iter]}";
    $result2 = $conn->query($sql1);

    while ($row = $result2->fetch_assoc()) {
        $material = array(
            'material_id' => $row['material_id'],
            'discussion_id' => $row['discussion_id'],
            'user_id' => $row['user_id'],
            'title' => $row['title'],
            'dateTime' => $row['date_time'],
            'rating' => projectRating($row['material_id'], $conn)
        );
        array_push($result_projects, $material);
    }
}

function returnItem($ttl,$diss, $usr, $rate, $tag, $urlink, $frmt, $dt, $id){  // RETURNS DATA TO GETDATA FILE

    $ratediv = rating($rate);                           //  TO GET THE RATING DIV WORKING FOR EACH ITEM
    $tagdiv = tags($tag);                           //  TO GET THE TAG DIV WORKING FOR EACH ITEM

    return "<div class = '{$id}' id = 'item{$id}'>
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

            <a href='/cse1to4/discussionBoard/discussionBoard.component.php?postNo={$diss}' class = 'fa fa-comments' id = 'button2' title='Discuss'>
            </a>


            <a href='#' class = 'fa fa-flag' id = 'button3' title='Flag'>
            </a>
        </div>
    </div>";
}
function returnProject($ttl, $disid, $usr, $rate, $dt, $id){  // RETURNS DATA TO GETDATA FILE
    $anshtml = "";
    $anshtml.="<div class = '{$id}' href = ''>
        <a href = '/cse1to4/discussionBoard/discussionBoard.component.php?postNo={$disid}'>
        <div class = 'projectIcon'>
            <div class = 'iconP'>
            </div>
            <div class = 'projectTitle' title='{$ttl}'>
                {$ttl}
            </div>
        </div>
        <div class = 'projectDescription'>
            <div class = 'projectRating'>";
    for($r = 1; $r<=5; $r++) {
        if($r<=$rate){
            $anshtml.="<span class='fa fa-star checked'></span>";
        }
        else {
            $anshtml.="<span class='fa fa-star'></span>";
        }
    }
    $haha = strtotime( $dt ); ///keno jani important
    $dateTime = date('d-M-Y', $haha);

    $anshtml.="</div>
            <div class='date'>{$dateTime}</div>
            <div class = 'uploader' title = '{$usr}'><a href='#'><b>{$usr}</b></a></div>
        </div>
    </a>
    </div>";

    return $anshtml;
}
?>

<div class = 'heading' id = 'caption'><b>FEATURED CONTENTS</b></div>
<div class = 'slideShowContainer'>
    <div class="mySlides">
        <div class="slideFirst">
            <?php echo returnItem($result_materials[0]['title'],$result_materials[0]['discussion_id'], $result_materials[0]['user_id'], $result_materials[0]['rating'], $result_materials[0]['tags'], $result_materials[0]['url'], $result_materials[0]['format'], $result_materials[0]['dateTime'], 'item1'); ?>
        </div>

        <?php
            //for little items
            for($iter = 1; $iter<=4; $iter++){
                $insert1 = returnItem($result_materials[2*$iter]['title'],$result_materials[2*$iter]['discussion_id'], $result_materials[2*$iter]['user_id'], $result_materials[2*$iter]['rating'], $result_materials[2*$iter]['tags'], $result_materials[2*$iter]['url'], $result_materials[2*$iter]['format'], $result_materials[2*$iter]['dateTime'], 'item2');
                $insert2 =  returnItem($result_materials[2*$iter+1]['title'],$result_materials[2*$iter+1]['discussion_id'], $result_materials[2*$iter+1]['user_id'], $result_materials[2*$iter+1]['rating'], $result_materials[2*$iter+1]['tags'], $result_materials[2*$iter+1]['url'], $result_materials[2*$iter+1]['format'], $result_materials[2*$iter+1]['dateTime'], 'item2');

                echo "<div class='container{$iter}'>
                <div class='slide2'>
                   ".$insert1."
                </div>
                <div class='slide3'>
                    ".$insert2."
                </div>
            </div>";
            }
        ?>
        <div class="slideLast">
            <?php echo returnItem($result_materials[1]['title'],$result_materials[1]['discussion_id'], $result_materials[1]['user_id'], $result_materials[1]['rating'], $result_materials[1]['tags'], $result_materials[1]['url'], $result_materials[1]['format'], $result_materials[1]['dateTime'], 'item1'); ?>
        </div>
    </div>
    <div class="mySlides">
        <div class="slideFirst">
            <?php echo returnProject($result_projects[1]['title'],$result_projects[1]['discussion_id'], $result_projects[1]['user_id'], $result_projects[1]['rating'], $result_projects[1]['dateTime'], 'project1'); ?>
        </div>

        <?php
            //for little items
            for($iter = 1; $iter<=4; $iter++){
                $insert1 = returnProject($result_projects[2*$iter]['title'],$result_projects[2*$iter]['discussion_id'], $result_projects[2*$iter]['user_id'], $result_projects[2*$iter]['rating'], $result_projects[2*$iter]['dateTime'], 'project2');
                $insert2 =  returnProject($result_projects[2*$iter+1]['title'],$result_projects[2*$iter+1]['discussion_id'], $result_projects[2*$iter+1]['user_id'], $result_projects[2*$iter+1]['rating'], $result_projects[2*$iter+1]['dateTime'], 'project2');

                echo "<div class='container{$iter}'>
                <div class='slide2'>
                   ".$insert1."
                </div>
                <div class='slide3'>
                    ".$insert2."
                </div>
            </div>";
            }
        ?>
        <div class="slideLast">
            <?php echo returnProject($result_projects[2]['title'],$result_projects[2]['discussion_id'], $result_projects[2]['user_id'], $result_projects[2]['rating'], $result_projects[2]['dateTime'], 'project1'); ?>
        </div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div><br>

<div id = 'dotdiva'>
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
</div>


<script type="text/javascript">
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      var cap = document.getElementById('caption');
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.width = "0%";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.width = "100%";
      dots[slideIndex-1].className += " active";
      if(slideIndex==1){
        cap.innerHTML='<b>Most Downloaded Study Materials</b>';
      }
      else {
        cap.innerHTML = '<b>Most Downloaded Project Materials</b>';
      }
    }
</script>