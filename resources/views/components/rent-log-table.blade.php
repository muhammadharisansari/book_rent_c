<div>
    {{-- {{$rentlog}} --}}
    <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">User</th>
                        <th scope="col">Book</th>
                        <th scope="col">Rent Date</th>
                        <th scope="col">Return Date</th>
                        <th scope="col">Actual Return Date</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($rentlog as $item)
                            <tr class="{{$item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'table-danger' : 'table-success')}}">
                                <th scope="row">{{$loop->iteration}}</th>
                                {{-- dalam $item->user->username, user adalah nama relasi--}}
                                <td>{{$item->user->username}}</td>
                                {{-- dalam $item->book->title, book adalah nama relasi--}}
                                <td>{{$item->book->title}}</td>
                                <td>{{$item->rent_date}}</td>
                                <td>{{$item->return_date}}</td>
                                <td>{{$item->actual_return_date}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table> 
    
</div>