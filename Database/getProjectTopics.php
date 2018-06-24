<?php
    function getProjectTopics($conn){
        $sql = "SELECT * FROM Project_Topics ORDER BY topic_title";
        $result = $conn->query($sql);
        $topics = array();

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $eachrow = array();
                $eachrow['topic_id'] = $row['topic_id'];
                $eachrow['topic_title'] = $row['topic_title'];
                array_push($topics, $eachrow);

            }
        }

        return $topics;
    }
?>