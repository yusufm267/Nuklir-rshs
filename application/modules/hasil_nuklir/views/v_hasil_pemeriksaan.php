<table class="table table-bordered table-striped text-center">
	<thead>
		<tr>
			<th colspan="3">PEMERIKSAAN</th>
			<th>NAMA HASIL</th>
			<th>KADAR HASIl</th>
			<th>KADAR NORMAL</th>
			<th>JENIS RF</th>
			<th>DOSIS RF</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($hasil as $hs) { ?>
			<tr>
				<td><?= $hs->ID_JNS_LAYANAN ?></td>
				<td><?= $hs->NO_MEDREC ?></td>
				<td><?= $hs->NO_MEDREC ?></td>
				<td><?= $hs->NM_HASIL ?></td>
				<td><?= $hs->KADAR_HASIL ?></td>
				<td><?= $hs->JENIS_RF ?></td>
				<td><?= $hs->DOSIS_RF ?></td>
				<td><?= $hs->DOSIS_RF ?></td>
			</tr>

		<?php } ?>
		
	</tbody>
</table>