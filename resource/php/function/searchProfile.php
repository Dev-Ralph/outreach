<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class searchProfile extends config {
  public $search;
  public $down;

public function __construct($search=null,$down=null){
  $this->search = $search;
  $this->down = $down;
}
public function viewAll(){
            $config = new config;
            $pdo = $config->Con();
            $pg = $_GET['pg'];
            $_SESSION['pg'] = $pg;
            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT DISTINCT `schl_number` FROM `outreach_participant`");
            $s->execute();
            $all = $s->fetchAll(PDO::FETCH_ASSOC);
            $total_results = $s->rowCount();
            $total_pages = ceil($total_results/$limit);

            if (!isset($_GET['pageAll'])) {
              $page = 1;
            } else{
              $page = $_GET['pageAll'];
            }

            $start = ($page-1)*$limit;

            $sql = "SELECT DISTINCT `schl_number`, `p_lastname`, `p_firstname`, `p_middlename`,`collegeDepartment`, `type` FROM `outreach_participant` GROUP BY `schl_number` ORDER BY `p_lastname` LIMIT $start, $limit";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%" class="table table-bordered bg-white">';
            echo '<tr style="color:#d75094">';
            echo '<th class="text-center">Participant</th> <th class="text-center">ID Number</th> <th class="text-center">College Department</th> <th class="text-center">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->p_lastname.', '.$result->p_firstname.' '.$result->p_middlename.'</td>';
            echo '<td class="text-center">'.$result->schl_number.'</td>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '<td class="text-center"> <a class="btn btn-outline-primary" href="viewProfile.php?pg='.$pg.'&schl_number='.$result->schl_number.'&type='.$result->type.'""><i class="fas fa-eye mr-1"></i>View</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul class="pb-5">';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?pg='.$pg.'&tab=all&pageAll='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';
}
public function searchProfileID(){
    if(isset($_GET['search']) && isset($_GET['down'])){
            $config = new config;
            $pdo = $config->Con();
            $search = $_GET['search'];
            $down = $_GET['down'];
            $pg = $_SESSION['pg'];
            $s = $pdo->prepare("SELECT DISTINCT `schl_number` FROM `outreach_participant` WHERE `$down` LIKE ? ORDER BY `schl_number`");
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

            // $sql = "SELECT DISTINCT `schl_number`,`p_lastname`,`p_firstname`,`p_middlename`,`collegeDepartment` FROM `outreach_participant` WHERE `$down` LIKE ?";
            // $data =$pdo->prepare($sql);
            // $data->execute([$search]);
            // $results = $data->fetchAll();
            // foreach ($results as $result) {
            //   echo '<div class="col">';
            //   echo '<h4 class="ml-4">'.$result->schl_number.'</h4>';
            //   echo '<h5 class="ml-4">'.$result->p_lastname.', '.$result->p_firstname.' '.$result->p_middlename.'</h5>';
            //   echo '<h5 class="ml-4">'.$result->collegeDepartment.'</h5>';
            //   echo '</div>';
            // }

            $sql = "SELECT DISTINCT `schl_number`, `p_lastname`, `p_firstname`, `p_middlename`,`collegeDepartment`, `type` FROM `outreach_participant` WHERE `$down` LIKE ? GROUP BY `schl_number` ORDER BY `p_lastname`  LIMIT $start, $limit";
            $data =$pdo->prepare($sql);
            $data->execute(["%$search%"]);
            $results = $data->fetchAll();
            echo '<table style="width:100%" class="table table-bordered bg-white">';
            echo '<tr style="color:#d75094">';
            echo '<th class="text-center">Participant</th> <th class="text-center">ID Number</th> <th class="text-center">College Department</th> <th class="text-center">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->p_lastname.', '.$result->p_firstname.' '.$result->p_middlename.'</td>';
            echo '<td class="text-center">'.$result->schl_number.'</td>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '<td class="text-center"> <a class="btn btn-outline-primary" href="viewProfile.php?pg='.$pg.'&schl_number='.$result->schl_number.'&type='.$result->type.'""><i class="fas fa-eye mr-1"></i>View</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
                echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
                echo  '<a class="page-link" href="?pg='.$pg.'&search='.$search.'&down='.$down.'&submit=Search&page='.$p.'">'.$p;
                echo  '</a>';
                echo '</li>';
            }
            echo '</ul>';
            }
}
public function searchProfileOutput(){
            $config = new config;
            $pdo = $config->Con();
            $schl_number = $_GET['schl_number'];
            $type = $_GET['type'];
            $pg = $_GET['pg'];
            $_SESSION['pg'] = $pg;
            $s = $pdo->prepare("SELECT DISTINCT `schl_number` FROM `outreach_participant` WHERE `schl_number` = '$schl_number'");
            $s->execute();
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

            $sql = "SELECT DISTINCT `schl_number`,`p_lastname`,`p_firstname`,`p_middlename`,`collegeDepartment` FROM `outreach_participant` WHERE `schl_number` = '$schl_number' GROUP BY `schl_number`";
            $data =$pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll();
            foreach ($results as $result) {
              echo '<div class="table-responsive" id="list"> ';
              echo '<div class="col py-4">';
              echo '<h3 class="ml-4" style="text-align: center">'.$result->schl_number.'</h3>';
              echo '<h3 class="ml-4" style="text-align: center">'.$result->p_lastname.', '.$result->p_firstname.' '.$result->p_middlename.'</h3>';
              echo '<h3 class="ml-4" style="text-align: center">'.$result->collegeDepartment.'</h3>';
              echo '</div>';
            }

            $sql = "SELECT * FROM `outreach_participant` WHERE `schl_number` = '$schl_number' ORDER BY `date` LIMIT $start, $limit";
            $data =$pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll();
            // echo '<div class="px-0">';
            echo '<table style="width:100%" class="table table-bordered bg-white">';
            echo '<tr>';
            echo '<th class="text-center" style="border: 1px solid black;">Activity</th> <th class="text-center" style="border: 1px solid black;">Date</th> <th class="text-center" style="border: 1px solid black;">Venue</th> <th class="text-center" style="border: 1px solid black;">Participation</th> <th class="text-center" style="border: 1px solid black;">Proponent</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            // echo '<td class="text-center" style="text-align: center; border: 1px solid black;">'.$result->type.'</td>';
            echo '<td class="text-center" style="text-align: center; border: 1px solid black;">'.$result->title.'</td>';
            echo '<td class="text-center" style="text-align: center; border: 1px solid black;">'.$result->date.'</td>';
            echo '<td class="text-center" style="text-align: center; border: 1px solid black;">'.$result->venue.'</td>';
            echo '<td class="text-center" style="text-align: center; border: 1px solid black;">'.$result->participation.'</td>';
            echo '<td class="text-center" style="text-align: center; border: 1px solid black;">'.$result->proponent.'</td>';
            echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
            // echo '</div>';

            echo '<ul class="pb-5">';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?pg='.$pg.'&schl_number='.$schl_number.'&type='.$type.'&page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';
              }

          }
?>
