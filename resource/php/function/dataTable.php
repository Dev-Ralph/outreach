<!-- SELECT title, COUNT(schl_number) as Population FROM outreach WHERE title = 'Test 3' GROUP BY title -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class dataTable extends config {
public function dataTableDepartmentLiteracy(){
            $config = new config;
            $pdo = $config->Con();



            $sql = "SELECT `collegeDepartment`, `type`, COUNT(`collegeDepartment`) AS `count` FROM `outreach_participant` WHERE `type` = 'Literacy & Numeracy' GROUP BY `collegeDepartment` ORDER BY `count` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center" style="color:#d74f95">College Department</th> <th class="text-center" style="color:#d74f95">Total Number of Participants</th> <th class="text-center" style="color:#d74f95">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '<td class="text-center">'.$result->count.'<i class="fas fa-users ml-1"></i></td>';
            echo '<td class="text-center"><a class="btn btn-outline-primary" href="tableDepartment.php?department='.$result->collegeDepartment.'&type='.$result->type.'"><i class="fas fa-eye mr-1"></i>View</td>';
            echo '</tr>';
            }
            echo '</table>';
}

public function dataTableProponentLiteracy(){
            $config = new config;
            $pdo = $config->Con();


            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `type` = 'Literacy & Numeracy'");
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
            $sql = "SELECT `title` FROM `outreach_participant` WHERE `type` = 'Literacy & Numeracy' GROUP BY `title` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $rows = $data->fetchAll();
            foreach ($rows as $row){
              $row->title;
            }

            $sql = "SELECT `title`, COUNT(`title`) as `Population`, `date` FROM `outreach_participant` WHERE `type` = 'Literacy & Numeracy' GROUP BY `title` ORDER BY `Population` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll();

            echo '<table style="width:100%; background-color: white;" class="table table-bordered pb-5">';
            echo '<tr>';
            echo '<th class="text-center" style="color:#d74f95">Activity</th> <th class="text-center" style="color:#d74f95">Total Number of Participants</th> <th class="text-center" style="color:#d74f95">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center py-3">'.$result->title.'</td>';
            echo '<td class="text-center py-3">'.$result->Population.'<i class="fas fa-users ml-1"></i></td>';
            echo '<td class="text-center py-3"><a class="btn btn-outline-primary" href="tableActivity.php?act_title='.$result->title.'&act_date='.$result->date.'"><i class="fas fa-eye mr-1"></i>View</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?pill=literacy&tab=activity&page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';

            echo '<form action="" method="GET">
            <div class="form-group">
            <label class="col-form-label text-md-right">From: </label>
            <input type="date" class="form-control text-muted d-inline" name="dateFrom" required autocomplete="off" style="WIDTH: 200px; HEIGHT: 42px;">
            <label class="col-form-label text-md-right">To: </label>
            <input type="date" class="form-control text-muted d-inline" name="dateTo" required autocomplete="off" style="WIDTH: 200px; HEIGHT: 42px;">
            <button type="submit" class="card-btn btn text-light py-2" name="searchDate-Literacy" style="background-color: #d75093;">Search</button>
            <a class="btn text-light py-2" href="dataTable.php" style="background-color: #d75093;">Clear</a>
            </div>
            </form>';
}

public function dataTableAttendeesLiteracy(){
  $config = new config;
  $pdo = $config->Con();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT COUNT(`outreach_id`) AS `count` FROM `outreach_participant` WHERE `type` = 'Literacy & Numeracy'";
  $data = $pdo->prepare($sql);
  $data->execute();
  $results = $data->fetchAll(PDO::FETCH_OBJ);

  echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
  echo '<tr>';
  echo '<th class="text-center" style="color:#d74f95">Total Number of Attendees</th>';
  echo '</tr>';
  foreach ($results as $result) {
  echo '<tr">';
  echo '<td class="text-center py-3">'.$result->count.'<i class="fas fa-users ml-1"></i></td>';
  echo '</tr>';
  }
  echo '</table>';
}

public function dataTableDepartmentHealth(){
            $config = new config;
            $pdo = $config->Con();


            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `type` = 'Health & Wellness'");
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

            $sql = "SELECT `collegeDepartment`,  `type`, COUNT(`collegeDepartment`) AS `count` FROM `outreach_participant` WHERE `type` = 'Health & Wellness' GROUP BY `collegeDepartment` ORDER BY `count` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center" style="color:#d74f95">College Department</th> <th class="text-center" style="color:#d74f95">Total Number of Participants</th> <th class="text-center" style="color:#d74f95">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '<td class="text-center">'.$result->count.'<i class="fas fa-users ml-1"></i></td>';
            echo '<td class="text-center"><a class="btn btn-outline-primary" href="tableDepartment.php?department='.$result->collegeDepartment.'&type='.$result->type.'"><i class="fas fa-eye mr-1"></i>View</td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?pill=health&tab=college&page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';
}

public function dataTableProponentHealth(){
            $config = new config;
            $pdo = $config->Con();


            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `type` = 'Health & Wellness'");
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

            $sql = "SELECT `title` FROM `outreach_participant` WHERE `type` = 'Health & Wellness' GROUP BY `title` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $rows = $data->fetchAll();
            foreach ($rows as $row){
              $row->title;
            }

            $sql = "SELECT `title`, COUNT(`title`) as `Population`, `date` FROM `outreach_participant` WHERE `type` = 'Health & Wellness' GROUP BY `title` ORDER BY `Population` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll();

            echo '<table style="width:100%; background-color: white;" class="table table-bordered pb-5">';
            echo '<tr>';
            echo '<th class="text-center" style="color:#d74f95">Activity</th> <th class="text-center" style="color:#d74f95">Total Number of Participants</th> <th class="text-center" style="color:#d74f95">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center py-3">'.$result->title.'</td>';
            echo '<td class="text-center py-3">'.$result->Population.'<i class="fas fa-users ml-1"></i></td>';
            echo '<td class="text-center py-3"><a class="btn btn-outline-primary" href="tableActivity.php?act_title='.$result->title.'&act_date='.$result->date.'"><i class="fas fa-eye mr-1"></i>View</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?pill=health&tab=activity&page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';

            echo '<form action="" method="GET">
            <div class="form-group">
            <label class="col-form-label text-md-right">From: </label>
            <input type="date" class="form-control text-muted d-inline" name="dateFrom" required autocomplete="off" style="WIDTH: 200px; HEIGHT: 42px;">
            <label class="col-form-label text-md-right">To: </label>
            <input type="date" class="form-control text-muted d-inline" name="dateTo" required autocomplete="off" style="WIDTH: 200px; HEIGHT: 42px;">
            <button type="submit" class="card-btn btn text-light py-2" name="searchDate-Health" style="background-color: #d75093;">Search</button>
            <a class="btn text-light py-2" href="dataTable.php" style="background-color: #d75093;">Clear</a>
            </div>
            </form>';
}

public function dataTableAttendeesHealth(){
  $config = new config;
  $pdo = $config->Con();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT COUNT(`outreach_id`) AS `count` FROM `outreach_participant` WHERE `type` = 'Health & Wellness'";
  $data = $pdo->prepare($sql);
  $data->execute();
  $results = $data->fetchAll(PDO::FETCH_OBJ);

  echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
  echo '<tr>';
  echo '<th class="text-center" style="color:#d74f95">Total Number of Attendees</th>';
  echo '</tr>';
  foreach ($results as $result) {
  echo '<tr">';
  echo '<td class="text-center py-3">'.$result->count.'<i class="fas fa-users ml-1"></i></td>';
  echo '</tr>';
  }
  echo '</table>';
}

public function dataTableDepartmentEnvironment(){
            $config = new config;
            $pdo = $config->Con();


            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `type` = 'Environment Care'");
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

            $sql = "SELECT `collegeDepartment`,  `type`, COUNT(`collegeDepartment`) AS `count` FROM `outreach_participant` WHERE `type` = 'Environment Care' GROUP BY `collegeDepartment` ORDER BY `count` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center" style="color:#d74f95">College Department</th> <th class="text-center" style="color:#d74f95">Total Number of Participants</th> <th class="text-center" style="color:#d74f95">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '<td class="text-center">'.$result->count.'<i class="fas fa-users ml-1"></i></td>';
            echo '<td class="text-center"><a class="btn btn-outline-primary" href="tableDepartment.php?department='.$result->collegeDepartment.'&type='.$result->type.'"><i class="fas fa-eye mr-1"></i>View</td>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?pill=environment&tab=college&page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';
}

public function dataTableProponentEnvironment(){
            $config = new config;
            $pdo = $config->Con();


            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `type` = 'Environment Care'");
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

            $sql = "SELECT `title` FROM `outreach_participant` WHERE `type` = 'Environment Care' GROUP BY `title` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $rows = $data->fetchAll();
            foreach ($rows as $row){
              $row->title;
            }

            $sql = "SELECT `title`, COUNT(`title`) as `Population`, `date` FROM `outreach_participant` WHERE `type` = 'Environment Care' GROUP BY `title` ORDER BY `Population` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll();

            echo '<table style="width:100%; background-color: white;" class="table table-bordered pb-5">';
            echo '<tr>';
            echo '<th class="text-center" style="color:#d74f95">Activity</th> <th class="text-center" style="color:#d74f95">Total Number of Participants</th> <th class="text-center" style="color:#d74f95">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center py-3">'.$result->title.'</td>';
            echo '<td class="text-center py-3">'.$result->Population.'<i class="fas fa-users ml-1"></i></td>';
            echo '<td class="text-center py-3"><a class="btn btn-outline-primary" href="tableActivity.php?act_title='.$result->title.'&act_date='.$result->date.'"><i class="fas fa-eye mr-1"></i>View</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?pill=environment&tab=activity&page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';

            echo '<form method="GET">
            <div class="form-group">
            <label class="col-form-label text-md-right">From: </label>
<input type="date" class="form-control text-muted d-inline" name="dateFrom" required autocomplete="off" style="WIDTH: 200px; HEIGHT: 42px;">
<label class="col-form-label text-md-right">To: </label>
            <input type="date" class="form-control text-muted d-inline" name="dateTo" required autocomplete="off" style="WIDTH: 200px; HEIGHT: 42px;">
            <button type="submit" class="card-btn btn text-light py-2" name="searchDate-Environment" style="background-color: #d75093;">Search</button>
            <a class="btn text-light py-2" href="dataTable.php" style="background-color: #d75093;">Clear</a>
            </div>
            </form>';
}

public function dataTableAttendeesEnvironment(){
  $config = new config;
  $pdo = $config->Con();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT COUNT(`outreach_id`) AS `count` FROM `outreach_participant` WHERE `type` = 'Environment Care'";
  $data = $pdo->prepare($sql);
  $data->execute();
  $results = $data->fetchAll(PDO::FETCH_OBJ);

  echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
  echo '<tr>';
  echo '<th class="text-center" style="color:#d74f95">Total Number of Attendees</th>';
  echo '</tr>';
  foreach ($results as $result) {
  echo '<tr">';
  echo '<td class="text-center py-3">'.$result->count.'<i class="fas fa-users ml-1"></i></td>';
  echo '</tr>';
  }
  echo '</table>';
}

public function dataTableDepartmentLivelihood(){
            $config = new config;
            $pdo = $config->Con();


            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `type` = 'Livelihood & Entrepreneurship'");
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

            $sql = "SELECT `collegeDepartment`,  `type`, COUNT(`collegeDepartment`) AS `count` FROM `outreach_participant` WHERE `type` = 'Livelihood & Entrepreneurship' GROUP BY `collegeDepartment` ORDER BY `count` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center" style="color:#d74f95">College Department</th> <th class="text-center" style="color:#d74f95">Total Number of Participants</th> <th class="text-center" style="color:#d74f95">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '<td class="text-center">'.$result->count.'<i class="fas fa-users ml-1"></i></td>';
            echo '<td class="text-center"><a class="btn btn-outline-primary" href="tableDepartment.php?department='.$result->collegeDepartment.'&type='.$result->type.'"><i class="fas fa-eye mr-1"></i>View</td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?pill=livelihood&tab=college&page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';
}

public function dataTableProponentLivelihood(){
            $config = new config;
            $pdo = $config->Con();


            $limit = 10;
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `type` = 'Livelihood & Entrepreneurship'");
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

            $sql = "SELECT `title` FROM `outreach_participant` WHERE `type` = 'Livelihood & Entrepreneurship' GROUP BY `title` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $rows = $data->fetchAll();
            foreach ($rows as $row){
              $row->title;
            }

            $sql = "SELECT `title`, COUNT(`title`) as `Population`, `date` FROM `outreach_participant` WHERE `type` = 'Livelihood & Entrepreneurship' GROUP BY `title` ORDER BY `Population` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll();

            echo '<table style="width:100%; background-color: white;" class="table table-bordered pb-5">';
            echo '<tr>';
            echo '<th class="text-center" style="color:#d74f95">Activity</th> <th class="text-center" style="color:#d74f95">Total Number of Participants</th> <th class="text-center" style="color:#d74f95">Action</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center py-3">'.$result->title.'</td>';
            echo '<td class="text-center py-3">'.$result->Population.'<i class="fas fa-users ml-1"></i></td>';
            echo '<td class="text-center py-3"><a class="btn btn-outline-primary" href="tableActivity.php?act_title='.$result->title.'&act_date='.$result->date.'"><i class="fas fa-eye mr-1"></i>View</a></td>';
            echo '</tr>';
            }
            echo '</table>';

            echo '<ul>';
            for ($p=1; $p <= $total_pages; $p++) {
              echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
              echo  '<a class="page-link" href="?pill=livelihood&tab=activity&page='.$p.'">'.$p;
              echo  '</a>';
              echo '</li>';
            }
            echo '</ul>';

            echo '<form method="GET">
            <div class="form-group">
            <label class="col-form-label text-md-right">From: </label>
<input type="date" class="form-control text-muted d-inline" name="dateFrom" required autocomplete="off" style="WIDTH: 200px; HEIGHT: 42px;">
<label class="col-form-label text-md-right">To: </label>
            <input type="date" class="form-control text-muted d-inline" name="dateTo" required autocomplete="off" style="WIDTH: 200px; HEIGHT: 42px;">
            <button type="submit" class="card-btn btn text-light py-2" name="searchDate-Livelihood" style="background-color: #d75093;">Search</button>
            <a class="btn text-light py-2" href="dataTable.php" style="background-color: #d75093;">Clear</a>
            </div>
            </form>';
}

public function dataTableAttendeesLivelihood(){
  $config = new config;
  $pdo = $config->Con();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT COUNT(`outreach_id`) AS `count` FROM `outreach_participant` WHERE `type` = 'Livelihood & Entrepreneurship'";
  $data = $pdo->prepare($sql);
  $data->execute();
  $results = $data->fetchAll(PDO::FETCH_OBJ);

  echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
  echo '<tr>';
  echo '<th class="text-center" style="color:#d74f95">Total Number of Attendees</th>';
  echo '</tr>';
  foreach ($results as $result) {
  echo '<tr">';
  echo '<td class="text-center py-3">'.$result->count.'<i class="fas fa-users ml-1"></i></td>';
  echo '</tr>';
  }
  echo '</table>';
}
}
