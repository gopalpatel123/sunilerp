<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'GRNS');
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">Goods Recieve Notes</span>
				</div>
				<div class="actions">
				<form method="GET" id="">
					<div class="row">
						<div class="col-md-9">
							<?php echo $this->Form->input('search',['class'=>'form-control input-sm pull-right','label'=>false, 'placeholder'=>'Search','autofocus'=>'autofocus','value'=>@$search]);
							?>
						</div>
						<div class="col-md-1">
							<button type="submit" class="go btn blue-madison input-sm">Go</button>
						</div> 
					</div>
				</form>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-responsive">
					<?php $page_no=$this->Paginator->current('Grns'); 
					$page_no=($page_no-1)*100; ?>
					<table class="table table-bordered table-hover table-condensed">
						<thead>
							<tr>
								<th scope="col" class="actions">Sr. No.</th>
								<th scope="col">Voucher No</th>
								<th scope="col">Reference No</th>
								<th scope="col">Supplier</th>
								<th scope="col">Transaction Date</th>
								<th scope="col" class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php 
									foreach ($grns as $grn): 
									
							?>
							<tr>
								<td><?= h(++$page_no) ?></td>
								<td><?= h('#'.str_pad($grn->voucher_no, 4, '0', STR_PAD_LEFT)) ?></td>
								<td><?= h($grn->reference_no) ?></td>
								<td><?= h(@$grn->supplier_ledger->name) ?></td>
								<td><?= h($grn->transaction_date) ?></td>
								<td class="actions">
									<?= $this->Html->link(__('View'), ['action' => 'view', $grn->id]) ?>
									<?php if (in_array("9", $userPages)){?>
									<?= $this->Html->link(__('Edit'), ['action' => 'edit', $grn->id]) ?>
									<?php }?>
									<?= $this->Html->link(__('Print-Barcodes'), ['action' => 'printBarcode', $grn->id]) ?>
									
									<?php  if($grn->status=="Pending"){ ?>
									<?= $this->Html->link(__('Create Purchase Invoice'), ['controller'=>'PurchaseInvoices','action' => 'add', $grn->id]) ?>
									<?php }else{ ?>
										<?php  echo $grn->status; ?>
									<?php } ?>
									<?php  if(@$grnToBeCreateVoucher[@$grn->id]=='yes'){ ?>
									<?= $this->Html->link(__('Create Stock Transfer'), ['controller'=>'IntraLocationStockTransferVouchers','action' => 'add', $grn->id]) ?>
									<?php } ?>
									
									
									
									
									
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="paginator">
					<ul class="pagination">
						<?= $this->Paginator->first('<< ' . __('first')) ?>
						<?= $this->Paginator->prev('< ' . __('previous')) ?>
						<?= $this->Paginator->numbers() ?>
						<?= $this->Paginator->next(__('next') . ' >') ?>
						<?= $this->Paginator->last(__('last') . ' >>') ?>
					</ul>
					<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
				</div>
			</div>
		</div>
	</div>
</div>