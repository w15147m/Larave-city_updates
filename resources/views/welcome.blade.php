@php
    $serialNumber = 1;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Your Page Title</title>
</head>

<body>

<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th>Sr.n</th>
                <th>Country ID</th>
                <th>City ID</th>
                <th>New Name + Country Name</th>
                <th>Real ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- <pre>{{print_r($cities)  }} </pre> --}}
            @foreach ($duplicates as $duplicate)
                @foreach ($cities as $city)
                    <form action="{{route('update_real_id' , $city->id )}}" method="POST">
                        @if (strcasecmp($city->newname, $duplicate->newname) === 0)
                            @csrf

                            <tr>
                                <td>{{ $serialNumber++ ." )" }}</td>
                                <td><input type="number" class="form-control" name="country_id" value="{{ $city->country_id }}"></td>
                                <td><input type="number" class="form-control" name="city_id" value="{{ $city->city_id }}"></td>
                                <td>{{ $city->newname ." city in " .  $city->country->name }}</td>
                                {{-- <td>{{ }}</td> --}}
                                <td><input type="text" class="form-control" name="real_id" value="{{ $city->real_id }}"></td>
                                <td><button type="submit" class="btn btn-primary">Update</button></td>
                            </tr>
                        @endif
                    </form>
                @endforeach
                <tr>
                    <td colspan="5">---</td> <!-- Separate duplicate groups -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-5">
    {{-- {{ $cities->links() }} --}}
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
