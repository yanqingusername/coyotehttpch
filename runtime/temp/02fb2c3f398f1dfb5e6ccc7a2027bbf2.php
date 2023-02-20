<?php /*a:2:{s:82:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/index/view/index/about.html";i:1676008796;s:77:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/index/view/layout.html";i:1663570090;}*/ ?>
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
		
		<div class="about1 wow bounceInUp">
			<div class="core">
				<div class="tit">
					<div class="index1-tit">
						<i></i>
						<p><?php echo htmlentities($about['entitle']); ?></p>
					</div>
					<div class="tit-cn"><?php echo htmlentities($about['title']); ?></div>
				</div>
				
				<div class="about1-con">
					<p>
						<?php echo htmlentities($about['content']); ?>
					</p>
				</div>
			</div>
		</div>
		
		<div class="about2 wow bounceInUp">
			<div class="about2-box1">
				<div class="about2-box1-left">
					<div class="left-cell">
						<div class="tit">
							<div class="index1-tit">
								<i></i>
								<p><?php echo htmlentities($about['entitle2']); ?></p>
							</div>
							
							<div class="tit-cn"><?php echo htmlentities($about['title2']); ?></div>
						</div>
						
						<div class="left-p">
							<?php echo $about['content2']; ?>
						</div>
					</div>
				</div>
				<div class="about2-box1-center"></div>
				<div class="about2-box1-right">
					<div class="right-cell">
						<img src="<?php echo htmlentities($about['image_path2']); ?>" alt="">
					</div>
				</div>
			</div>
			
			<div class="about2-box2">
				<div class="about2-box2-img" style="background-image: url(<?php echo htmlentities($about['image_path3']); ?>);"></div>
				<div class="about2-box2-text">
					<div class="text-cell">
						<?php echo $about['content3']; ?>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="about3 wow bounceInUp">
			<div class="about3-box1" style="background-image: url(<?php echo htmlentities($about['image_path4']); ?>);">
				<div class="core">
					<div class="index-tit">
						<h3><?php echo htmlentities($about['title4']); ?></h3>
						<p>
							<i></i>
							<span><?php echo htmlentities($about['entitle4']); ?></span>
							<i></i>
						</p>
					</div>
					
					<div class="about3-box1-p">
						<?php echo $about['content4']; ?>
					</div>
				</div>
			</div>
			
			<div class="core">
				<div class="about3-box2">
					<?php if(is_array($about_data) || $about_data instanceof \think\Collection || $about_data instanceof \think\Paginator): $i = 0; $__LIST__ = $about_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
						<div class="about3-box2-item">
							<i style="background-image: url(<?php echo htmlentities($item['path']); ?>);"></i>
							<h3><?php echo htmlentities($item['num']); ?><span><?php echo htmlentities($item['unit']); ?></span></h3>
							<p><?php echo htmlentities($item['title']); ?></p>
						</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
		</div>
		
		
		<div class="about4 wow bounceInUp">
			<div class="core">
				<div class="index-tit">
					<h3><?php echo htmlentities($about['title5']); ?></h3>
					<p>
						<i></i>
						<span><?php echo htmlentities($about['entitle5']); ?></span>
						<i></i>
					</p>
				</div>
				
				<div class="about4-context">
					<?php echo $about['content5']; ?>
				</div>
				
				<ul class="about4-list">
					<?php if(is_array($vanguard) || $vanguard instanceof \think\Collection || $vanguard instanceof \think\Paginator): $i = 0; $__LIST__ = $vanguard;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
					<li>
						<div class="about4-img pos_rel">
							<img src="/kayoudi/img/about/about-img1.png" alt="" class="zwimg"><!-- 占位图 -->
							<img src="<?php echo htmlentities($item['path']); ?>" alt="" class="isimg">
						</div>
						<p><?php echo htmlentities($item['year']); ?></p>
						<p><?php echo htmlentities($item['title']); ?></p>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		
		
		<div class="about5 wow bounceInUp">
			<div class="core">
				<div class="index-tit">
					<h3><?php echo htmlentities($about['title6']); ?></h3>
					<p>
						<i></i>
						<span><?php echo htmlentities($about['entitle6']); ?></span>
						<i></i>
					</p>
				</div>
				
				<div class="about5-context">
					<p>
						<?php echo htmlentities($about['content6']); ?>
					</p>
				</div>
				
				<div class="about5-img">
					<img src="<?php echo htmlentities($about['image_path6']); ?>" alt="">
				</div>
			</div>
		</div>
		
		
		<div class="about6 wow bounceInUp">
			<div class="core">
				<div class="index-tit">
					<h3><?php echo htmlentities($about['title7']); ?></h3>
					<p>
						<i></i>
						<span><?php echo htmlentities($about['entitle7']); ?></span>
						<i></i>
					</p>
				</div>
				
				<div class="about6-main">
					<div id="tag-cloud"></div>
				</div>
			</div>
		</div>
 
		<script src="/kayoudi/js/jquery.svg3dtagcloud.min.js"></script>
		<script>
			$(document).ready( function() {
				var entries = [ 
					<?php if(is_array($about['image7']) || $about['image7'] instanceof \think\Collection || $about['image7'] instanceof \think\Paginator): $i = 0; $__LIST__ = $about['image7'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;if($key < 4): ?>
						{ label: '<?php echo htmlentities($item); ?>', url: 'javascript:;', target: '', fontSize: 28 }, 
						<?php endif; if($key >= 4 && $key < 6): ?>
						{ label: '<?php echo htmlentities($item); ?>', url: 'javascript:;', target: '', fontSize: 22 }, 
						<?php endif; if($key >= 6): ?>
						{ label: escape2Html('<?php echo htmlentities($item); ?>'), url: 'javascript:;', target: '', fontSize: 18 }, 
						<?php endif; ?>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				];
		
		        function escape2Html(str) {
                    var arrEntities={'lt':'<','gt':'>','nbsp':' ','amp':'&','quot':'"','#40':'(','#41':')','#39':"'",'middot':"·"};
                    return str.replace(/&(lt|gt|nbsp|amp|quot|#40|#41|#39|middot);/ig,function(all,t){return arrEntities[t];});
                }
                
				var settings = {
					entries: entries,
					width: 940,
					height: 600,
					radius: '90%',
					radiusMin: 75,
					bgDraw: true,
					bgColor: '#ffffff',
					opacityOver: 1.00,
					opacityOut: 0.4,
					opacitySpeed: 6,
					fov: 800,
					speed: 0.5,
					fontFamily: 'Oswald, Arial, sans-serif',
					fontColor: '#1e264a',
					fontWeight: 'bold',//bold
					fontStyle: 'normal',//italic 
					fontStretch: 'normal',//wider, narrower, ultra-condensed, extra-condensed, condensed, semi-condensed, semi-expanded, expanded, extra-expanded, ultra-expanded
					fontToUpperCase: true
				};
		
				//var svg3DTagCloud = new SVG3DTagCloud( document.getElementById( 'holder'  ), settings );
				$('#tag-cloud').svg3DTagCloud( settings );
		
			} );
			
		</script>
		
		
		<div class="about7 pageBg wow bounceInUp">
			<div class="index-tit">
				<h3><?php echo htmlentities($about['title8']); ?></h3>
				<p>
					<i></i>
					<span><?php echo htmlentities($about['entitle8']); ?></span>
					<i></i>
				</p>
			</div>
			
			<div class="about7-main">
				<div class="about7-line"></div>
				<div class="swiper-container history">
				    <div class="swiper-wrapper">
				    	<?php if(is_array($development) || $development instanceof \think\Collection || $development instanceof \think\Paginator): $i = 0; $__LIST__ = $development;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
							<div class="swiper-slide">
								<i></i>
								<em></em>
								<div class="history-text">
									<h3>
										<?php echo htmlentities($item['title']); ?><span>年</span>
										<?php if($item['month']): ?>
											<?php echo htmlentities($item['month']); ?><span>月</span>
										<?php endif; ?>
									</h3>
									<ul>
										<?php if(is_array($item['content']) || $item['content'] instanceof \think\Collection || $item['content'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$con): $mod = ($i % 2 );++$i;?>
											<li><?php echo htmlentities($con); ?></li>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</ul>
								</div>
							</div>
						<?php endforeach; endif; else: echo "" ;endif; ?>
						
				    </div>
				</div>
			</div>
		</div>
		
		<script>
			var swiper = new Swiper('.history', {
				slidesPerView: 'auto',
				spaceBetween: 30,
				freeMode: true,
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

