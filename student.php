<?php
$method = $_SERVER["REQUEST_METHOD"];
include('./class/Student.php');
$student = new Student();

switch($method) {
  case 'GET':
    $id = $_GET['id'];
    if (isset($id)){
      $student = $student->find($id);
      $js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
    }else{
      $students = $student->all();
      $js_encode = json_encode(array('state'=>TRUE, 'students'=>$students),true);
    }
    header("Content-Type: application/json");
    echo($js_encode);
    break;

  case 'POST':
    // TODO
    $student = new Student();
    $id = $student->$id;
    if(isset($id)){
      $student->post($student);
      $js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
      header("Content-Type: application/json");
      echo($js_encode);
    }
    break;

  case 'DELETE':
    // TODO
    $id = $_DELETE['id'];
    if(isset($id))
    {
      $student = $student->find($id);
      if($student!=null)
      {
        $student->delete($id);
        $js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
      }
      header("Content-Type: application/json");
      echo($js_encode);
    }
    break;

  case 'PUT':
    // TODO
    $student = new Student();
    $id = $student->$id;
    if(isset($id)){
      $prova = $student->find($id);
      if($prova == null){
        $student->put($student);
        $js_encode = json_encode(array('state'=>TRUE, 'student'=>$student),true);
      }
      header("Content-Type: application/json");
      echo($js_encode);
    }
    break;

  default:
    break;
}


?>
