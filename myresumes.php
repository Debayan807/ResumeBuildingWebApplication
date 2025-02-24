<?php
$title= "My Resumes| Resume Builder"; // To make it dynamic
require './assets/includes/header.php';
require './assets/includes/navbar.php';
 /** @var \mysqli $fn **/
  $fn->authPage();

  $resumes = $db->query('SELECT * FROM resumes WHERE  user_id= '.$fn->Auth()['id'].' ORDER BY id DESC');
  /** @var /mysqli $resumes */
  $resume=$resumes->fetch_all(1);

// /** @var \mysqli $fn **/
//  $fn->authPage();
//  $slug=$_GET['resume']??'';
//  $resumes = $db->query("SELECT * FROM resumes WHERE ( slug='$slug' AND  user_id= '.$fn->Auth()['id'].') ORDER BY id DESC");
//  $resume=$resumes->fetch_assoc();
//  if(!$resume){
//     $fn->redirect('myresumes.php');
//  }

?>

    

    <div class="container">

        <div class="bg-white rounded shadow p-2 mt-4" style="min-height:80vh">
            <div class="d-flex justify-content-between border-bottom">
                <h5>Resumes</h5>
                <div>
                    <a href="createresume.php" class="text-decoration-none"><i class="bi bi-file-earmark-plus"></i> Add New</a>
                </div>
            </div>
<?php
  if($resumes){
?>
 <div class="d-flex flex-wrap">

 <?php
 foreach($resumes as $resumes){
    ?>
    <div class="col-12 col-md-6 p-2">
    <div class="p-2 border rounded">
        <h5><?=@$resumes['resume_title']?></h5>
        <p class="small text-secondary m-0" style="font-size:12px"><i class="bi bi-clock-history"></i>
            Last Updated <?=date('d,F,Y,h:i A',$resumes['updated_at'])?>;
        </p>
        <div class="d-flex gap-2 mt-1">
            <a href="resume.php?resume=<?=$resumes['slug']?>" target="_blank" class="text-decoration-none small"><i class="bi bi-file-text"></i> Open</a>
            <a href="updateresume.php?resume=<?=$resumes['slug']?>" class="text-decoration-none small"><i class="bi bi-pencil-square"></i> Edit</a>
            <a href="actions/deleteresume.action.php?id=<?=$resumes['id']?>" class="text-decoration-none small"><i class="bi bi-trash2"></i> Delete</a>
            
            <a href="actions/clonecv.action.php?resume=<?=$resumes['slug']?>" class="text-decoration-none small"><i class="bi bi-copy"></i> Clone</a>

        </div>
    </div>
</div>

    <?php
 }
 ?>





</div>
<?php
  }else{
    ?>
     <div class="text-center py-3 border rounded mt-3" style="background-color: rgba(236, 236, 236, 0.56);">
                <i class="bi bi-file-text"></i> No Resumes Available
            </div>
    <?php
  }
  ?>


           


           

        </div>

    </div>
    <?php
require './assets/includes/footer.php';
?>

