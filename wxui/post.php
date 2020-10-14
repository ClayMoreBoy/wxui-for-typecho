<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<!DOCTYPE html>
<html lang="zh">
<?php include('header.php'); ?>
<body class="container" id="post">
	<div class="weui-tab panel">
		<div class="weui-tab__panel tab-container" style="background-color: #FFFFFF;">
			<div class="page-container">
				<!--顶部导航-->
				<header class="header header-white">
					<div class="back" onclick="javascript:window.history.go(-1);"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
					<div class="friend-circle"><span>详情</span></div>
					<div class="share" onclick="javascript:postMenu();"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div>
				</header>
				<!--页面主体-->
				<main class="page-main" style="margin-top:70px;">
					<!--朋友圈动态-->
					<section class="dynamic">
						<!--朋友圈动态数据-->
						<div class="dynamic-item">
							<aside>
								<figure class="author-avatar"><img src="<?php $this->options->avatarUrl() ?>" alt=""></figure>
							</aside>
							<article class="content data-<?php echo $this->cid?>">
								<h5><?php $this->author(); ?></h5>
								<section class="dynamic-content">
								<?php parseContent($this,'post'); ?>
								</section>
								<div class="share-bottom">
									<span class="time"><?php echo parseContentTime($this->date->timeStamp); ?></span>
									<span class="reply-hidden"></span>
									<div class="reply-botton">
										<botton type="botton" class="btnFabulous"><i class="fa fa-heart-o" aria-hidden="true"></i> 赞</botton>
										<botton type="botton" class="btnComment" onclick="btnComment(this)" data-id="<?php echo $this->cid?>" data-url="<?php $this->permalink(); ?>"><i class="fa fa-comment-o" aria-hidden="true"></i> 评论</botton>
									</div>
								</div>
								<?php
								//获取评论
								if($this->commentsNum > 0) {
									echo '<div class="reply-list">';
									echo getCommentsById($this, 'post');
									echo '</div>';
								}
								?>
							</article>
						</div>
					</section>
				</main>
				<?php $this->need('comments.php'); ?>
				<?php $this->need('menus.php'); ?>
			</div>
		</div>
	</div>
	<?php include('footjs.php'); ?>
</body>
</html>
