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
                <a href="#"><img src="{{asset('assets/images/logo-dark.svg')}}" alt="img" /></a>
              </div>
            </div>
            <div class="card my-5">
              <div class="card-body">
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
                <div class="tab-content">
                  <div class="tab-pane show active" id="auth-1" role="tabpanel" aria-labelledby="auth-tab-1">
                    <div class="card-body">
                    <div class="mb-4">
                      <h3 class="mb-2"><b>Reset Password</b></h3>
                      <p class="text-muted">Please choose your new password</p>
                    </div>
                      <div class="d-grid my-3">
                        <form id="resetPassword">
                          @csrf
                                <input type="hidden" name="token" value="{{ request()->route('token') }}"> 
                                <input type="hidden" name="email" value="{{ request()->query('email') }}"> 
                                <div class="form-group mb-3">
                                    <label class="form-label"></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label"></label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Conform Password">
                                    <small id="password-error-msg" class="form-text text-danger text-left" sty;e="display:none;">
                                        <!-- Error message will appear here dynamically -->
                                    </small>
                                    <small id="password-success-msg" class="form-text text-success text-left" sty;e="display:none;">
                                        <!-- Success message will appear here dynamically -->
                                    </small>
                                </div>
                                <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary" id="submitButton">
                                    Reset Password
                                    <span id="loadingSpinner" class="spinner-border spinner-border-sm text-light" style="display: none;" role="status"></span>
                                </button>
                                </div>
                          </form>
                      </div>
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
<script>
$(document).ready(function () {
    $('#resetPassword').on('submit', function (e) {
        e.preventDefault();
        
        $('#submitButton').prop('disabled', true);
        $('#loadingSpinner').show();
        $('#password-error-msg').hide();

        $.ajax({
            url: '{{ route("password.update") }}',
            method: 'POST',
            data: $(this).serialize(), 
            dataType: 'JSON',
            success: function (response) {
                $('#loadingSpinner').hide();
                $('#submitButton').prop('disabled', false);

                if (response.status === true) {
                    $('#password-error-msg').hide();
                    $('#password-success-msg').text(response.message).show();
                    setTimeout(function() {
                        window.location.href = '{{ route("login") }}';
                    }, 1000);
                } else {
                    $('#password-success-msg').hide();
                    $('#password-error-msg').text(response.message).show();
                }
            },
            error: function (xhr) {
                $('#loadingSpinner').hide();
                $('#submitButton').prop('disabled', false);

                var response = xhr.responseJSON;
                if (response && response.status === false) {
                    $('#password-success-msg').hide();
                    $('#password-error-msg').text(response.message).show();
                } else if (response && response.errors) {

                    var firstError = Object.values(response.errors)[0][0];
                    $('#password-success-msg').hide();
                    $('#password-error-msg').text(firstError).show();
                } else {
                    $('#password-success-msg').hide();
                    $('#password-error-msg').text('An error occurred. Please try again.').show();
                }
            }

        });
    });
});
</script>
</body>
</html>
