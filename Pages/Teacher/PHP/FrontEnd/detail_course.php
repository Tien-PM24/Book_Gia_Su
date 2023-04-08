
<?php
    include "./teacher.php";

    if (isset($_GET['data_id'])){
        $id=$_GET['data_id'];
        $sql = "SELECT * FROM course where ID_course=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="form_container">
            <div id="form">
                <img src="<?php echo $row['Image'] ?>" alt="course image">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo $row['Name'] ?>" >
                <label for="price">Price</label>
                <input type="text" id="price" name="price" value="<?php echo $row['Price'] ?>" >
                <button type="submit" class="dong">Close</button>
            </div>
        </div>
    </form>
    
    
    <?php
    } 
?>
<script>
    var btn=document.querySelector('.dong');
    btn.addEventListener('click',function(event){
        event.preventDefault();
       var form=document.querySelector('.form_container');
       form.style.display="none"
    })
</script>
<style>

.form_container{
    background-color: rgba(0,0,0,0.3); 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    height: 100vh; 
    width: 100vw;
    position: absolute;
    top: 5%;
    z-index: 1;
}

#form {
    z-index: 2;
    max-width: 600px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px 20px;
    background-color: #f7f7f7;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#form img {
    max-width: 100%;
    margin-bottom: 20px;
}

#form label {
    display: block;
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: bold;
}

#form input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 20px;
    font-size: 16px;
    outline: none;
}

#form button {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    margin: 0 auto;
    display: block;
}
    </style>

