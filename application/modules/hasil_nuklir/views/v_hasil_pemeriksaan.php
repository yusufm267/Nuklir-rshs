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
				<td><?= $hs->NM_LAYANAN?></td>
				<td><?= $hs->KELOMPOK_NUK?></td>
				<td>
					<input type="text" name="nm_hasil" class="form-control" value="<?= $hs->NM_HASIL ?>">
				</td>
				<td>
					<input type="text" name="kadar_hasil" class="form-control" value="<?= $hs->KADAR_HASIL ?>">
				</td>
				<td>
					<input type="text" name="kadar_normal" class="form-control" value="">
				</td>
				<td>
					<input type="text" name="jenis_rf" class="form-control" value="<?= $hs->JENIS_RF ?>">	
				</td>
				<td>
					<input type="text" name="dosis_rf" class="form-control" value="<?= $hs->DOSIS_RF ?>">
				</td>
			</tr>

		<?php } ?>
		
	</tbody>
</table>