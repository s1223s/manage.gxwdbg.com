$(function() {
	$(".title-content>div").eq(0).show().siblings().hide();
	$(".re-content-title>li").click(function() {
		$(this).addClass("active").siblings().removeClass("active");
		$(".title-content>div").eq($(this).index()).show().siblings().hide();
	});
	$(".title-content1>div").eq(0).show().siblings().hide();
	$(".re-content-title1>li").click(function() {
		$(this).addClass("active").siblings().removeClass("active");
		$(".title-content1>div").eq($(this).index()).show().siblings().hide();
	});
});
/**
 * 清除密码
 */
function clearPwd() {
	$("#nloginpwd").val("");
	$('#nloginpwd').siblings('.clear-btn').hide();
}