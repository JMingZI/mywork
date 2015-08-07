define(function(require, exports, module){
	require('jquery');
	require('underscore');
	var tpl = $('#tpl').html();

	$(function(){

		// 自动载入所有作品列表
		function getData(obj,sort, tpl){
			this.obj = obj;
			this.sort = sort;
			this.tpl = tpl;
		}
		getData.prototype = {
			init : function(){
				this.set();
			},

			set : function(){
				var me = this;
				$.post('./php/getData.php',
					{
						sort : me.sort
					}, function(data){
						if(data){
							data = JSON.parse(data);
							datas = data;
							me.obj.html(_.template(me.tpl, data));
						}
					});
			}
		}
		var all = new getData($('#content'), '', tpl);
		all.init();

		//点击时分别加载
		$('.whole, .static, .home').click(function(){
			var all = new getData($('#content'), $(this).attr('class'), tpl);
			all.init();
		});
	});

});