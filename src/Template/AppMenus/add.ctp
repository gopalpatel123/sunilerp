<?php
/**
  * @var \App\View\AppView $this
  */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List App Menus'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent App Menus'), ['controller' => 'AppMenus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent App Menu'), ['controller' => 'AppMenus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appMenus form large-9 medium-8 columns content">
    <?= $this->Form->create($appMenu) ?>
    <fieldset>
        <legend><?= __('Add App Menu') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('link');
            echo $this->Form->control('status');
            echo $this->Form->control('parent_id', ['options' => $parentAppMenus, 'empty' => true]);
            echo $this->Form->control('title_content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->

<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'Create Customer');
?>
<style>
.noBorder{
	border:none;
}
</style>
<div class="row">
	<div class="col-md-8">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">Create App Menu</span>
				</div>
			</div>
			<div class="portlet-body">
				<?= $this->Form->create($appMenu,['id'=>'form_sample_2']) ?>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Name <span class="required">*</span></label>
									<?php echo $this->Form->control('name',['class'=>'form-control input-sm','placeholder'=>'Name','label'=>false,'autofocus']); ?>
								</div>
								<div class="form-group">
									<label>Link</label>
									<?php echo $this->Form->control('link',['class'=>'form-control input-sm','label'=>false,'placeholder'=>'link']); ?>
								</div>
								<div class="form-group">
									<label>Status  <span class="required"></span></label>
									<?php echo $this->Form->control('status',['class'=>'form-control input-sm gst','label'=>false]); ?>
									
								</div>
								
								<div class="form-group">
									<label>Title content  <span class="required"></span></label>
									<?php echo $this->Form->control('title_content',['class'=>'form-control input-sm gst','label'=>false]); ?>
									
								</div>
								<div class="form-group">
									<label>Under Group </label>
									<?php echo $this->Form->control('parent_id',['class'=>'form-control input-sm select2me','label'=>false,'empty'=>'-select-', 'options' => $parentAppMenus]); ?>
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

