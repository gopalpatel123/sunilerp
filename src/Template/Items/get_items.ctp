
	<div class="form-group">
		<label>Select Items</label>
		<?php echo $this->Form->input('item_id', ['empty'=>'--Items--','options' => $itemDatas,'label' => false,'class' => 'form-control input-sm select2me item_id']); ?>
	</div>
