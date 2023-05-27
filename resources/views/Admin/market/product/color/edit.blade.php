@extends('Admin.layouts.master')

@section('head-tag')
    <title>ویرایش رنگ کالا</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">

@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.home') }}"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.market.product.index',$product->id) }}"> رنگ کالا ها</a>
            </li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش رنگ کالا</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container ">
                <section class="main-body-container-header">
                    <h5>رنگ کالا ها</h5>
                </section>
                <section class=" border-bottom pb-2 align-aitems-center mt-4 mb-3 ">
                    <a href="{{ route('admin.market.color.index',$product->id) }}" class="btn btn-info btn-sm"> بازگشت </a>
                </section>

                <section>
                    <form action="{{ route('admin.market.color.update',['product' => $product->id, 'color' => $color->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <section class="row d-flex justify-content-between">

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group ">
                                    <label for="color_name">نام</label>
                                    <input type="text" name="color_name" id="color_name" value="{{ old('color_name',$color->color_name) }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('color_name')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group ">
                                    <label for="color">رنگ</label>
                                    <input type="color" name="color" id="color" value="{{ old('color',$color->color) }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('color')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group ">
                                    <label for="price_increase">قیمت رنگ کالا</label>
                                    <input type="text" name="price_increase" id="price_increase" value="{{ old('price_increase',$color->price_increase) }}"
                                        class="form-control form-control-sm">
                                </div>
                                @error('price_increase')
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
