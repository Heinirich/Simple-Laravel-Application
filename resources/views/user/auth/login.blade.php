@extends('user.auth.layouts')

@section('content')
<div class="container d-flex align-items-center justify-content-center form-height-login pt-24px pb-24px">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-10">
					<div class="card">
						<div class="card-header bg-primary">
							<div class="ec-brand">
								
							</div>
						</div>
						<div class="card-body p-5">
							<h4 class="text-dark mb-5">Sign In</h4>
							
							<form action="{{ route('login') }}" method="post">
                                @csrf
								<div class="row">
									<div class="form-group col-md-12 ">
                                        <label for="email" class=" col-form-label text-md-end">{{ __('Email Address') }}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
									</div>
									
									<div class="form-group col-md-12 ">
                                        <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
										<input  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									
									<div class="form-group col-md-12">
										<div class="d-flex my-2 justify-content-between">
											<div class="d-inline-block mr-3">
												<div class="control control-checkbox">Remember me
													<input type="checkbox" />
													<div class="control-indicator"></div>
												</div>
											</div>
											
											<p><a class="text-blue" href="{{ route('password.request') }}">Forgot Password?</a></p>
										</div>
										
										<button type="submit" class="btn btn-primary btn-block mb-4">Sign In</button>
										
										<p class="sign-upp">Don't have an account yet ?
											<a class="text-blue" href="{{ route('register') }}">Sign Up</a>
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
