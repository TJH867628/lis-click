<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" />
<div class="table-container">
                <h2 style="color: black ;">Participants List</h2>
                @if($participants)
                <table>
                    <tr>
                        <th>
                            Email<br>
                            <input type="text" onchange="filterTable(0, this.value)" placeholder="Search Email">
                        </th>
                        <th>
                            Name<br>
                            <input type="text" onchange="filterTable(1, this.value)" placeholder="Search Name">
                        </th>
                        <th>
                            Phone Number<br>
                            <input type="text" onchange="filterTable(2, this.value)" placeholder="Search Phone Number">
                        </th>
                        <th>
                            Status<br>
                            <input type="text" onchange="filterTable(3, this.value)" placeholder="Search Status">
                        </th>
                        <th>
                            Organization Name<br>
                            <input type="text" onchange="filterTable(4, this.value)" placeholder="Search Organization Name">
                        </th>
                        <th>
                            Organization Address<br>
                            <input type="text" onchange="filterTable(5, this.value)" placeholder="Search Organization Address">
                        </th>
                        <th>
                            Created At<br>
                            <input type="text" onchange="filterTable(6, this.value)" placeholder="Search Created At">
                        </th>
                        <th>
                            Updated At<br>
                            <input type="text" onchange="filterTable(7, this.value)" placeholder="Search Updated At">
                        </th>
                    </tr>
                    @foreach($participants as $participants)
                    <tr>
                        <td>{{ $participants->email }}</td>
                        <td>{{ $participants->name }}</td>
                        <td>{{ $participants->phoneNumber }}</td>
                        <td>{{ $participants->IC_No }}</td>
                        <td>{{ $participants->organizationName }}</td>
                        <td>{{ $participants->organizationAddress }}</td>
                        <td>{{ $participants->created_at }}</td>
                        <td>{{ $participants->updated_at }}</td>
                    </tr>
                    @endforeach
                </table>
                    @else
                        <p style="color: black;">No record found.</p>
                    @endif
            </div>