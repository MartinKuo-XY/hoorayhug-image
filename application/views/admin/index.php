<script src="/static/js/Chart.min.js"></script>
<div class="layui-container" style = "margin-top:2em;">
	<div class="layui-row layui-col-space20">
		<div class="layui-col-lg3">
			<div class = "analyze">
				<h3><i class="fa fa-upload"></i> 累计上传</h3>
				<p><?php echo $num; ?>张</p>
			</div>
		</div>
		<div class="layui-col-lg3">
			<div class = "analyze">
				<h3><i class="fa fa-user-plus"></i> 管理员累积上传</h3>
				<p><?php echo $admin; ?>张</p>
			</div>
		</div>
		<div class="layui-col-lg3">
			<div class = "analyze">
				<h3><i class="fa fa-user-o"></i> 游客累积上传</h3>
				<p><?php echo $visitor; ?>张</p>
			</div>
		</div>
		<div class="layui-col-lg3">
			<div class = "analyze">
				<h3><i class="fa fa-question"></i> 可疑图片</h3>
				<p><?php echo $dubious; ?>张</p>
			</div>
		</div>
		<div class="layui-col-lg3">
			<div class = "analyze">
				<h3><i class="fa fa-calendar-check-o"></i> 本月上传</h3>
				<p><?php echo $month; ?>张</p>
			</div>
		</div>
		<div class="layui-col-lg3">
			<div class = "analyze">
				<h3><i class="fa fa-calendar-plus-o"></i> 今日上传</h3>
				<p><?php echo $day; ?>张</p>
			</div>
		</div>
		<div class="layui-col-lg3">
			<div class = "analyze">
				<h3><i class="fa fa-info-circle"></i> 应用名称</h3>
				<p>HoorayHug Image</p>
			</div>
		</div>
		<div class="layui-col-lg3">
			<div class = "analyze">
				<h3><i class="fa fa-server"></i> 部署方式</h3>
				<p>Docker Compose</p>
			</div>
		</div>
		<div class="layui-col-lg3">
			<div class = "analyze">
				<h3><i class="fa fa-database"></i> 数据存储</h3>
				<p>SQLite 3</p>
			</div>
		</div>
		<div class="layui-col-lg3">
			<div class = "analyze">
				<h3><i class="fa fa-copyright"></i> 版权信息</h3>
				<p>© 2026 HoorayHug</p>
			</div>
		</div>
	</div>
</div>

  
 
