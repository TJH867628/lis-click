<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" />
<div class="table-container">
                <h2 style="color: black ;">Admin List</h2>
                @if($message = Session::get('updateSuccess'))
                    <span class="success">{{ $message }}</span>
                @endif
                @if($admin)
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
                        Role<br>
                        <input type="text" onchange="filterTable(4, this.value)" placeholder="Search Role">
                    </th>
                    <th>
                        Ic No<br>
                        <input type="text" onchange="filterTable(5, this.value)" placeholder="Search IC No">
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
                @foreach($admin as $admin)
                <tr>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->phoneNumber }}</td>
                    @if($admin->status === 0)
                        <td>Deactived</td>

                    @elseif($admin->status === 1)
                        <td>Active</td>
                    @endif
                    <td>{{ $admin->adminRole }}</td>
                    <td>{{ $admin->IC_No }}</td>
                    <td>{{ $admin->created_at }}</td>
                    <td>{{ $admin->updated_at }}</td>
                    @if($admin->status === 0)
                    <td><a href="{{ route('activeAdmin', ['adminEmail' => $admin->email]) }}" class="btn btn-primary mb-4">Active Admin</a></td>
                    @elseif($admin->status === 1)
                        @if($admin->adminRole === "Super")
                            <td><a href="#" class="btn btn-primary mb-4" style="background-color:gray; pointer-events: none;" >Deactive Admin</a></td>
                        @else{
                            <td><a href="{{ route('deactiveAdmin', ['adminEmail' => $admin->email]) }}" class="btn btn-primary mb-4">Deactive Admin</a></td>
                            
                        }
                        @endif
                    @endif
                </tr>
                @endforeach

            </table>
                    @else
                        <p style="color: black;">No record found.</p>
                    @endif
            </div>
                
            <br><br><br><br><br><br>