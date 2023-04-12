<link rel="stylesheet" href="../../../../Styles/Admin/upload.css">
<?php
    if (isset($_GET['edit'])) {
        $id=$_GET['edit'];
    }

?>
<div class="form-container">
  <form action="./Excecute_Imae.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="avatar">Select your avatar:</label>
      <input type="file" name="avatar" id="avatar">
      <input type="hidden" name="id_avatar" value="<?php echo $id ?>">
    </div>
    <div class="form-group">
      <button type="submit" name="Update" class="btn btn-primary">Update</button>
      <button type="button" class="btn btn-secondary" onclick="cancel()">Cancel</button>
    </div>
  </form>
</div>

<script>
  function cancel(){
    location.href="../FrontEnd/Edit_profile.php";
  }
</script>
