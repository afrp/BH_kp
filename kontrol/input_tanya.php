<?php
    include 'database.php';
if($_POST["submit"]=="kirim") {
    $name = $_POST['nama'];
    $subjek =$_POST['subjek'];
    $email = $_POST['email'];
    $isi = $_POST['message'];
    $id= $_POST['idnya'];
                
    $sql1=mysql_query("INSERT into tb_tanya (id_tanya, nama_tanya, judul_tanya, email_tanya, isi_tanya) 
          VALUES ('$id', '$name', '$subjek','$email','$isi')");
       if($sql1){ 
        ?>
            <script>
                alert("berhasil Dikirim");
                location.href = "../faq.php";
            </script>
        <?php
    } else
    {
        ?>
            <script>
                alert("gagal Dikirim");
                location.href = "../faq.php";
            </script>
        <?php
    }

}
?>