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
            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_participant`");
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

            $sql = "SELECT * FROM `outreach_participant` ORDER BY `date` DESC LIMIT $start, $limit";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%" class="table">';
            echo '<tr>';
            echo '<th class="text-center">Activity</th> <th class="text-center">Date</th> <th class="text-center">Venue</th> <th class="text-center">Participant</th> <th class="text-center">ID Number</th> <th class="text-center">Participation</th> <th class="text-center">College Department</th> <th class="text-center">Proponent</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->title.'</td>';
            echo '<td class="text-center">'.$result->date.'</td>';
            echo '<td class="text-center">'.$result->venue.'</td>';
            echo '<td class="text-center">'.$result->p_lastname.', '.$result->p_firstname.' '.$result->p_middlename.'</td>';
            echo '<td class="text-center">'.$result->schl_number.'</td>';
            echo '<td class="text-center">'.$result->participation.'</td>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '<td class="text-center">'.$result->proponent.'</td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul class="pb-5">';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?tab=all&pageAll='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';
}
public function searchProfileID(){
    if(isset($_GET['search']) && isset($_GET['down'])){
            $config = new config;
            $pdo = $config->Con();
            $search = $this->search;
            $down = $this->down;
            $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `$down` LIKE ?");
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

            $sql = "SELECT * FROM `outreach_participant` WHERE `$down` LIKE ? GROUP BY `date` DESC  LIMIT $start, $limit";
            $data =$pdo->prepare($sql);
            $data->execute(["%$search%"]);
            $results = $data->fetchAll();
            echo '<table style="width:100%" class="table">';
            echo '<tr>';
            echo '<th class="text-center">Activity</th> <th class="text-center">Date</th> <th class="text-center">Venue</th> <th class="text-center">Participant</th> <th class="text-center">ID Number</th> <th class="text-center">Participation</th> <th class="text-center">College Department</th> <th class="text-center">Proponent</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->title.'</td>';
            echo '<td class="text-center">'.$result->date.'</td>';
            echo '<td class="text-center">'.$result->venue.'</td>';
            echo '<td class="text-center">'.$result->p_lastname.', '.$result->p_firstname.' '.$result->p_middlename.'</td>';
            echo '<td class="text-center">'.$result->schl_number.'</td>';
            echo '<td class="text-center">'.$result->participation.'</td>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '<td class="text-center">'.$result->proponent.'</td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
                echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
                echo  '<a class="page-link" href="?search='.$search.'&submit=Search&page='.$p.'">'.$p;
                echo  '</a>';
                echo '</li>';
            }
            echo '</ul>';
            }
              }
          }
?>
