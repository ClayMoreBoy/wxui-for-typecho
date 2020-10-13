<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,viewport-fit=cover">
	<meta name="format-detection" content="telephone=no">
	<meta name="author" content="viszoe">
	<title><?php $this->archiveTitle(array(
        'category'  =>  _t('分类 %s 下的文章'),
        'search'    =>  _t('包含关键字 %s 的文章'),
        'tag'       =>  _t('标签 %s 下的文章'),
        'author'    =>  _t('%s 发布的文章')
    ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
	<meta name="keywords" content="<?php $this->options->keywords() ?>"/>
    <meta name="description" content="<?php $this->options->description() ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/common.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/weui-basic.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/weui-form-adv.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/weui-form.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/weui-tips.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/weui-icon.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/weui-media-box.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/weui-btn.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/weui-dialog.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/weui-list.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/mainui.css'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/magnific-popup.css'); ?>">
</head>