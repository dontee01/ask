<div class="top-bar">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
			</div>
			<div class="col-lg-8 col-md-8 col-sm-6 col-xs-8">
				<ul class="top-nav nav-right pull-right">
					<li><a href="login.html"><i class="fa fa-lock" aria-hidden="true"></i>Login</a>
					</li>
					<li><a href="register.html"><i class="fa fa-user-plus" aria-hidden="true"></i>Signup</a>
					</li>
					<li class="dropdown"> 
						<a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" data-animations="fadeInUp">
							<img class="img-circle resize" alt="" src="images/authors/13.jpg">
							<span class="hidden-xs small-padding">
								<span>Umair</span>
							 <i class="fa fa-caret-down"></i>
							</span>
						</a>
						<ul class="dropdown-menu ">
							<!-- <li><a href="profile.html"><i class=" icon-bargraph"></i> Dashboard</a></li> -->
							<li><a href="{{ url('profile') }}"><i class=" icon-gears"></i> My Profile</a></li>
							<!-- <li><a href="question-list.html"><i class="icon-heart"></i> My Questions</a></li> -->
							<li><a href="{{ url('logout') }}"><i class="icon-lock"></i> Logout</a></li>
						</ul>
				 	</li>
				</ul>
			</div>
		</div>
	</div>
</div>