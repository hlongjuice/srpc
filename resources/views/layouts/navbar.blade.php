<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Brand</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href={{route('create_order')}}>ฝ่ายแผนงานและความร่วมมือ <span class="sr-only">(current)</span></a></li>
				<li><a href={{url('add_product')}}>ฝ่ายพัฒนานักเรียนนักศึกษา</a></li>
				<li><a href={{url('products')}}>ฝ่ายบริหารทรัพยากร</a></li>
				<li><a href={{url('products')}}>ฝ่ายวิชาการ</a></li>
			</ul>
		</div>
	</div>
</nav>