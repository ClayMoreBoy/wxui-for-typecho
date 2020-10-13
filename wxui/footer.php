<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!--底部固定导航-->
<div class="weui-tabbar footer-tabbar">
	<div class="index weui-tabbar__item">
		<a href="/">
			<div style="display: inline-block; position: relative;" id="index">
				<img src="<?php $this->options->themeUrl('img/icon/icon_index.png'); ?>" alt="" class="weui-tabbar__icon">
			</div>
			<p class="weui-tabbar__label">朋友圈</p>
		</a>
	</div>
	<div class="friends weui-tabbar__item">
		<a href="friends.html">
			<img src="<?php $this->options->themeUrl('img/icon/icon_friends.png'); ?>" alt="" class="weui-tabbar__icon">
			<p class="weui-tabbar__label">邻居</p>
		</a>
	</div>
	<div class="discover weui-tabbar__item">
		<a href="discover.html">
			<div style="display: inline-block; position: relative;">
				<img src="<?php $this->options->themeUrl('img/icon/icon_discover.png'); ?>" alt="" class="weui-tabbar__icon">
				<span class="weui-badge weui-badge_dot" style="position: absolute; top: 0; right: -6px;"></span>
			</div>
			<p class="weui-tabbar__label">发现</p>
		</a>
	</div>
	<div class="my weui-tabbar__item">
		<a href="my.html">
			<img src="<?php $this->options->themeUrl('img/icon/icon_my.png'); ?>" alt="" class="weui-tabbar__icon">
			<p class="weui-tabbar__label">我</p>
		</a>
	</div>
</div>
