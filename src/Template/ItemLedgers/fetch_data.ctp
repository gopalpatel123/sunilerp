<table class="table table-hover tabl_tc">
	<thead>
		<tr>
			<th> SNo</th>
			<th scope="col"> Transaction Date </th>
			<th scope="col">Status</th>
			<th scope="col">Quantity</th>
			<th scope="col">rate</th>
		</tr>
	</thead>
	<tbody id="main_tbody" >
		<?php $i=1; foreach ($ItemLedgersData as $data): ?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $data->transaction_date; ?></td>
			<td><?php echo $data->status; ?></td>
			<td><?php echo $data->quantity; ?></td>
			<td><?php echo $data->rate; ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>