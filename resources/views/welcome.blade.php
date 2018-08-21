<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>JCompSolu Webservices</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="hyperspace/assets/css/main.css" />
		<noscript><link rel="stylesheet" href="hyperspace/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="#intro">Welcome</a></li>
							<li><a href="#one">Who we are</a></li>
							<!--<li><a href="#two">What we do</a></li>-->
							<li><a href="#three">Get in touch</a></li>

						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="intro" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>J Computer Solutions Webservices</h1>
							<p>Afforable webservices brought to you by <a href="https://jcompsolu.com">J Computer Solutions LLC</a><br />
							<ul class="actions">
								<li><a href="#one" class="button scrolly">Learn more</a></li>
							</ul>
						</div>
					</section>

				<!-- One -->
					<section id="one" class="wrapper style2 spotlights">
						<section>
							<a href="#" class="image"><img src="hyperspace/images/email.jpg" alt="" data-position="center center" /></a>
							<div class="content">
								<div class="inner">
									<h2>Free Email Accounts With Every Domain Purchase</h2>
									<p>Every domain purchase comes with unlimited email accounts. Stop using services that scan your emails and
                  sell you to advertisers.</p>
									<ul class="actions">
										<li><a href="{{url('/email-accounts')}}" class="button">Learn more</a></li>
									</ul>
								</div>
							</div>
						</section>
						<section>
							<a href="#" class="image"><img src="hyperspace/images/servers.jpg" alt="" data-position="top center" /></a>
							<div class="content">
								<div class="inner">
									<h2>High Availability Provisioned Servers</h2>
									<p>All of our servers are provisioned to include: Ubuntu 18.3, nginx, PHP7.2, node, mysql and more! Also with 99.9999% uptime your applications will never go down.
                    Lastly we offer one-click deploy Git and WordPress installations! Start deploying today!
                  </p>
									<ul class="actions">
										<li><a href="{{url('/servers')}}" class="button">Learn more</a></li>
									</ul>
								</div>
							</div>
						</section>
						<section>
							<a href="#" class="image"><img src="hyperspace/images/code.jpg" alt="" data-position="25% 25%" /></a>
							<div class="content">
								<div class="inner">
									<h2>Robust API</h2>
									<p>We encourage open development! This is why we have included an <strong>open</strong> API so developers can create their own applications using our platform.
                    Want to resell domains? Go right ahead! How about selling server space? Knock yourself out! Sign up for an account today and get started!
                  </p>
									<ul class="actions">
										<li><a href="{{url('/api')}}" class="button">Learn more</a></li>
									</ul>
								</div>
							</div>
						</section>
            <section>
              <a href="#" class="image"><img src="hyperspace/images/join.jpg" alt="" data-position="25% 25%" /></a>
							<div class="content">
								<div class="inner">
									<h2>Ready To Get Started?</h2>
									<p>Take JCompSolu Webservices for a spin, we promise you will love it!</p>
									<ul class="actions">
										<li>
                    @if(Auth::guest())
                    <a href="{{url('/register')}}" class="button">Register</a>
                    <a href="{{url('/login')}}" class="button">Login</a>
                    @else
                    <a href="{{url('/home')}}" class="button">Dashboard</a>
                    @endif</li>
									</ul>
								</div>
							</div>
						</section>
					</section>

				<!-- Two -->
				<!--	<section id="two" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>What we do</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
							<div class="features">
								<section>
									<span class="icon major fa-code"></span>
									<h3>Lorem ipsum amet</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-lock"></span>
									<h3>Aliquam sed nullam</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-cog"></span>
									<h3>Sed erat ullam corper</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-desktop"></span>
									<h3>Veroeros quis lorem</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-chain"></span>
									<h3>Urna quis bibendum</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
								<section>
									<span class="icon major fa-diamond"></span>
									<h3>Aliquam urna dapibus</h3>
									<p>Phasellus convallis elit id ullam corper amet et pulvinar. Duis aliquam turpis mauris, sed ultricies erat dapibus.</p>
								</section>
							</div>
							<ul class="actions">
								<li><a href="generic.html" class="button">Learn more</a></li>
							</ul>
						</div>
					</section>

				<!-- Three -->
					<section id="three" class="wrapper style1 fade-up">
						<div class="inner">
							<h2>Get in touch</h2>
							<p>Phasellus convallis elit id ullamcorper pulvinar. Duis aliquam turpis mauris, eu ultricies erat malesuada quis. Aliquam dapibus, lacus eget hendrerit bibendum, urna est aliquam sem, sit amet imperdiet est velit quis lorem.</p>
							<div class="split style1">
								<section>
									<form method="post" action="{{url('/send-message')}}">
										<div class="fields">
											<div class="field half">
												<label for="name">Name</label>
												<input type="text" name="name" id="name" />
											</div>
											<div class="field half">
												<label for="email">Email</label>
												<input type="text" name="email" id="email" />
											</div>
											<div class="field">
												<label for="message">Message</label>
												<textarea name="message" id="message" rows="5"></textarea>
											</div>
										</div>
										<ul class="actions">
											<li><a href="" class="button submit">Send Message</a></li>
										</ul>
									</form>
								</section>
								<section>
									<ul class="contact">
										<li>
											<h3>Address</h3>
											<span>113 East Mason Ave<br />
											Danville, KY 40422<br />
											USA</span>
										</li>
										<li>
											<h3>Email</h3>
											<a href="#">info@jcompsolu.com</a>
										</li>
										<li>
											<h3>Phone</h3>
											<span>(859) 402-4863</span>
										</li>
										<li>
											<h3>Social</h3>
											<ul class="icons">
												<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
												<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
												<li><a href="#" class="fa-github"><span class="label">GitHub</span></a></li>
												<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="#" class="fa-linkedin"><span class="label">LinkedIn</span></a></li>
											</ul>
										</li>
									</ul>
								</section>
							</div>
						</div>
					</section>

			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; J Computer Solutions LLC. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="hyperspace/assets/js/jquery.min.js"></script>
			<script src="hyperspace/assets/js/jquery.scrollex.min.js"></script>
			<script src="hyperspace/assets/js/jquery.scrolly.min.js"></script>
			<script src="hyperspace/assets/js/browser.min.js"></script>
			<script src="hyperspace/assets/js/breakpoints.min.js"></script>
			<script src="hyperspace/assets/js/util.js"></script>
			<script src="hyperspace/assets/js/main.js"></script>

	</body>
</html>
