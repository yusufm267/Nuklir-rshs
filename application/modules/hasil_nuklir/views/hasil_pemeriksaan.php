<table class="table table-bordered table-striped text-center">
	<thead>
		<tr>
			<th colspan="3">Pemeriksaan</th>
			<th>Nama Hasil</th>
			<th>KADAR HASIl</th>
			<th>KADAR NORMAL</th>
			<th>JENIS RF</th>
			<th>DOSIS RF</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($hasil as $hs) { ?>
			<tr>
				<td><?= $hs->NO_MEDREC ?></td>
				<td><?= $hs->NO_MEDREC ?></td>
				<td><?= $hs->NO_MEDREC ?></td>
				<td><?= $hs->NO_MEDREC ?></td>
				<td><?= $hs->NO_MEDREC ?></td>
				<td><?= $hs->NO_MEDREC ?></td>
				<td><?= $hs->NO_MEDREC ?></td>
				<td><?= $hs->NO_MEDREC ?></td>
			</tr>

		<?php } ?>
		
	</tbody>
</table>