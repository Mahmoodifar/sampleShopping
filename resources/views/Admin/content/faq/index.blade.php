@extends('Admin.layouts.master')

@section('head-tag')
    <title>سوالات متداول</title>
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="{{ route('admin.home') }}"> خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> سوالات متداول</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container ">
                <section class="main-body-container-header">
                    <h5>سوالات متداول</h5>
                </section>
                <section class=" border-bottom pb-2 d-flex justify-content-between align-aitems-center mt-4 mb-3 ">
                    <a href="{{ route('admin.content.faq.create') }}" class="btn btn-info btn-sm">ایجاد پرسش جدید</a>

                    <div class="max-whidth-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو...">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>پرسش</th>
                                <th>خلاصه پاسخ</th>
                                <th>اسلاگ</th>
                                <th>تگ ها</th>
                                <th>وضعیت</th>
                                <th class="max-whidth-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $key => $faq)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $faq->question }}</td>
                                    <td>{{ $faq->answer }}</td>
                                    <td>{{ $faq->slug }}</td>
                                    <td>{{ $faq->tags }}</td>
                                    <td>
                                        <label>
                                            <input id="{{ $faq->id }}"
                                                onchange="changeStatus('{{ $faq->id }}')"
                                                data-url="{{ route('admin.content.faq.status', $faq->id) }}"
                                                type="checkbox" @if ($faq->status == 1) checked @endif>
                                        </label>
                                    </td>
                                    <td class="width-16-rem text-left">
                                        <a href="{{ route('admin.content.faq.edit', $faq->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>

                                        <form action="{{ route('admin.content.faq.destroy', $faq->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button class="btn btn-danger btn-sm delete" type="submit"><i
                                                    class="fa fa-trash-alt"></i>
                                                حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection

@section('script')
    <script type="text/javaScript">
        function changeStatus(id)
                            {
                                var element = $("#" + id);
                                var url = element.attr('data-url')
                                var elementValue = !element.prop('checked');

                                $.ajax({
                                    url : url,
                                    type: "GET",
                                    success: function(response)
                                    {
                                        if (response.status)
                                        {
                                            if(response.checked)
                                            {
                                                element.prop('checked',true);
                                                successToast(' پرسش شما با موفقیت فعال شد');
                                            }
                                            else
                                            {
                                                element.prop('checked',false);
                                                successToast('پرسش شما با موفقیت غیر فعال شد');
                                            }
                                        }
                                        else
                                            {
                                            element.prop('checked',elementValue);
                                            errorToast('هنگام ویرایش مشکلی پیش آمده است');
                                            }
                                    },
                                    error: function()
                                    {
                                        element.prop('checked',elementValue);
                                        errorToast('ارتباط برقرار نشد');
                                    }
                                })

                                function successToast(message)
                                {
                                    var successToastTag = '<section class="toast" data-delay="5000">\n' +
                                        '<section class="toast-body py-3 d-flex bg-success text-white ">\n'+
                                        '<strong class="ml-auto">' + message + '</strong>\n' +
                                        '<button type="button" class="mr-2 close" data-dismiss="toasaria-label="Close">\n' +
                                        '<span aria-hidden="true">&times;</span>\n' +
                                        '</button>\n' +
                                        '</section>\n' +
                                        '</section>';

                                    $('.toast-wrapper').append(successToastTag);
                                    $('.toast').toast('show').delay(5500).queue(function () {
                                    $(this).remove();
                                    })
                                }

                                function errorToast(message)
                                {
                                    var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                                        '<section class="toast-body py-3 d-flex bg-danger text-white ">\n'+
                                        '<strong class="ml-auto">' + message + '</strong>\n' +
                                        '<button type="button" class="mr-2 close" data-dismiss="toasaria-label="Close">\n' +
                                        '<span aria-hidden="true">&times;</span>\n' +
                                        '</button>\n' +
                                        '</section>\n' +
                                        '</section>';

                                    $('.toast-wrapper').append(errorToastTag);
                                    $('.toast').toast('show').delay(5500).queue(function ()
                                    {
                                        $(this).remove();
                                    })
                                }
                            }
                        </script>

    @include('Admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection