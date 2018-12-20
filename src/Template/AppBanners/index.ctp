
<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'App Banners');
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">App Banners</span>
				</div>
				<div class="pull-right">
					<div class="row">	
						<div class="col-md-12">	
							<a href="<?php echo $this->Url->build(['action'=>'add']) ?>" target="_blank"><button type="submit" class="go btn blue-madison input-sm" style="margin-bottom: -20px;">Add</button></a>
						</div>
					</div>		
				</div>
				<div class="actions">
					<form method="GET" id="">
						<div class="row">
							<div class="col-md-9">
								<?php echo $this->Form->input('search',['class'=>'form-control input-sm pull-right','label'=>false, 'placeholder'=>'Search','autofocus'=>'autofocus','value'=> @$search]);
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
			<?php $page_no=$this->Paginator->current('appBanner');
					 $page_no=($page_no-1)*100; 
									?>				
				<table class="table table-condensed table-hover table-bordered">
					<thead>
						<tr>
							<th scope="col"><?= $this->Paginator->sort('Sr') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Image') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Link Name') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Name') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Category') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Item') ?></th>
							<th scope="col"><?= $this->Paginator->sort('Status') ?></th>
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($appBanners as $appbanner): 
						$result=$awsFileLoad->cdnpath();
						?>
						<tr>
							<td><?= h(++$page_no) ?></td>
							<td class="gallery" style="text-align:center;"><a href="<?php echo $result.'/'.$appbanner->banner_image; ?>" rel="prettyPhoto[gallery1]" title="<?= h($appbanner->name) ?>"><?= $this->Html->image($result.'/'.$appbanner->banner_image,['class'=>'img-responsive thumbnail','style'=>"height:50px;width:55px"])?></a></td>
							<td><?= h($appbanner->link_name) ?></td>
							<td><?= h($appbanner->name) ?></td>
							<td><?= h(@$appbanner->stock_group->name) ?></td>
							<td><?= h(@$appbanner->item->name) ?></td>
							<td><?= h($appbanner->status) ?></td>
							
							<td class="actions">
							<?php if (in_array("57", $userPages)){?>
								<?= $this->Html->link(__('Edit'), ['action' => 'edit', $appbanner->id]) ?>
								<?php }?>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
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
	

	
<!-- BEGIN PAGE LEVEL STYLES -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->css('/assets/global/plugins/clockface/css/clockface.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	
	<!-- END COMPONENTS PICKERS -->

	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/select2/select2.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/jquery-multi-select/css/multi-select.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN COMPONENTS PICKERS -->
	
	<!-- END COMPONENTS PICKERS -->
	
	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-select/bootstrap-select.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/select2/select2.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->script('/assets/admin/pages/scripts/components-pickers.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<!-- END COMPONENTS PICKERS -->

	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/scripts/metronic.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/layout.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/quick-sidebar.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/demo.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/pages/scripts/components-dropdowns.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL SCRIPTS -->
<?php echo $this->Html->script('/assets/jquery.prettyPhoto.js',['block'=>'block_js']);?>	
<?php
	$js='
	$(document).ready(function() {
	  ComponentsPickers.init();
	  $(".gallery a[rel^=prettyPhoto]").prettyPhoto({animation_speed:"normal",theme:"light_square",slideshow:3000, autoplay_slideshow: true});
   });
	function checkValidation()
	{
	        $(".submit").attr("disabled","disabled");
	        $(".submit").text("Submiting...");
    }
	';

echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom')); 
?>