@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            

             
             

            @foreach($getRecord as $value)  


            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">{{ $value['name'] }}</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                      <tr>
                        <th>Week</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Room Number</th>
                      </tr>
                      <tbody>
                        @foreach($value['week'] as $valueW)
                            <tr>
                                <td>{{ $valueW['week_name'] }}</td>
                                <td>
                                    {{ !(empty($valueW['start_time'])) ? date('h:i A',strtotime($valueW['start_time'])) : ''}}
                                </td>
                                <td>
                                    {{ !(empty($valueW['end_time'])) ? date('h:i A',strtotime($valueW['end_time'])) : ''}}
                                </td>
                                <td>{{ $valueW['room_number'] }}</td>
                            </tr>
                        
                        @endforeach()
                       
                      </tbody>
                    </table>
                   
                </div>  
            </div> 
          
            <!-- /.card -->
            @endforeach
            
            <!-- /.card -->
          </div>
        
          <!-- /.col -->
        </div>
      
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection

  @section('script')
        <script>
            // Ваш JavaScript...
           
        </script>
  
@endsection
