<?php include('config.php'); ?>

		<center><font size="6">Insert Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Id			= $_POST['id'];
			$s1		= $_POST['semester1'];
			$s2		= $_POST['semester2'];
			$s3		= $_POST['semester3'];

			$cek = mysqli_query($koneksi, "SELECT * FROM ipk WHERE id='$Id'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO ipk(id, semester1, semester2, semester3) VALUES('$Id', '$s1', '$s2', '$s3')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_ipk";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, id sudah terdaftar.</div>';
			}
		}
		?>

		<form action="index.php?page=tambah_ipk" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">IPK Semester-1</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="semester1" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">IPK Semester-2</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="semester2" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">IPK Semester-3 </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="semester3" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Save">
			</div>
		</form>
	</div>
