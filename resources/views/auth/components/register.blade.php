@extends('app.customer.master')
@section('customer')
<main class="main login-page">
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">My Account</h1>
        </div>
    </div>

    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="demo1.html">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="login-popup">
                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                    <ul class="nav nav-tabs text-uppercase mb-2">
                        <li class="nav-item">
                            <a href="" class="nav-link">Sign Up</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <form method="POST" action="{{ route('customer.register.store') }}" class="registration-form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone <span style="color: red;">*</span></label>
                                        <input type="text" class="form-control" name="phone" id="phone" required placeholder="01XXXXXXXXX">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label>Password <span style="color: red;">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label for="password_confirmation">Confirm Password <span style="color: red;">*</span></label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Choose Profile</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>

                            <div class="form-group mb-2 mt-2">
                                <label for="division">Select Division <span style="color: red;">*</span></label>
                                <select id="division" name="division" required class="form-control">
                                    <option value="">-- Select Division --</option>
                                    <option value="ঢাকা">Dhaka</option>
                                    <option value="চট্টগ্রাম">Chattogram</option>
                                    <option value="রাজশাহী">Rajshahi</option>
                                    <option value="খুলনা">Khulna</option>
                                    <option value="বরিশাল">Barishal</option>
                                    <option value="সিলেট">Sylhet</option>
                                    <option value="রংপুর">Rangpur</option>
                                    <option value="ময়মনসিংহ">Mymensingh</option>
                                </select>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label>District <span style="color: red;">*</span></label>
                                        <select name="district_id" id="district_id" class="form-control">
                                            <option value="">Select District</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label for="password_confirmation">Sub District <span style="color: red;">*</span></label>
                                        <select name="sub_district_id" id="sub_district_id" class="form-control">
                                            <option value="">Select Sub District</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Register Now</button>
                       </form>

                    </div>
                    <p class="text-center"><a href="{{ url('/login') }}">Sign in</a> with social account</p>
                    <div class="social-icons social-icon-border-color d-flex justify-content-center">
                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                        <a href="#" class="social-icon social-google fab fa-google"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("district_id").addEventListener("change", function() {
            var district_id = this.value;
            var subDistrictSelect = document.getElementById("sub_district_id");

            subDistrictSelect.innerHTML = '<option value="">Loading...</option>';

            if (district_id) {
                axios.get('{{ route('get.subdistricts') }}', {
                        params: {
                            district_id: district_id
                        }
                    })
                    .then(function(response) {
                        subDistrictSelect.innerHTML =
                            '<option value="">Select Sub District</option>';
                        response.data.forEach(function(subDistrict) {
                            var option = document.createElement("option");
                            option.value = subDistrict.id;
                            option.textContent = subDistrict.name;
                            subDistrictSelect.appendChild(option);
                        });
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            } else {
                subDistrictSelect.innerHTML = '<option value="">Select Sub District</option>';
            }
        });
    });
</script>

@endsection
