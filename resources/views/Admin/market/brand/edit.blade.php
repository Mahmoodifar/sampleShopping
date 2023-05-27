@extends('Admin.layouts.master')

@section('head-tag')
    <title>ویرایش برند</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.home') }}"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.market.brand.index') }}"> برند ها </a>
            </li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش برند</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container ">
                <section class="main-body-container-header">
                    <h5> ویرایش برند</h5>
                </section>
                <section class=" border-bottom pb-2 align-aitems-center mt-4 mb-3 ">
                    <a href="{{ route('admin.market.brand.index') }}" class="btn btn-info btn-sm"> بازگشت </a>
                </section>

                <section>
                    <form action="{{ route('admin.market.brand.update', $brand->id) }}" id="form" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <section class="row d-flex justify-content-between">
                            <section class="col-12 col-md-6">
                                <div class="form-group ">
                                    <label for="persian_name">نام فارسی برند</label>
                                    <input type="text" name="persian_name"
                                        value="{{ old('persian_name', $brand->persian_name) }}" id="persian_name"
                                        class="form-control form-control-sm">
                                </div>
                                @error('persian_name')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group ">
                                    <label for="original_name">نام لاتین برند</label>
                                    <input type="text" name="original_name"
                                        value="{{ old('original_name', $brand->original_name) }}" id="original_name"
                                        class="form-control form-control-sm">
                                </div>
                                @error('original_name')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group ">
                                    <label for="logo">لوگو</label>
                                    <input type="file" id="logo" name="logo"
                                        class="form-control form-control-sm">
                                </div>
                                @error('logo')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                                <section class="row">
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($brand->logo['indexArray'] as $key => $value)
                                        <section class="col-{{ 6 / $number }}">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-inpout" name='currentImage'
                                                    value="{{ $key }}" id="{{ $number }}"
                                                    @if ($brand->logo['currentImage'] == $key) checked @endif>
                                                <label for="{{ $number }}">
                                                    <img src="{{ asset($value) }}" class="w-100" alt="">
                                                </label>
                                            </div>
                                        </section>

                                        @php
                                            $number++;
                                        @endphp
                                    @endforeach
                                </section>
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if (old('status', $brand->status) == 0) selected @endif>غیرفعال
                                        </option>
                                        <option value="1" @if (old('status', $brand->status) == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 my-2">
                                <div class="form-group ">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" id="tags" name="tags" class="form-control form-control-sm"
                                        value="{{ old('tags', $brand->tags) }}">
                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                                    </select>
                                </div>
                                @error('tags')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>

                        </section>
                    </form>
                </section>


            </section>
        </section>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0) {

                default_data = default_tags.split(',');

            }
            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد کنید',
                tags: true,
                data: default_data
            });

            select_tags.children('option').attr('selected', true).trigger('change');

            $('#form').submit(function(event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        });
    </script>
@endsection
