<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeInit($archive){
	//评论表单处理
    if($archive->request->is('themeAction=comment')){
        ajaxComment($archive);
    }
}

function themeConfig($form) {
	//朋友圈首页背景图
    $bannerUrl = new Typecho_Widget_Helper_Form_Element_Text('bannerUrl', NULL, NULL, _t('朋友圈首页背景图'), _t('在这里填入一个图片 URL 地址'));
    $form->addInput($bannerUrl);
	
	//个人头像图片
	$avatarUrl = new Typecho_Widget_Helper_Form_Element_Text('avatarUrl', NULL, NULL, _t('个人头像图片'), _t('在这里填入一个图片 URL 地址'));
    $form->addInput($avatarUrl);
	
	//个人昵称
	$nickName = new Typecho_Widget_Helper_Form_Element_Text('nickName', NULL, NULL, _t('个人昵称'), _t('在这里填入自己的昵称'));
    $form->addInput($nickName);
	
	//个性签名
	$nickText = new Typecho_Widget_Helper_Form_Element_Text('nickText', NULL, NULL, _t('个性签名'), _t('在这里填入自己的个性签名'));
    $form->addInput($nickText);
    
    //默认要显示的评论条数
	$commentsNum = new Typecho_Widget_Helper_Form_Element_Text('commentsNum', NULL, NULL, _t('默认要显示的评论条数'), _t('在这里填入默认要显示的评论条数'));
    $form->addInput($commentsNum);
	
	//底部文本
	$footerInfo = new Typecho_Widget_Helper_Form_Element_Text('footerInfo', NULL, NULL, _t('底部文本'), _t('在这里填入页面底部的文本'));
    $form->addInput($footerInfo);
}

//根据文章ID获取评论
function getCommentsById($archive, $flag='index', $limit = 5) {
    $db = Typecho_Db::get();
    $nums = $db->fetchAll($db->select('count(cid)')->from('table.comments')
        ->where('table.comments.status = ?', 'approved')
        ->where('table.comments.type = ?', 'comment')
        ->where('table.comments.cid = ?', $archive->cid)
        ->order('table.comments.created', Typecho_Db::SORT_DESC));    
    $nums = $nums[0]['count(`cid`)'];
    $comments = $db->fetchAll($db->select()->from('table.comments')
        ->where('table.comments.status = ?', 'approved')
        ->where('table.comments.type = ?', 'comment')
        ->where('table.comments.cid = ?', $archive->cid)
        ->order('table.comments.created', Typecho_Db::SORT_DESC));
    if($comments){
		$num = 0;
        foreach($comments AS $comment) {
			$num++;
			if($comment['parent'] != 0) {
			    //父级评论ID不等于0，则代表是子评论
			    $parent = $db->fetchAll($db->select()->from('table.comments')
                    ->where('table.comments.status = ?', 'approved')
                    ->where('table.comments.type = ?', 'comment')
                    ->where('table.comments.cid = ?', $archive->cid)
                    ->where('table.comments.coid = ?', $comment['parent'])
                    ->order('table.comments.created', Typecho_Db::SORT_DESC));
			    echo '<span class="reply-info btnComment" onclick="btnComment(this)" data-id="'.$archive->cid.'" data-url="'.$archive->permalink.'" data-coid="'.$comment['coid'].'" data-author="'.$comment['author'].'"><span class="nickname">'.$comment['author'].'</span> 回复 <span class="nickname">'.$parent[0]['author'].'</span> : <span>'.$comment['text'].'</span></span>';
			} else {
			    echo '<span class="reply-info btnComment" onclick="btnComment(this)" data-id="'.$archive->cid.'" data-url="'.$archive->permalink.'" data-coid="'.$comment['coid'].'" data-author="'.$comment['author'].'"><span class="nickname">'.$comment['author'].'</span> : <span>'.$comment['text'].'</span></span>';
			}
			if($flag == 'index' and $num >= $limit) {
				break;
			}
        }    
		if($flag == 'index' and $nums > $limit) {
			echo '<span class="reply-other" onclick="javascript:location.href=\''.$archive->permalink.'\'">查看全部评论 <i class="fa fa-angle-down" aria-hidden="true"></i></span>';
		}
    }
}

//文章输出处理
function parseContent($archive, $flag='index') {
	//输出文本
	echo '<div class="dynamic-content-text">';
	$archive->content = str_replace ("<br><img", "<img", $archive->content);
	if($flag=='post') {
	    echo strip_tags($archive->content,"<br>");
	} else {
	    $len = mb_strlen(strip_tags($archive->content,'<br>'),'utf-8');
	    if($len > 120) {
	        echo mb_substr(strip_tags($archive->content,'<br>'),3,120,'utf-8');
	        echo '...<br><span class="reply-other" style="color:rgb(108,115,160)">查看全部</span>';
	    } else {
	        echo strip_tags($archive->content,"<br>");
	    }
	}
	
	echo '</div>';
	
	//先判断是普通文章还是视频文章
	if($archive->fields->video) {
		//视频文章
		
		//输出视频播放区
		echo '<ul class="playlist">';
		echo '<li><iframe src="https://www.dgua.xyz/Apis/1014?url='.$archive->fields->video.'"  frameborder=0 scrolling=no allowtransparency="true" allowfullscreen="true"></iframe></li></ul>';
		echo '</ul>';							
		
	} else {
		//普通文章
		
		//截取文章里面的图片
		$pattern = '/<img.*?src="(.*?)".*?\/?>/i';
		preg_match_all($pattern, $archive->content, $content);
		$content = $content[1];
		
		if(count($content) == 1) {
			//单图
			echo '<div class="row items-push js-gallery img-fluid-100"><ul class="imglist imglist1 animated fadeIn">';
			echo '<li><figure><a class="img-link img-link-zoom-in img-thumb img-lightbox" href="'.$content[0].'"><img src="'.$content[0].'" class="li-img img-fluid"></a></figure></li>';
			echo '</ul></div>';
		} else if(count($content) > 1 and count($content) <= 4) {
			//2-4图
			echo '<div class="row items-push js-gallery img-fluid-100"><ul class="imglist imglist4 animated fadeIn">';
			for($i = 0; $i < count($content); $i++) {
				echo '<li><figure><a class="img-link img-link-zoom-in img-thumb img-lightbox" href="'.$content[$i].'"><img src="'.$content[$i].'" class="li-img img-fluid"></a></figure></li>';
			}
			echo '</ul></div>';
		} else if(count($content) > 4) {
			//5-9图
			echo '<div class="row items-push js-gallery img-fluid-100"><ul class="imglist imglist9 animated fadeIn">';
			for($i = 0; $i < count($content); $i++) {
				echo '<li><figure><a class="img-link img-link-zoom-in img-thumb img-lightbox" href="'.$content[$i].'"><img src="'.$content[$i].'" class="li-img img-fluid"></a></figure></li>';
				if($i >= 9) {
    			    break;
    			}
			}
			echo '</ul></div>';
		}
	}
}

//解析时间
function parseContentTime($date) {
	date_default_timezone_set('PRC');
	$etime = time() - $date;
	switch ($etime){
		case $etime <= 60:
			$msg = '刚刚';
			break;
		case $etime > 60 && $etime <= 60 * 60:
			$msg = floor($etime / 60) . ' 分钟前';
			break;
		case $etime > 60 * 60 && $etime <= 24 * 60 * 60:
			$msg = date('Ymd',$date)==date('Ymd',time()) ? '今天 '.date('H:i',$date) : '昨天 '.date('H:i',$date);
			break;
		case $etime > 24 * 60 * 60 && $etime <= 2 * 24 * 60 * 60:
			$msg = date('Ymd',$date)+1==date('Ymd',time()) ? '昨天 '.date('H:i',$date) : '前天 '.date('H:i',$date);
			break;
		case $etime > 2 * 24 * 60 * 60 && $etime <= 12 * 30 * 24 * 60 * 60:
			$msg = date('Y',$date)==date('Y',time()) ? date('m-d H:i',$date) : date('Y-m-d H:i',$date);
			break;
		default: 
			$msg = date('Y-m-d',$date);
			break;
	}
	return $msg;
}

//ajax模式发表评论
function ajaxComment($archive){
    $options = Helper::options();
    $user = Typecho_Widget::widget('Widget_User');
    $db = Typecho_Db::get();
    if(!$archive->allow('comment')){
        $archive->response->throwJson(array('status'=>0,'msg'=>_t('评论已关闭')));
    }
	
	//发言频率限制
    if (!$user->pass('editor', true) && $archive->authorId != $user->uid &&
    $options->commentsPostIntervalEnable){
        $latestComment = $db->fetchRow($db->select('created')->from('table.comments')
                    ->where('cid = ?', $archive->cid)
                    ->where('ip = ?', $archive->request->getIp())
                    ->order('created', Typecho_Db::SORT_DESC)
                    ->limit(1));

        if ($latestComment && ($options->gmtTime - $latestComment['created'] > 0 &&
        $options->gmtTime - $latestComment['created'] < $options->commentsPostInterval)) {
            $archive->response->throwJson(array('status'=>0,'msg'=>_t('发言过于频繁, 请稍侯再试！')));
        }        
    }
	
	//评论信息
    $comment = array(
        'cid'       =>  $archive->cid,
        'created'   =>  $options->gmtTime,
        'agent'     =>  $archive->request->getAgent(),
        'ip'        =>  $archive->request->getIp(),
        'ownerId'   =>  $archive->author->uid,
        'type'      =>  'comment',
        'status'    =>  !$archive->allow('edit') && $options->commentsRequireModeration ? 'waiting' : 'approved'
    );
    
    //判断父节点
    if ($parentId = $archive->request->filter('int')->get('parent')) {
        if ($options->commentsThreaded && ($parent = $db->fetchRow($db->select('coid', 'cid')->from('table.comments')
        ->where('coid = ?', $parentId))) && $archive->cid == $parent['cid']) {
            $comment['parent'] = $parentId;
        } else {
            $archive->response->throwJson(array('status'=>0,'msg'=>_t('父级评论不存在'.$parentId)));
        }
    }

    $feedback = Typecho_Widget::widget('Widget_Feedback');
    //检验格式
    $validator = new Typecho_Validate();
    $validator->addRule('author', 'required', _t('必须填写昵称'));
    $validator->addRule('author', 'xssCheck', _t('请不要在昵称中使用特殊字符'));
    $validator->addRule('author', array($feedback, 'requireUserLogin'), _t('您所使用的昵称已经被注册！'));
    $validator->addRule('author', 'maxLength', _t('昵称最多包含200个字符'), 200);
    $validator->addRule('text', 'required', _t('必须填写评论内容'));
    $comment['text'] = $archive->request->text;

    /** 对一般匿名访问者,将用户数据保存一个月 */
    if (!$user->hasLogin()) {
        /** Anti-XSS */
        $comment['author'] = $archive->request->filter('trim')->author;
        $expire = $options->gmtTime + $options->timezone + 30*24*3600;
        Typecho_Cookie::set('__typecho_remember_author', $comment['author'], $expire);
    } else {
        $comment['author'] = $user->screenName;
        $comment['authorId'] = $user->uid;
    }
    
    if($comment['author'] == "" or empty($comment['author'])) {
        $archive->response->throwJson(array('status'=>0,'msg'=>_t('必须填写昵称')));
    }

    /** 评论者之前须有评论通过了审核 */
    if (!$options->commentsRequireModeration && $options->commentsWhitelist) {
        if ($feedback->size($feedback->select()->where('author = ? AND mail = ? AND status = ?', $comment['author'], $comment['mail'], 'approved'))) {
            $comment['status'] = 'approved';
        } else {
            $comment['status'] = 'waiting';
        }
    }

    if ($error = $validator->run($comment)) {
        $archive->response->throwJson(array('status'=>0,'msg'=> implode(';',$error)));
    }

    /** 添加评论 */
    $commentId = $feedback->insert($comment);
    if(!$commentId){
        $archive->response->throwJson(array('status'=>0,'msg'=>_t('评论失败')));
    }
    Typecho_Cookie::delete('__typecho_remember_text');
    $db->fetchRow($feedback->select()->where('coid = ?', $commentId)
    ->limit(1), array($feedback, 'push'));
    // 返回评论数据
    $data = array(
        'cid' => $feedback->cid,
        'coid' => $feedback->coid,
        'parent' => $feedback->parent,
        'mail' => $feedback->mail,
        'url' => $feedback->url,
        'ip' => $feedback->ip,
        'agent' => $feedback->agent,
        'author' => $feedback->author,
        'authorId' => $feedback->authorId,
        'permalink' => $feedback->permalink,
        'created' => $feedback->created,
        'datetime' => $feedback->date->format('Y-m-d H:i:s'),
        'status' => $feedback->status,
		'content' => $comment['text'],
    );
    $archive->response->throwJson(array('status'=>1,'comment'=>$data));
}

