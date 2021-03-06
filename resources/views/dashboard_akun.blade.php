@extends('layout.dashboard_layout')

@section('table')
    <table class="table-fixed w-full">
        <thead>
            <tr>
                <th class="text-left w-1/3">Username</th>
                <th class="text-left w-1/3">Nama Depan</th>
                <th class="text-left w-1/3">Nama Belakang</th>
            </tr>
        </thead>
        <tbody id="data">
        </tbody>
    </table>

    <script>
        $.ajax({
            type: 'GET',
            url: '/api/user',
            success: function(data) {

                let akun = data.data;

                for (let i = 0; i < akun.length; i++) {
                    $("#data").append(
                        '<tr>' +
                        '<td>' + akun[i].username + '</td>' +
                        '<td>' + akun[i].first_name + '</td>' +
                        '<td>' + akun[i].last_name + '</td>' +
                        '</tr>'
                    );
                }

            },
            error: function(data) {
                console.log(data.responseJSON);
            }
        });
    </script>
@endsection
