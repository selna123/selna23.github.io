<?php
if(isset($_POST['bsimpan'])){


  //apakah data diedit / disimpan baru

  if(@$_GET['hal'] == "edit"){
    //perintah edit data
    //ubah data
    $ubah == mysqli_query($koneksi, "UPDATE tbl_pengirim_surat SET 
                                            nama_pengirim           ='$_POST[nama_pengirim]',
                                            alamat                  ='$_POST[alamat]',
                                            no_hp                   ='$_POST[no_hp]',
                                            email                   ='$_POST[email]'
                                            where id_pengirim_surat ='$_GET[id]'");

   if($ubah);{

   echo "<script>
   alert('Ubah Data Sukses');
   document.location='?halaman=pengirim_surat';
   </script>";
}
   {
    echo "<script>
    alert('Ubah Data Gagal');
    document.location='?halaman=pengirim_surat';
    </script>";
   } 
    
  }
  else{
    
    //perintah simpan data baru
     //simpan data
     $simpan == mysqli_query($koneksi, "INSERT INTO tbl_pengirim_surat
     VALUES ('', '$_POST[nama_pengirim]',
                 '$_POST[alamat]',
                 '$_POST[no_hp]',
                 '$_POST[email]'
                  )");

    if($simpan);{
    echo "<script>
    alert('Simpan Data Sukses');
    document.location='?halaman=pengirim_surat';
    </script>";
    }
  }
     
   
}

    //uji jika klik tombol edit dan hapus

    if(isset($_GET['hal'])){

        if($_GET['hal'] == "edit"){
            //tampilkan data yang akan di edit

        $tampil=mysqli_query($koneksi, "SELECT * FROM tbl_pengirim_surat where id_pengirim_surat='$_GET[id]' ");
        $data=mysqli_fetch_array($tampil);
        if($data){
          
            //jika data ditemukan, maka data ditampung ke dalam variabel
            $vnama_pengirim = $data ['nama_pengirim'];
            $valamat        = $data ['alamat'];
            $vno_hp         = $data ['no_hp'];
            $vemail         = $data ['email'];

      }
      }else{

        $hapus = mysqli_query($koneksi, "DELETE FROM tbl_pengirim_surat where id_pengirim_surat ='$_GET[id]'");
        if($hapus){
         
          echo "<script>
          alert('Hapus Data Sukses');
          document.location='?halaman=pengirim_surat';
          </script>";
        }

      }

   
    }

?>
<div class="card mt-3">
  <div class="card-header bg-info text-white ">
    Form Data Pengirim Surat
  </div>
    <div class="card-body">
    <form method="post" action="">
    <div class="form-group">
        <label for="nama_pengirim">Nama Pengirim</label>
        <input type="text" class="form-control" id="nama_pengirim" name = "nama_pengirim"
        value="<?=@$vnama_pengirim?>">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name = "alamat"
        value="<?=@$valamat?>">
    </div>
   
    <div class="form-group">
        <label for="no_hp">No.HP</label>
        <input type="text" class="form-control" id="no_hp" name = "no_hp"
        value="<?=@$vno_hp?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name = "email"
        value="<?=@$vemail?>">
    </div>
    <button type="submit" name = "bsimpan" class="btn btn-primary">Simpan</button>
    <button type="reset" name = "bbatal" class="btn btn-danger">Batal</button>
    </form>
  </div>
</div>


<div class="card mt-3">
  <div class="card-header bg-info text-white ">
    Data Pengirim Surat
  </div>
    <div class="card-body">
   <table class = "table table-bordered table-hovered table-striped">
    <tr>
        <th>No</th>
        <th>Nama Pengirim Surat</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
    <?php
        $tampil = mysqli_query($koneksi, "SELECT * from tbl_pengirim_surat order by id_pengirim_surat desc");
        $no = 1;
        while ($data = mysqli_fetch_array($tampil)) :
    ?>
    <tr>
        <td><?=$no++?></td>
        <td><?=$data['nama_pengirim']?></td>
        <td><?=$data['alamat']?></td>
        <td><?=$data['no_hp']?></td>
        <td><?=$data['email']?></td>
        <td>
          <a href="?halaman=pengirim_surat&hal=edit&id=<?=$data['id_pengirim_surat']?>"class="btn btn-success"> Edit </a>
          <a href="?halaman=pengirim_surat&hal=hapus&id=<?=$data['id_pengirim_surat']?>"class="btn btn-danger" onclick = "return confirm('Apakah yakin ingin mengahpus data ini?')"> Hapus </a>
          
        </td>
    </tr>
    <?php endwhile; ?>
   </table>
  </div>
</div>