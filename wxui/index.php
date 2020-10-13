<?php
/**
 * WXUI 仿微信个人朋友圈主题
 * 
 * @package WXUI 仿微信个人朋友圈主题
 * @author 迷糊的阿多
 * @version 0.1
 * @link https://www.kdc.xyz
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE html>
<html lang="zh">
<?php include('header.php'); ?>
<body class="container" id="index">
	<div class="weui-tab panel">
		<div class="weui-tab__panel tab-container">
			<div class="page-container">
				<!--顶部导航-->
				<header class="header header-index">
					<div class="back"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
					<div class="friend-circle"><span>朋友圈</span></div>
					<div class="share" onclick="javascript:location.href='publish.html';"><i class="fa fa-camera" aria-hidden="true"></i></div>
				</header>
				<!--页面主体-->
				<main class="page-main">
					<!--朋友圈封面大图-->
					<section class="cover">
						<div class="cover-top">
							<figure class="cover-top-img"><img src="<?php $this->options->bannerUrl() ?>"></figure>
						</div>
					</section>
					<!--朋友圈封面头像-->
					<section class="avatar">
						<div class="avatar-top">
							<p class="avatar-top-name"><?php $this->options->nickName() ?></p>
							<figure class="avatar-top-img"><img src="<?php $this->options->avatarUrl() ?>" alt=""></figure>
						</div>
					</section>
					<section class="dynamic">
					    <?php while($this->next()): ?>
						<!--朋友圈动态数据-->
						<div class="dynamic-item">
							<aside>
								<figure class="author-avatar"><img src="<?php $this->options->avatarUrl() ?>" alt=""></figure>
							</aside>
							<article class="content data-<?php echo $this->cid?>">
								<h5><?php $this->author(); ?></h5>
								<section class="dynamic-content" data-url="<?php $this->permalink() ?>">
								<?php parseContent($this); ?>
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
									echo getCommentsById($this, 'index', $this->options->commentsNum);
									echo '</div>';
								}
								?>
							</article>
						</div>
						<?php endwhile; ?>
					</section>
					<!--底部信息-->
					<section class="footer loading">
						<div class="weui-footer" style="background-color:#FFFFFF">
							<p class="weui-footer__text"><?php $this->pageLink('点击查看更多','next') ?></p>
							<br>
						</div>
					</section>
				</main>
				<!--评论区域-->
				<?php $this->need('comments.php'); ?>
			</div>
		</div>
		<?php include('footer.php'); ?>
	</div>
	<?php include('footjs.php'); ?>
</body>
</html>