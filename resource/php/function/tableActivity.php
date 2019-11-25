<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class tableActivity extends config {
public function tableActivityParticipant(){
            $config = new config;
            $pdo = $config->Con();

            $limit = 10;
            $title = $_GET['act_title'];
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `title` LIKE '%$title%'");
            $s->execute();
            $all = $s->fetchAll(PDO::FETCH_ASSOC);
            $total_results = $s->rowCount();
            $total_pages = ceil($total_results/$limit);

            if (!isset($_GET['page'])) {
              $page = 1;
            } else{
              $page = $_GET['page'];
            }

            $start = ($page-1)*$limit;

            $sql = "SELECT * FROM `outreach_participant` WHERE `title` LIKE '%$title%' LIMIT $start, $limit";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<h1 class="text-center py-3">'.$title.'</h1>';
            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center">Name of Participants</th> <th class="text-center">ID Number</th> <th class="text-center">Participation</th> <th class="text-center">Proponent</th> <th class="text-center">College Department</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->p_lastname.', '.$result->p_firstname.' '.$result->p_middlename.'</td>';
            echo '<td class="text-center">'.$result->schl_number.'</td>';
            echo '<td class="text-center">'.$result->participation.'</td>';
            echo '<td class="text-center">'.$result->proponent.'</td>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?act_title='.$title.'&page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';
}
public function tableCollegeParticipant(){
            $config = new config;
            $pdo = $config->Con();

            $limit = 10;
            $department = $_GET['department'];
            $type = $_GET['type'];
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `collegeDepartment` = '$department' AND `type` LIKE '%$type%'");
            $s->execute();
            $all = $s->fetchAll(PDO::FETCH_ASSOC);
            $total_results = $s->rowCount();
            $total_pages = ceil($total_results/$limit);

            if (!isset($_GET['page'])) {
              $page = 1;
            } else{
              $page = $_GET['page'];
            }

            $start = ($page-1)*$limit;

            $sql = "SELECT * FROM `outreach_participant` WHERE `collegeDepartment` = '$department' AND `type` LIKE '%$type%' LIMIT $start, $limit";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<h1 class="text-center py-3">'.$department.'</h1>';
            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center">Name of Participants</th> <th class="text-center">ID Number</th> <th class="text-center">Outreach Program</th> <th class="text-center">Title of Activity</th> <th class="text-center">Participation</th> <th class="text-center">Proponent</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->p_lastname.', '.$result->p_firstname.' '.$result->p_middlename.'</td>';
            echo '<td class="text-center">'.$result->schl_number.'</td>';
            echo '<td class="text-center">'.$result->type.'</td>';
            echo '<td class="text-center">'.$result->title.'</td>';
            echo '<td class="text-center">'.$result->participation.'</td>';
            echo '<td class="text-center">'.$result->proponent.'</td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?department='.$department.'&type='.$type.'&page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';
}
}
