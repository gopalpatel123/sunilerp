<div class="row">
	<div class="col-md-8">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">Edit App Brand</span>
				</div>
			</div>
			<div class="portlet-body">
				<?= $this->Form->create($appBrand,['id'=>'form_sample_2','type'=>'file']) ?>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Name <span class="required">*</span></label>
									<?php echo $this->Form->control('name',['class'=>'form-control input-sm','placeholder'=>'Name','label'=>false,'autofocus']); ?>
								</div>
								<div class="form-group">
									<label>Discount </label>
									<?php echo $this->Form->control('discount',['class'=>'form-control input-sm','label'=>false,'placeholder'=>'discount']); ?>
								</div>
								<div class="form-group">
									<label>Status  <span class="required"></span></label>
									<?php 
									$option['Active']='Active';
									$option['Deactive']='Deactive';
									echo $this->Form->control('status',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-select-', 'options' => $option,'value'=>'Active']); ?>
									
								</div>
								
								<div class="form-group">
									<label>Brand Image</label>
									<?php echo $this->Form->control('brand_image',['class'=>'form-control input-sm image','label'=>false, 'type' =>'file','id'=>'stock_group_image']); ?>
								</div>
							
								<div class="form-group">
									<label></label>
									<?php 
									$result=$awsFileLoad->cdnpath();
									echo $this->Html->image($result.'/'.$appBrand->brand_image,['class'=>'img-responsive','style'=>'height: 50px; width:50px','id'=>'imgshw1']); ?>
								</div>
							
							</div>
							
						</div>
						
					</div>
				</div>
				<?= $this->Form->button(__('Submit'),['class'=>'btn btn-success submit']) ?>
				<?= $this->Form->end() ?>
			</div>
		</div>
	</div>
</div>
