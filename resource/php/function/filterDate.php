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
  $pg = $_GET['pg'];
  $_SESSION['pg'] = $pg;
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
  echo '<td class="text-center py-3"><a class="btn btn-outline-primary" href="tableActivity.php?pg='.$pg.'&act_title='.$result->title.'&act_date='.$result->date.'"><i class="fas fa-eye mr-1"></i>View</a></td>';
  echo '</tr>';
  }
  echo '</table>';

  echo '<ul>';
  for ($p=1; $p <= $total_pages; $p++) {
    echo '<li class="page-item" style="display: inline-block;margin-left:4px;">';
    echo  '<a class="page-link" href="?pg='.$pg.'&pill=literacy&tab=activity&pageLiteracy='.$p.'">'.$p;
    echo  '</a>';
    echo '</li>';
  }
  echo '</ul>';

  echo '<form method="GET">
  <div class="form-group">
  <input type="date" class="form-control text-muted d-inline" name="dateFrom" required autocomplete="off" style="WIDTH: 200px;">
  <input type="date" class="form-control text-muted d-inline" name="dateTo" required autocomplete="off" style="WIDTH: 200px;">
  <button type="submit" class="card-btn btn text-light px-5" name="searchDate-Literacy" style="background-color: #d75093;">Add</button>
  </div>
  </form>';
}
}
?>
