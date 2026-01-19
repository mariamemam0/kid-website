@extends('layouts.app')

@section('content')
<!-- Registration Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 mb-5 mb-lg-0">
            <p class="section-title pr-5">
              <span class="pr-2">Book A Seat</span>
            </p>
            <h1 class="mb-4">Book A Seat For Your Kid</h1>
              
          </div>
          <div class="col-lg-5">
            <div class="card border-0">
              <div class="card-header bg-secondary text-center p-4">
                <h1 class="text-white m-0">Book A Seat</h1>
              </div>
              <div class="card-body rounded-bottom bg-primary p-5">
                @if ($errors->any())
    <div class="mb-4">
        <ul class="text-red-500 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form action="/kids" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                    <input
                      type="text"
                      name="name"
                      class="form-control border-0 p-4"
                      placeholder="Your Name"
                      required="required"
                    />
                  </div>
                  <div class="form-group">
                    <input
                      type="text"
                      name="parent_phone"
                      class="form-control border-0 p-4"
                      placeholder="Your Phone Number"
                      required="required"
                    />
                  </div>
                     <!-- Date of Birth -->
      <div class="form-group">
        <input
          type="date"
          name="date_of_birth"
          class="form-control border-0 p-4"
          placeholder="Date of Birth"
          required
        />
      </div>
      
      <!-- Gender -->
      <div class="form-group">
        <select
          name="gender"
          class="custom-select border-0 px-4"
          style="height: 47px"
          required
        >
          <option value="" selected>Select Gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
         <!-- Parent Name -->
      <div class="form-group">
        <input
          type="text"
          name="parent_name"
          class="form-control border-0 p-4"
          placeholder="Parent Name"
          required
        />
      </div>
      <!-- Courses Selection -->
<div class="form-group">
    <select
        name="course_ids[]"
        class="custom-select border-0 px-4"
        style="height: 47px;"
        multiple
        required
    >
        <option value="" disabled>Select Courses</option>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}">
                {{ $course->name }} (Age {{ $course->age_from }}–{{ $course->age_to }})
            </option>
        @endforeach
    </select>
    <small class="text-light d-block mt-1">Hold Ctrl (Cmd on Mac) to select multiple</small>
</div>
                  <div>
                    <button
                      class="btn btn-secondary btn-block border-0 py-3"
                      type="submit"
                    >
                      Book Now
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Registration End -->
 @endsection