@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }} " rel="stylesheet">
@endsection
@section('heading')
    Show codes
@endsection

@section('content')
    <a href="{{route('codes.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add new code </a>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table id="products-table" width="100%" cellspacing="0" class="table table-stribed text-left">
                <thead>
                    <tr>
                        <th>product title</th>
                        <th>codes</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody> 
                   
                        @foreach ($products as $product)
                            <tr>    
                                <td>{{$product->title}}</td>
                                {{-- يقوم هذا السكريبت بحساب عدد الاكواد الخاصة بكل منتج الموجودة في قاعدة البيانات --}}
                                @foreach ($codes as $code)
                                        <td>{{$code->where(['product_id' => $product->id,'bought' => FALSE])->get()->count()}}</td>
                                    @break

                                 @endforeach
                                 {{--  --}}
                                 <td>
                                    <a href="{{route('codes.show',$product)}}"edit class="btn btn-info btn-sm mb-2"><i class="fa fa-edit"></i>show</a>
                                    <form action="{{route('products.destroy',$product)}}" method="POST" class="d-inline-block" >
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm mb-2" style="margin-left: 0px;border-left-width: 7px;" type="submit" onclick="return confirm('هل انت متأكد؟')"><i class="fa fa-trash"></i>Delete</button>
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
            $('#products-table').DataTable({
                "language":{
                    "url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/"
                }
            });
        });
    </script>
@endsection
