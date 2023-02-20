<?php /*a:2:{s:91:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/index/view/index/reagent_detail.html";i:1634092152;s:77:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/index/view/layout.html";i:1663570090;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>卡尤迪生物</title>
		<meta name="keywords" content="<?php echo htmlentities($seo['meta_keywords']); ?>">
		<meta name="description" content="<?php echo htmlentities($seo['meta_description']); ?>">
		<link rel="icon" type="image/x-icon" href="icon.png" />
		<link rel="stylesheet" href="/kayoudi/css/swiper.min.css" />
		<link rel="stylesheet" href="/kayoudi/css/common.css" />
		<link rel="stylesheet" href="/kayoudi/css/style.css" />
		<script type="text/javascript" src="/kayoudi/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="/kayoudi/js/wow.min.js"></script>
		<script type="text/javascript" src="/kayoudi/js/script.js"></script>
		<script type="text/javascript" src="/kayoudi/js/swiper.min.js"></script>
	</head>
	<body>
		<!-- 头部 开始 -->
		<div class="header ny-header">
			<div class="core">
				<div class="logo">
					<a href="index.html"><img src="<?php echo config('web_site_logo'); ?>" alt=""></a>
				</div>
				
				<div class="nav">
					<?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
						<div class="nav-item <?php if($item['active']): ?>active<?php endif; ?>">
							<p>
								<a href="<?php echo url($item['url']); ?>"><?php echo htmlentities($item['catname']); ?></a>
								<?php if($item['sub']): ?>
								<i></i>
								<?php endif; ?>
							</p>
							<?php if($item['sub']): ?>
								<div class="nav-two">
									<div class="core">
										<?php if(is_array($item['sub']) || $item['sub'] instanceof \think\Collection || $item['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub1): $mod = ($i % 2 );++$i;?>
											<dl>
												<dt><a href="<?php echo url($sub1['url']); ?>"><?php echo htmlentities($sub1['catname']); ?></a></dt>
												<?php if($sub1['sub']): if(is_array($sub1['sub']) || $sub1['sub'] instanceof \think\Collection || $sub1['sub'] instanceof \think\Paginator): $i = 0; $__LIST__ = $sub1['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub2): $mod = ($i % 2 );++$i;?>
														<dd><a href="<?php echo url($sub1['sub_url'],['id'=>$sub2['id']]); ?>"><?php echo htmlentities($sub2['title']); ?></a></dd>
													<?php endforeach; endif; else: echo "" ;endif; ?>
												<?php endif; ?>
											</dl>
										<?php endforeach; endif; else: echo "" ;endif; ?> 
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				
				<div class="header-search">
					<a href="<?php echo url('search'); ?>"></a>
				</div>
				
				<div class="lang">
					<div style="display: flex; align-items: center;">
						<i></i><span>中文</span>
					</div>
					<div class="other-lang">
						<a class="other-lang-item" href="http://en.coyotebio.com/">
							<span>EN</span>
						</a>
						<!--<a class="other-lang-item" href="https://coyotebio.com.tr/">
							<span>TUR</span>
						</a>-->
					</div>
				</div>
				
				<!-- <div class="search">
					<i></i>
				</div>
					
				<div class="search-box">
					<input type="text" id="" value="" />
					<button type="button">搜索</button>
				</div> -->
			</div>
		</div>
		
		<div class="head-wall"></div>
		<!-- 内页头部 结束 -->
 
		
		<div class="ny-banner color-495877" style="background-image: url(<?php echo htmlentities($cate['imagepath']); ?>);">
			<div class="core">
				<div class="banner-en font18 big-en">
					<i></i>
					<span><?php echo htmlentities($cate['subpicname']); ?></span>
				</div>

				<h3 class="font46 font-bold line-height-1em"><?php echo htmlentities($cate['picname']); ?></h3>
				
				<div class="ny-banner-text">
					<?php echo $cate['description']; ?>
				</div>
			</div>
		</div>
		
		<div class="reagent-detail">
			<div class="core">
				<div class="tit">
					<div class="index1-tit">
						<i></i>
						<p>product description</p>
					</div>
					<div class="tit-cn">产品概述</div>
				</div>
				
				<div class="reagent-detail-box1">
					<h3><?php echo htmlentities($reagentdata['title']); ?></h3>
					<div class="reagent-detail-p">
						<p>
							<?php echo htmlentities($reagentdata['content']); ?>
						</p>
					</div>
					
					<h4>产品优势:</h4>
					<ul>
						<?php if(is_array($reagentdata['tags']) || $reagentdata['tags'] instanceof \think\Collection || $reagentdata['tags'] instanceof \think\Paginator): $i = 0; $__LIST__ = $reagentdata['tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
							<li><i></i><p><?php echo htmlentities($item); ?></p></li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				
				<div class="reagent-detail-box2">
					<div class="reagent-detail-box2-left">
						<div class="reagent-detail-box2-img">
							<img src="<?php echo htmlentities($reagentdata['thumb_path']); ?>" alt="">
						</div>
						<!-- <div class="reagent-detail-box2-name">
							<h3>B族链球菌</h3>
							<p>核酸检测试剂盒</p>
							<p>（PCR-荧光探针法）</p>
						</div> -->
					</div>
					<div class="reagent-detail-box2-right">
						<p>检测方法：<?php echo htmlentities($reagentdata['test_method']); ?></p>
						<p>样本类型：<?php echo htmlentities($reagentdata['sample_type']); ?></p>
						<p>适用机型: <?php echo htmlentities($reagentdata['use_in']); ?></p>
					</div>
				</div>
				
				<div class="reagent-detail-box3">
					<h3>预期用途</h3>
					<div class="reagent-detail-box3-p">
						<p><?php echo $reagentdata['intended_use']; ?></p>
					</div>
				</div>
				
				<div class="product-information">
					<div class="index-tit">
						<h3>产品资料</h3>
						<p>
							<i></i>
							<span>Product information</span>
							<i></i>
						</p>
					</div>
					
					<div class="proInfo-list">
						<?php if(is_array($reagentdata['files_url']) || $reagentdata['files_url'] instanceof \think\Collection || $reagentdata['files_url'] instanceof \think\Paginator): $i = 0; $__LIST__ = $reagentdata['files_url'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
							<div class="proInfo-item margin-b30">
								<a href="<?php echo htmlentities($item['path']); ?>" download="<?php echo htmlentities($item['name']); ?>">
									<div class="proInfo-item-left">
										<i></i>
										<p>下载</p>
									</div>
									<div class="proInfo-item-right line2">
										<?php echo htmlentities($item['name']); ?>
									</div>
								</a>
							</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
			</div>
		</div>
	
  

		<div class="footer padding-t115 padding-b140">
			<div class="core">
				<div class="footer-main">
					<div class="footer-logo"><img src="<?php echo config('web_bottom_logo'); ?>" alt=""></div>
					<?php if(is_array($mycompany) || $mycompany instanceof \think\Collection || $mycompany instanceof \think\Paginator): $i = 0; $__LIST__ = $mycompany;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
						<div class="footer-info">
							<?php if(is_array($item) || $item instanceof \think\Collection || $item instanceof \think\Paginator): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?>
								<div class="finfo-item">
									<p><?php echo htmlentities($it['title']); ?></p>
									<p>地址：<?php echo htmlentities($it['address']); ?></p>
									<p><?php if($it['phone']): ?>办公电话：<?php echo htmlentities($it['phone']); ?><?php endif; ?>&nbsp;</p>
									<p><?php if($it['email']): ?>邮箱：<?php echo htmlentities($it['email']); ?><?php endif; ?>&nbsp;</p>
								</div>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>

				<div class="footer-main">
					<div class="footer-logo"> </div>
					<div class="footer-info">
						<div class="finfo-item">
							<p style="font-size: 20px">客服电话：<?php echo config('web_site_phone'); ?></p> 
						</div>
					</div>
					<div class="footer-info"> </div>
				</div>
				
				<div class="footer-bottom">
					<div class="flex-shrink0 padding-r20">
						<div class="fewm">
							<img src="<?php echo config('web_bottom_qrcode'); ?>" alt="">
						</div>
					</div>
					<div class="flex1 ohidden">
						<div class="fb-p text-right">
							<p><?php echo config('web_site_icp'); ?></p>
							<p>
								<?php if(is_array($bottom_menu) || $bottom_menu instanceof \think\Collection || $bottom_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $bottom_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
									<a href="<?php echo url($item['url']); ?>"><?php echo htmlentities($item['catname']); ?></a>
									<?php if(count($bottom_menu) != $key+1): ?>
									<em>/</em>
									<?php endif; ?>
								<?php endforeach; endif; else: echo "" ;endif; ?>
								<em>/</em>
								<!--<a href="<?php echo url('index/login'); ?>">服务支持</a>-->
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>  
</html> 

