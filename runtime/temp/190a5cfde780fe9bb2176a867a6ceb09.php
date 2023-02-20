<?php /*a:1:{s:77:"/www/wwwroot/kyd.web.zhongwangyingtong.com/application/index/view/layout.html";i:1663570090;}*/ ?>
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
 
		
		<div class="ny-banner color-495877" style="background-image: url(<?php echo htmlentities($solution['path']); ?>);">
			<div class="core">
				<div class="banner-en font18 big-en">
					<i></i>
					<span><?php echo htmlentities($solution['entitle']); ?></span>
				</div>

				<h3 class="font46 font-bold line-height-1em"><?php echo htmlentities($solution['title']); ?></h3>
			</div>
		</div>
		
		
		<div class="scene">
			<div class="index-tit">
				<h3>全场景应用</h3>
				<p>
					<i></i>
					<span>Full scene application</span>
					<i></i>
				</p>
			</div>
			
			<div class="scene-main">
				<div class="scene-section">
					<div class="core">
						<div class="scene-icon">
							<img src="/kayoudi/img/solution/scene-icon1.png" alt="">
						</div>
						
						<div class="scene-text">
							<h3>医疗机构</h3>
							<div class="scene-text-tit2">
								痛点及解决方案
							</div>
							<ul class="scene-text-list">
								<li>
									<h4><span>1</span>院感：据估算，我国每年医院感染及医源性感染增加费用90-150亿人民币。</h4>
									<div class="scene-text-p">
										<i></i>
										<p>
											使用闪测方舱实验室，提高突发公共卫生应急处置能力，同时可单独检测传染类疾病，降低院内感染风险。
										</p>
									</div>
								</li>
								<li>
									<h4><span>2</span>发热门诊&急诊患者多：发热门诊以及急诊因检测时间长，导致大量患者滞留，增加缓冲病房压力，且急诊患者需要快速诊断治疗。</h4>
									<div class="scene-text-p">
										<i></i>
										<p>
											Flash20&Gentier 48E相互搭配提高检测速度及检测量。
										</p>
									</div>
								</li>
								<li>
									<h4><span>3</span>检测能力受限：医改背景下，发展基层医疗和分级医疗体系，基层医生持续自我提升渠道少，技术水平参差不齐。</h4>
									<div class="scene-text-p">
										<i></i>
										<p>
											使用Flash20，操作简便，一学即会。
										</p>
									</div>
								</li>
								<li>
									<h4><span>4</span>基层医疗机构收费项目单一，医疗设备投入成本高，投入产出不合理。</h4>
									<div class="scene-text-p">
										<i></i>
										<p>
											一台仪器可以同时检测个体化用药、妇幼、肿瘤、呼吸道、手足口、HPV、流感等多个项目。
										</p>
									</div>
								</li>
							</ul>
							
							<a class="index-more" href="javascript:;"><span>案例介绍</span><em></em></a>

							<div class="solu-model">
								<div class="solu-model-box">
									<div class="model-close"></div>
									<div class="model-main">
										<div class="model-tit">
											<i style="background-image: url(/kayoudi/img/solution/scene-icon1.png);"></i>
											<p>医疗机构</p>
										</div>
										<div class="model-p">
											<p>
												发热门诊是传染病预警筛查的岗哨，患者检测不及时将会增加院感风险；而对急诊病人来说，时间就是生命，检测时间长可能延误急重症患者的抢救时机。卡尤迪闪测Flash20采用单样本孔独立温控设计，结合国际专利“分子并行反应技术”，可实现“1分钟加样，30 分钟看结果”，实现样本随来随检，大幅提高了核酸检测效率。
											</p>
											<p>
												新冠疫情下，常态化的核酸检测不仅加大了医护人员及检验人员的工作量，还影响检验科常规项目的开展。卡尤迪闪测方舱移动实验室，可以有效解决这一问题，解放实验人员，降低院感的风险；还可作为当地移动核酸检测力量，当疫情发生时，大幅度提高医院检测能力。
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="scene-section">
					<div class="core">
						<div class="scene-icon">
							<img src="/kayoudi/img/solution/scene-icon2.png" alt="">
						</div>
						
						<div class="scene-text">
							<h3>交通枢纽</h3>
							<div class="scene-text-tit2">
								痛点及解决方案
							</div>
							<ul class="scene-text-list">
								<li>
									<h4><span>1</span>人员密集且流动性大、数量多，检测时间要求短，没有固定的检测实验室，缺乏技术人员。</h4>
									<div class="scene-text-p">
										<i></i>
										<p>
											使用闪测方舱移动实验室，可提升检测能力以及检测时间。1小时内出结果，日检测量1万管以上。 
										</p>
									</div>
								</li>
							</ul>
							
							<a class="index-more" href="javascript:;"><span>案例介绍</span><em></em></a>

							<div class="solu-model">
								<div class="solu-model-box">
									<div class="model-close"></div>
									<div class="model-main">
										<div class="model-tit">
											<i style="background-image: url(/kayoudi/img/solution/scene-icon2.png);"></i>
											<p>交通枢纽</p>
										</div>
										<ul class="model-img">
											<li style="background-image: url(/kayoudi/img/solution/model-img1.png);"></li>
											<li style="background-image: url(/kayoudi/img/solution/model-img2.png);"></li>
										</ul>
										<div class="model-p">
											<p>
												当疫情发生封城封区时，生活物资保障是必不可缺少的。在关键点“高速出入口” ，配置移动方舱检测实验室，做好物资运输车辆司乘人员以及物品核酸检测工作。
											</p>
											<p>
												北京市为确保疫情期间生活必需品的输送，在大广、京台高速位于河北界内的牛驼、万庄服务区设置了核酸采样点，针对运输车辆司乘人员提供免费核酸检测服务，日检测量达1万人次。
											</p>
											<p>
												新疆疫情期间，因核酸检测等待时间过长，货车司机和物资大量滞留。卡尤迪闪测方舱承担起物资运输的大车司机核酸检测，1小时出具检测结果，确保安全、快速通过路口，保障疫情防控和物资运输及时送达。
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="scene-section">
					<div class="core">
						<div class="scene-icon">
							<img src="/kayoudi/img/solution/scene-icon3.png" alt="">
						</div>
						
						<div class="scene-text">
							<h3>重大赛事</h3>
							<div class="scene-text-tit2">
								痛点及解决方案
							</div>
							<ul class="scene-text-list">
								<li>
									<h4><span>1</span>检测频次高：当天进场当天检/7 days/14 days检测</h4>
								</li>
								<li>
									<h4><span>2</span>人员复杂，检测量大，没有固定的检测实验室。</h4>
									<div class="scene-text-p">
										<i></i>
										<p>
											使用闪测方舱实验室，样本无需转运，快速核酸检测。可实现随到随检，1小时内出结果，日检测量1
											万管以上，提升检测能力以及检测时间。 
										</p>
									</div>
								</li>
							</ul>
							
							<a class="index-more" href="javascript:;"><span>案例介绍</span><em></em></a>

							<div class="solu-model">
								<div class="solu-model-box">
									<div class="model-close"></div>
									<div class="model-main">
										<div class="model-tit">
											<i style="background-image: url(/kayoudi/img/solution/scene-icon3.png);"></i>
											<p>重大赛事</p>
										</div>
										<ul class="model-img">
											<li style="background-image: url(/kayoudi/img/solution/model-img3.png);"></li>
											<li style="background-image: url(/kayoudi/img/solution/model-img4.png);"></li>
										</ul>
										<div class="model-p">
											<p>
												重大赛事、会议等活动，人员复杂，检测量大，且对检测频次要求高。为了保障人员安全，需要切实做好新冠肺炎疫情防控工作
											</p>
											<p>
												2021年春节期间，4座卡尤迪闪测方舱实验室在北京2022年冬奥会和冬残奥会举办地崇礼拔地而起，为我国重大赛事疫情防控保驾护航。
											</p>
											<p>
												2021年8月2日，首届全球数字经济大会在北京国家会议中心举行。卡尤迪闪测方舱负责本次大会核酸检测任务，对参会嘉宾及工作人员在入场前进行新冠核酸检测，为大会的疫情防控工作保驾护航。
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="scene-section">
					<div class="core">
						<div class="scene-icon">
							<img src="/kayoudi/img/solution/scene-icon4.png" alt="">
						</div>
						
						<div class="scene-text">
							<h3>现场应急</h3>
							<div class="scene-text-tit2">
								痛点及解决方案
							</div>
							<ul class="scene-text-list">
								<li>
									<h4><span>1</span>检测时间要求短。</h4>
								</li>
								<li>
									<h4><span>2</span>检测地点不固定。</h4>
									<div class="scene-text-p">
										<i></i>
										<p>
											使用闪测方舱实验室，触达即检，快速核酸检测。1小时内出结果，日检测量1万管以上，提升检测能力以及检测时间。
										</p>
									</div>
								</li>
							</ul>
							
							<a class="index-more" href="javascript:;"><span>案例介绍</span><em></em></a>
							
							<div class="solu-model">
								<div class="solu-model-box">
									<div class="model-close"></div>
									<div class="model-main">
										<div class="model-tit">
											<i style="background-image: url(/kayoudi/img/solution/scene-icon4.png);"></i>
											<p>现场应急</p>
										</div>
										<ul class="model-img">
											<li style="background-image: url(/kayoudi/img/solution/model-img5.png);"></li>
											<li style="background-image: url(/kayoudi/img/solution/model-img6.png);"></li>
										</ul>
										<div class="model-p">
											<p>
												疫情突发情况下，需在极短时间内完成新冠筛查任务。建立“机动核酸检测力量”和“片区机动支援制度”，可以提高检测能力，有效控制疫情传播。
											</p>
											<p>
												2021年5月底广东疫情发生后，卡尤迪迅速组建了数十人的抗疫支援队伍驰援广州。多台“闪测方舱”移动实验室成功助力广州市、吴川县等广东省重点地市新冠核酸筛查工作，日检测能力达30万份以上，总计筛查近90万人，以“卡尤迪速度”全面助力广东疫情防控。
											</p>
											<p>
												2021年8月1日，受国家卫健委和湖南省卫健委的委派，卡尤迪及“闪测联盟”快速响应， 2台“闪测方舱”、30余名卡尤迪工作人员连夜抵达湖南省张家界市。经过简单调试后，8月2日中午前即投入核酸检测工作，每台方舱日检测量最高可达1万管。
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="scene-section">
					<div class="core">
						<div class="scene-icon">
							<img src="/kayoudi/img/solution/scene-icon5.png" alt="">
						</div>
						
						<div class="scene-text">
							<h3>海关机场检疫</h3>
							<div class="scene-text-tit2">
								痛点及解决方案
							</div>
							<ul class="scene-text-list">
								<li>
									<h4><span>1</span>境外输入风险高，灵敏度要求高。</h4>
								</li>
								<li>
									<h4><span>2</span>人员密集，数量多，检测时间要求短。</h4>
									<div class="scene-text-p">
										<i></i>
										<p>
											使用闪测方舱实验室，样本无需转运，快速核酸检测。可实现随到随检，1小时内出结果，日检测量1万管以上，提升检测能力以及检测时间。  
										</p>
									</div>
								</li>
							</ul>
							
							<a class="index-more" href="javascript:;"><span>案例介绍</span><em></em></a>
							
							<div class="solu-model">
								<div class="solu-model-box">
									<div class="model-close"></div>
									<div class="model-main">
										<div class="model-tit">
											<i style="background-image: url(/kayoudi/img/solution/scene-icon5.png);"></i>
											<p>海关机场检疫</p>
										</div>
										<ul class="model-img">
											<li style="background-image: url(/kayoudi/img/solution/model-img7.png);"></li>
										</ul>
										<div class="model-p">
											<p>
												三亚作为国内著名旅游城市，境外输入风险高，守护好“三亚入关口”，为市民、游客的健康保驾护航，成为各界共同努力的目标。
											</p>
											<p>
												2021年1月19日，卡尤迪闪测方舱移动实验室落地三亚凤凰国际机场，针对出入境和来自中高风险地区的旅客开展核酸检测。方舱的使用实现了“落地检测，即达即检”，大大降低了疫情传播风险。
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="scene-section">
					<div class="core">
						<div class="scene-icon">
							<img src="/kayoudi/img/solution/scene-icon6.png" alt="">
						</div>
						
						<div class="scene-text">
							<h3>冷链食品检测</h3>
							<div class="scene-text-tit2">
								痛点及解决方案
							</div>
							<ul class="scene-text-list">
								<li>
									<h4><span>1</span>食品来源途径广，检测时间要求短。</h4>
								</li>
								<li>
									<h4><span>2</span>病毒载量低，灵敏度要求高，避免漏检。</h4>
									<div class="scene-text-p">
										<i></i>
										<p>
											使用闪测方舱实验室，快速核酸检测， 可检测多种变异株病毒，样本1小时内可出结果。
										</p>
									</div>
								</li>
							</ul>
							
							<a class="index-more" href="javascript:;"><span>案例介绍</span><em></em></a>
							
							<div class="solu-model">
								<div class="solu-model-box">
									<div class="model-close"></div>
									<div class="model-main">
										<div class="model-tit">
											<i style="background-image: url(/kayoudi/img/solution/scene-icon6.png);"></i>
											<p>冷链食品检测</p>
										</div>
										<ul class="model-img">
											<li style="background-image: url(/kayoudi/img/solution/model-img8.png);"></li>
											<li style="background-image: url(/kayoudi/img/solution/model-img9.png);"></li>
										</ul>
										<div class="model-p">
											<p>
												2020年全国有10余个省份发生进口冷链食品核酸检测阳性事件，说明了进口冷链食品疫情防控工作的严峻性和复杂性。加强“人物同防”，护航群众食品安全，对于防止疫情传播具有重要意义。
											</p>
											<p>
												2020年12月， 卡尤迪闪测方舱作为全浙江省唯一的一台移动实验室开始正式投入使用，负责杭州钱塘新区5个集中监管舱中进口冷链物品及运输人员的新冠检测。
											</p>
											<p>
												当月，卡尤迪受北京市丰台区政府委派，对丰台区进口冷冻食品及冷链系统进行采样检测的工作。
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="scene-section">
					<div class="core">
						<div class="scene-icon">
							<img src="/kayoudi/img/solution/scene-icon7.png" alt="">
						</div>
						
						<div class="scene-text">
							<h3>环境检测</h3>
							<div class="scene-text-tit2">
								痛点及解决方案
							</div>
							<ul class="scene-text-list">
								<li>
									<h4><span>1</span>病毒载量低，灵敏度要求高，避免漏检。</h4>
								</li>
								<li>
									<h4><span>2</span>检测需求大。</h4>
									<div class="scene-text-p">
										<i></i>
										<p>
											使用闪测方舱实验室，快速核酸检测，可检测多种变异株病毒，样本1小时内出结果。
										</p>
									</div>
								</li>
							</ul>
							
							<a class="index-more" href="javascript:;"><span>案例介绍</span><em></em></a>
							
							<div class="solu-model">
								<div class="solu-model-box">
									<div class="model-close"></div>
									<div class="model-main">
										<div class="model-tit">
											<i style="background-image: url(/kayoudi/img/solution/scene-icon7.png);"></i>
											<p>环境检测</p>
										</div>
										<ul class="model-img">
											<li style="background-image: url(/kayoudi/img/solution/model-img10.png);"></li>
										</ul>
										<div class="model-p">
											<p>
												农贸市场、车站、商超等公共场所人员密集，是新冠肺炎疫情防控的重点场所。切实做好公共场所的新冠肺炎疫情防控工作，可以有效控制和降低疫情传播风险。
											</p>
											<p>
												2020年11月，北京冬奥会组委会外籍专家考察团访华，卡尤迪受北京市政府委派，承接了考察期间的水立方环境采样任务。
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(function(){
				$(".scene-text .index-more").click(function(){
					$(this).parent().find(".solu-model").css("display","flex")
				})
				$(".model-close").click(function(){
					$(this).closest(".solu-model").css("display","none")
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

