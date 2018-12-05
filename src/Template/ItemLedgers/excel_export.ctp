<?php 

	$date= date("d-m-Y"); 
	$time=date('h:i:a',time());

	$filename="Stock_report_".$date.'_'.$time;

/*	header ("Expires: 0");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/vnd.ms-excel");
	header ("Content-Disposition: attachment; filename=".$filename.".xls");
	header ("Content-Description: Generated Report" );  */
	echo '<table border="1"><tr style="font-size:14px;"><td colspan="9" align="center" style="text-align:center;">'.$companies->name .'<br/>' .$companies->address .',<br/>'. $companies->state->name .'</span><br/>
				<span> <i class="fa fa-phone" aria-hidden="true"></i>'.  $companies->phone_no . ' | Mobile : '. $companies->mobile .'<br/> GSTIN NO:'.
				$companies->gstin .'</span></td></tr></table>';
?>	

<table  border="1" >
						<thead>
							<tr>
							<th> SNo</th>
								<th scope="col"> Particulars </th>
								<th scope="col">Item Code</th>
								<th scope="col">HSN Code</th>
								<th scope="col">Stock Group</th>
								<th scope="col">Stock Sub Group</th>
								<th scope="col">Size</th>
								<th scope="col">Shade</th>
								<th scope="col">Quantity</th>
								<th scope="col">Sales Rate</th>
								<th scope="col">Purchase Rate</th>
								<th scope="col"> Stock Value</th>
								
							</tr>
						</thead>
						<tbody id="main_tbody" ><?php $sno = 1; 
								foreach ($Items as $Item): 
								 // pr($Item); exit;
									if(sizeof(@$remaining[$Item->id]) > 0){ 
									 $qty=round(@$remaining[$Item->id],2);
								?>
									<tr class="tr1">
											<td class="firstrow"><?php echo ++$sno; ?></td>
											<td ><?php echo $Item->name; ?></td>
											<td><?php echo $Item->item_code; ?></td>
											<td><?php echo $Item->hsn_code; ?></td>
											<td><?php if(@$Item->stock_group_id) { echo @$Item->stock_group->parent_stock_group->name; } else{ echo 'Primary'; }?></td>
											<td><?php if(@$Item->stock_group_id) { echo @$Item->stock_group->name; } else{ echo 'Primary'; }?></td>
											<td><?php if(@$Item->size_id) { echo @$Item->size->name; } else { echo '-'; } ?></td>
											<td><?php if(@$Item->shade_id){ echo @$Item->shade->name;  } else { echo '-'; } ?></td>
											<td align="right"><?php 
											echo $this->Form->input('total_qt', ['type' => 'hidden','class'=>'total_qt','value'=>$qty]); 
											echo @$qty; ?></td>
											 <td class="rightAligntextClass"><?=$this->Money->moneyFormatIndia($Item->sales_rate)?></td>
											<td align="right"><?php echo @$unit_rate[$Item->id]; ?></td>
											<td align="right"><?php echo @$unit_rate[$Item->id]*@$qty; ?></td><?php
											@$closing_stock+= @$unit_rate[$Item->id]*@$qty; 
										    @$total_qty+= @$qty; 
											?>
										
											
										</tr>
									<?php  } endforeach ?>
								 <tr class="last_tr">
								 <td colspan="8" align="right">Closing Stock</td><td align="right"><?=@$total_qty ?></td>
								 <td></td>
								 <td></td>
								
								 <td class="rightAligntextClass"><?=$this->Money->moneyFormatIndia(@$closing_stock)?></td>
								 </tr>
								
						</tbody>
					</table>