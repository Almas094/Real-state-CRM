<!DOCTYPE html>
<html lang="en">
@include('auth.head')
    <body>
      <div class="loader-bg">
        <div class="loader-track">
          <div class="loader-fill"></div>
        </div>
      </div>
      <div class="auth-main">
        <div class="auth-wrapper v3">
          <div class="auth-form">
            <div class="auth-header row">
              <div class="col my-1">
                <!-- <a href="#"><img src="{{asset('assets/images/logo-dark.svg')}}" alt="img" /></a> -->
              </div>
            </div>
            <div class="card my-5 ">
              <div class="card-body pd-0">
                <ul class="nav nav-tabs d-none" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      id="auth-tab-1"
                      data-bs-toggle="tab"
                      href="#auth-1"
                      role="tab"
                      data-slide-index="1"
                      aria-controls="auth-1"
                      aria-selected="true"
                    >
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      id="auth-tab-2"
                      data-bs-toggle="tab"
                      href="#auth-2"
                      role="tab"
                      data-slide-index="2"
                      aria-controls="auth-2"
                      aria-selected="true"
                    >
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      id="auth-tab-3"
                      data-bs-toggle="tab"
                      href="#auth-3"
                      role="tab"
                      data-slide-index="3"
                      aria-controls="auth-3"
                      aria-selected="true"
                    >
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      id="auth-tab-4"
                      data-bs-toggle="tab"
                      href="#auth-4"
                      role="tab"
                      data-slide-index="4"
                      aria-controls="auth-4"
                      aria-selected="true"
                    >
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      id="auth-tab-5"
                      data-bs-toggle="tab"
                      href="#auth-5"
                      role="tab"
                      data-slide-index="5"
                      aria-controls="auth-5"
                      aria-selected="true"
                    >
                    </a>
                  </li>
                </ul>
                <div class="tab-content login-box">
                  <div class="tab-pane show active" id="auth-1" role="tabpanel" aria-labelledby="auth-tab-1">
                      <div class="text-center mb-3">
                        <img src="{{asset('assets/images/adwcrm.svg')}}" alt="img" width="200px" />
                      </div>
                      <!-- <h3 class="text-center mb-2">Welcome to the Abstract CRM</h3> -->
                      <p class="mb-4 text-center">login with your login ID</p>
                      <div class="d-grid my-3">
                        <form action="{{ route('login') }}" method="POST">
                          @csrf
                            <div class="form-group mb-3">
                              <input type="text" class="form-control" id="floatingInput" name="login_id" placeholder="login ID">
                              @if ($errors->has('login_id'))
                                <small id="file-error-msg" class="form-text text-danger text-left">
                                    {{ $errors->first('login_id') }}
                                </small>
                              @endif
                            </div>
              
                            <div class="form-group mb-3">
                              <input type="password" class="form-control" name="password" id="floatingInput1" placeholder="Password">
                              @if ($errors->has('password'))
                                <small id="file-error-msg" class="form-text text-danger text-left">
                                    {{ $errors->first('password') }}
                                </small>
                              @endif
                            </div>
                            <div class="d-flex mt-1 justify-content-between align-items-center">
                              <div class="form-check">
                                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                                <label class="form-check-label text-muted" for="customCheckc1">Remember me</label>
                              </div>
                              <h6 class="text-secondary f-w-400 mb-0"><a href="{{route('password.request')}}" class="link-1">Forgot Password</a></h6>
                            </div>
                            <div class="d-grid mt-4">
                              <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           @include('auth.footer')
          </div>
          <div class="auth-sidecontent">
            <div class="p-3 px-lg-5 text-center">
              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{asset('assets/images/user/avatar-1.jpg')}}" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                    <h5 class="text-white mb-0">Allie Grater</h5>
                    <p class="text-white text-opacity-50">@alliegrater</p>
                    <div class="star f-20 my-4">
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star-half-alt text-warning"></i>
                    </div>
                    <p class="text-white"
                      >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                      not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                      customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                    >
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('assets/images/user/avatar-2.jpg')}}" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                    <h5 class="text-white mb-0">Allie Grater</h5>
                    <p class="text-white text-opacity-50">@alliegrater</p>
                    <div class="star f-20 my-4">
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star-half-alt text-warning"></i>
                    </div>
                    <p class="text-white"
                      >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                      not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                      customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                    >
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('assets/images/user/avatar-3.jpg')}}" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                    <h5 class="text-white mb-0">Allie Grater</h5>
                    <p class="text-white text-opacity-50">@alliegrater</p>
                    <div class="star f-20 my-4">
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star-half-alt text-warning"></i>
                    </div>
                    <p class="text-white"
                      >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                      not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                      customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                    >
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('assets/images/user/avatar-4.jpg')}}" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                    <h5 class="text-white mb-0">Allie Grater</h5>
                    <p class="text-white text-opacity-50">@alliegrater</p>
                    <div class="star f-20 my-4">
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star-half-alt text-warning"></i>
                    </div>
                    <p class="text-white"
                      >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                      not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                      customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                    >
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('assets/images/user/avatar-5.jpg')}}" alt="user-image" class="user-avtar wid-50 rounded-circle mb-3" />
                    <h5 class="text-white mb-0">Allie Grater</h5>
                    <p class="text-white text-opacity-50">@alliegrater</p>
                    <div class="star f-20 my-4">
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star text-warning"></i>
                      <i class="fas fa-star-half-alt text-warning"></i>
                    </div>
                    <p class="text-white"
                      >Very good customer service!👌 I liked the design and there was nothing wrong, but found out after testing that it did
                      not quite match the functionality and overall design that I needed for my type of software. I therefore contacted
                      customer service and it was no problem even though the deadline for refund had actually expired.😍</p
                    >
                  </div>
                </div>
                <div class="carousel-indicators position-relative mt-3">
                  <button
                    type="button"
                    data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="0"
                    class="active"
                    aria-current="true"
                    aria-label="Slide 1"
                  ></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @include('auth.script')
</body>
</html>
