<?php /*a:2:{s:93:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/index/view/index/reagent_research.html";i:1649646819;s:77:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/index/view/layout.html";i:1663570090;}*/ ?>
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
		
		
		<div class="reagent-sr">
			<div class="core">
				<div class="index-tit">
					<h3>科研试剂盒</h3>
					<p>
						<i></i>
						<span>RESEARCH REAGENTS</span>
						<i></i>
					</p>
				</div>
				
				<div class="reagent-main">
					<div class="reagent-tab">
						<div class="reagent-tab-item active">
							<div class="reagent-tab-icon">
								<i class="before-icon" style="background-image: url(/kayoudi/img/reagent/tab-icon1.png);"></i>
								<i class="after-icon" style="background-image: url(/kayoudi/img/reagent/tab-icon1h.png);"></i>
							</div>
							<p>呼吸道类</p>
						</div>
						<div class="reagent-tab-item">
							<div class="reagent-tab-icon">
								<i class="before-icon" style="background-image: url(/kayoudi/img/reagent/tab-icon2.png);"></i>
								<i class="after-icon" style="background-image: url(/kayoudi/img/reagent/tab-icon2h.png);"></i>
							</div>
							<p>肠道类</p>
						</div>
						<div class="reagent-tab-item">
							<div class="reagent-tab-icon">
								<i class="before-icon" style="background-image: url(/kayoudi/img/reagent/tab-icon3.png);"></i>
								<i class="after-icon" style="background-image: url(/kayoudi/img/reagent/tab-icon3h.png);"></i>
							</div>
							<p>妇科类</p>
						</div>
						<div class="reagent-tab-item">
							<div class="reagent-tab-icon">
								<i class="before-icon" style="background-image: url(/kayoudi/img/reagent/tab-icon4.png);"></i>
								<i class="after-icon" style="background-image: url(/kayoudi/img/reagent/tab-icon4h.png);"></i>
							</div>
							<p>血液类</p>
						</div>
						<div class="reagent-tab-item">
							<div class="reagent-tab-icon">
								<i class="before-icon" style="background-image: url(/kayoudi/img/reagent/tab-icon5.png);"></i>
								<i class="after-icon" style="background-image: url(/kayoudi/img/reagent/tab-icon5h.png);"></i>
							</div>
							<p>个体化用药类</p>
						</div>
					</div>
					
					
					<div class="reagent-con">
						<div class="reagent-con-cell active">
							<?php if(is_array($reagentdata['1']) || $reagentdata['1'] instanceof \think\Collection || $reagentdata['1'] instanceof \think\Paginator): $i = 0; $__LIST__ = $reagentdata['1'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
							<div class="reagent-con-item">
								<p><?php echo htmlentities($item['title']); if($item['test_method']): ?>（<?php echo htmlentities($item['test_method']); ?>）<?php endif; ?></p>
							</div>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						<div class="reagent-con-cell">
							<?php if(is_array($reagentdata['2']) || $reagentdata['2'] instanceof \think\Collection || $reagentdata['2'] instanceof \think\Paginator): $i = 0; $__LIST__ = $reagentdata['2'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
							<div class="reagent-con-item">
								<p><?php echo htmlentities($item['title']); if($item['test_method']): ?>（<?php echo htmlentities($item['test_method']); ?>）<?php endif; ?></p>
							</div>
						 	<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>

						<div class="reagent-con-cell">
							<?php if(is_array($reagentdata['3']) || $reagentdata['3'] instanceof \think\Collection || $reagentdata['3'] instanceof \think\Paginator): $i = 0; $__LIST__ = $reagentdata['3'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
							<div class="reagent-con-item">
								<p><?php echo htmlentities($item['title']); if($item['test_method']): ?>（<?php echo htmlentities($item['test_method']); ?>）<?php endif; ?></p>
							</div>
						 	<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>

						<div class="reagent-con-cell">
							<?php if(is_array($reagentdata['4']) || $reagentdata['4'] instanceof \think\Collection || $reagentdata['4'] instanceof \think\Paginator): $i = 0; $__LIST__ = $reagentdata['4'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
							<div class="reagent-con-item">
								<p><?php echo htmlentities($item['title']); if($item['test_method']): ?>（<?php echo htmlentities($item['test_method']); ?>）<?php endif; ?></p>
							</div>
						 	<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						<div class="reagent-con-cell">
							<?php if(is_array($reagentdata['5']) || $reagentdata['5'] instanceof \think\Collection || $reagentdata['5'] instanceof \think\Paginator): $i = 0; $__LIST__ = $reagentdata['5'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
							<div class="reagent-con-item">
								<p><?php echo htmlentities($item['title']); if($item['test_method']): ?>（<?php echo htmlentities($item['test_method']); ?>）<?php endif; ?></p>
							</div>
						 	<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
						 
					</div>
				</div>
			</div>
		</div>
		
		
		<script>
			var i = 0;
			$(".reagent-tab .reagent-tab-item").hover(function(){
				i = $(this).index()
				$(this).stop().addClass("active").siblings().stop().removeClass("active")
				$(".reagent-con .reagent-con-cell").eq(i).stop().addClass("active").siblings().stop().removeClass("active")
			})
		</script>
	
  

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

