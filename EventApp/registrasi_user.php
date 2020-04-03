<?php
    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_POST['email'];
        $nama = isset($_POST['nama']) ? $_POST['nama'] : false;
        $gambar = isset($_POST['gambar']) ? $_POST['gambar'] : false;
        $password = isset($_POST['password']) ? $_POST['password'] : false;

        $res = array();

        $cek_email = "SELECT * FROM tb_user WHERE email = '$email'";
        $sql_cek_email = mysqli_query($con, $cek_email);
        if(mysqli_num_rows($sql_cek_email) > 0){
            $row = mysqli_fetch_array($sql_cek_email);
            $res['value'] = 0;
            $res['message'] = "Akun sudah ada";
        }else{
            if($gambar == ''){
                $gambar = "";
            }
            $query_input = "INSERT INTO tb_user (email,password ,nama, alamat, no_telp ,gambar, status) VALUES ('$email', '$password', '$nama','' ,'', '$gambar', 'Aktif')";
            $sql_input = mysqli_query($con, $query_input);
            if($sql_input){
                $cek_email = "SELECT * FROM tb_user WHERE email = '$email'";
                $sql_cek_email = mysqli_query($con, $cek_email);
                if($sql_cek_email){
                    $row = mysqli_fetch_array($sql_cek_email);
                    $res['value'] = 1;
                    $res['id_user'] = $row['id_user'];
                }
            }
        }

        echo json_encode($res);

    }
?>