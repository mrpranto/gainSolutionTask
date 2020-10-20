@extends('layouts.master')
@section('content')


    <div class="row">
        <div class="col-sm-12 mt-4 mb-5">
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Birth Date</th>
                    <th>Created At</th>
                </tr>

                @forelse($subscribers as $key => $subscriber)
                    <tr>
                        <td>{{ $subscribers->firstItem() + $key }}</td>
                        <td>{{ $subscriber->first_name }}</td>
                        <td>{{ $subscriber->last_name }}</td>
                        <td>{{ $subscriber->email }}</td>
                        <td>{{ $subscriber->birth_day }}</td>
                        <td>{{ $subscriber->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center"> NO Data Found.</td>
                    </tr>
                @endforelse

            </table>

            {{ $subscribers->links() }}
        </div>
    </div>




@endsection
