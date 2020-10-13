<?php
/**
 * 发布朋友圈
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE html>
<html lang="zh">
<?php include('header.php'); ?>
<body class="container" id="publish">
	<div class="weui-tab panel">
		<div class="weui-tab__panel tab-container">
			<div class="page-container">
				<!--顶部导航-->
				<header class="header header-white">
					<div class="back" onclick="javascript:location.href='/';"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
					<div class="share"><a class="weui-btn weui-btn_primary weui-btn_mini" href="javascript:">发表</a></div>
				</header>
				<!--页面主体-->
				<main class="page-main" style="margin-top:64px;">
					<div class="weui-cells" style="margin-top: 0px;height: 100%;">
						<div class="weui-cell">
							<div class="weui-cell__bd">
								<textarea class="weui-textarea" placeholder="这一刻的想法..." rows="3"></textarea>
							</div>
						</div>
						<div class="weui-cell weui-cell_uploader">
							<div class="weui-cell__bd">
								<div class="weui-uploader">
									<div class="weui-uploader__bd">
										<div class="weui-uploader__input-box">
											<input id="uploaderInput" class="weui-uploader__input" type="file" accept="image/*" multiple />
										</div>
									</div>
								</div>
							</div>
						</div>
						<a class="weui-cell weui-cell_access" href="javascript:">
							<div class="weui-cell__hd"><img src="<?php $this->options->themeUrl('/img/icon/position.png'); ?>" alt="" style="width: 20px; margin-right: 16px; display: block;"></div>
							<div class="weui-cell__bd">
								<p>所在位置</p>
							</div>
							<div class="weui-cell__ft"></div>
						</a>
						<a class="weui-cell weui-cell_access" href="javascript:">
							<div class="weui-cell__hd"><img src="<?php $this->options->themeUrl('/img/icon/remind.png'); ?>" alt="" style="width: 20px; margin-right: 16px; display: block;"></div>
							<div class="weui-cell__bd">
								<p>提醒谁看</p>
							</div>
							<div class="weui-cell__ft"></div>
						</a>
						<a class="weui-cell weui-cell_access" href="javascript:">
							<div class="weui-cell__hd"><img src="<?php $this->options->themeUrl('/img/icon/look.png'); ?>" alt="" style="width: 20px; margin-right: 16px; display: block;"></div>
							<div class="weui-cell__bd">
								<p>谁可以看</p>
							</div>
							<div class="weui-cell__ft">
								公开
							</div>
						</a>
					</div>
				</main>
			</div>
		</div>
	</div>
	<?php include('footjs.php'); ?>
</body>
</html>