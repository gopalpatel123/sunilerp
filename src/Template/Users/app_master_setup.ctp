<?php
/**
 * @Author: PHP Poets IT Solutions Pvt. Ltd.
 */
$this->set('title', 'App Master Setup');
?>

<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-cursor font-purple-intense hide"></i>
					<span class="caption-subject font-blue-steel bold ">Category</span>
				</div>
			</div>
			<div class="portlet-body">
				<div class="row">
				<?php
					$target=array("88","89","90");
					if(!empty(count(array_intersect($userPages, $target)))){?>
					<div class="col-md-4">
						<span class="caption-subject bold ">Category</span>
						<div class="list-group">
						<?php if (in_array("88", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square menuCss']).' Create', '/StockGroups/appAdd',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>
							<?php if (in_array("89", $userPages) || in_array("90", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-list-ul menuCss']).' List', '/StockGroups/appCategoryIndex',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>
						</div>
					</div>
					<?php }?>
					<?php
					$target=array("94","95","96");
					if(!empty(count(array_intersect($userPages, $target)))){?>
					<div class="col-md-4">
						<span class="caption-subject bold ">Items</span>
						<div class="list-group">
						<?php if (in_array("95", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square menuCss']).' Create', '/Items/appAdd',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>
							<?php if (in_array("96", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-list-ul menuCss']).' List', '/Items/appIndex',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>
						</div>
					</div>
					<?php }?>
					<?php
					$target=array("91","92");
					if(!empty(count(array_intersect($userPages, $target)))){?>
					<div class="col-md-4">
						<span class="caption-subject bold ">Home Screens</span>
						<div class="list-group">
						<?php if (in_array("91", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square menuCss']).' Create', '/AppHomeScreens/add',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>
							<?php if (in_array("92", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-list-ul menuCss']).' List', '/AppHomeScreens',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>
						</div>
					</div>
					<?php }?>
					
					<?php
					$target=array("100","101");
					if(!empty(count(array_intersect($userPages, $target)))){?>
					<div class="col-md-4">
						<span class="caption-subject bold ">Banners</span>
						<div class="list-group">
						<?php if (in_array("100", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square menuCss']).' Create', '/AppBanners/add',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>
						<?php if (in_array("101", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square menuCss']).' List', '/AppBanners/',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>	
						</div>
					</div>
					<?php }?>
					<?php
					$target=array("99","98");
					if(!empty(count(array_intersect($userPages, $target)))){?>
					<div class="col-md-4">
						<span class="caption-subject bold ">Promotion</span>
						<div class="list-group">
						<?php if (in_array("98", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square menuCss']).' Create', '/AppPromotions/add',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>
						<?php if (in_array("99", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square menuCss']).' List', '/AppPromotions/',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>	
						</div>
					</div>
					<?php }?>
					<?php
					$target=array("103","104");
					if(!empty(count(array_intersect($userPages, $target)))){?>
					<div class="col-md-4">
						<span class="caption-subject bold ">Menus</span>
						<div class="list-group">
						<?php if (in_array("104", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square menuCss']).' Create', '/AppMenus/add',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>
						<?php if (in_array("103", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square menuCss']).' List', '/AppMenus/',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>	
						</div>
					</div>
					<?php }?>
					<?php
					$target=array("106","107");
					if(!empty(count(array_intersect($userPages, $target)))){?>
					<div class="col-md-4">
						<span class="caption-subject bold ">Brands</span>
						<div class="list-group">
						<?php if (in_array("107", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square menuCss']).' Create', '/AppBrands/add',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>
						<?php if (in_array("106", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square menuCss']).' List', '/AppBrands/',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>	
						</div>
					</div>
					<?php }?>
					<?php
					$target=array("93");
					if(!empty(count(array_intersect($userPages, $target)))){?>
					<div class="col-md-4">
						<span class="caption-subject bold ">Delivery Charges</span>
						<div class="list-group">
						<?php if (in_array("93", $userPages)){?>
							<?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square menuCss']).' Delivery Charges', '/DeliveryCharges/',['escape' => false, 'class'=>'list-group-item']); ?>
							<?php }?>
							
						</div>
					</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	
</div>



