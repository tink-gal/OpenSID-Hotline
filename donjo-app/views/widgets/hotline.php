<!-- Widget Hotline -->
<?php if ($hotline): ?>
  <div class="box box-primary box-solid">
    <div class="box-header">
      <h3 class="box-title"><i class="fa fa-phone"></i> Nomer Penting</h3>
    </div>
    <div class="box-body">
      <ul id="ul-agenda" class="sidebar-latest">
        <?php foreach ($hotline as $l): ?>
          <li>
		  <table id="table-agenda" width="100%">
			<tr>
				<th id="label-meta-agenda" width="55%"><?= $l['nama']?></th>
				<td width="5%">:</td>
				<td id="isi-meta-agenda"><?= $l['nomer']?></td>
			</tr>
		  </table>

		  </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
<?php endif; ?>
