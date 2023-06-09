@extends('Admin.layouts.master')

@section('head-tag')
    <title>ویرایش کالا</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">

@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.home') }}"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.market.product.index') }}"> کالا ها</a>
            </li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container ">
                <section class="main-body-container-header">
                    <h5>ویرایش کالا ها</h5>
                </section>
                <section class=" border-bottom pb-2 align-aitems-center mt-4 mb-3 ">
                    <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm"> بازگشت </a>
                </section>

                <section>
                    <form action="{{ route('admin.market.product.store') }}" id="form" enctype="multipart/form-data" method="POST">
                        @csrf

                        <section class="row d-flex justify-content-between">

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group ">
                                    <label for="name">نام کالا</label>
                                    <input type="text" name="name" id="" value="{{ old('name',) }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('name')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="category_id">انتخاب دسته</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}"
                                                @if (old('category_id') == $productCategory->id) selected @endif>
                                                {{ $productCategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="brand_id">انتخاب برند </label>
                                    <select name="brand_id" id="brand_id" class="form-control form-control-sm">
                                        <option value="">برند را انتخاب کنید</option>
                                        @foreach ($productBrands as $productBrand)
                                            <option value="{{ $productBrand->id }}"
                                                @if (old('brand_id') == $productBrand->id) selected @endif>{{ $productBrand->original_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('brand_id')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group ">
                                    <label for="weight">وزن کالا</label>
                                    <input type="text" name="weight"  id="weight" value="{{ old('weight') }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('weight')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group ">
                                    <label for="height">ارتفاع کالا</label>
                                    <input type="text" name="height" id="" value="{{ old('height') }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('height')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group ">
                                    <label for="width">طول کالا</label>
                                    <input type="text" name="width" id="width" value="{{ old('width') }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('width')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group ">
                                    <label for="length">عرض کالا</label>
                                    <input type="text" name="length" id="length" value="{{ old('length') }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('length')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group ">
                                    <label for="price">قیمت کالا</label>
                                    <input type="text" name="price" id="price" value="{{ old('price') }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('price')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input type="file" name="image" class="form-control form-control-sm">
                                </div>
                                @error('image')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if (old('status') == 0) selected @endif>غیرفعال
                                        </option>
                                        <option value="1" @if (old('status') == 1) selected @endif>فعال
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
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="marketable"> قابلیت فروش</label>
                                    <select name="marketable" id="marketable" class="form-control form-control-sm">
                                        <option value="0" @if (old('marketable') == 0) selected @endif>غیرفعال
                                        </option>
                                        <option value="1" @if (old('marketable') == 1) selected @endif>فعال
                                        </option>
                                    </select>
                                </div>
                                @error('marketable')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group ">
                                    <label for="published_at">تاریخ انتشار</label>
                                    <input type="text" id="published_at" name="published_at"
                                        class="form-control form-control-sm d-none">
                                    <input type="text" id="published_at_view" class="form-control form-control-sm">
                                </div>
                                @error('published_at')
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
                                        value="{{ old('tags') }}">
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


                            <section class="col-12 my-2">
                                <div class="form-group ">
                                    <label for="introduction">توضیحات کالا</label>
                                    <textarea name="introduction" id="body" class="form-control form-control-sm" rows="6">{{old('introduction')}}</textarea>
                                </div>
                                @error('introduction')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 border-bottom border-top py-3 mb-3">
                                <section class="row">
                                    <section class="col-6 col-md-3">
                                        <div class="form-group ">
                                                <input type="text" name="meta_key[]" value="{{ old('meta_key[]' )}}"
                                                class="form-control form-control-sm" placeholder="ویژگی...">
                                        </div>
                                    </section>
                                    <section class="col-6 col-md-3">
                                        <div class="form-group ">
                                            <input type="text" name="meta_value[]" value="{{old('meta_value[]')}}" class="form-control form-control-sm"
                                                placeholder="ویژگی...">
                                        </div>
                                    </section>
                                </section>
                                <section>
                                    <button type="button" id="btn-copy"  class="btn btn-success btn-sm">افزودن</button>
                                </section>
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
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        CKEDITOR.replace('introduction');
    </script>

    <script>
        $(document).ready(function() {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }
            });
        });
    </script>

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

    <script>
        $(function(){
            $('#btn-copy').on('click',function(){
                var ele = $(this).parent().prev().clone(true);

                $(this).before(ele);
            })
        })

    </script>
@endsection
