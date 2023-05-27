@extends('Admin.layouts.master')

@section('head-tag')
    <title>ویرایش منو</title>
@endsection



@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.home') }}"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.content.category.index') }}"> منو</a>
            </li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش منو</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container ">
                <section class="main-body-container-header">
                    <h5>ویرایش منو</h5>
                </section>
                <section class=" border-bottom pb-2 align-aitems-center mt-4 mb-3 ">
                    <a href="{{ route('admin.content.menu.index') }}" class="btn btn-info btn-sm"> بازگشت </a>
                </section>

                <section>
                    <form action="{{ route('admin.content.menu.update',$menu->id) }}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <section class="row d-flex justify-content-between">
                            <section class="col-12 col-md-6">
                                <div class="form-group ">
                                    <label for="title">عنوان منو</label>
                                    <input type="text" value="{{old('title',$menu->title)}}" id="title" name="title"
                                        class="form-control form-control-sm">
                                </div>
                                @error('title')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="parent_id">انتخاب منو والد</label>
                                    <select name="parent_id" id="parent_id" class="form-control form-control-sm">
                                        <option value="">منو را انتخاب کنید</option>
                                        @foreach ($parent_menus as $parent_menu)
                                                <option value="{{ $parent_menu->id }}"
                                                    @if (old('parent_id',$menu->parent_id) == $parent_menu->id) selected @endif>
                                                    {{ $parent_menu->title }}
                                                </option>

                                        @endforeach
                                    </select>
                                </div>
                                @error('parent_id')
                                    <span class="alert_required bg-danger rounded text-white p-1" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group ">
                                    <label for="url">آدرس URL</label>
                                    <input type="text" value="{{old('url',$menu->url)}}" name="url" id="url"
                                        class="form-control form-control-sm">
                                </div>
                                @error('url')
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
                                        <option value="0" @if (old('status',$menu->status) == 0) selected @endif>غیرفعال
                                        </option>
                                        <option value="1" @if (old('status',$menu->status) == 1) selected @endif>فعال
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
