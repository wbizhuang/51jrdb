<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="/css/user-center.min.css" />
<div class="container breadcrumbs"><a href="/">首页</a><span class="sep">/</span><span>佣金明细</span></div>
<div class="container">
    <div class="uc-full-box">
        <div class="row">
			<?php include templates("member","left");?>
			<div class="span16">
				<div class="xm-line-box uc-box">
					<div class="box-hd">
						<h3 class="title">佣金明细</h3>
					</div>
<link rel="stylesheet" type="text/css" href="/App/Css/layout-records.css"/>
<link rel="stylesheet" type="text/css" href="/App/Css/layout-invitation.css"/>
              <div class="R-content">
            <div class="total">
        	    <dt>
            	    </dt><dd>累计收入：<b class="orange"><?php echo $shourutotal; ?></b>元</dd>  <dd>累计(提现/充值)：<b class="orange"><?php echo $zhichutotal; ?></b>元</dd> <dd>佣金余额：<b class="orange"><?php echo $total; ?></b>元</dd><dd><a href="<?php echo WEB_PATH; ?>/member/home/cashout" title="申请提现" class="bluebut">申请提现</a><a href="<?php echo WEB_PATH; ?>/member/home/cashout" title="充值到优购账户" class="orangebut">充值到<?php echo _cfg('web_name_two'); ?>账户</a></dd>
                
                <dd class="gray02">佣金余额可实时充值到您的<?php echo _cfg('web_name_two'); ?>帐户，满100元时才可申请提现。</dd>
		    </div>
            <div id="divCommissionList" class="list-tab commission gray02"><ul class="listTitle"><li class="w140">用户</li><li class="w150">时间</li><li class="w280">描述</li><li class="w90">金额(元)</li><li class="w90">佣金(元)</li></ul>
			<?php if($recodetotal!=0): ?>
				<?php $ln=1; if(is_array($recodearr)) foreach($recodearr AS $key => $val): ?>
			<ul>
			<li class="w140"><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($val['uid']); ?>" target="_blank"><img src= "<?php if($member['img']==null): ?><?php echo G_TEMPLATES_STYLE; ?>/images/prmimg.jpg<?php  else: ?><?php echo G_UPLOAD_PATH; ?>/<?php echo $member['img']; ?><?php endif; ?>" alt="" border="0"></a><a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($val['uid']); ?>" target="_blank" class="blue"><?php echo $username[$val['uid']]; ?></a></li>
			<li class="w150"><?php echo date('Y-m-d H:i:s',$val['time']); ?></li><li class="w280"><?php if($uid==$val['uid']): ?><?php echo $val['content']; ?><?php  else: ?><a target="_blank" href="<?php echo WEB_PATH; ?>/goods/<?php echo $val['shopid']; ?>" title="<?php echo $val['content']; ?>" class="blue"><?php echo $val['content']; ?></a><?php endif; ?></li><li class="w90"><?php echo $val['ygmoney']; ?></li><li class="w90 orange"><?php if($uid==$val['uid']): ?>-<?php  else: ?>+<?php endif; ?><?php echo $val['money']; ?></li>
			</ul>
			<?php  endforeach; $ln++; unset($ln); ?>
			<?php  else: ?>
			</div>
			 <div class="tips-con"><i></i>您还未有邀请谁哦</div></div>
			 <?php endif; ?>
            <div id="divPageNav" class="page_nav"></div>
        </div>
    </div>
<style>
  .goods_show li{
    color:#7D7D7D;
	float:left;
	width:194px;
	    
  }
  .goods_show li .ms{    
	 width:10px;  
  }
  
 .goods_show li a{
    color:#22AAFF;
	border-bottom:1px solid #22AAFF;
  }
</style>
<script>
$(function(){
	$(".subMenu a").click(function(){
		var id=$(".subMenu a").index(this);
		$(".subMenu a").removeClass().eq(id).addClass("current");
		$(".R-content .topic").hide().eq(id).show();
	});
})
function shaidan(id){
	if(confirm("您确认要删除该条信息吗？")){
		window.location.href="<?php echo WEB_PATH; ?>/member/home/shaidandel/"+id;
	}
	//FixedConfirm('你确定要删除？',240);
}
/*$("#btnShow6").click(function(){
		FixedConfirm('你确定要删除？',240);
});*/
function FixedConfirm(content,minwidth){
	var div=FixedStar();
		div+='<div id="foucs_close"></div>';
		div+='<div id="foucs_main">';
		div+='<div class="title" style="display:black">提示</div>';
		div+='<div class="content"><div class="PopMsgC"  style="display:black"><s></s>'+content+'</div>';
		div+='<div class="PopMsgbtn" style="display:black">';
		div+='<a class="orangebut" id="btnMsgOK" href="javascript:;">确认</a>&nbsp;&nbsp;';
		div+='<a class="cancelBtn" id="btnMsgCancel" href="javascript:;">取消</a>';
		div+='</div></div></div>';
		div+='</div>';	
	$("body").append(div);
	Fixed(minwidth);
	FixedClose();
}
$(function(){
	$(window).resize(function(){
		Fixed();
	})
})
//关闭弹窗
function FixedClose(){
	$("#foucs_close,#page_close,#btnMsgCancel").click(function(){		
		$("#foucs_big,#foucs_min,#w3foucs").fadeOut(200,function(){
			$("#foucs_big,#foucs_min,#w3foucs").remove();
		});		
	})
};
function FixedStar(){
	var div='<div id="foucs_big"></div>';
		div+='<div id="foucs_min"></div>';
		div+='<div id="w3foucs">';
	return div;
}
function Fixed(w,h){
	var bigheight=document.body.clientHeight,
	    bigwidth=document.body.clientWidth;
	var big=$("#foucs_big"),	
	    min=$("#foucs_min");
	var w3foucs=$("#w3foucs");
	if(w==null){
		if(w3foucs.text()!=null){
			w = w3foucs.width();
		}else{
			w = 200;
		}
	}	
	if(h==null){
		var h = w3foucs.height();
	}   
	big.height(bigheight);	
    big.width(bigwidth); 
    big.fadeTo(500,0.5);
	min.width(w+14); 
    min.height(h+14); 
    min.fadeTo(500,0.5);
	
	w3foucs.css("height",h);
	w3foucs.width(w);
    var t = ($(window).height()/2) - (h/2);
    if(t < 0) t = 0;
    $("#w3foucs,#foucs_min").css({display:"block",position:"fixed"});
	$("#foucs_close").css({display:"block"});
    var l = ($(window).width()/2) - (w/2);
    if(l < 0) l = 0;   
    $("#foucs_min").css({left: l-5+'px', top: t-5+'px'});
    w3foucs.css({left: l+'px', top: t+'px'});
}
</script>
</div>
</div>
</div>
</div>
<?php include templates("index","foot");?>