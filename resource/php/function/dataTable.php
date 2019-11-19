<!-- SELECT title, COUNT(schl_number) as Population FROM outreach WHERE title = 'Test 3' GROUP BY title -->
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/outreach/resource/php/db/config.php';
class dataTable extends config {
public function dataTableDepartmentLiteracy(){
            $config = new config;
            $pdo = $config->Con();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT `collegeDepartment`, COUNT(`collegeDepartment`) AS `count` FROM `outreach` WHERE `type` = 'Literacy & Numeracy' GROUP BY `collegeDepartment` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center">College Department</th> <th class="text-center">Number of Records</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '<td class="text-center">'.$result->count.'<i class="fas fa-book ml-1"></i></td>';
            echo '</tr>';
            }
            echo '</table>';
}

public function dataTableProponentLiteracy(){
            $config = new config;
            $pdo = $config->Con();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // $sql = "SELECT COUNT(`outreach_activity_id`) AS `count` FROM `outreach_activity` WHERE `type` = 'Literacy & Numeracy'";
            $sql = "SELECT `title` FROM `outreach` WHERE `type` = 'Literacy & Numeracy' GROUP BY `title` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $rows = $data->fetchAll();
            foreach ($rows as $row){
              $row->title;
            }

            $sql = "SELECT `title`, COUNT(`title`) as `Population` FROM `outreach` WHERE `type` = 'Literacy & Numeracy' GROUP BY `title` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll();

            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center">Activity</th> <th class="text-center">Total Number of Participants</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center py-3">'.$result->title.'</td>';
            echo '<td class="text-center py-3">'.$result->Population.'<i class="fas fa-users ml-1"></i></td>';
            echo '</tr>';
            }
            echo '</table>';
}

public function dataTableAttendeesLiteracy(){
  $config = new config;
  $pdo = $config->Con();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT COUNT(`outreach_id`) AS `count` FROM `outreach` WHERE `type` = 'Literacy & Numeracy'";
  $data = $pdo->prepare($sql);
  $data->execute();
  $results = $data->fetchAll(PDO::FETCH_OBJ);

  echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
  echo '<tr>';
  echo '<th class="text-center">Total Number of Attendees</th>';
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
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT `collegeDepartment`, COUNT(`collegeDepartment`) AS `count` FROM `outreach` WHERE `type` = 'Health & Wellness' GROUP BY `collegeDepartment` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center">College Department</th> <th class="text-center">Number of Records</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '<td class="text-center">'.$result->count.'<i class="fas fa-book ml-1"></i></td>';
            echo '</tr>';
            }
            echo '</table>';
}

public function dataTableProponentHealth(){
            $config = new config;
            $pdo = $config->Con();

            $sql = "SELECT `title` FROM `outreach` WHERE `type` = 'Health & Wellness' GROUP BY `title` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $rows = $data->fetchAll();
            foreach ($rows as $row){
              $row->title;
            }

            $sql = "SELECT `title`, COUNT(`title`) as `Population` FROM `outreach` WHERE `type` = 'Health & Wellness' GROUP BY `title` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll();

            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center">Activity</th> <th class="text-center">Total Number of Participants</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center py-3">'.$result->title.'</td>';
            echo '<td class="text-center py-3">'.$result->Population.'<i class="fas fa-users ml-1"></i></td>';
            echo '</tr>';
            }
            echo '</table>';
}

public function dataTableAttendeesHealth(){
  $config = new config;
  $pdo = $config->Con();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT COUNT(`outreach_id`) AS `count` FROM `outreach` WHERE `type` = 'Health & Wellness'";
  $data = $pdo->prepare($sql);
  $data->execute();
  $results = $data->fetchAll(PDO::FETCH_OBJ);

  echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
  echo '<tr>';
  echo '<th class="text-center">Total Number of Attendees</th>';
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
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT `collegeDepartment`, COUNT(`collegeDepartment`) AS `count` FROM `outreach` WHERE `type` = 'Environment Care' GROUP BY `collegeDepartment` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center">College Department</th> <th class="text-center">Number of Records</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '<td class="text-center">'.$result->count.'<i class="fas fa-book ml-1"></i></td>';
            echo '</tr>';
            }
            echo '</table>';
}

public function dataTableProponentEnvironment(){
            $config = new config;
            $pdo = $config->Con();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT `title` FROM `outreach` WHERE `type` = 'Environment Care' GROUP BY `title` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $rows = $data->fetchAll();
            foreach ($rows as $row){
              $row->title;
            }

            $sql = "SELECT `title`, COUNT(`title`) as `Population` FROM `outreach` WHERE `type` = 'Environment Care' GROUP BY `title` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll();

            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center">Activity</th> <th class="text-center">Total Number of Participants</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center py-3">'.$result->title.'</td>';
            echo '<td class="text-center py-3">'.$result->Population.'<i class="fas fa-users ml-1"></i></td>';
            echo '</tr>';
            }
            echo '</table>';
}

public function dataTableAttendeesEnvironment(){
  $config = new config;
  $pdo = $config->Con();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT COUNT(`outreach_id`) AS `count` FROM `outreach` WHERE `type` = 'Environment Care'";
  $data = $pdo->prepare($sql);
  $data->execute();
  $results = $data->fetchAll(PDO::FETCH_OBJ);

  echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
  echo '<tr>';
  echo '<th class="text-center">Total Number of Attendees</th>';
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
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT `collegeDepartment`, COUNT(`collegeDepartment`) AS `count` FROM `outreach` WHERE `type` = 'Livelihood & Entrepreneurship' GROUP BY `collegeDepartment` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll(PDO::FETCH_OBJ);

            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center">College Department</th> <th class="text-center">Number of Records</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center">'.$result->collegeDepartment.'</td>';
            echo '<td class="text-center">'.$result->count.'<i class="fas fa-book ml-1"></i></td>';
            echo '</tr>';
            }
            echo '</table>';
}

public function dataTableProponentLivelihood(){
            $config = new config;
            $pdo = $config->Con();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT `title` FROM `outreach` WHERE `type` = 'Livelihood & Entrepreneurship' GROUP BY `title` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $rows = $data->fetchAll();
            foreach ($rows as $row){
              $row->title;
            }

            $sql = "SELECT `title`, COUNT(`title`) as `Population` FROM `outreach` WHERE `type` = 'Livelihood & Entrepreneurship' GROUP BY `title` DESC";
            $data = $pdo->prepare($sql);
            $data->execute();
            $results = $data->fetchAll();

            echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
            echo '<tr>';
            echo '<th class="text-center">Activity</th> <th class="text-center">Total Number of Participants</th>';
            echo '</tr>';
            foreach ($results as $result) {
            echo '<tr>';
            echo '<td class="text-center py-3">'.$result->title.'</td>';
            echo '<td class="text-center py-3">'.$result->Population.'<i class="fas fa-users ml-1"></i></td>';
            echo '</tr>';
            }
            echo '</table>';
}

public function dataTableAttendeesLivelihood(){
  $config = new config;
  $pdo = $config->Con();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT COUNT(`outreach_id`) AS `count` FROM `outreach` WHERE `type` = 'Livelihood & Entrepreneurship'";
  $data = $pdo->prepare($sql);
  $data->execute();
  $results = $data->fetchAll(PDO::FETCH_OBJ);

  echo '<table style="width:100%; background-color: white;" class="table table-bordered">';
  echo '<tr>';
  echo '<th class="text-center">Total Number of Attendees</th>';
  echo '</tr>';
  foreach ($results as $result) {
  echo '<tr">';
  echo '<td class="text-center py-3">'.$result->count.'<i class="fas fa-users ml-1"></i></td>';
  echo '</tr>';
  }
  echo '</table>';
}
}
