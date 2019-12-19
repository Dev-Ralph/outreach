<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class filterDate extends config{
    public $dateFrom;
    public $dateTo;

public function __construct($dateFrom=null,$dateTo=null ){
  $this->dateFrom = $dateFrom;
  $this->dateTo = $dateTo;
}

public function filterActivityLiteracy(){
  $config = new config;
  $pdo = $config ->Con();

  $search = $_GET['searchDate-Literacy'];
  $dateFrom = $this->dateFrom;
  $dateTo = $this->dateTo;
  $limit = 10;
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `type` = 'Literacy & Numeracy'");
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
  $sql = "SELECT `title` FROM `outreach_participant` WHERE `type` = 'Literacy & Numeracy' GROUP BY `title` DESC";
  $data = $pdo->prepare($sql);
  $data->execute();
  $rows = $data->fetchAll();
  foreach ($rows as $row){
    $row->title;
  }

  $sql = "SELECT `title`, COUNT(`title`) as `Population`, `date` FROM `outreach_participant` WHERE `type` = 'Literacy & Numeracy' AND `date` BETWEEN ? AND ? GROUP BY `title` ORDER BY `Population` DESC";
  $data = $pdo->prepare($sql);
  $data->execute([$dateFrom,$dateTo]);
  $results = $data->fetchAll();

  echo '<table style="width:100%; background-color: white;" class="table table-bordered pb-5">';
  echo '<tr>';
  echo '<th class="text-center" style="color:#d74f95">Activity</th> <th class="text-center" style="color:#d74f95">Total Number of Participants</th> <th class="text-center" style="color:#d74f95">Action</th>';
  echo '</tr>';
  foreach ($results as $result) {
  echo '<tr>';
  echo '<td class="text-center py-3">'.$result->title.'</td>';
  echo '<td class="text-center py-3">'.$result->Population.'<i class="fas fa-users ml-1"></i></td>';
  echo '<td class="text-center py-3"><a class="btn btn-outline-primary" href="tableActivity_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'"><i class="fas fa-eye mr-1"></i>View</a></td>';
  echo '</tr>';
  }
  echo '</table>';

  echo '<ul>';
  for ($p=1; $p <= $total_pages; $p++) {
    echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
    echo  '<a class="page-link" href="?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&searchDate-Literacy='.$search.'&pill=literacy&tab=activity&pageLiteracy='.$p.'">'.$p;
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
  <button type="submit" class="card-btn btn text-light py-2" name="searchDate-Literacy" style="background-color: #d75093;">Search</button>
  <a class="btn text-light py-2" href="dataTableParticipant_adviser.php" style="background-color: #d75093;">Clear</a>
  </div>
  </form>';
}
public function filterActivityHealth(){
  $config = new config;
  $pdo = $config ->Con();

  $search = $_GET['searchDate-Health'];
  $dateFrom = $this->dateFrom;
  $dateTo = $this->dateTo;
  $limit = 10;
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `type` = 'Health & Wellness'");
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
  $sql = "SELECT `title` FROM `outreach_participant` WHERE `type` = 'Health & Wellness' GROUP BY `title` DESC";
  $data = $pdo->prepare($sql);
  $data->execute();
  $rows = $data->fetchAll();
  foreach ($rows as $row){
    $row->title;
  }

  $sql = "SELECT `title`, COUNT(`title`) as `Population`, `date` FROM `outreach_participant` WHERE `type` = 'Health & Wellness' AND `date` BETWEEN ? AND ? GROUP BY `title` ORDER BY `Population` DESC";
  $data = $pdo->prepare($sql);
  $data->execute([$dateFrom,$dateTo]);
  $results = $data->fetchAll();

  echo '<table style="width:100%; background-color: white;" class="table table-bordered pb-5">';
  echo '<tr>';
  echo '<th class="text-center" style="color:#d74f95">Activity</th> <th class="text-center" style="color:#d74f95">Total Number of Participants</th> <th class="text-center" style="color:#d74f95">Action</th>';
  echo '</tr>';
  foreach ($results as $result) {
  echo '<tr>';
  echo '<td class="text-center py-3">'.$result->title.'</td>';
  echo '<td class="text-center py-3">'.$result->Population.'<i class="fas fa-users ml-1"></i></td>';
  echo '<td class="text-center py-3"><a class="btn btn-outline-primary" href="tableActivity_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'"><i class="fas fa-eye mr-1"></i>View</a></td>';
  echo '</tr>';
  }
  echo '</table>';

  echo '<ul>';
  for ($p=1; $p <= $total_pages; $p++) {
    echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
    echo  '<a class="page-link" href="?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&searchDate-Health='.$search.'&pill=health&tab=activity&pageHealth='.$p.'">'.$p;
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
  <button type="submit" class="card-btn btn text-light py-2" name="searchDate-Health" style="background-color: #d75093;">Search</button>
  <a class="btn text-light py-2" href="dataTableParticipant_adviser.php" style="background-color: #d75093;">Clear</a>
  </div>
  </form>';
}
public function filterActivityEnvironment(){
  $config = new config;
  $pdo = $config ->Con();

  $search = $_GET['searchDate-Environment'];
  $dateFrom = $this->dateFrom;
  $dateTo = $this->dateTo;
  $limit = 10;
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `type` = 'Environment Care'");
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
  $sql = "SELECT `title` FROM `outreach_participant` WHERE `type` = 'Environment Care' GROUP BY `title` DESC";
  $data = $pdo->prepare($sql);
  $data->execute();
  $rows = $data->fetchAll();
  foreach ($rows as $row){
    $row->title;
  }

  $sql = "SELECT `title`, COUNT(`title`) as `Population`, `date` FROM `outreach_participant` WHERE `type` = 'Environment Care' AND `date` BETWEEN ? AND ? GROUP BY `title` ORDER BY `Population` DESC";
  $data = $pdo->prepare($sql);
  $data->execute([$dateFrom,$dateTo]);
  $results = $data->fetchAll();

  echo '<table style="width:100%; background-color: white;" class="table table-bordered pb-5">';
  echo '<tr>';
  echo '<th class="text-center" style="color:#d74f95">Activity</th> <th class="text-center" style="color:#d74f95">Total Number of Participants</th> <th class="text-center" style="color:#d74f95">Action</th>';
  echo '</tr>';
  foreach ($results as $result) {
  echo '<tr>';
  echo '<td class="text-center py-3">'.$result->title.'</td>';
  echo '<td class="text-center py-3">'.$result->Population.'<i class="fas fa-users ml-1"></i></td>';
  echo '<td class="text-center py-3"><a class="btn btn-outline-primary" href="tableActivity_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'"><i class="fas fa-eye mr-1"></i>View</a></td>';
  echo '</tr>';
  }
  echo '</table>';

  echo '<ul>';
  for ($p=1; $p <= $total_pages; $p++) {
    echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
    echo  '<a class="page-link" href="?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&searchDate-Environment='.$search.'&pill=environment&tab=activity&pageEnvironment='.$p.'">'.$p;
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
  <a class="btn text-light py-2" href="dataTableParticipant_adviser.php" style="background-color: #d75093;">Clear</a>
  </div>
  </form>';
}
public function filterActivityLivelihood(){
  $config = new config;
  $pdo = $config ->Con();

  $search = $_GET['searchDate-Livelihood'];
  $dateFrom = $this->dateFrom;
  $dateTo = $this->dateTo;
  $limit = 10;
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $s = $pdo->prepare("SELECT * FROM `outreach_participant` WHERE `type` = 'Livelihood & Entrepreneurship'");
  $s->execute();
  $all = $s->fetchAll(PDO::FETCH_ASSOC);
  $total_results = $s->rowCount();
  $total_pages = ceil($total_results/$limit);

  if (!isset($_GET['pageLivelihood'])) {
    $page = 1;
  } else{
    $page = $_GET['pageLivelihood'];
  }

  $start = ($page-1)*$limit;
  $sql = "SELECT `title` FROM `outreach_participant` WHERE `type` = 'Livelihood & Entrepreneurship' GROUP BY `title` DESC";
  $data = $pdo->prepare($sql);
  $data->execute();
  $rows = $data->fetchAll();
  foreach ($rows as $row){
    $row->title;
  }

  $sql = "SELECT `title`, COUNT(`title`) as `Population`, `date` FROM `outreach_participant` WHERE `type` = 'Livelihood & Entrepreneurship' AND `date` BETWEEN ? AND ? GROUP BY `title` ORDER BY `Population` DESC";
  $data = $pdo->prepare($sql);
  $data->execute([$dateFrom,$dateTo]);
  $results = $data->fetchAll();

  echo '<table style="width:100%; background-color: white;" class="table table-bordered pb-5">';
  echo '<tr>';
  echo '<th class="text-center" style="color:#d74f95">Activity</th> <th class="text-center" style="color:#d74f95">Total Number of Participants</th> <th class="text-center" style="color:#d74f95">Action</th>';
  echo '</tr>';
  foreach ($results as $result) {
  echo '<tr>';
  echo '<td class="text-center py-3">'.$result->title.'</td>';
  echo '<td class="text-center py-3">'.$result->Population.'<i class="fas fa-users ml-1"></i></td>';
  echo '<td class="text-center py-3"><a class="btn btn-outline-primary" href="tableActivity_adviser.php?act_title='.$result->title.'&act_date='.$result->date.'"><i class="fas fa-eye mr-1"></i>View</a></td>';
  echo '</tr>';
  }
  echo '</table>';

  echo '<ul>';
  for ($p=1; $p <= $total_pages; $p++) {
    echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
    echo  '<a class="page-link" href="?dateFrom='.$dateFrom.'&dateTo='.$dateTo.'&searchDate-Livelihood='.$search.'&pill=livelihood&tab=activity&pageLivelihood='.$p.'">'.$p;
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
  <a class="btn text-light py-2" href="dataTableParticipant_adviser.php" style="background-color: #d75093;">Clear</a>
  </div>
  </form>';
}
}
?>
