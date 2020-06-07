<?php 
$con=mysqli_connect('localhost','root','','appartements');

$sql="SELECT app_id,img FROM images i, appartement a WHERE i.app_id=a.ID ORDER BY a.ID DESC";
$rep=mysqli_query($con,$sql);

$ligne=mysqli_fetch_array($rep);
?>
<div class="container">
  <input type="checkbox" id="check">
  <label for="check">
    <img src="<?php echo 'uploaded_img/'.$ligne['img'];?>" class="img0-thumb img0" alt="impossible de charger l'image">
  </label>
  
  <div class="images">
    <label for="check" class="close">&times;</label>
    <?php while($ligne){ ?>
      <img src="<?php echo 'uploaded_img/'.$ligne['img'];?>" alt="Impossible de charger l'image" class="w-100"><?php } ?>
  </div>
</div>

