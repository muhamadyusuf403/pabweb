<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Update Data </font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel konsumen berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM ipk WHERE id='$id'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$s1	= $_POST['semester1'];
			$s2	= $_POST['semester2'];
			$s3	= $_POST['semester3'];

			$sql = mysqli_query($koneksi, "UPDATE ipk SET semester1='$s1', semester2='$s2', semester3='$s3' WHERE id='$id'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_ipk";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_ipk&id=<?php echo $id; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id" class="form-control" size="4" value="<?php echo $data['id']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">IPK Semester-1 </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="semester1" class="form-control" value="<?php echo $data['semester1']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">IPK Semester-2 </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="semester2" class="form-control" value="<?php echo $data['semester2']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">IPK Semester-3 </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="semester3" class="form-control" value="<?php echo $data['semester3']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Save">
					<a href="index.php?page=tampil_ipk" class="btn btn-warning">Back</a>
				</div>
			</div>
		</form>
	</div>
