@extends('layouts.app_dashboard')

@section('content_dashboard')
    <!-- Page Heading -->
    <div class="header-title-dash p-3">
        <h1 class="h3 mb-0 text-gray-800">Company</h1>
    </div>
    <div class="p-3">
        <div class="pt-2">
            <form action="{{$route}}" method="POST" enctype="multipart/form-data">
                @CSRF
                @if (Route::currentRouteName() == "companies.edit")
                    @method('put')
                @endif

                <div class="form-group">
                    <label for="exampleFormControlInput1">Logo</label>
                    <div class="profile-picture-upload d-block">
                        <img src="" alt="Profile picture preview" class="imagePreview">
                        <button class="action-button mode-upload">Upload avatar</button>
                        <input type="file" class="hidden" name="logo" />
                    </div>
                    @if ($errors->has('logo'))
                        <span class="invalid-feedback-customer" role="alert">
                                <strong>{{ $errors->first('logo') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="First Name"
                           value="@if(isset($company)){{$company->name}}@else{{old('name')}}@endif"
                           @if (Route::currentRouteName() == "companies.show")
                               disabled
                        @endif
                    >
                    @if ($errors->has('name'))
                        <span class="invalid-feedback-customer" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="Address"
                           value="@if(isset($company)){{$company->address}}@else{{old('address')}}@endif"
                           @if (Route::currentRouteName() == "companies.show")
                               disabled
                        @endif
                    >
                    @if ($errors->has('address'))
                        <span class="invalid-feedback-customer" role="alert">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email"
                           value="@if(isset($company)) {{$company->email}} @else {{old('email')}} @endif"
                           @if (Route::currentRouteName() == "companies.show")
                               disabled
                        @endif
                    >
                    @if ($errors->has('email'))
                        <span class="invalid-feedback-customer" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Website</label>
                    <input type="text" name="website" class="form-control" id="exampleFormControlInput1" placeholder="Website"
                           value="@if(isset($company)){{$company->website}}@else{{old('website')}}@endif"
                           @if (Route::currentRouteName() == "companies.show")
                               disabled
                        @endif
                    >
                    @if ($errors->has('website'))
                        <span class="invalid-feedback-customer" role="alert">
                                <strong>{{ $errors->first('website') }}</strong>
                            </span>
                    @endif
                </div>


                @if (Route::currentRouteName() != "companies.show")
                    <button type="submit" class="btn btn-success mb-3">Submit</button>
                @endif

            </form>
        </div>
    </div>


    <script type="text/javascript">
        let picturePreview = document.querySelector(".imagePreview");
        let actionButton = document.querySelector(".action-button");
        let fileInput = document.querySelector("input[name='logo']");
        let fileReader = new FileReader();


        const DEFAULT_IMAGE_SRC = @if(isset($company)) "{{str_replace("\\", "/", $company->logo)}}" @else"{{asset('public/asset/img/logo_img.png')}}"@endif;

        actionButton.addEventListener("click", (ev) => {
            ev.preventDefault();

            if ( picturePreview.src !== DEFAULT_IMAGE_SRC ) {
                resetImage();
            } else {
                fileInput.click();
            }
        });

        fileInput.addEventListener("change", () => {
            refreshImagePreview();
        });

        function resetImage() {
            setActionButtonMode("upload");
            picturePreview.src = DEFAULT_IMAGE_SRC;
            fileInput.value = "";
        }

        function setActionButtonMode(mode) {
            let modes = {
                "upload": function() {
                    actionButton.innerText = "Upload avatar";
                    actionButton.classList.remove("mode-remove");
                    actionButton.classList.add("mode-upload");
                },
                "remove": function() {
                    actionButton.innerText = "Remove avatar";
                    actionButton.classList.remove("mode-upload");
                    actionButton.classList.add("mode-remove");
                }
            }
            return (modes[mode]) ? modes[mode]() : console.error("unknown mode");
        }

        function refreshImagePreview() {
            if ( picturePreview.src !== DEFAULT_IMAGE_SRC ) {
                picturePreview.src = DEFAULT_IMAGE_SRC;
            } else {
                if ( fileInput.files && fileInput.files.length > 0 ){
                    fileReader.readAsDataURL(fileInput.files[0]);
                    fileReader.onload = (e) => {
                        picturePreview.src = e.target.result;
                        setActionButtonMode("remove");
                    }
                }
            }
        }

        refreshImagePreview();
    </script>
@endsection


