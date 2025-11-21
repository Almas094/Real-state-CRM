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
        <div class="auth-wrapper  v3">
          <div class="auth-form">
            
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
                <div class="tab-content mt-5">
                  <div class="tab-pane show active" id="auth-1" role="tabpanel" aria-labelledby="auth-tab-1">
                    <div class="card-body">
                      <div class="d-grid my-3">
                        <form id="forgotPassword">
                          @csrf
                                <div class="d-flex justify-content-between align-items-end mb-4">
                                <h3 class="mb-0"><b>Forgot Password</b></h3>
                                 <a href="{{route('login')}}" class="link-primary">Back to Login</a>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                    <small id="email-error-msg" class="form-text text-danger text-left" sty;e="display:none;">
                                        <!-- Error message will appear here dynamically -->
                                    </small>
                                    <small id="email-success-msg" class="form-text text-success text-left" sty;e="display:none;">
                                        <!-- Success message will appear here dynamically -->
                                    </small>
                                </div>
                                <!-- <p class="mt-4 text-sm text-muted">Do not forgot to check SPAM box.</p> -->
                                <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary" id="submitButton">
                                    Send Password Reset Email
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
    $('#forgotPassword').on('submit', function (e) {
        e.preventDefault();

        var email = $('#email').val();
        
        $('#submitButton').prop('disabled', true);
        $('#loadingSpinner').show();
        
        $('#email-error-msg').hide();
        $.ajax({
            url: '{{ route("password.email") }}',
            method: 'POST',
            data: {
                _token: $('input[name="_token"]').val(),
                email: email
            },
            success: function (response) {

                $('#loadingSpinner').hide();
                $('#submitButton').prop('disabled', false);

                $('#email-success-msg').text('Password reset link sent! Please check your email.');
                $('#email-error-msg').hide();
                $('#email-success-msg').show();
                $('#forgotPassword')[0].reset();
            },
            error: function (xhr) {
                $('#loadingSpinner').hide();
                $('#submitButton').prop('disabled', false);

                var errors = xhr.responseJSON.errors;
                if (errors.email) {
                    $('#email-error-msg').text(errors.email[0]);
                    $('#email-success-msg').hide();
                    $('#email-error-msg').show();
                } else {
                    alert('An error occurred. Please try again.');
                }
            }
        });
    });
});
</script>
</body>
</html>
