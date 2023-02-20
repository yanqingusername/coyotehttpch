<?php /*a:2:{s:90:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/index/view/index/join_position.html";i:1633573546;s:77:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/index/view/layout.html";i:1663570090;}*/ ?>
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
 
		
		<div class="ny-banner color-495877" style="background-image: url(<?php echo htmlentities($cate['imagepath']); ?>)">
			<div class="core">
				<div class="banner-en font18 big-en">
					<i></i>
					<span><?php echo htmlentities($cate['subpicname']); ?></span>
				</div>
		
				<h3 class="font46 font-bold line-height-1em"><?php echo htmlentities($cate['picname']); ?></h3>
		
				<div class="banner-text">
					<?php echo $cate['description']; ?>
				</div>
			</div>
		</div>
		
		
		<div class="padding-t120 padding-b100">
			<div class="core">
				<div class="index-tit">
					<h3>查看所有职位</h3>
					<p>
						<i></i>
						<span>View all positions</span>
						<i></i>
					</p>
				</div>
				
				<form action="" method="get">
				<div class="joinDetail-search">
					<div class="jsearch-item jsearch-type">
						<div class="jsearch-input">
							<i style="background-image: url(/kayoudi/img/join/bag.png)"></i>
							<p>全部</p>
							<i class="arrow"></i>
						</div>
						<input type="hidden" name="positioncate" value="" id="positioncate">
						<input type="hidden" name="province" value="" id="province">
						<input type="hidden" name="city" value="" id="city">
						<input type="hidden" name="qu" value="" id="qu">
						<ul class="sel-list">
							<li data-positioncate="0">全部</li>
							<?php if(is_array($positioncate) || $positioncate instanceof \think\Collection || $positioncate instanceof \think\Paginator): $i = 0; $__LIST__ = $positioncate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
								<li data-positioncate="<?php echo htmlentities($item['id']); ?>"><?php echo htmlentities($item['title']); ?></li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					<div class="jsearch-item jsearch-city">
						<div class="jsearch-input">
							<i style="background-image: url(/kayoudi/img/join/add.png)"></i>
							<p>所在城市</p>
							<i class="arrow"></i>
						</div>
						
						<div class="placePopup_sel_distpicker">
							<div id="distpicker" data-toggle="distpicker">
								<div class="form-group">
									<select class="form-control" id="provinceInput"></select>
								</div>
								<div class="form-group">
									<select class="form-control" id="cityInput"></select>
								</div>
								<div class="form-group">
									<select class="form-control" id="districtInput"></select>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" ></button>
				</div>
				</form>
				
				<div class="job-list">
					<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
					<div class="job-item">
						<i></i>
						<div class="job-context">
							<h4><?php echo htmlentities($item['catename']); ?></h4>
							<h3><?php echo htmlentities($item['title']); ?></h3>
							<div class="job-text job-text1">
								<p><?php echo htmlentities($item['content']); ?></p>
							</div>
							<div class="job-text job-text2">
								<?php echo $item['duty']; ?>
							</div>
						</div>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				 
				<div class="news-page">
					<a class="page-prev" href="<?php echo $list->url($page-1); ?>"></a>
					<a class="page-next" href="<?php echo $list->url( $page<$list->lastPage()?$page+1:$list->lastPage() ); ?>"></a>
				</div>
				
			</div>
		</div>
		
		 
		
		
		<script src="/kayoudi/js/distpicker.data.js"></script>
		<script src="/kayoudi/js/distpicker.js"></script>
		
		<script>
			$("#distpicker").distpicker({
				autoSelect: false,
			});
			$(function() {
				$(".job-list .job-item").hover(function() {
					$(this).stop().addClass("active").siblings().stop().removeClass("active")
					$(this).find(".job-text2").stop().slideDown()
					$(this).siblings().find(".job-text2").stop().slideUp()
					$(this).find(".job-text1").stop().slideUp()
					$(this).siblings().find(".job-text1").stop().slideDown()
				})
				
				
				$(document).click(function() {
					$(".jsearch-type .sel-list").stop().hide();
					$(".placePopup_sel_distpicker").stop().hide();
				});
				
				
				$(".jsearch-type .jsearch-input").click(function(e){
					e.stopPropagation();
					$(".jsearch-type .sel-list").stop().toggle();
					$(".placePopup_sel_distpicker").stop().hide();
				})
				$(".jsearch-type .sel-list li").click(function(e){
					e.stopPropagation();
					let v = $(this).text()
					let c = $(this).data('positioncate')
		 
					$(".jsearch-type .jsearch-input p").text(v)
					$("#positioncate").val(c)
					$(".jsearch-type .sel-list").stop().hide();
				})
				
				
				$("#provinceInput").change(function() {
					var province = $("#provinceInput").val();
					var code = $(this).find("option:selected").data('code');
					$("#province").val(code)
					$("#city").val('')
					$("#qu").val('')
					if (province) {
						$(".jsearch-city .jsearch-input p").text(province);
					} else{
						$(".jsearch-city .jsearch-input p").text('所在城市');
					}
				})
				$("#cityInput").change(function() {
					var province = $("#provinceInput").val();
					var city = $("#cityInput").val();
					var code = $(this).find("option:selected").data('code');
					$("#city").val(code)
					$("#qu").val('')
					$(".jsearch-city .jsearch-input p").text(province + '/' + city);
				})
				$("#districtInput").change(function() {
					var province = $("#provinceInput").val();
					var city = $("#cityInput").val();
					var district = $("#districtInput").val();
					var code = $(this).find("option:selected").data('code');
					$("#qu").val(code)

					$(".jsearch-city .jsearch-input p").text(province + '/' + city + '/' + district);
				})
				
				$(".jsearch-city .jsearch-input").click(function(e) {
					e.preventDefault();
					e.stopPropagation();
					$(".placePopup_sel_distpicker").toggle();
					$(".jsearch-type .sel-list").stop().hide();
				})
				
				$(".placePopup_sel_distpicker").click(function(e) {
					e.preventDefault();
					e.stopPropagation();
				})
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

