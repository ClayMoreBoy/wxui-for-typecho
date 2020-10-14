<?php
/**
 * 我的邻居
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE html>
<html lang="zh">
<?php include('header.php'); ?>
<body class="container" id="friends">
	<div class="weui-tab panel">
		<div class="weui-tab__panel tab-container">
			<div class="page-container">
				<!--顶部导航-->
				<header class="header header-white">
					<div class="friend-circle"><span>邻居</span></div>
					<div class="share" onclick="javascript:location.href='publish.html';"><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
				</header>
				<!--页面主体-->
				<main class="page-main" style="margin-top:55px;background-color: var(--weui-BG-0)">
					<!--默认列表-->
					<div class="weui-cells myFriends">
                        <div class="weui-cell weui-cell_active">
                            <div class="weui-cell__hd profile_photo">
                                <img src="<?php $this->options->themeUrl('/img/icon/icon_discover_friends.png'); ?>">
                            </div>
                            <div class="weui-cell__bd profile_div">
                                <p>新的朋友</p>
                            </div>
                        </div>
                        <div class="weui-cell weui-cell_active">
                            <div class="weui-cell__hd profile_photo">
                                <img src="<?php $this->options->themeUrl('/img/icon/icon_discover_nearby.png'); ?>">
                            </div>
                            <div class="weui-cell__bd profile_div">
                                <p>附近的人</p>
                            </div>
                        </div>
                        <div class="weui-cell weui-cell_active">
                            <div class="weui-cell__hd profile_photo">
                                <img src="<?php $this->options->themeUrl('/img/icon/icon_discover_interest.png'); ?>">
                            </div>
                            <div class="weui-cell__bd profile_div">
                                <p>申请加入</p>
                            </div>
                        </div>
                    </div>
					<div class="weui-cells__title">我的邻居</div>
                    <div class="weui-cells myFriends">
                    <?php 
					$arrays = friends_Plugin::output(null, "friends");
					foreach($arrays as $link){
					    echo '
					    <div class="weui-cell weui-cell_active" onclick="javascript:window.open(\''.$link['url'].'\');">
                            <div class="weui-cell__hd profile_photo">
                                <img src="'.$link['image'].'">
                            </div>
                            <div class="weui-cell__bd profile_div">
                                <p>'.$link['name'].'</p>
                            </div>
                        </div>
					    ';
					}
					?>
                    </div>
				</main>
			</div>
		</div>
		<?php include('footer.php'); ?>
	</div>
	<?php include('footjs.php'); ?>
</body>
</html>
