<?php
/**
 * 发现页
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE html>
<html lang="zh">
<?php include('header.php'); ?>
<body class="container" id="discover">
	<div class="weui-tab panel">
		<div class="weui-tab__panel tab-container">
			<div class="page-container">
				<!--顶部导航-->
				<header class="header header-white">
					<div class="friend-circle"><span>发现</span></div>
					<div class="share" onclick="javascript:location.href='publish.html';"><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
				</header>
				<!--页面主体-->
				<main class="page-main" style="margin-top:55px;background-color: var(--weui-BG-0)">
					<!--签名戳-->
					<div style="background-image: url('https://www.dgua.xyz/Apis/1022?key=<?php $this->options->title(); ?>');background-size:100% 100%;">
						<p style="padding:5rem"></p>
					</div>
					<div class="weui-cells">
						<a class="weui-cell weui-cell_access" href="javascript:">
							<div class="weui-cell__hd"><img src="<?php $this->options->themeUrl('/img/icon/icon_index_active.png'); ?>" alt="" style="width: 20px; margin-right: 16px; display: block;"></div>
							<div class="weui-cell__bd">
								<p>朋友圈</p>
							</div>
							<div class="weui-cell__ft"></div>
						</a>
					</div>
					<div class="weui-cells">
						<a class="weui-cell weui-cell_access" href="javascript:">
							<div class="weui-cell__hd"><img src="<?php $this->options->themeUrl('/img/icon/icon_wechat.png'); ?>" alt="" style="width: 20px; margin-right: 16px; display: block;"></div>
							<div class="weui-cell__bd">
								<p>微信社区</p>
							</div>
							<div class="weui-cell__ft"></div>
						</a>
					</div>
					<div class="weui-cells">
						<a class="weui-cell weui-cell_access" href="javascript:">
							<div class="weui-cell__hd"><img src="<?php $this->options->themeUrl('/img/icon/icon_qq.png'); ?>" alt="" style="width: 20px; margin-right: 16px; display: block;"></div>
							<div class="weui-cell__bd">
								<p>QQ交流群</p>
							</div>
							<div class="weui-cell__ft"></div>
						</a>
					</div>
				</main>
			</div>
		</div>
		<?php include('footer.php'); ?>
	</div>
	<?php include('footjs.php'); ?>
</body>
</html>