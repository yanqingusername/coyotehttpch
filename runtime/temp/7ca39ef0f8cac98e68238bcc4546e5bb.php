<?php /*a:2:{s:81:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/index/view/index/news.html";i:1632995738;s:77:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/index/view/layout.html";i:1663570090;}*/ ?>
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
			</div>
		</div>


		<div class="main">
			<div class="core">
				<div class="news-section1 wow bounceInUp">
					<div class="tit margin-b70">
						<div class="index1-tit">
							<i></i>
							<p><?php echo htmlentities($news['0']['subpicname']); ?></p>
						</div>
						<div class="tit-cn"><?php echo htmlentities($news['0']['catname']); ?></div>
					</div>
					<div class="swiper-container new-scroll">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<?php if(is_array($news['0']['data']) || $news['0']['data'] instanceof \think\Collection || $news['0']['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $news['0']['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
								<div class="news1-item">
									<div class="news1-info">
										<h4 class="font18 color-797F9C"><?php echo htmlentities(date('Y.m.d',!is_numeric($item['inputtime'])? strtotime($item['inputtime']) : $item['inputtime'])); ?></h4>
										<h3 class="font30"><?php echo htmlentities($item['title']); ?></h3>
										<a class="index-more" href="<?php echo url('news_details',['id'=>$item['id']]); ?>">
											<span>进一步了解</span><em></em>
										</a>
									</div>
									<div class="news-img" style="background-image: url(<?php echo htmlentities($item['path']); ?>);"></div>
								</div>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</div>
						<div class="swiper-scrollbar"></div>
					</div>
				</div>
				
				
				<div class="news-section2 wow bounceInUp">
					<div class="tit margin-b70">
						<div class="index1-tit">
							<i></i>
							<p><?php echo htmlentities($news['1']['subpicname']); ?></p>
						</div>
			
						<div class="tit-cn"><?php echo htmlentities($news['1']['catname']); ?></div>
					</div>
					
					<div class="news-section2-box">
						<?php if(is_array($news['1']['data']) || $news['1']['data'] instanceof \think\Collection || $news['1']['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $news['1']['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
						<div class="news2-item">
							<a href="<?php echo url('news_details',['id'=>$item['id']]); ?>">
								<h4><?php echo htmlentities(date('Y.m.d',!is_numeric($item['inputtime'])? strtotime($item['inputtime']) : $item['inputtime'])); ?></h4>
								<div class="flex1">
									<p class="flex1 line3"><?php echo htmlentities($item['title']); ?></p>
								</div>
								<i></i>
							</a>
						</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
				
				
				<div class="news-section3 wow bounceInUp">
					<div class="tit margin-b70">
						<div class="index1-tit">
							<i></i>
							<p><?php echo htmlentities($news['2']['subpicname']); ?></p>
						</div>
			
						<div class="tit-cn"><?php echo htmlentities($news['2']['catname']); ?></div>
					</div>
					
					<div class="news-section2-box">
						<div class="video-list">
							<?php if(is_array($news['2']['data']) || $news['2']['data'] instanceof \think\Collection || $news['2']['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $news['2']['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
								<div class="video-item">
									<a href="<?php echo url('news_details',['id'=>$item['id']]); ?>">
										<div class="video-img">
											<img src="/kayoudi/img/news/video-zw.png" alt="" class="zwimg"><!-- 占位图 -->
											<img src="<?php echo htmlentities($item['path']); ?>" alt="" class="isimg">
											<div class="play-icon"></div>
										</div>
										<div class="video-time"><?php echo htmlentities(date('Y.m.d',!is_numeric($item['inputtime'])? strtotime($item['inputtime']) : $item['inputtime'])); ?></div>
										<div class="video-text"><?php echo htmlentities($item['title']); ?></div>
										<div class="video-from">来源：<?php echo htmlentities($item['resume']); ?></div>
										<div class="video-arrow"><i></i></div>
									</a>
								</div>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
				
			</div>
		</div>
					
		<script>
			var swiper = new Swiper('.new-scroll', {
				direction: 'vertical',
				roundLengths: true,
				slidesPerView: 'auto',
				freeMode: true,
				scrollbar: {
					el: '.new-scroll .swiper-scrollbar',
				},
				mousewheel: true,
			});
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

