<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Vdoo Freelance Team</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{asset('css/vendor.css')}}">
        <style>
            .logo{
                margin-top: -20px;
            }
        </style>
        <!-- Theme initialization -->
        <script>
            var themeSettings =  (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) : {};
			var themeName = themeSettings.themeName || '';

			if (themeName) {
				document.write('<link rel="stylesheet" id="theme-style" href="{{asset('css/')}}/app-' + themeName + '.css">');
			}
			else {
				document.write('<link rel="stylesheet" id="theme-style" href="{{asset('css/')}}/app.css">');
			}
		</script>
    </head>
    <body>
        <div class="auth">
                <div class="auth-container">
                    <div class="card">
                        <header class="auth-header">
                            <h1 class="auth-title">
                                <div class="logo">
                                 <img src="{{asset('logo.png')}}" alt="Logo" width="45">
                                </div> Vdoo Freelance Team
                            </h1>
                        </header>
                        <div class="auth-content">
                            <p class="text-center">LOGIN TO CONTINUE</p>
                            <form id="login-form" method="POST" action="{{ route('login') }}" novalidate="">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="username">ឈ្មោះគណនី</label>
                                    <input type="email" class="form-control underlined" placeholder="Your email address" name="email" value="{{ old('email') }}" required autofocus>
                                    
                                    @if ($errors->has('email'))
                                            <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">លេខសម្ងាត់</label>
                                    <input type="password" class="form-control underlined"  id="password" placeholder="Your password" required name="password" >
                                    @if ($errors->has('password'))
                                            <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                    @endif
                                </div>
                              
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">ចូលក្នុងប្រព័ន្ធ</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                   
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
            <script src="{{asset('js/vendor.js')}}"></script>
            <script src="{{asset('js/app.js')}}"></script>
        </body>
    </html>



