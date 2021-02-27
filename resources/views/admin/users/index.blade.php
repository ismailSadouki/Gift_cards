@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }} " rel="stylesheet">
@endsection
@section('heading')
    show users
@endsection

@section('content')
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table id="books-table" width="100%" cellspacing="0" class="table table-stribed text-right">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>User type</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($users as $user)
                       <tr>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td>{{$user->isSuperAdmin() ? 'Admin general' : ($user->isAdmin() ? 'Admin' : 'user')}}</td>
                           <td>
                            <form action="{{route('users.update',$user)}}" method="POST" class="ml-4 form-inline" style="display:inline-block">
                                @method('patch')
                                @csrf
                                <select name="adminstration_level" class="form-controll form-controll-sm">
                                    <option selected disabled>Choose a type</option>
                                    <option value="0">user</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Admin general</option>
                                </select>
                                <button type="submit" class="btn btn-info btn-sm mb-2"><i class="fa fa-edit"></i>edit</button>
                            </form>
                            <form action="{{route('users.destroy',$user)}}" method="POST" class="d-inline-block" >
                                @method('delete')
                                @csrf
                                @if(auth()->user()!=$user)
                                   <button class="btn btn-danger btn-sm mb-2" style="margin-left: 0px;border-left-width: 7px;" type="submit" onclick="return confirm('هل انت متأكد؟')"><i class="fa fa-trash"></i>حذف</button>
                                @else
                                    <div class="btn btn-danger btn-sm mb-2 disabled"><i class="fa fa-trash"></i>حذف</div>    
                                @endif
                            </form>
                           </td>
                       
                        </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection 

@section('script')
    <script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('#books-table').DataTable({
                "language":{
                    "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/"
                }
            });
        });
    </script>
@endsection
