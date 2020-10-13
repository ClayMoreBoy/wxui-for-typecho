<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--菜单区域-->
<div class="dialog_wrapper">
	<div class="weui-mask" style="display: none;"></div>
	<div class="weui-actionsheet" style="display: none;position: absolute;">
		<div class="weui-actionsheet__title">
			<p class="weui-actionsheet__title-text">选择操作</p>
		</div>
		<div class="weui-actionsheet__menu">
			<div class="weui-actionsheet__cell">发送给朋友</div>
			<div class="weui-actionsheet__cell">分享到朋友圈</div>
			<div class="weui-actionsheet__cell">收藏</div>
			<div class="weui-actionsheet__cell weui-actionsheet__cell_warn">投诉</div>
		</div>
		<div class="weui-actionsheet__action">
			<div class="weui-actionsheet__cell" id="actionsheetCancel">取消</div>
		</div>
	</div>
</div>