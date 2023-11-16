<style>

    .table {
                margin: auto;
                border-collapse: collapse;
                width: 50%;
            }

            .table th,
            .table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            .table th {
                background-color: #f2f2f2;
            }
            input{
                height: 30px;
        width: 200px;
            }

    </style>

    <table class="table">
        <tr>
            <td>country_id</td>
            <td>Id</td>
            <td>New Name</td>
            <td>update id</td>
            <td>action</td>
        </tr>
        {{-- <pre>{{print_r($cities)  }} </pre> --}}
        @foreach ($duplicates as $duplicate)
        @foreach ($cities as $city)

            @if (strcasecmp($city->newname, $duplicate->newname) === 0)
            <form action="{{route('update_id' , $city->id )}}" method="POST">

                <tr>
                    <td><input type="number" id="id" name="id" value="{{ $city->country_id }}"></td>
                    <td><input type="number" id="id" name="id" value="{{ $city->city_id }}"></td>
                    <td>{{ $city->newname }}</td>
                    <td>{{ $city->country->name }}</td>
                    <td> <input type="number" id="newId+{{ $city->id }}"></td>
                    <td> <button type="submit" value="update">update</button></td>
                </tr>
            </form>
            @endif
        @endforeach
        <tr>
            <td colspan="3">---</td> <!-- Separate duplicate groups -->
        </tr>
    @endforeach

    </table>

    <script>
    cities = {!! $cities !!}
    duplicates = {!! $duplicates !!}
    console.log(cities);
    console.log(duplicates);


    function updateCity(cityId) {
            id= "newId+"+ cityId;
            console.log(id);
           var newId = document.getElementById(id).value;

            location.href = '/updatecity/'+cityId+"/"+newId ;

        }
    </script>
