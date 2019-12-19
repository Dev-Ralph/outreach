<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
error_reporting (E_ALL ^ E_NOTICE);
class viewActivity extends config {
public function viewAll(){
              $config = new config;
              $pdo = $config->Con();
              $limit = 10;
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $s = $pdo->prepare("SELECT * FROM `outreach_activity`");
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

              $sql2 = "SELECT * FROM `outreach_participant`";
              $data2 = $pdo->prepare($sql2);
              $data2->execute();
              $rows = $data2->fetchAll(PDO::FETCH_OBJ);
              foreach ($rows as $row) {
                $row->title;
              }


              $sql = "SELECT * FROM `outreach_activity` ORDER BY `date` DESC LIMIT $start, $limit";
              $data = $pdo->prepare($sql);
              $data->execute();
              $results = $data->fetchAll(PDO::FETCH_OBJ);

              echo '<table style="width:100%" class="table">';
              echo '<tr style="color:#d75093">';
              echo '<th class="text-left"></i>Activity</th> <th class="text-left">Date</th><th class="text-left">Venue</th> <th class="text-left">Target Participants</th> <th class="text-left">Proponent</th> <th class="text-left">Mean</th> <th class="text-left">Interpretation</th> <th class="text-left">Action</th>';
              echo '</tr>';
              foreach ($results as $result) {
              echo '<tr>';
              echo '<td class="text-left">'.$result->title.'</td>';
              echo '<td class="text-left">'.$result->date.'</td>';
              echo '<td class="text-left">'.$result->venue.'</td>';
              echo '<td class="text-left">'.$result->target_p.'</td>';
              echo '<td class="text-left">'.$result->proponent.'</td>';
              echo '<td class="text-left">'.$result->mean.'</td>';
              echo '<td class="text-left">'.$result->interpretation.'</td>';
              echo  '<td class="text-left"> <a class="btn btn-outline-primary" href="viewData_adviser.php?outreach_activity_id='.$result->outreach_activity_id.'&act_title='.$result->title.'&act_date='.$result->date.'""><i class="fas fa-eye mr-1"></i>View</a> <a class="btn btn-outline-primary" href="tableActivity2_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'""><i class="fas fa-users mr-2"></i>Participants</a></td>';
              echo '</tr>';
              }
              echo '</table>';

              echo '<ul>';
              for ($p=1; $p <= $total_pages; $p++) {
                echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
                echo  '<a class="page-link" href="?tab=all&pageAll='.$p.'">'.$p;
                echo  '</a>';
                echo '</li>';
              }
              echo '</ul>';

              echo '<form action="" method="GET" class="form-inline my-2 my-lg-0 pb-5">
              <input class="form-control ml-5 mr-3 text-dark mt-3" style="width:55vh;" type="search" name="search" value="" placeholder="Enter keyword..." autocomplete="off">
                <br>
              <label class="ml-1 text-muted mr-2 mt-3">Filter by:</label>
              <select class="form-control mr-2 mt-3 text-dark browser-default custom-select" name="down" style="width:25vh;" id="select" name="criteria">
                <option value="title">Activity</option>
                <option value="date">Date</option>
                <option value="venue">Venue</option>
                <option value="target_p">Target Participants</option>
                <option value="proponent">Proponent</option>
                <option value="mean">Mean</option>
              </select>

                <span class="btn btn-default mr-3 mt-3" style="background-color:#d75094;">
                      <i class="fas fa-search text-white"></i>
              <input type="submit" name="submit-all"value="Search"style="background:none;border:0;color:white;background-color:#d75094;">
                </span>
                <a class="btn text-white mt-3" style="background-color:#d75094;" href="activity_adviser.php">Clear</a>
                </form>';
}
public function viewAllLiteracy(){
            $config = new config;
            $pdo = $config->Con();
            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_activity` WHERE `type` = 'Literacy & Numeracy'");
            $s->execute();
            $all = $s->fetchAll(PDO::FETCH_ASSOC);
            $total_results = $s->rowCount();
            $total_pages = ceil($total_results/$limit);

            if (!isset($_GET['pageLiteracy'])) {
              $page = 1;
            } else{
              $page = $_GET['pageLiteracy'];
            }

            $start = ($page-1)*$limit;

            $sql2 = "SELECT * FROM `outreach_participant`";
            $data2 = $pdo->prepare($sql2);
            $data2->execute();
            $rows = $data2->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $row) {
              $row->title;
            }


            $sql = "SELECT * FROM `outreach_activity` WHERE `type` = 'Literacy & Numeracy' ORDER BY `date` DESC LIMIT $start, $limit";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%" class="table">';
            echo '<tr>';
            echo '<tr style="color:#d75093">';
            echo '<th class="text-left"></i>Activity</th> <th class="text-left">Date</th><th class="text-left">Venue</th> <th class="text-left">Target Participants</th> <th class="text-left">Proponent</th> <th class="text-left">Mean</th> <th class="text-left">Interpretation</th> <th class="text-left">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-left">'.$result->title.'</td>';
            echo '<td class="text-left">'.$result->date.'</td>';
            echo '<td class="text-left">'.$result->venue.'</td>';
            echo '<td class="text-left">'.$result->target_p.'</td>';
            echo '<td class="text-left">'.$result->proponent.'</td>';
            echo '<td class="text-left">'.$result->mean.'</td>';
            echo '<td class="text-left">'.$result->interpretation.'</td>';
            echo  '<td class="text-left"> <a class="btn btn-outline-primary" href="viewData_adviser.php?outreach_activity_id='.$result->outreach_activity_id.'""><i class="fas fa-eye mr-1"></i>View</a> <a class="btn btn-outline-primary" href="tableActivity2_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'""><i class="fas fa-users mr-2"></i>Participants</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?tab=literacy&pageLiteracy='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';

            echo '<form action="" method="GET" class="form-inline my-2 my-lg-0 pb-5">
            <input class="form-control ml-5 mr-3 text-dark mt-3" style="width:55vh;" type="search" name="search" value="" placeholder="Enter keyword..." autocomplete="off">
              <br>
            <label class="ml-1 text-muted mr-2 mt-3">Filter by:</label>
            <select class="form-control mr-2 mt-3 text-dark browser-default custom-select" name="down" style="width:25vh;" id="select" name="criteria">
              <option value="title">Activity</option>
              <option value="date">Date</option>
              <option value="venue">Venue</option>
              <option value="target_p">Target Participants</option>
              <option value="proponent">Proponent</option>
              <option value="mean">Mean</option>
            </select>

              <span class="btn btn-default mr-3 mt-3" style="background-color:#d75094;">
                    <i class="fas fa-search text-white"></i>
            <input type="submit" name="submit-literacy"value="Search"style="background:none;border:0;color:white;background-color:#d75094;">
              </span>
              <a class="btn text-white mt-3" style="background-color:#d75094;" href="activity_adviser.php">Clear</a>
              </form>';
}

public function viewAllHealth(){
            $config = new config;
            $pdo = $config->Con();
            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_activity` WHERE `type` = 'Health & Wellness'");
            $s->execute();
            $all = $s->fetchAll(PDO::FETCH_ASSOC);
            $total_results = $s->rowCount();
            $total_pages = ceil($total_results/$limit);

            if (!isset($_GET['pageHealth'])) {
              $page = 1;
            } else{
              $page = $_GET['pageHealth'];
            }

            $start = ($page-1)*$limit;

            $sql2 = "SELECT * FROM `outreach_participant`";
            $data2 = $pdo->prepare($sql2);
            $data2->execute();
            $rows = $data2->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $row) {
              $row->title;
            }

            $sql = "SELECT * FROM `outreach_activity` WHERE `type` = 'Health & Wellness' ORDER BY `date` DESC LIMIT $start, $limit";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%" class="table">';
            echo '<tr style="color:#d75093">';
            echo '<th class="text-left"></i>Activity</th> <th class="text-left">Date</th><th class="text-left">Venue</th> <th class="text-left">Target Participants</th> <th class="text-left">Proponent</th> <th class="text-left">Mean</th> <th class="text-left">Interpretation</th> <th class="text-left">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-left">'.$result->title.'</td>';
            echo '<td class="text-left">'.$result->date.'</td>';
            echo '<td class="text-left">'.$result->venue.'</td>';
            echo '<td class="text-left">'.$result->target_p.'</td>';
            echo '<td class="text-left">'.$result->proponent.'</td>';
            echo '<td class="text-left">'.$result->mean.'</td>';
            echo '<td class="text-left">'.$result->interpretation.'</td>';
            echo  '<td class="text-left"> <a class="btn btn-outline-primary" href="viewData_adviser.php?outreach_activity_id='.$result->outreach_activity_id.'""><i class="fas fa-eye mr-1"></i>View</a> <a class="btn btn-outline-primary" href="tableActivity2_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'""><i class="fas fa-users mr-2"></i>Participants</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?tab=health&pageHealth='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';

            echo '<form action="" method="GET" class="form-inline my-2 my-lg-0 pb-5">
            <input class="form-control ml-5 mr-3 text-dark mt-3" style="width:55vh;" type="search" name="search" value="" placeholder="Enter keyword..." autocomplete="off">
              <br>
            <label class="ml-1 text-muted mr-2 mt-3">Filter by:</label>
            <select class="form-control mr-2 mt-3 text-dark browser-default custom-select" name="down" style="width:25vh;" id="select" name="criteria">
              <option value="title">Activity</option>
              <option value="date">Date</option>
              <option value="venue">Venue</option>
              <option value="target_p">Target Participants</option>
              <option value="proponent">Proponent</option>
              <option value="mean">Mean</option>
            </select>

              <span class="btn btn-default mr-3 mt-3" style="background-color:#d75094;">
                    <i class="fas fa-search text-white"></i>
            <input type="submit" name="submit-health"value="Search"style="background:none;border:0;color:white;background-color:#d75094;">
              </span>
              <a class="btn text-white mt-3" style="background-color:#d75094;" href="activity_adviser.php">Clear</a>
              </form>';
}

public function viewAllEnvironment(){
            $config = new config;
            $pdo = $config->Con();
            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_activity` WHERE `type` = 'Environment Care'");
            $s->execute();
            $all = $s->fetchAll(PDO::FETCH_ASSOC);
            $total_results = $s->rowCount();
            $total_pages = ceil($total_results/$limit);

            if (!isset($_GET['pageEnvironment'])) {
              $page = 1;
            } else{
              $page = $_GET['pageEnvironment'];
            }

            $start = ($page-1)*$limit;

            $sql2 = "SELECT * FROM `outreach_participant`";
            $data2 = $pdo->prepare($sql2);
            $data2->execute();
            $rows = $data2->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $row) {
              $row->title;
            }

            $sql = "SELECT * FROM `outreach_activity` WHERE `type` = 'Environment Care' ORDER BY `date` DESC LIMIT $start, $limit";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%" class="table">';
            echo '<tr style="color:#d75093">';
            echo '<th class="text-left"></i>Activity</th> <th class="text-left">Date</th><th class="text-left">Venue</th> <th class="text-left">Target Participants</th> <th class="text-left">Proponent</th> <th class="text-left">Mean</th> <th class="text-left">Interpretation</th> <th class="text-left">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-left">'.$result->title.'</td>';
            echo '<td class="text-left">'.$result->date.'</td>';
            echo '<td class="text-left">'.$result->venue.'</td>';
            echo '<td class="text-left">'.$result->target_p.'</td>';
            echo '<td class="text-left">'.$result->proponent.'</td>';
            echo '<td class="text-left">'.$result->mean.'</td>';
            echo '<td class="text-left">'.$result->interpretation.'</td>';
            echo  '<td class="text-left"> <a class="btn btn-outline-primary" href="viewData_adviser.php?outreach_activity_id='.$result->outreach_activity_id.'""><i class="fas fa-eye mr-1"></i>View</a> <a class="btn btn-outline-primary" href="tableActivity2_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'""><i class="fas fa-users mr-2"></i>Participants</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?tab=environment&pageEnvironment='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';

            echo '<form action="" method="GET" class="form-inline my-2 my-lg-0 pb-5">
            <input class="form-control ml-5 mr-3 text-dark mt-3" style="width:55vh;" type="search" name="search" value="" placeholder="Enter keyword..." autocomplete="off">
              <br>
            <label class="ml-1 text-muted mr-2 mt-3">Filter by:</label>
            <select class="form-control mr-2 mt-3 text-dark browser-default custom-select" name="down" style="width:25vh;" id="select" name="criteria">
              <option value="title">Activity</option>
              <option value="date">Date</option>
              <option value="venue">Venue</option>
              <option value="target_p">Target Participants</option>
              <option value="proponent">Proponent</option>
              <option value="mean">Mean</option>
            </select>

              <span class="btn btn-default mr-3 mt-3" style="background-color:#d75094;">
                    <i class="fas fa-search text-white"></i>
            <input type="submit" name="submit-environment"value="Search"style="background:none;border:0;color:white;background-color:#d75094;">
              </span>
              <a class="btn text-white mt-3" style="background-color:#d75094;" href="activity_adviser.php">Clear</a>
              </form>';
}

public function viewAllLivelihood(){
            $config = new config;
            $pdo = $config->Con();
            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_activity` WHERE `type` = 'Livelihood & Entrepreneurship'");
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

            $sql2 = "SELECT * FROM `outreach_participant`";
            $data2 = $pdo->prepare($sql2);
            $data2->execute();
            $rows = $data2->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $row) {
              $row->title;
            }

            $sql = "SELECT * FROM `outreach_activity` WHERE `type` = 'Livelihood & Entrepreneurship' ORDER BY `date` DESC LIMIT $start, $limit";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%" class="table">';
            echo '<tr style="color:#d75093">';
            echo '<th class="text-left"></i>Activity</th> <th class="text-left">Date</th><th class="text-left">Venue</th> <th class="text-left">Target Participants</th> <th class="text-left">Proponent</th> <th class="text-left">Mean</th> <th class="text-left">Interpretation</th> <th class="text-left">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-left">'.$result->title.'</td>';
            echo '<td class="text-left">'.$result->date.'</td>';
            echo '<td class="text-left">'.$result->venue.'</td>';
            echo '<td class="text-left">'.$result->target_p.'</td>';
            echo '<td class="text-left">'.$result->proponent.'</td>';
            echo '<td class="text-left">'.$result->mean.'</td>';
            echo '<td class="text-left">'.$result->interpretation.'</td>';
            echo  '<td class="text-left"> <a class="btn btn-outline-primary" href="viewData_adviser.php?outreach_activity_id='.$result->outreach_activity_id.'""><i class="fas fa-eye mr-1"></i>View</a> <a class="btn btn-outline-primary" href="tableActivity2_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'""><i class="fas fa-users mr-2"></i>Participants</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?tab=livelihood&pageLivelihood='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';

            echo '<form action="" method="GET" class="form-inline my-2 my-lg-0 pb-5">
            <input class="form-control ml-5 mr-3 text-dark mt-3" style="width:55vh;" type="search" name="search" value="" placeholder="Enter keyword..." autocomplete="off">
              <br>
            <label class="ml-1 text-muted mr-2 mt-3">Filter by:</label>
            <select class="form-control mr-2 mt-3 text-dark browser-default custom-select" name="down" style="width:25vh;" id="select" name="criteria">
              <option value="title">Activity</option>
              <option value="date">Date</option>
              <option value="venue">Venue</option>
              <option value="target_p">Target Participants</option>
              <option value="proponent">Proponent</option>
              <option value="mean">Mean</option>
            </select>

              <span class="btn btn-default mr-3 mt-3" style="background-color:#d75094;">
                    <i class="fas fa-search text-white"></i>
            <input type="submit" name="submit-livelihood"value="Search"style="background:none;border:0;color:white;background-color:#d75094;">
              </span>
              <a class="btn text-white mt-3" style="background-color:#d75094;" href="activity_adviser.php">Clear</a>
              </form>';
}
public function viewAllSearch(){
    if(isset($_GET['search']) && isset($_GET['down'])){
            $config = new config;
            $pdo = $config->Con();
            $search = $_GET['search'];
            $down = $_GET['down'];
            $s = $pdo->prepare("SELECT * FROM `outreach_activity` WHERE `$down` LIKE ?");
            $s->execute(["%$search%"]);
            $allResp = $s->fetchAll(PDO::FETCH_ASSOC);

            $limit = 10;
            $total_results = $s->rowCount();
            $total_pages = ceil($total_results/$limit);

            if (!isset($_GET['pageAll'])) {
                $page = 1;
            } else{
                  $page = $_GET['pageAll'];
            }

            $start = ($page-1)*$limit;

            $sql = "SELECT * FROM `outreach_activity` WHERE `$down` LIKE ? LIMIT $start, $limit";
            $data =$pdo->prepare($sql);
            $data->execute(["%$search%"]);
            $results = $data->fetchAll();

            echo '<table style="width:100%" class="table">';
echo '<tr style="color:#d75093">';
echo '<th class="text-left"></i>Activity</th> <th class="text-left">Date</th><th class="text-left">Venue</th> <th class="text-left">Target Participants</th> <th class="text-left">Proponent</th> <th class="text-left">Mean</th> <th class="text-left">Interpretation</th> <th class="text-left">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-left">'.$result->title.'</td>';
            echo '<td class="text-left">'.$result->date.'</td>';
            echo '<td class="text-left">'.$result->venue.'</td>';
            echo '<td class="text-left">'.$result->target_p.'</td>';
            echo '<td class="text-left">'.$result->proponent.'</td>';
            echo '<td class="text-left">'.$result->mean.'</td>';
            echo '<td class="text-left">'.$result->interpretation.'</td>';
            echo  '<td class="text-left"> <a class="btn btn-outline-primary" href="viewData_adviser.php?outreach_activity_id='.$result->outreach_activity_id.'""><i class="fas fa-eye mr-1"></i>View</a> <a class="btn btn-outline-primary" href="tableActivity2_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'""><i class="fas fa-users mr-2"></i>Participants</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
                echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
                echo  '<a class="page-link" href="?tab=all&search='.$search.'&down='.$down.'&submit-all=Search&pageAll='.$p.'">'.$p;
                echo  '</a>';
                echo '</li>';
            }
            echo '</ul>';

            echo '<form action="" method="GET" class="form-inline my-2 my-lg-0 pb-5">
            <input class="form-control ml-5 mr-3 text-dark mt-3" style="width:55vh;" type="search" name="search" value="" placeholder="Enter keyword..." autocomplete="off">
              <br>
            <label class="ml-1 text-muted mr-2 mt-3">Filter by:</label>
            <select class="form-control mr-2 mt-3 text-dark browser-default custom-select" name="down" style="width:25vh;" id="select" name="criteria">
              <option value="title">Activity</option>
              <option value="date">Date</option>
              <option value="venue">Venue</option>
              <option value="target_p">Target Participants</option>
              <option value="proponent">Proponent</option>
              <option value="mean">Mean</option>
            </select>

              <span class="btn btn-default mr-3 mt-3" style="background-color:#d75094;">
                    <i class="fas fa-search text-white"></i>
            <input type="submit" name="submit-all"value="Search"style="background:none;border:0;color:white;background-color:#d75094;">
              </span>
              <a class="btn text-white mt-3" style="background-color:#d75094;" href="activity_adviser.php">Clear</a>
              </form>';
            }
}
public function viewAllLiteracySearch(){
    if(isset($_GET['search']) && isset($_GET['down'])){
            $config = new config;
            $pdo = $config->Con();
            $search = $_GET['search'];
            $down = $_GET['down'];
            $s = $pdo->prepare("SELECT * FROM `outreach_activity` WHERE `$down` LIKE ? AND `type` = 'Literacy & Numeracy'");
            $s->execute(["%$search%"]);
            $allResp = $s->fetchAll(PDO::FETCH_ASSOC);

            $limit = 10;
            $total_results = $s->rowCount();
            $total_pages = ceil($total_results/$limit);

            if (!isset($_GET['pageLiteracy'])) {
                $page = 1;
            } else{
                  $page = $_GET['pageLiteracy'];
            }

            $start = ($page-1)*$limit;

            $sql = "SELECT * FROM `outreach_activity` WHERE `$down` LIKE ? AND `type` = 'Literacy & Numeracy' LIMIT $start, $limit";
            $data =$pdo->prepare($sql);
            $data->execute(["%$search%"]);
            $results = $data->fetchAll();

            echo '<table style="width:100%" class="table">';
            echo '<tr style="color:#d75093">';
            echo '<th class="text-left"></i>Activity</th> <th class="text-left">Date</th><th class="text-left">Venue</th> <th class="text-left">Target Participants</th> <th class="text-left">Proponent</th> <th class="text-left">Mean</th> <th class="text-left">Interpretation</th> <th class="text-left">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-left">'.$result->title.'</td>';
            echo '<td class="text-left">'.$result->date.'</td>';
            echo '<td class="text-left">'.$result->venue.'</td>';
            echo '<td class="text-left">'.$result->target_p.'</td>';
            echo '<td class="text-left">'.$result->proponent.'</td>';
            echo '<td class="text-left">'.$result->mean.'</td>';
            echo '<td class="text-left">'.$result->interpretation.'</td>';
            echo  '<td class="text-left"> <a class="btn btn-outline-primary" href="viewData_adviser.php?outreach_activity_id='.$result->outreach_activity_id.'""><i class="fas fa-eye mr-1"></i>View</a> <a class="btn btn-outline-primary" href="tableActivity2_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'""><i class="fas fa-users mr-2"></i>Participants</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
                echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
                echo  '<a class="page-link" href="?tab=literacy&search='.$search.'&down='.$down.'&submit-literacy=Search&pageLiteracy='.$p.'">'.$p;
                echo  '</a>';
                echo '</li>';
            }
            echo '</ul>';

            echo '<form action="" method="GET" class="form-inline my-2 my-lg-0 pb-5">
            <input class="form-control ml-5 mr-3 text-dark mt-3" style="width:55vh;" type="search" name="search" value="" placeholder="Enter keyword..." autocomplete="off">
              <br>
            <label class="ml-1 text-muted mr-2 mt-3">Filter by:</label>
            <select class="form-control mr-2 mt-3 text-dark browser-default custom-select" name="down" style="width:25vh;" id="select" name="criteria">
              <option value="title">Activity</option>
              <option value="date">Date</option>
              <option value="venue">Venue</option>
              <option value="target_p">Target Participants</option>
              <option value="proponent">Proponent</option>
              <option value="mean">Mean</option>
            </select>

              <span class="btn btn-default mr-3 mt-3" style="background-color:#d75094;">
                    <i class="fas fa-search text-white"></i>
            <input type="submit" name="submit-literacy"value="Search"style="background:none;border:0;color:white;background-color:#d75094;">
              </span>
              <a class="btn text-white mt-3" style="background-color:#d75094;" href="activity_adviser.php">Clear</a>
              </form>';
            }
}
public function viewAllHealthSearch(){
    if(isset($_GET['search']) && isset($_GET['down'])){
            $config = new config;
            $pdo = $config->Con();
            $search = $_GET['search'];
            $down = $_GET['down'];
            $s = $pdo->prepare("SELECT * FROM `outreach_activity` WHERE `$down` LIKE ? AND `type` = 'Health & Wellness'");
            $s->execute(["%$search%"]);
            $allResp = $s->fetchAll(PDO::FETCH_ASSOC);

            $limit = 10;
            $total_results = $s->rowCount();
            $total_pages = ceil($total_results/$limit);

            if (!isset($_GET['pageHealth'])) {
                $page = 1;
            } else{
                  $page = $_GET['pageHealth'];
            }

            $start = ($page-1)*$limit;

            $sql = "SELECT * FROM `outreach_activity` WHERE `$down` LIKE ? AND `type` = 'Health & Wellness' LIMIT $start, $limit";
            $data =$pdo->prepare($sql);
            $data->execute(["%$search%"]);
            $results = $data->fetchAll();

            echo '<table style="width:100%" class="table">';
            echo '<tr style="color:#d75093">';
            echo '<th class="text-left"></i>Activity</th> <th class="text-left">Date</th><th class="text-left">Venue</th> <th class="text-left">Target Participants</th> <th class="text-left">Proponent</th> <th class="text-left">Mean</th> <th class="text-left">Interpretation</th> <th class="text-left">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-left">'.$result->title.'</td>';
            echo '<td class="text-left">'.$result->date.'</td>';
            echo '<td class="text-left">'.$result->venue.'</td>';
            echo '<td class="text-left">'.$result->target_p.'</td>';
            echo '<td class="text-left">'.$result->proponent.'</td>';
            echo '<td class="text-left">'.$result->mean.'</td>';
            echo '<td class="text-left">'.$result->interpretation.'</td>';
            echo  '<td class="text-left"> <a class="btn btn-outline-primary" href="viewData_adviser.php?outreach_activity_id='.$result->outreach_activity_id.'""><i class="fas fa-eye mr-1"></i>View</a> <a class="btn btn-outline-primary" href="tableActivity2_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'""><i class="fas fa-users mr-2"></i>Participants</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
                echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
                echo  '<a class="page-link" href="?tab=health&search='.$search.'&down='.$down.'&submit-health=Search&pageHealth='.$p.'">'.$p;
                echo  '</a>';
                echo '</li>';
            }
            echo '</ul>';

            echo '<form action="" method="GET" class="form-inline my-2 my-lg-0 pb-5">
            <input class="form-control ml-5 mr-3 text-dark mt-3" style="width:55vh;" type="search" name="search" value="" placeholder="Enter keyword..." autocomplete="off">
              <br>
            <label class="ml-1 text-muted mr-2 mt-3">Filter by:</label>
            <select class="form-control mr-2 mt-3 text-dark browser-default custom-select" name="down" style="width:25vh;" id="select" name="criteria">
              <option value="title">Activity</option>
              <option value="date">Date</option>
              <option value="venue">Venue</option>
              <option value="target_p">Target Participants</option>
              <option value="proponent">Proponent</option>
              <option value="mean">Mean</option>
            </select>

              <span class="btn btn-default mr-3 mt-3" style="background-color:#d75094;">
                    <i class="fas fa-search text-white"></i>
            <input type="submit" name="submit-health"value="Search"style="background:none;border:0;color:white;background-color:#d75094;">
              </span>
              <a class="btn text-white mt-3" style="background-color:#d75094;" href="activity_adviser.php">Clear</a>
              </form>';
            }
}

public function viewAllEnvironmentSearch(){
    if(isset($_GET['search']) && isset($_GET['down'])){
            $config = new config;
            $pdo = $config->Con();
            $search = $_GET['search'];
            $down = $_GET['down'];
            $s = $pdo->prepare("SELECT * FROM `outreach_activity` WHERE `$down` LIKE ? AND `type` = 'Environment Care'");
            $s->execute(["%$search%"]);
            $allResp = $s->fetchAll(PDO::FETCH_ASSOC);

            $limit = 10;
            $total_results = $s->rowCount();
            $total_pages = ceil($total_results/$limit);

            if (!isset($_GET['pageLivelihood'])) {
                $page = 1;
            } else{
                  $page = $_GET['pageLivelihood'];
            }

            $start = ($page-1)*$limit;

            $sql = "SELECT * FROM `outreach_activity` WHERE `$down` LIKE ? AND `type` = 'Environment Care' LIMIT $start, $limit";
            $data =$pdo->prepare($sql);
            $data->execute(["%$search%"]);
            $results = $data->fetchAll();

            echo '<table style="width:100%" class="table">';
            echo '<tr style="color:#d75093">';
            echo '<th class="text-left"></i>Activity</th> <th class="text-left">Date</th><th class="text-left">Venue</th> <th class="text-left">Target Participants</th> <th class="text-left">Proponent</th> <th class="text-left">Mean</th> <th class="text-left">Interpretation</th> <th class="text-left">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-left">'.$result->title.'</td>';
            echo '<td class="text-left">'.$result->date.'</td>';
            echo '<td class="text-left">'.$result->venue.'</td>';
            echo '<td class="text-left">'.$result->target_p.'</td>';
            echo '<td class="text-left">'.$result->proponent.'</td>';
            echo '<td class="text-left">'.$result->mean.'</td>';
            echo '<td class="text-left">'.$result->interpretation.'</td>';
            echo  '<td class="text-left"> <a class="btn btn-outline-primary" href="viewData_adviser.php?outreach_activity_id='.$result->outreach_activity_id.'""><i class="fas fa-eye mr-1"></i>View</a> <a class="btn btn-outline-primary" href="tableActivity2_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'""><i class="fas fa-users mr-2"></i>Participants</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
                echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
                echo  '<a class="page-link" href="?tab=environment&search='.$search.'&down='.$down.'&submit-environment=Search&pageLivelihood='.$p.'">'.$p;
                echo  '</a>';
                echo '</li>';
            }
            echo '</ul>';

            echo '<form action="" method="GET" class="form-inline my-2 my-lg-0 pb-5">
            <input class="form-control ml-5 mr-3 text-dark mt-3" style="width:55vh;" type="search" name="search" value="" placeholder="Enter keyword..." autocomplete="off">
              <br>
            <label class="ml-1 text-muted mr-2 mt-3">Filter by:</label>
            <select class="form-control mr-2 mt-3 text-dark browser-default custom-select" name="down" style="width:25vh;" id="select" name="criteria">
              <option value="title">Activity</option>
              <option value="date">Date</option>
              <option value="venue">Venue</option>
              <option value="target_p">Target Participants</option>
              <option value="proponent">Proponent</option>
              <option value="mean">Mean</option>
            </select>

              <span class="btn btn-default mr-3 mt-3" style="background-color:#d75094;">
                    <i class="fas fa-search text-white"></i>
            <input type="submit" name="submit-environment"value="Search"style="background:none;border:0;color:white;background-color:#d75094;">
              </span>
              <a class="btn text-white mt-3" style="background-color:#d75094;" href="activity_adviser.php">Clear</a>
              </form>';
            }
}

public function viewAllLivelihoodSearch(){
    if(isset($_GET['search']) && isset($_GET['down'])){
            $config = new config;
            $pdo = $config->Con();
            $search = $_GET['search'];
            $down = $_GET['down'];
            $s = $pdo->prepare("SELECT * FROM `outreach_activity` WHERE `$down` LIKE ? AND `type` = 'Livelihood & Entrepreneurship'");
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

            $sql = "SELECT * FROM `outreach_activity` WHERE `$down` LIKE ? AND `type` = 'Livelihood & Entrepreneurship' LIMIT $start, $limit";
            $data =$pdo->prepare($sql);
            $data->execute(["%$search%"]);
            $results = $data->fetchAll();

            echo '<table style="width:100%" class="table">';
echo '<tr style="color:#d75093">';
echo '<th class="text-left"></i>Activity</th> <th class="text-left">Date</th><th class="text-left">Venue</th> <th class="text-left">Target Participants</th> <th class="text-left">Proponent</th> <th class="text-left">Mean</th> <th class="text-left">Interpretation</th> <th class="text-left">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-left">'.$result->title.'</td>';
            echo '<td class="text-left">'.$result->date.'</td>';
            echo '<td class="text-left">'.$result->venue.'</td>';
            echo '<td class="text-left">'.$result->target_p.'</td>';
            echo '<td class="text-left">'.$result->proponent.'</td>';
            echo '<td class="text-left">'.$result->mean.'</td>';
            echo '<td class="text-left">'.$result->interpretation.'</td>';
            echo  '<td class="text-left"> <a class="btn btn-outline-primary" href="viewData_adviser.php?outreach_activity_id='.$result->outreach_activity_id.'""><i class="fas fa-eye mr-1"></i>View</a> <a class="btn btn-outline-primary" href="tableActivity2_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'""><i class="fas fa-users mr-2"></i>Participants</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
                echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
                echo  '<a class="page-link" href="?tab=livelihood&search='.$search.'&down='.$down.'&submit-livelihood=Search&page='.$p.'">'.$p;
                echo  '</a>';
                echo '</li>';
            }
            echo '</ul>';

            echo '<form action="" method="GET" class="form-inline my-2 my-lg-0 pb-5">
            <input class="form-control ml-5 mr-3 text-dark mt-3" style="width:55vh;" type="search" name="search" value="" placeholder="Enter keyword..." autocomplete="off">
              <br>
            <label class="ml-1 text-muted mr-2 mt-3">Filter by:</label>
            <select class="form-control mr-2 mt-3 text-dark browser-default custom-select" name="down" style="width:25vh;" id="select" name="criteria">
              <option value="title">Activity</option>
              <option value="date">Date</option>
              <option value="venue">Venue</option>
              <option value="target_p">Target Participants</option>
              <option value="proponent">Proponent</option>
              <option value="mean">Mean</option>
            </select>

              <span class="btn btn-default mr-3 mt-3" style="background-color:#d75094;">
                    <i class="fas fa-search text-white"></i>
            <input type="submit" name="submit-livelihood"value="Search"style="background:none;border:0;color:white;background-color:#d75094;">
              </span>
              <a class="btn text-white mt-3" style="background-color:#d75094;" href="activity_adviser.php">Clear</a>
              </form>';
            }
}
}
?>
