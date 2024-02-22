<!DOCTYPE html>
<html>
<head>
	<title>MEMBUAT GRAFIK DARI DATABASE MYSQL DENGAN PHP DAN CHART.JS - www.malasngoding.com</title>
	<script type="text/javascript" src="chartjs/Chart.js"></script>
</head>
<body>
	<style type="text/css">
	body{
		font-family: roboto;
	}

	table{
		margin: 0px auto;
	}
	</style>


	<center>
		<h2>MEMBUAT GRAFIK DARI DATABASE MYSQL DENGAN PHP DAN CHART.JS</h2>
	</center>


	<?php 
	include 'koneksi.php';
	?>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>

	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Merek</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"select * FROM barang");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['kode_barang']; ?></td>
					<td><?php echo $d['nama_barang']; ?></td>
					<td><?php echo $d['merek']; ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>


	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Logitech", "Zyrex", "Samsung", "Sharp"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_logitech = mysqli_query($koneksi,"select * from barang where merek='logitech'");
					echo mysqli_num_rows($jumlah_logitech);
					?>, 
					<?php 
					$jumlah_zyrex = mysqli_query($koneksi,"select * from barang where merek='zyrex'");
					echo mysqli_num_rows($jumlah_zyrex);
					?>, 
					<?php 
					$jumlah_samsung = mysqli_query($koneksi,"select * from barang where merek='samsung'");
					echo mysqli_num_rows($jumlah_samsung);
					?>, 
					<?php 
					$jumlah_sharp = mysqli_query($koneksi,"select * from barang where merek='sharp'");
					echo mysqli_num_rows($jumlah_sharp);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>