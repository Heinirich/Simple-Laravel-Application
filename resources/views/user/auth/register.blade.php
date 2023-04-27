@extends('user.auth.layouts')

@section('content')
<div class="container d-flex align-items-center justify-content-center form-height-register pt-24px pb-24px">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-10">
					<div class="card">
						<div class="card-header bg-primary">
							<div class="ec-brand">
								
							</div>
						</div>
						<div class="card-body p-5">
							<h4 class="text-dark mb-5">Sign Up</h4>
							
							<form action="{{ route('register') }}" method="post">
                                @csrf
                                    <div class="row">
                                    <div class="form-group col-md-12 ">
                            <label for="name" class=" col-form-label text-md-end">{{ __('Name') }}</label>

                          
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group col-md-12 ">
                            <label for="email" class=" col-form-label text-md-end">{{ __('Email Address') }}</label>

                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group col-md-12 ">
                            <label for="password" class=" col-form-label text-md-end">{{ __('Password') }}</label>

                          
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group col-md-12 ">
                            <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>
                                    </div>
									<div class="form-group col-md-12">
										
										
										<button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
										
										<p class="sign-upp">Have an account yet ?
											<a class="text-blue" href="{{ route('login') }}">Sign In</a>
										</p>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection
