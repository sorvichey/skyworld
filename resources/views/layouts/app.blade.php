<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Chatoki| Vdoo Freelance Team</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Battambang" rel="stylesheet">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{asset('css/vendor.css')}}">
        
        <!-- Theme initialization -->
        <link rel="stylesheet" href="{{asset('css/app-green.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
		
        <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
		
		<!-- js chosen -->
        <link rel="stylesheet" href="{{asset('css/component-chosen.css')}}">
	</head>
    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
						</button>
					</div>
                    <div class="header-block header-block-buttons">
						
					</div>
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                           
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="img" style="background-image: url('{{asset('upload/users/'.Auth::user()->photo)}}')">
									</div>
                                    <span class="name"> {{Auth::user()->name}} </span>
								</a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="{{url('user/edit/'.Auth::user()->id)}}">
									<i class="fa fa-user icon"></i> ព័ត៌មានផ្ទាល់ខ្លួន </a>
                                    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{url('/logout')}}">
									<i class="fa fa-power-off icon"></i> ចាកចេញ </a>
								</div>
							</li>
						</ul>
					</div>
				</header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <div class="logo">
									<img src="{{asset('logo.png')}}" alt="Logo" width="45">
								</div> Vdoo
							</div>
						</div>
                        <nav class="menu">
                            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                                <li id="menu_dashboard">
                                    <a href="{{url('/dashboard')}}">
									<i class="fa fa-home"></i> ទំព័រមុខ </a>
								</li>
                               
                                <li id="menu_product">
                                    <a href="{{url('/admin/product')}}">
									<i class="fa fa-coffee"></i> ផលិតផល </a>
								</li>
                                <li id="menu_slide">
                                    <a href="{{url('admin/slide')}}">
                                        <i class="fa fa-picture-o"></i> Slides
                                    </a>
                                </li>
                                <li id="menu_page">
                                    <a href="{{url('admin/page')}}">
                                    <i class="fa fa-flag"></i> ទំព័រ
                                    </a>
                                </li>
                                <li id="menu_location">
                                    <a href="{{url('admin/location')}}">
									<i class="fa fa-map"></i> ហាង </a>
                                </li>
                                <li id="menu_video">
                                    <a href="{{url('admin/video')}}">
									<i class="fa fa-youtube"></i> វីដែអូ </a>
								</li>
                                <li id="menu_benefit">
                                    <a href="{{url('admin/benefit')}}">
									<i class="fa fa-pagelines"></i>ផលប្រយោជន៍ Maccha</a>
								</li>
                                <li id="menu_social">
                                    <a href="{{url('admin/social')}}">
									<i class="fa fa-facebook"></i> បណ្តាញសង្គម </a>
								</li>
                                <li  id="menu_security">
                                    <a href="">
                                        <i class="fa fa-key text-warning"></i> គ្រប់គ្រងសុវត្ថិភាព <i class="fa arrow"></i>
									</a>
                                    <ul class="sidebar-nav"  id="security_collapse">
                                        <li id="role_id">
                                            <a href="{{url('role')}}"><i class="fa fa-key"></i> តួនាទី </a>
										</li>
                                       
                                        <li id='menu_user'>
                                            <a href="{{url('user')}}"><i class="fa fa-users"></i> គណនីអ្នកប្រើប្រាស់ </a>
										</li>
									</ul>
								</li>
							</ul>
						</nav>
					</div>
                    <footer class="sidebar-footer">
                        <ul class="sidebar-menu metismenu" id="customize-menu">
                            <li>
                                <ul>
                                    <li class="customize">
                                        <div class="customize-item">
                                            <div class="row customize-header">
                                                <div class="col-4">
												</div>
                                                <div class="col-4">
                                                    <label class="title">fixed</label>
												</div>
                                                <div class="col-4">
                                                    <label class="title">static</label>
												</div>
											</div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Sidebar:</label>
												</div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                                        <span></span>
													</label>
												</div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                                        <span></span>
													</label>
												</div>
											</div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Header:</label>
												</div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                                        <span></span>
													</label>
												</div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="">
                                                        <span></span>
													</label>
												</div>
											</div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Footer:</label>
												</div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                                        <span></span>
													</label>
												</div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="">
                                                        <span></span>
													</label>
												</div>
											</div>
										</div>
                                        
									</li>
								</ul>
								
							</li>
						</ul>
					</footer>
				</aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content dashboard-page">
                    <section class="section">
                        @yield('content')
					</section>
				</article>
                <footer class="footer">
                    <div class="footer-block buttons">
                        <!-- Copy&copy; 2018 by <a href="#" target="_blank">EDC Database</a> -->
					</div>
                    <div class="footer-block author">
                        <ul>
                            <li> Powered by <a href="https://vdoo.biz" target="_blank">Vdoo Freelance Team</a>
							</li>
                            
						</ul>
					</div>
				</footer>
                <div class="modal fade" id="modal-media">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Media Library</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
								</button>
							</div>
                            <div class="modal-body modal-tab-container">
                                <ul class="nav nav-tabs modal-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a>
									</li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a>
									</li>
								</ul>
                                <div class="tab-content modal-tab-content">
                                    <div class="tab-pane fade" id="gallery" role="tabpanel">
                                        <div class="images-container">
                                            <div class="row">
											</div>
										</div>
									</div>
                                    <div class="tab-pane fade active in" id="upload" role="tabpanel">
                                        <div class="upload-container">
                                            <div id="dropzone">
                                                <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                    <div class="dz-message-block">
                                                        <div class="dz-message needsclick"> Drop files here or click to upload. </div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Insert Selected</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
                <div class="modal fade" id="confirm-modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><i class="fa fa-warning"></i> Alert</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
								</button>
							</div>
                            <div class="modal-body">
                                <p>Are you sure want to do this?</p>
							</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
			</div>
		</div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
			</div>
		</div>
        <script>
            var burl = "{{url('/')}}";
        </script>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/vendor.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
		
		<!-- js chosen -->
        <script src="{{asset('js/chosen.jquery.min.js')}}"></script>
        <script src="{{asset('js/init.js')}}"></script>
        
		
		<!-- Date picker -->
		<script src="{{asset('js/jquery-ui.js')}}"></script>
		<script>
			$( function() {
				$( ".datepicker" ).datepicker({
					dateFormat: "yy-mm-dd",
					yearRange: "c-60:c+10",
					changeMonth: true,
					changeYear: true,
					
				});
			} );
		</script>
		<script>
			$('.number').keypress(function(event) {
				if (event.which != 46 && (event.which < 47 || event.which > 59))
				{
					event.preventDefault();
					if ((event.which == 46) && ($(this).indexOf('.') != -1)) {
						event.preventDefault();
					}
				}
			});
		</script>
        @yield('js')
		
	</body>
</html>

