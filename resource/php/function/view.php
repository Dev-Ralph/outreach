<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class view extends config {
public function viewAllLiteracy(){
            $config = new config;
            $pdo = $config->Con();
            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach`");
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

            $sql = "SELECT * FROM `outreach` WHERE `type` = 'Literacy & Numeracy' ORDER BY `date` DESC LIMIT $start, $limit";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%" class="table">';
            echo '<tr>';
            echo '<th class="text-center">Activity</th> <th class="text-center">Date</th> <th class="text-center">Venue</th> <th class="text-center">Participant</th> <th class="text-center">Participation</th> <th class="text-center">College Department</th> <th class="text-center">Proponent</th> <th class="text-center">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->title.'</td>';
            echo '<td class="text-center">'.$result->date.'</td>';
            echo '<td class="text-center">'.$result->venue.'</td>';
            echo '<td class="text-center">'.$result->p_lastname.', '.$result->p_firstname.' '.$result->p_middlename.'</td>';
            echo '<td class="text-center">'.$result->participation.'</td>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '<td class="text-center">'.$result->proponent.'</td>';
            echo  '<td class="text-center"><a class="btn btn-outline-danger" href="?delete='.$result->outreach_id.'"><i class="far fa-trash-alt mr-1"></i>Delete</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';
}

public function viewAllHealth(){
            $config = new config;
            $pdo = $config->Con();
            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach`");
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

            $sql = "SELECT * FROM `outreach` WHERE `type` = 'Health & Wellness' ORDER BY `date` DESC LIMIT $start, $limit";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%" class="table">';
            echo '<tr>';
            echo '<th class="text-center">Activity</th> <th class="text-center">Date</th> <th class="text-center">Venue</th> <th class="text-center">Participant</th> <th class="text-center">College Department</th> <th class="text-center">Proponent</th> <th class="text-center">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
              echo '<tr>';
              echo '<td class="text-center">'.$result->title.'</td>';
              echo '<td class="text-center">'.$result->date.'</td>';
              echo '<td class="text-center">'.$result->venue.'</td>';
              echo '<td class="text-center">'.$result->p_lastname.', '.$result->p_firstname.' '.$result->p_middlename.'</td>';
              echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
              echo '<td class="text-center">'.$result->proponent.'</td>';
              echo  '<td class="text-center"><a class="btn btn-outline-danger" href="?delete='.$result->outreach_id.'"><i class="far fa-trash-alt mr-1"></i>Delete</a></td>';
              echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';
}

public function viewAllEnvironment(){
            $config = new config;
            $pdo = $config->Con();
            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach`");
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

            $sql = "SELECT * FROM `outreach` WHERE `type` = 'Environment Care' ORDER BY `date` DESC LIMIT $start, $limit";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%" class="table">';
            echo '<tr>';
            echo '<th class="text-center">Activity</th> <th class="text-center">Date</th> <th class="text-center">Venue</th> <th class="text-center">Participant</th> <th class="text-center">College Department</th> <th class="text-center">Proponent</th> <th class="text-center">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
              echo '<tr>';
              echo '<td class="text-center">'.$result->title.'</td>';
              echo '<td class="text-center">'.$result->date.'</td>';
              echo '<td class="text-center">'.$result->venue.'</td>';
              echo '<td class="text-center">'.$result->p_lastname.', '.$result->p_firstname.' '.$result->p_middlename.'</td>';
              echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
              echo '<td class="text-center">'.$result->proponent.'</td>';
              echo  '<td class="text-center"><a class="btn btn-outline-danger" href="?delete='.$result->outreach_id.'"><i class="far fa-trash-alt mr-1"></i>Delete</a></td>';
              echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';
}

public function viewAllLivelihood(){
            $config = new config;
            $pdo = $config->Con();
            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach`");
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

            $sql = "SELECT * FROM `outreach` WHERE `type` = 'Livelihood & Entrepreneurship' ORDER BY `date` DESC LIMIT $start, $limit";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%" class="table">';
            echo '<tr>';
            echo '<th class="text-center">Activity</th> <th class="text-center">Date</th> <th class="text-center">Venue</th> <th class="text-center">Participant</th> <th class="text-center">College Department</th> <th class="text-center">Proponent</th> <th class="text-center">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
              echo '<tr>';
              echo '<td class="text-center">'.$result->title.'</td>';
              echo '<td class="text-center">'.$result->date.'</td>';
              echo '<td class="text-center">'.$result->venue.'</td>';
              echo '<td class="text-center">'.$result->p_lastname.', '.$result->p_firstname.' '.$result->p_middlename.'</td>';
              echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
              echo '<td class="text-center">'.$result->proponent.'</td>';
              echo  '<td class="text-center"><a class="btn btn-outline-danger" href="?delete='.$result->outreach_id.'"><i class="far fa-trash-alt mr-1"></i>Delete</a></td>';
              echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';
}



  public function viewAllCriteria(){
    if(isset($_GET['search']) && isset($_GET['down'])){
            $config = new config;
            $pdo = $config->Con();
            $search = $_GET['search'];
            $down = $_GET['down'];
            $s = $pdo->prepare("SELECT * FROM `outreach` WHERE `$down` LIKE ?");
            $s->execute(["%$search%"]);
            $allResp = $s->fetchAll(PDO::FETCH_ASSOC);

            $limit = 10;
            $total_results = $s->rowCount();
            $total_pages = ceil($total_results/$limit);

            if (!isset($_GET['page'])) {
                $page = 1;
            } else{
                  $page = $_GET['page'];
            }

            $start = ($page-1)*$limit;

            $sql = "SELECT * FROM `outreach` where `$down` LIKE ?  LIMIT $start, $limit";
            $data =$pdo->prepare($sql);
            $data->execute(["%$search%"]);
            $results = $data->fetchAll();

            echo '<table style="width:100%" class="table">';
            echo '<tr>';
            echo '<th class="text-center">Date</th> <th class="text-center">School Name</th> <th class="text-center">Facilitator</th> <th class="text-center">College Department</th> <th class="text-center">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
              echo '<tr>';
              echo '<td class="text-center">'.$result->title.'</td>';
              echo '<td class="text-center">'.$result->date.'</td>';
              echo '<td class="text-center">'.$result->participation.'</td>';
              echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
              echo '<td class="text-center">'.$result->proponent.'</td>';
              echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
                echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
                echo  '<a class="page-link" href="?search='.$search.'&down='.$down.'&submit=Search&page='.$p.'">'.$p;
                echo  '</a>';
                echo '</li>';
            }
            echo '</ul>';
            }
              }
          }
?>
