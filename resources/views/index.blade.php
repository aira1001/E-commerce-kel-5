<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Pelaporan Kasus Kepolisian</title>
</head>
<body>
	<h3>Data Kasus</h3>
 
	<a href="/kasus/tambah"> + Tambah Kasus Baru</a>
	
	<br/>
	<br/>
 
	<table border="1">
		<tr>
			<th>Nama Kasus</th>
			<th>Deskripsi Kasus</th>
			<th>Status Kasus</th>
			<th>Level Kasus</th>
			<th>ID Pegawai PIC</th>
		</tr>
		@foreach($kasus as $k)
		<tr>
			<td>{{ $k->nama_kasus }}</td>
			<td>{{ $k->deskripsi_kasus }}</td>
			<td>{{ $k->status_kasus }}</td>
      <td>{{ $k->level_kasus }}</td>
			<td>{{ $k->id_pegawai_pic}}</td>
			<td>
				<a href="/kasus/edit/{{ $k->id_kasus }}">Edit</a>
				|
				<a href="/kasus/hapus/{{ $k->id_kasus}}">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>
 
 
</body>
</html>


@foreach($kasus as $k)
<tr>
	<td>{{ $k->nama_kasus}}</td>
	<td>{{ $k->deskripsi_kasus }}</td>
	<td>{{ $k->status_kasus }}</td>
	<td>{{ $k->level_kasus }}</td>
  <td>{{ $k->id_pegawai_pic }}</td>
	<td>
		<a href="/kasus/edit/{{ $k->id_kasus }}">Edit</a>
		|
		<a href="/kasus/hapus/{{ $k->id_kasus }}">Hapus</a>
	</td>
</tr>
@endforeach