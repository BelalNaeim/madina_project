@extends('layouts.dashboard.app')

@section('title', 'المستخدمين')
@section('content')

    <div class="section-body">
        <div class="row clearfix">
            <div class="col-lg-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="table-responsive mb-4">
                            <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                                <thead>
                                    <tr>
                                        <th>إسم المستخدم</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>الرتبة</th>
                                        <th>حالة المستخدم</th>
                                        <th>عمليات</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>إسم المستخدم</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>الرتبة</th>
                                        <th>حالة المستخدم</th>
                                        <th>عمليات</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if (count($users) == 0)
                                        <tr>
                                            <td colspan="4" class="text-center">No Users</td>
                                        </tr>
                                    @else
                                        @forelse ($users as $key => $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    @if ($user->approved == 1)
                                                        <span class="badge badge-pill badge-success">تفعيل</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">إلغاء التفعيل</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($user->approved == 1)
                                                        <a href="{{ url('/Dashboard/member/inactive/' . $user->id) }}"
                                                            class="btn btn-warning">غير مفعل</a>
                                                    @else
                                                        <a href="{{ url('/Dashboard/member/approve/' . $user->id) }}"
                                                            class="btn btn-success">تفعيل</a>
                                                    @endif
                                                    <a href='' data-toggle="modal"
                                                        data-target="#modal_single_del{{ $key }}"
                                                        class='btn btn-danger m-r-1em'>حذف </a>
                                                </td>
                                            </tr>
                                            @if (isset($key))
                                                <div class="modal" id="modal_single_del{{ $key }}" tabindex="-1"
                                                    role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">delete confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                Remove {{ $user->name }} !!!!
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form
                                                                    action="{{ url('/Dashboard/member/delete/' . $user->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')

                                                                    <div class="not-empty-record">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Delete</button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">close</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                            @endif
                                        @empty
                                            <tr>
                                                <td colspan="4">No users found.</td>
                                            </tr>
                                        @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                // $("#provider_table").dataTable()
            });
            $(function() {
                $(".toggle-class").change(function() {
                    var status = $(this).prop('checked') == true ? 1 : 0;
                    var user_id = $(this).data('id');
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: "/userStatus",
                        data: {
                            'status': status,
                            'user_id': user_id
                        },
                        success: function(data) {
                            console.log(data.success);
                        }
                    });
                });
            });
        </script>
    @endsection
