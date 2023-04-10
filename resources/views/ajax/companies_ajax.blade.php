
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Website</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>


            @foreach($company as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->website}}</td>
                    <td>{{$item->email}}</td>
                    <td class="d-flex justify-content-between">
                        <form method="GET" action="{{ route('companies.edit',$item) }}">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Update</button>
                        </form>
                        <a href="{{route('companies.show',$item->id)}}" class="btn btn-warning">View</a>
                        <form method="post" action="{{ route('companies.destroy',$item) }}">
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
    {!! $company->links('ajax.paginationView.pagination') !!}
</div>
