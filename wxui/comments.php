<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--评论区域-->
<div class="dialog_wrapper comment">
	<div class="weui-mask" style="display: none;"></div>
	<div class="weui-half-screen-dialog"  style="display: none;position: absolute;">
		<div class="weui-half-screen-dialog__hd">
			<div class="weui-half-screen-dialog__hd__main">
				<strong class="weui-half-screen-dialog__title">评论</strong>
			</div>
			<div class="weui-half-screen-dialog__hd__side">
				<button class="weui-icon-btn">关闭<i class="weui-icon-close-thin"></i></button>
			</div>
		</div>
		<div class="weui-half-screen-dialog__bd">
			<?php if($this->user->hasLogin()): ?>
			<div class="weui-cell weui-cell_active">
				<div class="weui-cell__hd"><label class="weui-label">昵称(*)</label></div>
				<div class="weui-cell__bd">
					<input class="weui-input" type="text" id="author" value="<?php $this->user->screenName(); ?>" readonly />
				</div>
			</div>
			<?php endif; ?>
			<?php if(!$this->user->hasLogin()): ?>
			<div class="weui-cell weui-cell_active">
				<div class="weui-cell__hd"><label class="weui-label">昵称(*)</label></div>
				<div class="weui-cell__bd">
					<input class="weui-input" type="text" placeholder="请输入昵称" id="author" value="<?php $this->remember('author'); ?>" />
				</div>
			</div>
			<?php endif; ?>
			<div class="weui-cell weui-cell_active" style="display:none;">
				<div class="weui-cell__hd"><label class="weui-label">参数</label></div>
				<div class="weui-cell__bd">
					<input class="weui-input data-id" type="text" value="" display />
					<input class="weui-input data-url" type="text" value="" display />
					<input class="weui-input data-coid" type="text" value="" display />
					<input class="weui-input data-pauthor" type="text" value="" display />
					<input class="weui-input data-token" value="">
				</div>
			</div>
			<div class="weui-cells weui-cells_form">
				<div class="weui-cell ">
					<div class="weui-cell__bd">
						<textarea class="weui-textarea" id="text" placeholder="请发表评论(*)" rows="3" maxlength="200" style="font-size: 14px;"></textarea>
						<div class="weui-textarea-counter"><span id="change_num">0</span>/200</div>
					</div>
				</div>
			</div>
		</div>
		<div class="weui-half-screen-dialog__ft">
			<a href="javascript:" class="weui-btn weui-btn_default">取消</a>
			<a href="javascript:submitComment()" class="weui-btn weui-btn_primary">发布</a>
		</div>
	</div>
</div>