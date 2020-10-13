<?php
/**
 * 我的页面
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE html>
<html lang="zh">
<?php include('header.php'); ?>
<body class="container" id="my">
	<div class="weui-tab panel">
		<div class="weui-tab__panel tab-container">
			<div class="page-container">
				<!--顶部导航-->
				<header class="header header-white">
					<div class="friend-circle"><span>个人中心</span></div>
					<div class="share" onclick="javascript:location.href='publish.html';"><i class="fa fa-camera" aria-hidden="true"></i></div>
				</header>
				<!--页面主体-->
				<main class="page-main" style="margin-top:55px;background-color: var(--weui-BG-0)">
					<!--我的头像-->
					<section class="myAvatar">
						<div class="weui-cell weui-cell_active">
							<div class="weui-cell__hd profile_photo">
								<img src="<?php $this->options->avatarUrl() ?>">
							</div >
							<div class="weui-cell__bd profile_div">
								<p class="profile_name"><?php $this->options->nickName() ?></p>
								<p class="profile_account"><?php $this->options->nickText() ?></p>
							</div>
							<div class="weui-cell__ft">
								<i class="fa fa-qrcode" aria-hidden="true"></i>
								<i class="fa fa-angle-right" aria-hidden="true" style="margin-left: 1.5rem;"></i>
							</div>
						</div>
					</section>
					<div class="weui-tab__panel">
						<div class="weui-panel">
							<div class="weui-panel__bd">
								<div class="weui-panel__hd">关于我</div>
								<div class="weui-media-box weui-media-box_appmsg">
									<div class="weui-media-box_text">
										<?php $this->content(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--底部信息-->
					<section class="weui-cells footer">
						<div class="weui-footer" style="background-color:#FFFFFF">
							<br>
							<p class="weui-footer__text" style="margin-top: 0.5rem"><?php echo $this->options->footerInfo() ?></p>
							<br>
						</div>
					</section>
				</main>
			</div>
		</div>
		<?php include('footer.php'); ?>
	</div>
	<?php include('footjs.php'); ?>
</body>
</html>