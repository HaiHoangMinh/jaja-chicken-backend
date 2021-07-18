@extends('layouts.admin') 
{{-- Tìm layout->admin de extend  --}}

@section('title')
    <title>Quản lý phản hồi</title>

@endsection

@section('css')
    <link rel="stylesheet" href="">

@endsection
@section('js')
  <script src="{{asset('vendor/sweetAlert2/sweetalert2@11.js')}}"></script>
  <script src="{{asset('admins/product/index/list.js')}}"></script>
@endsection

@section('content')
  <div class="content-wrapper">
    @include('partials.content-header',[ 'name' => 'Feedback','key' =>'List'])

    <div class="content">
      <div class="container-fluid">
        <div class="row">
         
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                    
                <th scope="col">Khách hàng</th>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Trả lời</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody>
                 
                @foreach ($feedbacks as $feedback)
                <tr>
                    <td>
                      <form>
                        @csrf
                        @if($feedback->status == 0 )
                        <input type="button" data-feedback_status="1" 
                        data-feedback_id= {{$feedback->id}}
                        value="Duyệt" class="btn btn-primary btn-xs feedback_duyet">
                      @else
                      <input type="button" data-feedback_status="0" data-feedback_id="{{$feedback->id}}"
                      id="{{$feedback->id}}"
                      value="Bỏ duyệt" class="btn btn-danger btn-xs feedback_duyet">
                      @endif
                      </form>
                    
                    </td>
                  <td>{{$customers->where('id',$feedback->customer_id)->first()->name}}</td>
                  <td>{{$products->where('id',$feedback->product_id)->first()->name}}</td>
                  <td>{{$feedback->content}}

                  @if($feedback->status == 1)
                  
                    <br/><textarea class="replay_feedback" rows="5" ></textarea>
                    <br/><button class="btn btn-default btn-reply-feedback" 
                    data-feedback_id="{{$feedback->id}}"
                    >Trả lời</button>
                  <div id="notify"></div>
                  @endif
                
                 </td>
                 
                  <td>{{$feedback->date}}</td>
                  <td>{{$feedback->reply}}</td>
                  
                  <td>

                    <a data-url="{{ route('feedbacks.delete', ['id'=> $feedback->id]) }}"
                    href="" class="btn btn-danger action_delete ">Delete</a>
                  </td>
                  </tr>
              
            </td>
            </tr>
          @endforeach


            </tbody>
          </table>
        
        
        
        </div>
        <div class="col-md-12">
          {{ $feedbacks->links()}} 
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection