<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Full Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>

    @foreach($employee as $item)

        <tr>
            <td>{{$item->first_name . ' ' . $item->last_name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td class="d-flex justify-content-between">
                <form method="GET" action="{{ route('employee.edit',$item) }}">
                    @csrf
{{--                    @method('HEAD')--}}
                    <button type="submit" class="btn btn-secondary">Update</button>
                </form>
                <a href="{{route('employee.show',$item->id)}}" class="btn btn-warning">View</a>
                <form method="post" action="{{ route('employee.destroy',$item) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


<div class="container">
    {!! $employee->links('ajax.paginationView.pagination') !!}
</div>
