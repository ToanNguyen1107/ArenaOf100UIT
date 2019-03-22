@extends('layouts.app')
@section('title','Danh Sách Sinh Viên')
@section('style')
@stop
@section('content')
<div class="dropdown mb-4">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quản Trị Viên
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('questions.create') }}">Thêm Câu Hỏi</a>
            <a class="dropdown-item" href="{{route('users.create')}}">Thêm Sinh Viên</a>
            <a class="dropdown-item" href="{{url('/questions')}}">Quản Lí Đề Thi</a>
            <a class="dropdown-item" href="{{url('/users')}}" > Quản Lí Sinh Viên </a>
        </div>
</div>
        <div class="row">
            <div class="col-12">
                            <table class="table table-striped table-light ">
                                <thead class="thead-light">
                                    <tr>
                                        <th height="4%" width="4%">STT</th>
                                        <th height="30%" width="30%">Mã Số Sinh Viên</th>
                                    
                                        <th height="20%" width="20%">Thao Tác</th>
                                    </tr>
                                </thead>
                                    <tr>
                                <tbody>
                                        <?php

                                            function showacc($x,$k)
                                            
                                        {

                                        ?>  
                                            
                                            <tr>
                                                <td>
                                                    <?php echo ($k); ?> 
                                                </td>
                                            <td><?php echo ($x->username); ?> </td>
                                            <td>
                                            <div class="container">
                                                  <div class="row">
                                                    <div class="col-sm">
                                                      {!!Form::open(['method'=>'delete', 'route'=>['users.destroy', $x->id]]) !!}
                                                      <input class="btn btn-danger" onclick='return confirm("Do you want to delete this record?")' type="submit" value="Xóa">
                                                       </form>
                                                    </div>
                                                    <div class="col-sm">
                                                      <a href="{{ route('users.edit', $x->id) }}" class = "btn btn-success">Chỉnh Sửa</a>
                                                    </div>
                                                  </div>
                                                </div>                                                    

                                                 
                                               
                                                     

                                        </td>
                                        </tr><?php

                                    }?>
                                        <php>   
                                           
                                            <?php $k=0 ?>    
                                            @foreach($users as $user)
                                                    <?php 
                                                        if ($user->admin==0){
                                                          $k++; 
                                                          showacc($user,$k);
                                                        }

                                                    ?>
                                            @endforeach
                                           

                                        </php>          
                                        
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
        </div>
    <script src="{{ asset('js/app.js') }}">
    </script>
@stop