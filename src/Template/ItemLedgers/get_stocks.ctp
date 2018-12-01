<?php $sno = 1; 
								foreach ($Items as $Item): 
								 // pr($Item); exit;
									if(sizeof(@$remaining[$Item->id]) > 0){ 
									 $qty=round(@$remaining[$Item->id],2);
								?>
									<tr class="tr1">
											<td class="firstrow"><?php echo $sno++; ?></td>
											<td ><button type="button"  class="btn btn-xs tooltips revision_hide show_data" id="<?= h($Item->id) ?>" value="" style="margin-left:5px;margin-bottom:2px;"><i class="fa fa-plus-circle"></i></button>
											<button type="button" class="btn btn-xs tooltips revision_show" style="margin-left:5px;margin-bottom:2px; display:none;"><i class="fa fa-minus-circle"></i></button><?php echo $Item->name; ?></td>
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
								
								 <td class="rightAligntextClass"><?=$this->Money->moneyFormatIndia($closing_stock)?></td>
								 </tr>